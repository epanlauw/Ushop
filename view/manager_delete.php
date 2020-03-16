<?php
    require_once("../include/auth.php");
    require_once("../controller/item_controller.php");
    $controller = new ItemController();
    $controller->deleteItem();