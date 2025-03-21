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

    }