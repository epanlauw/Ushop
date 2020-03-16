<?php 
    require_once("../model/item_model.php");
    class ItemController{
        public $model;
        public function __construct(){
            $this->model = new ItemModel();
        }

        public function showDataPembeli(){
            $result = $this->model->tampilDataPembeli();
            return $result;
        }

        public function showData(){
            $result = $this->model->tampilDataKasir();
            return $result;
        }

        public function showDatadetail(){
            $id = $_GET['item_id'];
            $result = $this->model->tampilDataFull($id);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function updateItemKasir(){
            if(isset($_POST['update'])){
                $id = $_GET['item_id'];
                $stock = $_POST['stock'];
                $price = $_POST['price'];
                $this->model->updateDataKasir($stock, $price, $id);
                header("Location:kasir.php");
            }
        }
        public function updateItemManager(){
            if(isset($_POST['update'])){
                $id = $_GET['item_id'];
                $nama = $_POST['nama'];
                $stock = $_POST['stock'];
                $price = $_POST['price'];
                $desc = $_POST['desc'];
                $this->model->updateDataManager($stock, $price, $id, $nama,$desc);
                header("Location:manager.php");
            }
        }
        public function deleteItem(){
           $id = $_GET['item_id'];  
           $this->model->deleteData($id);
           header("Location:manager.php");
        }
        public function addItem(){
            if(isset($_POST['add'])){
                $nama = $_POST['nama'];
                $stock = $_POST['stock'];
                $price = $_POST['price'];
                $desc = $_POST['desc'];
                $id_temp = $this->model->lastRecord();
                $id = $id_temp['item_id']+1;

                $this->model->addData($id,$nama,$stock,$price,$desc);
                header("Location:manager.php");
            }
        }
    }
?>