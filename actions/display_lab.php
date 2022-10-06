<?php
error_reporting(0);
session_start();

require_once '../db_connect.php';
require_once '../include/header_home.php';
$srole = $_SESSION['user'];
if ($srole == null) {
    $srole = 'Student';
}

$roomno = $_GET['lab_no'];

$query = "SELECT * from lab WHERE lab_no='$roomno'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
$pcquantity = $result['pcquantity'];

$_SESSION['lab_no'] = $roomno;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a70a238af9.js' crossorigin='anonymous'></script>
    <title>Lab Info Display</title>
    <style>
        .roomno1 {
            font-size: 300%;
            width: 30%;
            text-align: center;
            border: 2px outset #000000;
            background-color: #00b3aa;
            margin-left: 20px;
        }

        .timetable {
            font-size: 300%;
            width: 30%;
            text-align: center;
            border: 2px outset #000000;
            background-color: #00b3aa;
            margin-left: 750px;
            margin-top: -675px;
        }

        .icon_style {
            text-align: center;
            position: center;
            left: -200px;

            height: auto;
            width: 460px;

            margin: 80px 500px 80px -33px;
            border: 2px outset #000000;
        }

        .icon_button {
            width: 50px;
            padding-top: 10px;
            margin: 10px;
            background-color: white;
            border: none;
        }

        .draganddrop {
            padding-left: 300px;
            border: 10px;
        }

        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        <?php for ($i = 0; $i <= $pcquantity; $i++) {
            echo "<style>
#pcicon$i {
            width: 30px;
            padding-top: 10px;
            padding-right: 20px;
            margin: 10px;
        }
    </style>
    ";
        }


        // for icon color change
        $query2 = "SELECT `pc_id` from pc_details WHERE lab_no='$roomno' AND pc_condition=0";
        $data2 = mysqli_query($conn, $query2);
        $rows = mysqli_num_rows($data2);
        for ($a = 1; $a <= $rows; $a++) {
            $result2 = mysqli_fetch_assoc($data2);
            $id = $result['pc_id'];
            echo "<style>
        
            #pcicon$id{
            color: #ff0000;
        }
        </style>";
        } ?>
    </style>
    <!-- <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css"> -->

</head>

<body>

    <div style=" margin: 90px;">

        <?php



        echo "<div class='roomno1'>
    Lab No: $roomno
    </div>";
        ?>


        <?php

        echo "<div class='icon_style'>";
        for ($i = 1; $i <= $pcquantity; $i++) {
        ?>

            <?php
            $query = "SELECT * FROM `pc_details` WHERE `pc_id`='$i' AND `lab_no`='$roomno'";
            $data = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($data);
            $pc_name = $result['pc_name'];
            $details = $result['details'];
            $pc_condition = $result['pc_condition'];
            if ($pc_name == null) {
                $pc_name = "No Registered data";
            }
            if ($details == null) {
                $details = "No Registered data";
            }
            if ($pc_condition == 1) {
                $condition = "Working";
            ?>


                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#displayPcDetailsModal<?php echo $i; ?>" style="margin: 5px;"><i id='pcicon<?php echo $i; ?>' class='fa-solid fa-desktop fa-display fa-2x'></i></a></button>

                <!-- add item model -->
                <div class="modal fade" id="displayPcDetailsModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Pc Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Lab No:</label>
                                        <input type="text" class="form-control" id="lab_no" name="lab_no" placeholder="<?php echo $roomno; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">PC ID:</label>
                                        <input type="text" class="form-control" id="pc_id" name="pc_id" placeholder="<?php echo $i ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pc Name:</label>
                                        <input type="text" class="form-control" id="pc_name" name="pc_name" placeholder="<?php echo $pc_name; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pc Details:</label>
                                        <input type="text" class="form-control" id="details" name="details" placeholder="<?php echo $details; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pc Condition:</label>
                                        <input type="text" class="form-control" id="condition" name="condition" placeholder="<?php echo $condition; ?>" readonly>
                                    </div>

                                    <?php if ($srole == 'Admin' || $srole == 'Faculty') {  ?>

                                        <div class="mb-3">
                                            <label class="form-label">Query:</label>
                                            <input type="text" class="form-control" id="condition" name="msg" placeholder="Enter if any problem">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="psw"><b>Pc Condition</b></label>
                                            <label class="container">Working
                                                <input type="radio" name="pc_condition" value="1" required />
                                            </label>
                                            <label class="container">Not Working
                                                <input type="radio" name="pc_condition" value="0" required />

                                            </label>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Close</button>
                                            <button type="submit" name="add_item" class="btn btn-primary" style="background-color: #00b3aa;">Submit</button>
                                        </div>
                                    <?php  }  ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } elseif ($pc_condition == 0) {
                $condition = "Not Working";
            ?>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#displayPcDetailsModal<?php echo $i; ?>" style="margin: 5px;"><i id='pcicon<?php echo $i; ?>' class='fa-solid fa-desktop fa-display fa-2x '></i></a></button>

                <!-- add item model -->
                <div class="modal fade" id="displayPcDetailsModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Pc Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="./query.php" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Lab No:</label>
                                        <input type="text" class="form-control" id="lab_no" name="lab_no" placeholder="<?php echo $roomno; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pc ID:</label>
                                        <input type="text" class="form-control" id="pc_id" name="pc_id" placeholder="<?php echo $i; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pc Name:</label>
                                        <input type="text" class="form-control" id="pc_name" name="pc_name" placeholder="<?php echo $pc_name; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pc Details:</label>
                                        <input type="text" class="form-control" id="details" name="details" placeholder="<?php echo $details; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pc Condition:</label>
                                        <input type="text" class="form-control" id="condition" name="condition" placeholder="<?php echo $condition; ?>" readonly>
                                    </div>

                                    <?php if ($srole == 'Admin' || $srole == 'Faculty') {  ?>

                                        <div class="mb-3">
                                            <label class="form-label">Query:</label>
                                            <input type="text" class="form-control" id="condition" name="msg" placeholder="Enter if any problem" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="psw"><b>Pc condition</b></label>
                                            <label class="container">Working
                                                <input type="radio" name="pc_condition" value="1" required />
                                            </label>
                                            <label class="container">Not Working
                                                <input type="radio" name="pc_condition" value="0" required />

                                            </label>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Close</button>
                                            <button type="submit" name="add_item" class="btn btn-primary" style="background-color: #00b3aa;">Submit</button>
                                        </div>
                                    <?php  }  ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>


        <?php

            if ($i % 5 == 0) {
                echo "<br>";
            }
        }
        echo "</div>";

        ?>


        <div class='timetable'>
            Timetable
        </div>


        <?php
        if ($srole == 'Admin' || $srole == 'Faculty') {



            echo "<main>
            <div class='draganddrop'>";

            include('timetable.php');

            echo  "</div>
        </main>";
        } else {
            echo "<main>
            <div class='draganddrop'>";

            include('view.php');

            echo  "</div>
        </main>";
        }
        ?>


</html>