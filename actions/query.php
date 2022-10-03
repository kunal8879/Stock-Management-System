<?php
session_start();
require_once '../db_connect.php';
$lab_no=$_SESSION['lab_no'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $pc_condition = $_POST['pc_condition'];

    $sql = "UPDATE `pc_details` SET pc_condition= '$pc_condition' WHERE lab_no='$lab_no'";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Item Added Successfully.';
        echo "<meta http-equiv='refresh' content='0; URL=http://localhost/Stock-Management-System-1/actions/display_lab.php?lab_no=$lab_no'>";
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}


