<?php

if (session_id() === '') {
    session_start();
}

require_once __DIR__ . '/controller/userController.php';
require_once __DIR__ . '/controller/questionController.php';

try {
    $action = "";
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    switch ($action) {
        case "home":
            $controller = new userController();
            $username = $password = null;
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $controller->login($username, $password);
            } else {
                $controller->index();
            }
            break;
        
        case "logout":
            $controller = new userController();
            $controller->logout();
            break;

        default:
            $controller = new userController();
            $controller->index();
            break;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

//print_r($_SESSION['user']['userId']);