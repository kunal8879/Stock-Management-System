<?php

require_once '../db_connect.php';

if (isset($_POST['edit_item'])) {

    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $item_cat = mysqli_real_escape_string($conn, $_POST['item_cat']);
    $item_detail = mysqli_real_escape_string($conn, $_POST['item_detail']);
    $supplied_at = mysqli_real_escape_string($conn, $_POST['supplied_at']);

    $sql = "UPDATE `item` SET `item_name`='$item_name',`item_cat`='$item_cat',`item_detail`='$item_detail' WHERE `item_id` = '$item_id';";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'item updated successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while updating item';
    }

    header('Location: ../items.php');
} else {
    $_SESSION['error'] = 'Something went wrong while updating item';
    header('Location: ../items.php');
}

// $item_id = $_POST['item_id'];
// $item_name = $_POST['item_name'];
// $item_cat = $_POST['item_cat'];
// $item_detail = $_POST['item_detail'];
// $bill_no = $_POST['bill_no'];
// $supplied_at = $_POST['supplied_at'];
