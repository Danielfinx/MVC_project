<?php
    class Product {
        private $conn;

        private $prod_id; 
        private $prod_name;
        private $prod_brand;
        private $prod_cost;
        private $prod_price;
        private $prod_amnt;
        private $prod_img;

        public function __construct() {
            Database::initialize();
            $this->conn = Database::connect();
        }

        public function getProd_id() : ?int {
            return $this->prod_id;
        }

        public function setProd_id(int $id) : void {
            $this->prod_id = $id;
        }

        public function getProd_name() : ?string {
            return $this->prod_name;
        }

        public function setProd_name(string $name) : void {
            $this->prod_name = $name;
        }

        public function getProd_brand() : ?string {
            return $this->prod_brand;
        }

        public function setProd_brand(string $brand) : void {
            $this->prod_brand = $brand;
        }

        public function getProd_cost() : ?float {
            return $this->prod_cost;
        }

        public function setProd_cost(float $cost) : void {
            $this->prod_cost = $cost;
        }

        public function getProd_price() : ?float {
            return $this->prod_price;
        }

        public function setProd_price(float $price) : void {
            $this->prod_price = $price;
        }

        public function getProd_amnt() : ?int {
            return $this->prod_amnt;
        }

        public function setProd_amnt(int $amnt) : void {
            $this->prod_amnt = $amnt;
        }

        public function getProd_img() : ?string {
            return $this->prod_img;
        }

        public function setProd_img(string $img) : void {
            $this->prod_img = $img;
        }

        public function Amount() {
            try {
                $query= $this->conn->prepare("SELECT SUM(prod_amnt) as Amount FROM products");
                $query->execute();
                return $query->fetch(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function List () {
            try {
                $query= $this->conn->prepare("SELECT * FROM products");
                $query->execute();
                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Get ($id) {
            try {
                $query= $this->conn->prepare("SELECT * FROM products WHERE prod_id = ?");
                $query->execute([$id]);

                $r= $query->fetch(PDO::FETCH_OBJ);
                $p = new Product();

                $p->setProd_id($r->prod_id);
                $p->setProd_name($r->prod_name);
                $p->setProd_brand($r->prod_brand);
                $p->setProd_cost($r->prod_cost);
                $p->setProd_price($r->prod_price);
                $p->setProd_amnt($r->prod_amnt);
                // $p->setProd_img($r->prod_img);

                return $p;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function insert(Product $p) {
            try {
                $query= $this->conn
                ->prepare("INSERT 
                            INTO products (prod_name, prod_brand, prod_cost, prod_price, prod_amnt) 
                            VALUES (?, ?, ?, ?, ?)");

                $query->execute([
                    $p->getProd_name(),
                    $p->getProd_brand(),
                    $p->getProd_cost(),
                    $p->getProd_price(),
                    $p->getProd_amnt()
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function update(Product $p) {
            try {
                $query= $this->conn
                ->prepare("UPDATE products
                            SET prod_name = ?,
                                prod_brand = ?,
                                prod_cost = ?,
                                prod_price = ?,
                                prod_amnt = ?
                            WHERE prod_id = ?");

                $query->execute([
                    $p->getProd_name(),
                    $p->getProd_brand(),
                    $p->getProd_cost(),
                    $p->getProd_price(),
                    $p->getProd_amnt(),
                    $p->getProd_id()
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function delete(int $id) {
            try {
                $query= $this->conn
                ->prepare("DELETE FROM products WHERE prod_id = ?");

                $query->execute([
                    $id
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }