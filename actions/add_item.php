<?php
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $item_name = $_POST['item_name'];
    $item_cat = $_POST['item_cat'];
    $item_detail = $_POST['item_detail'];
    $bill_no = $_POST['bill_no'];
    $supplier_id = $_POST['supplier_name'];

    $sql = "INSERT INTO `item`(`item_name`, `item_cat`, `item_detail`, `bill_no`, `supplier_id`,`supplied_at`) VALUES ('$item_name', '$item_cat', '$item_detail', '$bill_no', '$supplier_id', CURDATE())";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Item Added Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../items.php');
