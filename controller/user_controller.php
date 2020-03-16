<?php
    require_once("../model/user_model.php");
    class UserController{
        public $model;
        public function __construct(){
            $this->model = new UserModel();
        }

        public function login(){
            if(isset($_POST['login'])){
                $id = $_POST['id'];
                $password = md5($_POST['password']);

                $result = $this->model->login($id ,$password);
                session_start();
                $_SESSION['user'] = $result;
                switch($result['role_id']){
                    case 1:
                        header("Location:admin.php");
                        break;
                    case 2:
                        header("Location:manager.php");
                        break;
                    case 3:
                        header("Location:kasir.php");
                        break;
                    case 4:
                        header("Location:pembeli.php");
                        break;
                    default:
                        return false;
                }
            }
        }

        public function signup(){
          if(isset($_POST['signup'])){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $role = $_POST['role'];
            $password = md5($_POST['password']);
            $address = $_POST['address'];

            $id_temp = $this->model->lastrecord();
            $id = $id_temp['user_id']+1;

            $this->model->signup($id,$first_name, $last_name, $password, $role, $address);
            header("Location:login.php");
          }
        }
        
        public function showUser(){
            $result = $this->model->showUser();
            return $result;
        }

        public function showUserFull(){
            $id = $_GET["user_id"];
            $result = $this->model->showUserFull($id);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function updateUser(){
            if(isset($_POST['update'])){
                $id = $_GET['user_id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $role_id = $_POST['role'];
                $address = $_POST['address'];
                $password = md5($_POST['password']);
                $this->model->updateUser($id, $first_name, $last_name,$password,$role_id, $address);
                header("Location:admin.php");
            }
        }

        public function deleteUser(){
            $id = $_GET['user_id'];
            $this->model->deleteUser($id);
            header("Location:admin.php");
        }

        public function addUser(){
            if(isset($_POST['signup'])){
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $role = $_POST['role'];
                $password = md5($_POST['password']);
                $address = $_POST['address'];
    
                $id_temp = $this->model->lastrecord();
                $id = $id_temp['user_id']+1;
    
                $this->model->signup($id,$first_name, $last_name, $password, $role, $address);
                header("Location:admin.php");
            }
        }
    }
?>
