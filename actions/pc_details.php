<?php
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $lab_no = $_POST['lab_no'];
    $pc_id = $_POST['pc_id'];
    $pc_name = $_POST['pc_name'];
    $details = $_POST['details'];
    $pc_condition = $_POST['pc_condition'];

    $sql = "INSERT INTO `pc_details`(`lab_no`, `pc_id`, `pc_name`, `details`, `pc_condition`) VALUES ('$lab_no', '$pc_id', '$pc_name', '$details', '$pc_condition')";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Item Added Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

// header('Location: ../lab.php');
// echo "<meta http-equiv='refresh' content='0; URL=http://localhost/Stock-Management-System-1/actions/add_pc_details_clone.php?lab_no=$lab_no'>";