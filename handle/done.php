<?php

require_once 'validator.php';
require_once 'DB.php';
$validation = new validator;

if ($validation->isset($_GET['id'])) {
    $select = new lists;
    $result1 = $select->select("id", $_GET['id']);
    if ($result1 == true) {
        $update = new lists();
        $result2 = $update->update("status", "done", $_GET['id']);
        if ($result2 == true) {
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
