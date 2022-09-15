<?php

if (isset($_POST['item_id'])) {
    require_once '../db_connect.php';
    $sql = "DELETE FROM item WHERE item_id = '" . $_GET['item_id'] . "'";
    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Item deleted successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong in deleting member query';
    }
} else {
    $_SESSION['error'] = 'Select member to delete first';
}

header('location: ../items.php');
