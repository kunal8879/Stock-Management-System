<?php
require_once '../db_connect.php';
if (isset($_REQUEST['firstname'])) {
    $firstname = stripslashes($_REQUEST['firstname']);
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $middlename    = stripslashes($_REQUEST['middlename']);
    $middlename    = mysqli_real_escape_string($conn, $middlename);
    $lastname = stripslashes($_REQUEST['lastname']);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $fid = stripslashes($_REQUEST['fid']);
    $fid = mysqli_real_escape_string($conn, $fid);
    $role = stripslashes($_REQUEST['role']);
    $role = mysqli_real_escape_string($conn, $role);
    $query    = "INSERT into admin (firstname, middlename, lastname,username, fid, role)
                 VALUES ('$firstname', '$middlename', '$lastname','$username', '$fid', '$role')";
         $result   = mysqli_query($conn, $query);
    if ($result!=0) {
        echo "<div class='form'>
              <h3>Data Entered successfully.</h3><br/>
              </div>";
        echo "<meta http-equiv='refresh' content='0; URL=http://localhost/Stock-Management-System-1/lab.php'>";
    } else {
        echo "<div class='form'>
              <h3>ERROR</h3><br/>
              </div>";
        echo "<meta http-equiv='refresh' content='0; URL=http://localhost/Stock-Management-System-1/manage_faculty_details.php'>";
    }
}