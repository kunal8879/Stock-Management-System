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
    }

    <?php for ($i=0; $i <=$pcquantity; $i++) {
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
    for ($a = 1; $a <= $rows; $a++) { $result2=mysqli_fetch_assoc($data2); $id=$result['pc_id']; echo "<style>
        
        #pcicon$id{
            color: Red;
        }</style>" ;} ?>
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

            echo "<button class='icon_button' data-bs-target='#addLabModal'>
            <a href='display_pc_details.php?lab_no=$roomno&&pc_id=$i' style='text-decoration: none;>
            <i id='pcicon$i' class='fa-solid fa-desktop  fa-2x ' ></i></a></button>";
            echo " ";
            if ($i % 5 == 0) {
                echo "<br>";
            }
        }
        echo "</div>";

        ?>

        <?php 
        if($srole=='Admin' || $srole=='Faculty'){
        echo "<button><a href='add_pc_details_clone.php?lab_no=$roomno'>Add Pc Details</a></button>" ; 
        }
        ?>


</html>