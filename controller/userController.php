<?php

require_once __DIR__ ."/../model/userModel.php";
require_once __DIR__ ."/../model/answerEvalutatesModel.php";

class userController
{
    public function login($username, $password)
    {
        if (empty($username) || empty($password)) {
            return "Username or password is empty";
        }
        else {
            $user = new user;
            $result = $user->login($username, $password);

            if (isset($result) && count($result) > 0) {
                $_SESSION['user']['userId'] = $result[0]['UserID'];
                $_SESSION['user']['role'] = $result[0]['Role'];
                return $result;
            }
            else {
                return "Login failed";
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);

        return "Logout success";
    }

    public function getAllUser()
    {

    }

    public function changeRole($role, $userId)
    {
        if (empty($role) || empty($userId)) {
            return "Role or userId is empty";
        }
        else {
            $user = new user;
            $result = $user->update($userId, $role);

            if ($result) {
                $_SESSION['user']['role'] = $role;
                return "Change role success";
            }
            else {
                return "Change role failed";
            }
        }
    }
}