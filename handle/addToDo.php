<?php
session_start(); // why do we need this?
require_once 'validator.php';
require_once 'DB.php';
$validation = new validator;

if ($validation->isset($_POST['submit'])) {
    $title = $validation->trim($_POST['title']);
    $errorMsg = $validation->validate($title);
    if (empty($errorMsg)) {
        $list = new lists;
        $result = $list->insert($title);
        if ($result === true) {
            $_SESSION['success'] = 'Data Inserted Successfully';
            header('location: ../index.php');
        }
    } else {
        $_SESSION['errors'] = $errorMsg;
        header('location: ../index.php');
    }
} else {
    header('location: ../index.php');
}
