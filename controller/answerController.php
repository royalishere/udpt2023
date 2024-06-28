<?php

require_once __DIR__ . "/../model/answerModel.php";
require_once __DIR__ . "/../model/questionModel.php";
require_once __DIR__ . "/../model/answerEvalutatesModel.php";

class answerController
{
    public function createAnswer($answer, $questionId, $userId)
    {
        $answer = new answer;
        $result = $answer->insert($questionId, $answer, $userId);

        $q = new question();
        $result2 = $q->updateNumberAnsweres($questionId);

        if ($result && $result2) {
            return "Create answer success";
        } else {
            return "Create answer failed";
        }
    }

    public function answerEvaluate($answerId, $rate, $userId)
    {
        $answerEvaluate = new answerEvaluate();
        $result = $answerEvaluate->insert($answerId, $userId, $rate);

        $answer = new answer();
        $result2 = $answer->updateNumberEvaluates($answerId);

        if ($result && $result2) {
            return "Evaluate answer success";
        } else {
            return "Evaluate answer failed";
        }
    }

    public function getQuestionAnswer($questionId)
    {
        $answer = new answer();
        $result = $answer->selectByQuestion($questionId);

        if ($result) {
            return $result;
        } else {
            return "unsuccess";
        }
    }

    public function getAll()
    {
        $answer = new answer();
        $result = $answer->select();

        if ($result) {
            return $result;
        } else {
            return "unsuccess";
        }
    }

    public function updateAnswer($answerId, $answer)
    {
    }

    public function deleteAnswer($answer)
    {
    }
}
