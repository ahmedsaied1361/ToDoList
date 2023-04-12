<?php

require_once 'validator.php';
require_once 'DB.php';
$validation = new validator;

if ($validation->isset($_GET['id'])) {
    $select = new lists;
    $result1 = $select->select("id", $_GET['id']);
    if ($result1 == true) {
        $delete = new lists();
        $result2 = $delete->delete($_GET['id']);
        if ($result2 == true) {
            $_SESSION['success'] = 'List Deleted Successfully';
            header('location: ../index.php');
        } else {
            header('location: ../index.php');
        }
    } else {
        header('location: ../index.php');
    }
} else {
    header('location: ../index.php');
}