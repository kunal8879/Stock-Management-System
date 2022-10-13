<?php
session_start();
use function PHPSTORM_META\sql_injection_subst;

require_once '../db_connect.php';
$uname = $_SESSION['username'];

if (isset($_POST['edit_pc_details'])) {
    $pc_id = mysqli_real_escape_string($conn, $_POST['pc_id']);
    $pc_name = mysqli_real_escape_string($conn, $_POST['pc_name']);
    $lab_no = mysqli_real_escape_string($conn, $_POST['lab_no']);
    $pc_details = mysqli_real_escape_string($conn, $_POST['pc_details']);
    $pc_softwares = mysqli_real_escape_string($conn, $_POST['pc_softwares']);
    $pc_condition = mysqli_real_escape_string($conn, $_POST['pc_condition']);
    $pc_query = mysqli_real_escape_string($conn, $_POST['pc_query']);

    $sql1 = "UPDATE `stock`.`pc_lab$lab_no` SET `pc_details`='$pc_details', `pc_softwares`='$pc_softwares', `pc_query`='$pc_query', `pc_condition` = '$pc_condition' WHERE `pc_id` = '$pc_id';";
    $sql_run1 = mysqli_query($conn, $sql1);

    // echo $pc_query;
        // $result = shell_exec("python query.py $lab_no $pc_query $uname $pc_id");
        // if($result==null){
        // echo "successful";
        // }else{
        //     echo "Working";
        // }
    
        // echo $result;

    if($pc_query!=null){
        header("Location: query.php?pc_id=$pc_id&pc_name=$pc_name&pc_query=$pc_query");
    }else{
        header("Location: display_lab.php?lab_no=$lab_no");
    }
    

//     if ($sql_run1  == true) {
//         $_SESSION['success'] = 'Pc Details Updated Successfully.';
//         header("Location: display_lab.php?lab_no=$lab_no");
//     } else {
//         $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
//         header("Location: display_lab.php?lab_no=$lab_no");
//     }
// } else {
//     $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
//     header("Location: display_lab.php?lab_no=$lab_no");
}
