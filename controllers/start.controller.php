<?php
    require_once "models/product.php";

    class StartController {
        private $model;

        public function __construct() {
            $this->model = new Product();
        }

        public function start() {
            Database::initialize();
            $db = Database::connect();
            require_once "views/header.php";
            require_once "views/start/main.php";
            require_once "views/footer.php";
        }
    }