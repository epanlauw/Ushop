<?php
    require_once("../include/auth.php");
    require_once("../controller/user_controller.php");
    $controller = new UserController();
    $controller->deleteUser();