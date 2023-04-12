<?php
// each class or interface should be in a separate file
interface CRUD
{
    public function select($x, $y);
    public function insert($x);
    public function update($key, $value, int $id);
    public function delete($id);
};

// formatting...
// file name does not match class name, class name should be in PascalCase
// it would be better if you use type hinting
class lists implements CRUD
{
    private $conn;
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;port=3306;dbname=todo", "root", "");
    }
    // why do we have this method??
    // we should have a method called get by id for example, or get by status
    // to avoid unknown column errors
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
