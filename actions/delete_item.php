<?php
require_once '../db_connect.php';

if (isset($_POST['delete_item'])) {

    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);

    $sql = "DELETE FROM `item` WHERE `item_id` = $item_id";
    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Item Deleted Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../items.php');
