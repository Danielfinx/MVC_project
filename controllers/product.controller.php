<?php 

    require_once "models/product.php";  

    class ProductController {
        private $model;

        public function __construct() {
            $this->model = new Product();
        }

        public function start() {
            require_once "views/header.php";
            require_once "views/product/main.php";
            require_once "views/footer.php";
        }
    }
?>