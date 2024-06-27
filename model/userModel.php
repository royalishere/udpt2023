<?php

require_once __DIR__ .'/baseModel.php';

class user extends BaseModel
{
    private const TABLE = 'users';

    public function login($username, $password)
    {
        $query = "SELECT * FROM `". self::TABLE ."` WHERE `UserName`= '$username' AND `Password`= '$password'  LIMIT 1;";
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

    public function select()
    {

    }

    public function insert()
    {

    }

    public function delete()
    {

    }

    public function update($userId, $role)
    {
        $query = "UPDATE `". self::TABLE ."` SET `Role` = '$role' WHERE `UserId` = $userId";
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
}