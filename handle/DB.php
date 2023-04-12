<?php
interface CRUD
{
    public function select($x, $y);
    public function insert($x);
    public function update($key, $value, int $id);
    public function delete($id);
};

class lists implements CRUD
{
    private $conn;
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;port=3306;dbname=todo", "root", "");
    }
    public function select($x, $y)
    {
        $select = $this->conn->prepare("SELECT * FROM `todolist` WHERE `$x`=:key ORDER BY `id` DESC ");
        $select->bindParam(':key', $y, PDO::PARAM_STR);
        $select->execute();
        return $select->fetchAll();
    }
    public function insert($x)
    {
        $insert = $this->conn->prepare("INSERT INTO `todolist`(`title`) VALUES (:title)");
        $insert->bindParam(":title", $x, PDO::PARAM_STR);
        return $insert->execute();
    }
    public function update($key, $value, int $id)
    {
        $update = $this->conn->prepare("UPDATE `todolist` SET `$key`=:title WHERE `id`=:id");
        $update->bindParam(":title", $value, PDO::PARAM_STR);
        $update->bindParam(":id", $id, PDO::PARAM_INT);
        return $update->execute();
    }
    public function delete($id)
    {
        $delete = $this->conn->prepare("DELETE FROM `todolist` WHERE `id`=:id");
        $delete->bindParam(":id", $id, PDO::PARAM_INT);
        return $delete->execute();
    }
}
