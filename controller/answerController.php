<?php

require_once __DIR__ . "/../model/answerModel.php";
require_once __DIR__ . "/../model/questionModel.php";
require_once __DIR__ . "/../model/answerEvalutatesModel.php";

class answerController
{
    public function createAnswer($answer, $questionId, $userId, $reference)
    {
        $answer_model = new answer;
        $result = $answer_model->insert($questionId, $answer, $userId, $reference);
        $q = new question();
        $result2 = $q->updateNumberAnsweres($questionId);
        if ($result && $result2) {
            // navigate to question detail page
            header("Location: index.php?action=list&type=answer&questionId=$questionId");
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
        $answers = $answer->selectByQuestion($questionId);
        $question_row = new question();
        $question_row = $question_row->selectById($questionId)[0];
        $question = $question_row['Question'];
        if ($answers && $question) {
            $title = "Answer List";
            $view = __DIR__ . '/../view/answerList.php';
            require __DIR__ . '/../view/main.php';
        } else {
            return "fail to find";
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
