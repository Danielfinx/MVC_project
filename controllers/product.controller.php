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

        public function productForm() {
            
            $title = "Add";
            $action = "register a new";

            if (isset($_GET['id'])) {
                $p = $this->model->get($_GET['id']);
                $title = "Edit";
                $action = "modify an existing";
            }

            require_once "views/header.php";
            require_once "views/product/productForm.php";
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

            if ($p->getProd_id() > 0)
                $this->model->update($p);
            else {
                $this->model->insert($p);
            }

            header("Location: ?c=product");
        }

        public function delete() {
            $this->model->delete($_GET['id']);
            header("Location: ?c=product");
        }
    }
?>