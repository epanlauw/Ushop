<?php
    require_once("../include/Database.php");
    class UserModel{
        public $db;
        public $mysqli;

        public function __construct(){
            $this->db = Database::getInstance();
            $this->mysqli = $this->db->getConnection();
        }

        public function login($user_id,$password){
            $sql = "SELECT * FROM user WHERE user_id='$user_id' and password='$password'";
            $valid=true;
            $query = $this->mysqli->query($sql);
            $cek = $query->num_rows;
            if($cek > 0){
                $row = $query->fetch_assoc();
                return $row;
            }else{
                $valid = false;
                return $valid;
            }
        }

        public function signup($id,$first_name, $last_name, $password, $role, $address){
            $sql = "INSERT INTO user VALUES ('$id','$password','$first_name','$last_name','$role','$address')";
            $this->mysqli->query($sql);
        }

        public function lastrecord(){
            $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT 1";
            $query = $this->mysqli->query($sql);
            $row = $query->fetch_assoc();
            return $row;
        }

        public function showUser(){
            $sql = "SELECT a.user_id AS user_id, a.password AS password, a.first_name AS first_name, a.last_name AS last_name, b.role_name AS role_name FROM user AS a JOIN ROLE AS b ON(a.role_id=b.role_id)";
            $query = $this->mysqli->query($sql);
            return $query;
        }
        
        public function showUserFull($id){
            $sql = "SELECT * FROM user WHERE user_id = '$id'";
            $query = $this->mysqli->query($sql);
            return $query;
        }

        public function updateUser($id,$first_name,$last_name,$password,$role_id,$address){
            $sql = "UPDATE user SET first_name = '$first_name', last_name = '$last_name', password = '$password', role_id = '$role_id', address = '$address' WHERE user_id = '$id'";
            $this->mysqli->query($sql);
        }

        public function deleteUser($id){
            $sql = "DELETE FROM user WHERE user_id = '$id'";
            $this->mysqli->query($sql);
        }
    }
?>
