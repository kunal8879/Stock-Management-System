<?php
require_once '../db_connect.php';

if (isset($_POST['edit_supplier'])) {

    $supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);
    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $supplier_add = mysqli_real_escape_string($conn, $_POST['supplier_add']);
    $supplier_phone = mysqli_real_escape_string($conn, $_POST['supplier_phone']);
    $added_on = mysqli_real_escape_string($conn, $_POST['added_on']);

    $sql = "UPDATE `supplier` SET `supplier_name`='$supplier_name',`supplier_add`='$supplier_add',`supplier_phone`='$supplier_phone', `added_on`='$added_on' WHERE `supplier_id` = '$supplier_id';";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Supplier Details Updated Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../supplier.php');
