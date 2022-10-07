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

$query = "SELECT * FROM pc_lab$roomno WHERE lab_no='$roomno'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
$pcquantity = $result['pcquantity'];

$_SESSION['lab_no'] = $roomno;

?>
<!-- add pc button-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPc" style=" margin-left: 50px; background-color: #00b3aa;">NEW&plus;</button>

<!-- add pc model -->
<div class="modal fade" id="addPc" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Enter Pc Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./actions/add_pc.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Pc Name:</label>
                        <input type="text" class="form-control" id="pc_name" name="pc_name" placeholder="Enter Pc Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pc Details:</label>
                        <input type="text" class="form-control" id="pc_details" name="pc_details" placeholder="Enter Details" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Softwares:</label>
                        <input type="text" class="form-control" id="pc_software" name="pc_software" placeholder="Enter Softwares Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Query:</label>
                        <input type="text" class="form-control" id="query" name="query" placeholder="Enter Your Query" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Conditions:</label>
                        <input type="radio" id="pc_condition" name="pc_condition" value="Working" style="margin-left: 5px;"> Working
                        <input type="radio" id="pc_condition" name="pc_condition" value="Not Working" style="margin-left: 5px;"> Not Working
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
        $query = "SELECT * FROM `pc_lab` WHERE `pc_id`='$i' AND `lab_no`='$roomno'";
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