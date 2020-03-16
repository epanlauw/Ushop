<?php 
    class Database {
      private $_connection;
      private static $_instance;
      private $_host = "localhost";
      private $_username = "root";
      private $_password = "";
      private $_dbname = "ushop";

      public static function getInstance(){
        if(!self::$_instance){
          self::$_instance = new self();
        }
        return self::$_instance;
      }

      public function __construct(){
        $this->_connection = new mysqli($this->_host, $this->_username,$this->_password,$this->_dbname);

        // Error handling
        if(mysqli_connect_error()){
          trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),E_USER_ERROR);
        }
      }

      private function __clone(){}

      //get connection
      public function getConnection(){
        return $this->_connection;
      }

    }
?>