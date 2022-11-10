<?php
require_once '../db_connect.php';

if (isset($_POST['edit_lab'])) {

    $lab_id = mysqli_real_escape_string($conn, $_POST['lab_id']);
    $lab_no_new = mysqli_real_escape_string($conn, $_POST['lab_no']);
    $lab_detail = mysqli_real_escape_string($conn, $_POST['lab_detail']);
    $lab_admin = mysqli_real_escape_string($conn, $_POST['lab_admin']);
    $pcquantity = mysqli_real_escape_string($conn, $_POST['pcquantity']);
    $added_on = mysqli_real_escape_string($conn, $_POST['added_on']);

    $sql1 = "SELECT `lab_no` FROM `lab` WHERE `lab_id` = $lab_id";
    $sql_run1 = mysqli_query($conn, $sql1);
    $result = mysqli_fetch_assoc($sql_run1);
    $lab_no_old = $result['lab_no'];

    $sql2 = "UPDATE `lab` SET `lab_no`='$lab_no_new',`lab_detail`='$lab_detail',`lab_admin`='$lab_admin', `added_on`='$added_on' WHERE `lab_id` = '$lab_id';";
    $sql_run2 = mysqli_query($conn, $sql2);

    $sql3 = "ALTER TABLE `pc_lab$lab_no_old` RENAME TO `pc_lab$lab_no_new`";
    $sql_run3 = mysqli_query($conn, $sql3);

    $i = 1;
    while ($i <= $pcquantity) {
        $sql3 = "UPDATE `pc_lab$lab_no_new` SET `pc_name`='APSIT/LAB$lab_no_new/PC$i', `lab_no`='$lab_no_new' WHERE `pc_id` = '$i'";
        $sql_run3 = mysqli_query($conn, $sql3);
        $i++;
    }


    if ($sql_run == true) {
        $_SESSION['success'] = 'Lab Details Updated Successfully.';
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

header('Location: ../lab.php');
