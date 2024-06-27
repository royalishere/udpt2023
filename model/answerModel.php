<?php

require_once __DIR__ .('/baseModel.php');

class answer extends BaseModel
{

    private const table = 'answers';
    public function selectByQuestion($questionId)
    {
        $query = "SELECT * FROM `".self::table."` WHERE `QuestionID` = $questionId";
        try {
            $stmt = $this->connection->prepare($query);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $query);
            }

            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($questionId, $answer, $userId)
    {
        $query = "INSERT INTO `".self::table."` (`QuestionID`, `Answer`, `CreatedDate`, `NumberEvaluaters`, `UserID`) VALUES ($questionId, '$answer', NOW(), 0, $userId)";
        try {
            $stmt = $this->connection->prepare($query);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $query);
            }

            $stmt->execute();
            $stmt->close();

            return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select()
    {
        $query = "SELECT * FROM `".self::table."` ORDER BY `CreatedDate` DESC";
        try {
            $stmt = $this->connection->prepare($query);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $query);
            }

            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function delete()
    {

    }

    public function updateNumberEvaluates($answerId)
    {
        $query = "UPDATE `".self::table."` SET `NumberEvaluaters` = `NumberEvaluaters` + 1 WHERE `AnswerID` = $answerId";

        try {
            $stmt = $this->connection->prepare($query);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $query);
            }

            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}