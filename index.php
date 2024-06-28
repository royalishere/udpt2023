<?php

if (session_id() === '') {
    session_start();
}

require_once __DIR__ . '/controller/userController.php';
require_once __DIR__ . '/controller/questionController.php';
require_once __DIR__ . '/controller/answerController.php';

$controller = new userController;
$str = $controller->login("user1", "password1");

echo "<pre>";

$a = new answerController;
echo $a->answerEvaluate(1, "5STAR", 1) . "\n";