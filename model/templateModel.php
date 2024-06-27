<?php

require_once __DIR__ . ('/baseModel.php');

class template extends BaseModel
{

    private const table ="template";

    public function select()
    {
        $sql = "SELECT * FROM " . self::table . "";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function insert($data)
    {
        $sql = "INSERT INTO " . self::table . " VALUES ('$data')";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . self::table . " WHERE templateId = $id";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function update($id, $data)
    {
        $sql = "UPDATE " . self::table . " SET data = '$data' WHERE templateId = $id";
        $result = $this->connection->query($sql);
        return $result;
    }
}