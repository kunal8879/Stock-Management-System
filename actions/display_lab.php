<?php
error_reporting(0);
session_start();

require_once '../db_connect.php';
$srole = $_SESSION['user'];

$roomno = $_GET['lab_no'];

$query = "SELECT * from lab WHERE lab_no='$roomno'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
$pcquantity = $result['pcquantity'];

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
            font-size: 350%;
            text-align: center;
            border: 2px outset #000000;
            background-color: #00b3aa;
            margin: 20px 300px 20px 300px;
        }

        .icon_style {
            text-align: center;
            position: absolute;
            left: -200px;

            height: auto;
            width: 400px;


            margin: 80px 500px 80px 500px;
            border: 2px outset #000000;
        }

        .icon_button {
            width: 50px;
            padding-top: 10px;
            margin: 10px;
            background-color: white;
            border: none;
        }

        /* .fa {
        color: green;
    } */

        <?php for ($i = 0; $i <= $pcquantity; $i++) {
            echo "<style>
#pcicon$i {
            width: 50px;
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

            <!-- echo "<button class='icon_button' data-bs-target='#pcDetailModal'>
            <a href='display_pc_details.php?lab_no=$roomno&&pc_id=$i' style='text-decoration: none; color: inherit;'>
            <i id='pcicon$i' class='fa-solid fa-desktop  fa-2x fa-color:green'></i></a></button>"; -->

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pcDetailModal" style=" margin-left: 50px; background-color: #00b3aa;"><i id='pcicon$i' class='fa-solid fa-desktop  fa-2x fa-color:green'>
                </i></button>

            <!-- pc detail model -->
            <div class="modal fade" id="pcDetailModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./actions/add_lab.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">LAB NO: </label>
                                    <input type="text" class="form-control" id="lab_no" name="lab_no" placeholder="Enter Lab No" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">LAB DETAIL: </label>
                                    <input type="text" class="form-control" id="lab_detail" name="lab_detail" placeholder="Enter Lab Details" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">LAB ADMIN: </label>
                                    <input type="text" class="form-control" id="lab_admin" name="lab_admin" placeholder="Enter Lab Admin Name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">TOTAL PC: </label>
                                    <input type="text" class="form-control" id="pcquantity" name="pcquantity" placeholder="Enter Total PC" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Close</button>
                                    <button type="submit" name="add_lab" class="btn btn-primary" style="background-color: #00b3aa;">ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <i id='pcicon$i' class='fa-solid fa-desktop  fa-2x fa-color:green'>
            </i>


        <?php
            echo " ";
            if ($i % 5 == 0) {
                echo "<br>";
            }
        }
        echo "</div>";

        ?>

        <?php
        if ($srole == 'Admin' || $srole == 'Faculty') {
            echo "<button><a href='add_pc_details_clone.php?lab_no=$roomno'>Add Pc Details</a></button>";
        }
        ?>


</html>