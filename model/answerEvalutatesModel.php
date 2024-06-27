<?php

require_once __DIR__ .('/baseModel.php');

class answerEvaluate extends BaseModel
{

    private const table ="answer_evaluates";

    public function selectByAnswer($answerId)
    {
        $sql = "SELECT * FROM `" . self::table . "` WHERE AnswerID = $answerId";
        try {
            $stmt = $this->connection->prepare($sql);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $sql);
            }

            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select()
    {
        $sql = "SELECT * FROM `" .self::table. "` ORDER BY CreatedDate DESC";

        try {
            $stmt = $this->connection->prepare($sql);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $sql);
            }

            $stmt->execute();
            $stmt->close();

            return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($answerId, $userId, $rate)
    {
        $sql = "INSERT INTO `" . self::table . "` (`AnswerID`, `UserID  `, `RateCategory`, `CreatedDate`) VALUES ($answerId, $userId, $rate, NOW())"; 
        try {
            $stmt = $this->connection->prepare($sql);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $sql);
            }

            $stmt->execute();
            $stmt->close();

            return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function delete()
    {

    }

    public function update()
    {

    }

}