<?php
session_start(); 
require_once '../db_connect.php'; 
$roomno=$_SESSION['lab_no'];
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','pdf'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));

            
            $sql = "UPDATE `lab` set `timetable` ='$imgContent' WHERE lab_no='$roomno'";

            $sql_run = mysqli_query($conn, $sql);
             
            if($sql_run){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully.";
                echo "<meta http-equiv='refresh' content='0; URL=http://www.kunal.ninja/stock-Management-System/actions/display_lab.php?lab_no=$roomno'>";
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg;
?>