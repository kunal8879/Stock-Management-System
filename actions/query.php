<?php
session_start();
require_once '../db_connect.php';
$lab_no=$_SESSION['lab_no'];
$uname=$_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $pc_condition = $_POST['pc_condition'];
    $msg = $_POST['msg'];

    $sql = "UPDATE `pc_details` SET pc_condition= '$pc_condition' WHERE lab_no='$lab_no'";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run == true) {
        $_SESSION['success'] = 'Item Added Successfully.';
        


            $email = 'gammingworld18@gmail.com';
            $to = 'atharvasarfare40@gmail.com'; // Receiver Email ID, Replace with your email ID

            $subject = 'Query Submission';
            $message = "Name :" . $uname . "\n" . "Room NO. :" . $lab_no . "\n" . "Wrote the following :" . "\n\n" . $msg;
            $headers = "From: " . $email;

            if (mail($to, $subject, $message, $headers)) {
                echo "<h1>Sent Successfully! Thank you" . " " . $uname . ", We will contact you shortly!</h1>";
                // echo "<meta http-equiv='refresh' content='0; URL=http://localhost/Stock-Management-System-1/actions/display_lab.php?lab_no=$lab_no'>";

            } else {
                echo "Something went wrong!";
            }
        
    } else {
        $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
    }
} else {
    $_SESSION['error'] = 'Something Went Wrong!! Please Try Again.';
}

?>

