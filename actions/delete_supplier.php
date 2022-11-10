<?php
require_once '../db_connect.php';

if (isset($_POST['delete_supplier'])) {

    $supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);

    $sql = "DELETE FROM `supplier` WHERE `supplier_id` = $supplier_id";
    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Supplier Deleted Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../supplier.php');
