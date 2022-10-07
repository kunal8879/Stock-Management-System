<?php
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $lab_id = $_POST['lab_id'];
    $lab_no = $_POST['lab_no'];
    $lab_detail = $_POST['lab_detail'];
    $lab_admin = $_POST['lab_admin'];
    $pcquantity = $_POST['pcquantity'];

    $sql1 = "INSERT INTO `lab`(`lab_no`, `lab_detail`, `lab_admin`, `pcquantity`, `added_on`) VALUES ('$lab_no', '$lab_detail', '$lab_admin', '$pcquantity', CURDATE())";

    $sql_run1 = mysqli_query($conn, $sql1);

    if ($sql_run1 == true) {
        $_SESSION['success'] = 'Item Added Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }

    $sql2 = "CREATE TABLE `pc_lab$lab_no` (`pc_id` INT NOT NULL AUTO_INCREMENT , `pc_name` VARCHAR(255) NOT NULL , `pc_details` VARCHAR(500) NOT NULL , `pc_softwares` VARCHAR(300) NOT NULL , `lab_no` INT NOT NULL , `pc_query` VARCHAR(500) NOT NULL , `pc_condition` VARCHAR(100) NOT NULL DEFAULT 'Working' , PRIMARY KEY (`pc_id`))";
    $sql_run2 = mysqli_query($conn, $sql2);

    for ($i = 1; $i <= $pcquantity; $i++) {
        $sql3 = "INSERT INTO `pc_lab$lab_no` (`pc_name`, `pc_details`, `pc_softwares`, `lab_no`, `pc_query`) VALUES ('APSIT/LAB$lab_no/PC$i','','','$lab_no','')";
        $sql_run3 = mysqli_query($conn, $sql3);
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../lab.php');
