<?php

require_once __DIR__ . "/../model/userModel.php";
require_once __DIR__ . "/../model/answerEvalutatesModel.php";

class userController
{

    public function index()
    {
        $title = "Home Page";
        if (isset($_SESSION['user'])) {
            $view = __DIR__ . '/../view/home.php';
            require __DIR__ . '/../view/main.php';
        } else {
            $this->login(null, null);
        }
    }

    public function login($username, $password)
    {
        if (empty($username) || empty($password)) {
            $title = "Login";
            require __DIR__ . '/../view/login.php';
        } else {
            $user = new user;
            $result = $user->login($username, $password);

            if (isset($result) && count($result) > 0) {
                $_SESSION['user']['userId'] = $result[0]['UserID'];
                $_SESSION['user']['role'] = $result[0]['Role'];
                $this->index();
            } else {
                $error = "Login failed!";
                $title = "Login";
                $message = "Username or password is incorrect!";
                require __DIR__ . '/../view/login.php';
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        $this->index();
    }

    public function getAllUser()
    {
    }

    public function changeRole($role, $userId)
    {
        $result = false;
        if ($role != null) {
            $user = new user();
            $result = $user->update($userId, $role);
        }
        if ($result) {
            $_SESSION['user']['role'] = $role;
        }
        $title = "Change Role";
        $view = __DIR__ . '/../view/changeRole.php';
        require __DIR__ . '/../view/main.php';
    }
}
