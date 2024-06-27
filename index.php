<?php

if (session_id() === '') {
    session_start();
}

require_once __DIR__ . '/controller/userController.php';
require_once __DIR__ . '/controller/questionController.php';

$controller = new userController;
$str = $controller->login("user1", "password1");

$q = new questionController;
print_r($q->createQuestion("question1", $_SESSION["user"]["userId"], "tag1"));

$controller->logout();

//print_r($str);

//print_r($_SESSION['user']['userId']);