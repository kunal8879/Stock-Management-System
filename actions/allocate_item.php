<?php
require_once '../db_connect.php';

if (isset($_POST['allocate_item'])) {

    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $lab_id = mysqli_real_escape_string($conn, $_POST['lab_id']);

    $sql = "UPDATE `item` SET `item`.`lab_id` = '$lab_id' WHERE `item`.`item_id` = '$item_id'";
    $sql_run = mysqli_query($conn, $sql);

    if ($query == true) {
        $_SESSION['success'] = 'Item Allocated Successfully';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../allocate.php');
