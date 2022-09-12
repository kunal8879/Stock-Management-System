<?php

require_once '../message.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = filter_input_array(INPUT_POST);
    $item_id = $_POST['item_id'];
    $item_name = trim($_POST['item_name']);
    $item_cat = trim($_POST['item_cat']);
    $item_detail = trim($_POST['item_detail']);
    $supplied_at = $_POST['supplied_at'];

    require_once '../db_connect.php.php';
    $sql = " UPDATE item SET item_name = $item_name, item_cat = $item_cat, item_detail = $item_detail WHERE item.item_id = $item_id";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Item Updated Successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while updating item';
    }

    header('location: ../items.php');
}
