<?php
    class Product {
        private $conn;

        private $pro_id; 
        private $pro_name;
        private $pro_brand;
        private $pro_cost;
        private $pro_price;
        private $pro_amnt;
        private $pro_img;

        public function __construct() {
            Database::initialize();
            $this->conn = Database::connect();
        }

        public function getPro_id() : ?int {
            return $this->pro_id;
        }

        public function setPro_id(int $id) : void {
            $this->pro_id = $id;
        }

        public function getPro_name() : ?string {
            return $this->pro_name;
        }

        public function setPro_name(string $name) : void {
            $this->pro_name = $name;
        }

        public function getPro_brand() : ?string {
            return $this->pro_brand;
        }

        public function setPro_brand(string $brand) : void {
            $this->pro_brand = $brand;
        }

        public function getPro_cost() : ?float {
            return $this->pro_cost;
        }

        public function setPro_cost(float $cost) : void {
            $this->pro_cost = $cost;
        }

        public function getPro_price() : ?float {
            return $this->pro_price;
        }

        public function setPro_price(float $price) : void {
            $this->pro_price = $price;
        }

        public function getPro_amnt() : ?int {
            return $this->pro_amnt;
        }

        public function setPro_amnt(int $amnt) : void {
            $this->pro_amnt = $amnt;
        }

        public function getPro_img() : ?string {
            return $this->pro_img;
        }

        public function setPro_img(string $img) : void {
            $this->pro_img = $img;
        }

        public function Amount() {
            try {
                $query= $this->conn->prepare("SELECT SUM(prod_amnt) as Amount FROM products");
                $query->execute();
                return $query->fetch(PDO::FETCH_OBJ);
            } catch (Throwable $e) {
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