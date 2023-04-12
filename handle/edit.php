<?php
session_start();
require_once 'validator.php';
require_once 'DB.php';
$validation = new validator;

if ($validation->isset($_POST['submit']) && $validation->isset($_GET['id'])) {
    $title = $validation->trim($_POST['title']);
    $errorMsg = $validation->validate($title);
    if (empty($errorMsg)) {
        $select = new lists;
        $result1 = $select->select("id", $_GET['id']);
        if ($result1 == true) {
            $update = new lists();
            $result2 = $update->update("title", $title, $_GET['id']);
            if ($result2 == true) {
                $_SESSION['success'] = 'Data Updated Successfully';
                header('location: ../index.php');
            } else {
                header('location: ../index.php');
            }
        } else {
            header('location: ../index.php');
        }
    } else {
        $_SESSION['errors'] = $errorMsg;
        header('location: ../index.php');
    }
} else {
    header('location: ../index.php');
}
