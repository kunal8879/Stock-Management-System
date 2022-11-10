<?php
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $supplier_name = $_POST['supplier_name'];
    $supplier_add = $_POST['supplier_add'];
    $supplier_phone = $_POST['supplier_phone'];

    $sql = "INSERT INTO `supplier` (`supplier_name`, `supplier_add`, `supplier_phone`, `added_on`) VALUES ('$supplier_name', '$supplier_add', '$supplier_phone', CURDATE())";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Supplier Added Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../supplier.php');
