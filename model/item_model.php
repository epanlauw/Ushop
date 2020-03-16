<?php
    require_once("../include/Database.php");
    class ItemModel{
        public $db;
        public $mysqli;
        public function __construct(){
            $this->db = Database::getInstance();
            $this->mysqli = $this->db->getConnection();
        }

        public function tampilDataPembeli(){
            $sql = "SELECT * FROM item WHERE item_stock > 0";
            $query = $this->mysqli->query($sql);
            return $query;
        }

        public function tampilDataFull($id){
            $sql = "SELECT * FROM item WHERE item_id = '$id'";
            $query = $this->mysqli->query($sql);
            return $query;
        }

        public function tampilDataKasir(){
            $sql = "SELECT * FROM item";
            $query = $this->mysqli->query($sql);
            return $query;
        }

        public function updateDataKasir($stock,$price,$id){
            $sql = "UPDATE item SET item_stock='$stock',item_price='$price' WHERE item_id='$id'";
            $this->mysqli->query($sql);
        }

        public function updateDataManager($stock,$price,$id,$nama,$desc){
            $sql = "UPDATE item SET item_stock='$stock',item_price='$price',item_name='$nama',item_desc='$desc' WHERE item_id='$id'";
            $this->mysqli->query($sql);
        }

        public function deleteData($id){
            $sql = "DELETE FROM item WHERE item_id='$id'";
            $this->mysqli->query($sql);
        }

        public function addData($id, $nama, $stock, $price, $desc){
            $sql = "INSERT INTO item VALUES('$id', '$nama', '$stock', '$price', '$desc')";
            $this->mysqli->query($sql);
        }

        public function lastRecord(){
            $sql = "SELECT * FROM item ORDER BY item_id DESC LIMIT 1";
            $query = $this->mysqli->query($sql);
            $row = $query->fetch_assoc();
            return $row;
        }
    }
?>
