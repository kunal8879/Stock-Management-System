<?php
session_start();
require_once '../db_connect.php';
$lab_no = $_SESSION['lab_no'];
$uname = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $pc_condition = $_POST['pc_condition'];
    $msg = $_POST['msg'];

    $sql = "UPDATE `pc_details` SET pc_condition= '$pc_condition' WHERE lab_no='$lab_no'";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Item Added Successfully.'; 

       $result =shell_exec("python query.py '$lab_no', '$msg'");

        if($result){

        echo "<meta http-equiv='refresh' content='0; URL=http://localhost/Stock-Management-System-1/actions/display_lab.php?lab_no=$lab_no'>";
        }
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}


?>