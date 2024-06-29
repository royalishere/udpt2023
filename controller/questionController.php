<?php

require_once __DIR__ . "/../model/answerModel.php";
require_once __DIR__ . "/../model/questionModel.php";
require_once __DIR__ . "/../model/answerEvalutatesModel.php";

class questionController
{
    public function createQuestion($question, $userId, $tag)
    {
        $q = new question();

        $result = $q->insert($question, $userId, $tag);

        if ($result) {
            return "insert success";
        } else {
            return "fail to insert";
        }
    }

    public function findQuestion($question = "", $tag = "", $userId = -1)
    {
        $q = new question();

        $result = $q->select($question, $userId, $tag);

        if ($result) {
            return $result;
        } else {
            return "fail to find";
        }
    }

    public function getALlQuestion()
    {
        $q = new question();

        $questions = $q->selectAll();

        if ($questions) {
            $title = "Question List";
            $view = __DIR__ . '/../view/questionList.php';
            require __DIR__ . '/../view/main.php';
        } else {
            return "fail to find";
        }
    }
}
