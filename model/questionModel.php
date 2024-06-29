<?php

require_once __DIR__ . ('/baseModel.php');

class question extends BaseModel
{
    private const TABLE = 'questions';

    public function select($question, $userId = -1, $tag)
    {
        $query = "SELECT * FROM `" . self::TABLE . "` WHERE `Question` LIKE '%$question%' AND `Tags` LIKE '%$tag%'";

        if ($userId != -1) {
            $query .= " AND `UserID` = $userId";
        }
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

    public function insert($question, $userId, $tag)
    {
        $query = "INSERT INTO `" . self::TABLE . "` (`Question`, `UserID`, `Tags`, `CreatedDate`, `NumberAnswerers`) VALUES ('$question', $userId, '$tag', NOW(), 0)";

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

    public function delete()
    {
    }

    public function updateNumberAnsweres($questionId)
    {
        $query = "UPDATE `" . self::TABLE . "` SET `NumberAnswerers` = `NumberAnswerers` + 1 WHERE `QuestionID` = $questionId";
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

    public function selectAll()
    {
        $query = "SELECT q.QuestionID, q.Question, u.UserName, q.Tags, q.CreatedDate, q.NumberAnswerers from `" . self::TABLE . "` q JOIN users u ON q.UserID = u.UserID";
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

    public function selectById($questionId)
    {
        $query = "SELECT * FROM `" . self::TABLE . "` WHERE `QuestionID` = $questionId";
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
