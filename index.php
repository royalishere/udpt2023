<?php

if (session_id() === '') {
    session_start();
}

require_once __DIR__ . '/controller/userController.php';
require_once __DIR__ . '/controller/questionController.php';
require_once __DIR__ . '/controller/answerController.php';

try {
    $action = "";
    $type = "";
    $questionId = null;
    $role = null;
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
    }
    if (isset($_GET['questionId'])) {
        $questionId = $_GET['questionId'];
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

        case "list":
            if ($type == "question") {
                $controller = new questionController();
                $controller->getALlQuestion();
            } else {
                $controller = new answerController();
                $controller->getQuestionAnswer($questionId);
            }
            break;

        case "addAnswer":
            $answer = $_POST['new-answer'];
            $reference = $_POST['reference'];
            $questionId = $_POST['questionId'];
            $userId = $_SESSION['user']['userId'];
            $controller = new answerController();
            $controller->createAnswer($answer, $questionId, $userId, $reference);
            break;

        case "changeRole":
            if (isset($_POST['new-role'])) {
                $role = $_POST['new-role'];
            }
            $userId = $_SESSION['user']['userId'];
            $controller = new userController();
            $controller->changeRole($role, $userId);
            break;

        default:
            $controller = new userController();
            $controller->index();
            break;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
