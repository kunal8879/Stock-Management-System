<?php
session_start();

require_once 'db_connect.php';
error_reporting(0);

$uname = $_SESSION['username'];
$srole = $_SESSION['user'];
if ($uname != 0 && $srole != 0) {

    $query = "SELECT * FROM `lab` WHERE `lab_admin`= '$uname'";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    $lab_no = $result['lab_no'];


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/card_css.css">
        <title>ID Card</title>
        <!--     
    So lets start -->
    </head>

    <body>
        <div class="container">
            <div class="padding">
                <div class="font">
                    <div class="top">
                        <img src="images/download.png">
                    </div>
                    <div class="bottom">
                        <p><?php echo $uname; ?></p>
                        <p class="desi"><?php echo $srole; ?></p>


                        <br>
                        <p class="lab">Lab Incharge Of: <?php echo $lab_no ?></p>
                    </div>
                </div>
            </div>

    </body>

    </html>
<?php } else {
    $uname = $_GET['uname'];
    // $srole=$_GET['srole'];
    $query = "SELECT `lab_no`,`role` FROM `lab` WHERE `lab_admin`='$uname'";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    $lab_no = $result['lab_no'];
    $srole = $result['role'];
    if ($srole == 0) {
        $srole1 = 'Faculty';
    } else {
        $srole1 = 'Admin';
    }



?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/card_css.css">
        <title>ID Card</title>
        <!--     
    So lets start -->
    </head>

    <body>
        <div class="container">
            <div class="padding">
                <div class="font">
                    <div class="top">
                        <img src="images/download.png">
                    </div>
                    <div class="bottom">
                        <p><?php echo $uname; ?></p>
                        <p class="desi"><?php echo $srole1; ?></p>

                        <br>
                        <p class="lab">Lab Incharge: <?php echo $lab_no; ?></p>
                    </div>
                </div>
            </div>

    </body>

    </html>
<?php } ?>