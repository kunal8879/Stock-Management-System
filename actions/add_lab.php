<?php
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $lab_no = $_POST['lab_no'];
    $lab_detail = $_POST['lab_detail'];
    $lab_admin = $_POST['lab_admin'];
    $pcquantity = $_POST['pcquantity'];

    $sql = "INSERT INTO `lab`(`lab_no`, `lab_detail`, `lab_admin`, `pcquantity`, `added_on`) VALUES ('$lab_no', '$lab_detail', '$lab_admin', '$pcquantity', CURDATE())";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Item Added Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../lab.php');
