<?php
require_once '../db_connect.php';

if (isset($_POST['edit_lab'])) {

    $lab_id = mysqli_real_escape_string($conn, $_POST['lab_id']);
    $lab_no = mysqli_real_escape_string($conn, $_POST['lab_no']);
    $lab_detail = mysqli_real_escape_string($conn, $_POST['lab_detail']);
    $lab_admin = mysqli_real_escape_string($conn, $_POST['lab_admin']);
    $pcquantity = mysqli_real_escape_string($conn, $_POST['pcquantity']);
    $added_on = mysqli_real_escape_string($conn, $_POST['added_on']);

    $sql = "UPDATE `lab` SET `lab_no`='$lab_no',`lab_detail`='$lab_detail',`lab_admin`='$lab_admin', `pcquantity`='$pcquantity', `added_on`='$added_on' WHERE `lab_id` = '$lab_id';";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Lab Details Updated Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../lab.php');
