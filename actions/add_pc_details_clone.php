<?php
session_start();
require_once '../db_connect.php';


$roomno = $_SESSION['lab_no'];

$query = "select * from lab WHERE lab_no='$roomno'";
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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
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

        <?php for ($i = 0; $i <= $pcquantity; $i++) {
            echo "<style>
#pcicon$i {
            width: 30px;
            padding-top: 10px;
            padding-right: 20px;
            
        }
    </style>
    ";
        }


        $query2 = "SELECT `pc_id` from pc_details WHERE lab_no='$roomno' AND pc_condition=0";
        $data2 = mysqli_query($conn, $query2);
        $rows = mysqli_num_rows($data2);
        for ($a = 1; $a <= $rows; $a++) {
            $result2 = mysqli_fetch_assoc($data2);
            $id = $result2['pc_id'];
            echo "<style>
        
            #pcicon$id{
            color: #ff0000;
        }
        </style>";
        }
        ?>
    </style>

</head>

<body>
    <script src="../css/bootstrap.js"></script>

    <div style="margin: 90px;">

        <?php



        echo "<div class='roomno1'>
    Lab No: $roomno
    </div>";
        ?>


        <?php

        echo "<div class='icon_style'>";
        for ($i = 1; $i <= $pcquantity; $i++) {
        ?>

            <!-- <button class='icon_button'>
                <a href="add_pc_details.php?lab_no=$roomno&& id=$i" style="text-decoration: none; color:inherit;">
                    <i id='pcicon$i' class='fa-solid fa-desktop fa-display fa-2x '></i></a></button> -->


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#displayPcDetailsModal<?php echo $i['pc_id'] ?>"><i id='pcicon<?php echo $i; ?>' class='fa-solid fa-desktop fa-display fa-2x '></i></button>

            <!-- add item model -->
            <div class="modal fade" id="displayPcDetailsModal<?php echo $i['pc_id'] ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Pc Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <?php for ($i = 0; $i <= $pcquantity; $i++) { ?>

                                <form action="./pc_details.php" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Lab No:</label>
                                        <input type="text" class="form-control" id="lab_no" name="lab_no" placeholder="<?php echo $roomno; ?>" value="<?php echo $roomno; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pc ID:</label>
                                        <input type="text" class="form-control" id="pc_id" name="pc_id" placeholder="" value="<?php echo $i; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pc Name:</label>
                                        <input type="text" class="form-control" id="pc_name" name="pc_name" placeholder="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pc Details:</label>
                                        <input type="text" class="form-control" id="details" name="details" placeholder="" required>
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

                                <?php } ?>

                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Close</button>
                                    <button type="submit" name="add_item" class="btn btn-primary" style="background-color: #00b3aa;">Submit</button>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php

            if ($i % 5 == 0) {
                echo "<br>";
            }
        }
        echo "</div>";

        ?>



</html>