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

        public function addForm() {
            require_once "views/header.php";
            require_once "views/product/addForm.php";
            require_once "views/footer.php";
        }

        public function save() {
            $p = new Product();

            $p->setProd_id(intval($_POST['ID'])); 
            $p->setProd_name($_POST['Name']);
            $p->setProd_brand($_POST['Brand']);
            $p->setProd_cost($_POST['Cost']);
            $p->setProd_price($_POST['Price']);
            $p->setProd_amnt($_POST['Amount']);
            // $p->setProd_img($_POST['Image']);

            $this->model->insert($p);

            header("Location: ?c=product");
        }
    }
?>