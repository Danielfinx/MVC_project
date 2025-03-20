<?php

    require_once "models/database.php";
    
    if (!isset($_GET["c"])) {
        require_once "controllers/start.controller.php";
        $controller = new StartController();
        $controller->start();
    } else {
        $controller = $_GET["c"];
        require_once "controllers/{$controller}.controller.php";
        $controller = ucwords($controller) . "Controller";
        $controller = new $controller;
        $action = isset($_GET["a"]) ? $_GET["a"] : "start";
        call_user_func(array($controller, $action));
    }