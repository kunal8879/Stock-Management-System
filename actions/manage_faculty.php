<?php
require_once '../db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $fid = $_POST['fid'];
    
    $query    = "INSERT into admin (firstname, middlename, lastname,username, fid)
                 VALUES ('$firstname', '$middlename', '$lastname','$username', '$fid')";
         $result   = mysqli_query($conn, $query);
    if ($result!=0) {
        echo "<div class='form'>
              <h3>Data Entered successfully.</h3><br/>
              </div>";
        echo "<meta http-equiv='refresh' content='0; URL=http://localhost/stock-Management-System/display_details.php'>";
    } else {
        echo "<div class='form'>
              <h3>ERROR</h3><br/>
              </div>";
        // echo "<meta http-equiv='refresh' content='0; URL=http://localhost/Stock-Management-System-1/manage_faculty_details.php'>";
    }
}