<?php
error_reporting(0);
session_start();

require_once 'db_connect.php';
require_once 'include/header_student.php';
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
        /* start of draganddrop css */
        .drop-zone {
            margin-top: 20px;
            max-width: 200px;
            height: 200px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: "Quicksand", sans-serif;
            font-weight: 500;
            font-size: 20px;
            cursor: pointer;
            color: #cccccc;
            border: 4px dashed #009578;
            border-radius: 10px;
        }

        .drop-zone--over {
            border-style: solid;
        }

        .drop-zone__input {
            display: none;
        }

        .drop-zone__thumb {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
            background-color: #cccccc;
            background-size: cover;
            position: relative;
        }

        .drop-zone__thumb::after {
            content: attr(data-label);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 5px 0;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.75);
            font-size: 14px;
            text-align: center;


        }

        .try01 {

            padding: 10px 10px 10px 10px;
            border-radius: 15px;
            height: auto;
            margin-top: 200px;



        }

        .try02 {
            position: relative;
            top: 120px;
            padding-top: 10px;
            border-radius: 15px;
            height: auto;
            margin-top: 10px;
            width: 200px;

        }

        .img_container {
            position: relative;
            padding-top: 300px;
            padding-bottom: 50px;
            border: 2px outset #000000;
        }

        /* endo of draganddrop css */
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

        .img_container {
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

        echo "<div class='icon_style' style=''>";
        for ($i = 1; $i <= $pcquantity; $i++) {
        ?>

            <?php
            $query = "SELECT * From `pc_details` WHERE `pc_id`='$i' AND `lab_no`='$roomno'";
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

                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            } else {
                $condition = "Not Working";
            ?>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#displayPcDetailsModal<?php echo $i; ?>" style="margin: 5px;"><i id='pcicon<?php echo $i; ?>' class='fa-solid fa-desktop fa-display fa-2x' style='float: left;'></i></a></button>

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

                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Close</button>
                                    </div>
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

        echo "<main>
            <div class='draganddrop'>";



        echo  "</div>
        </main>";


        ?>
        <?php
        session_start();
        $_SESSION['lab_no'] = $roomno;

        $query = "SELECT `timetable` from lab where lab_no=$roomno";
        $data = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($data);
        $detail = $result['timetable'];

        echo "<div class='img_container'>";
        echo '<img src="data:image/jpeg;base64,' . base64_encode($result['timetable']) . '"/>';
        echo "</div>";
        ?>
</body>

</html>