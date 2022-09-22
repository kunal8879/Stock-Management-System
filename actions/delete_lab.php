<?php
require_once '../db_connect.php';

if (isset($_POST['delete_lab'])) {

    $lab_id = mysqli_real_escape_string($conn, $_POST['lab_id']);

    $sql = "DELETE FROM `lab` WHERE `lab_id` = $lab_id";
    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'lab Deleted Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../lab.php');
