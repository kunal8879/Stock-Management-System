<?php
require_once '../message.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = filter_input_array(INPUT_POST);
    $item_name = trim($_POST['item_name']);
    $item_cat = trim($_POST['item_category']);
    $item_detail = trim($_POST['item_details']);
    $bill_no = trim($_POST['bill_no']);
    $supplier_id = $_POST['supplier_name'];

    //connect to db
    require_once '../db_connect.php';
    $sql = "INSERT INTO item (item_name, item_cat, item_detail, bill_no, supplier_id, supplied_at) VALUES ('$item_name', '$item_cat', '$item_detail', '$bill_no', '$supplier_id', CURDATE())";

    $sql_run = mysqli_query($conn, $sql);
    //$conn->close();
    if ($sql_run == true) {
        var_dump($sql_run);
        $_SESSION['success'] = 'Item Added Successfully';
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
    }
} else {
    $_SESSION['error'] = 'Something went wrong while adding items';
}

header('location: ../items.php');
