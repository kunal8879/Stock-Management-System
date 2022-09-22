<?php
require_once '../db_connect.php';

if (isset($_POST['edit_item'])) {

    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $item_cat = mysqli_real_escape_string($conn, $_POST['item_cat']);
    $item_detail = mysqli_real_escape_string($conn, $_POST['item_detail']);
    $bill_no = mysqli_real_escape_string($conn, $_POST['bill_no']);

    $sql = "UPDATE `item` SET `item_name`='$item_name',`item_cat`='$item_cat',`item_detail`='$item_detail', `bill_no`='$bill_no' WHERE `item_id` = '$item_id';";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Item Details Updated Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../items.php');
