<?php
require_once '../db_connect.php';

if (isset($_POST['delete_lab'])) {

    $lab_id = mysqli_real_escape_string($conn, $_POST['lab_id']);
    $lab_no = mysqli_real_escape_string($conn, $_POST['lab_no']);

    $sql1 = "DELETE FROM `lab` WHERE `lab_id` = $lab_id";
    $sql_run1 = mysqli_query($conn, $sql1);

    $sql2 = "DROP TABLE `stock`.`pc_lab$lab_no`";
    $sql_run2 = mysqli_query($conn, $sql2);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Lab Deleted Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../lab.php');
