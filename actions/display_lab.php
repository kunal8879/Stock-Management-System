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

$sql1 = "SELECT * FROM lab WHERE lab_no='$roomno'";
$sql_run1 = mysqli_query($conn, $sql1);
$result = mysqli_fetch_assoc($sql_run1);
$pcquantity = $result['pcquantity'];

$_SESSION['lab_no'] = $roomno;

?>

<div class="split left">
    <div class="centered">
        <h2 class="roomno">Lab No:- <?= $roomno ?></h2>

        <?php
        $sql2 = "SELECT * FROM `pc_lab$roomno`";
        $sql_run2 = mysqli_query($conn, $sql2);
        $result = mysqli_fetch_assoc($sql_run2);
        $pc_details = $result['pc_details'];
        $softwares_installed = $result['pc_softwares'];

        $i = 1;

        if (mysqli_num_rows($sql_run2) > 0) {
            echo "<div class='icon_style'>";
            foreach ($sql_run2 as $pc) {

                if ($pc_details == null) {
                    $pc_details = "No Registered data";
                }
                if ($softwares_installed == null) {
                    $softwares_installed = "No Softwares Installation Details";
                }
                if ($pc['pc_condition'] == "Working") {
                    $condition = "Working";
        ?>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#displayPcDetailsModal<?php echo $pc['pc_id'] ?>" style="margin: 5px;">
                        <i id='pcicon<?php echo $pc['pc_id']; ?>' class='fa-solid fa-desktop fa-display fa-2x'></i>
                    </button>

                    <!-- PC MODAL -->
                    <div class="modal fade" id="displayPcDetailsModal<?php echo $pc['pc_id']; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Pc Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="edit_pc_details" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">Lab No:</label>
                                            <input type="text" class="form-control" id="lab_no" name="lab_no" placeholder="<?php echo $pc['lab_no']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">PC ID:</label>
                                            <input type="text" class="form-control" id="pc_id" name="pc_id" placeholder="<?php echo $pc['pc_id']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pc Name:</label>
                                            <input type="text" class="form-control" id="pc_name" name="pc_name" placeholder="<?php echo $pc['pc_name']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pc Details:</label>
                                            <input type="text" class="form-control" id="details" name="details" placeholder="<?php echo $pc_details; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Software:</label>
                                            <input type="text" class="form-control" id="softwares_installed" name="softwares_installed" placeholder="<?php echo $softwares_installed; ?>" readonly>
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
                } else {
                    $condition = "Not Working";
                ?>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#displayPcDetailsModal<?php echo $pc['pc_id'] ?>" style="margin: 5px;">
                        <i id='pcicon<?php echo $pc['pc_id']; ?>' class='fa-solid fa-desktop fa-display fa-2x'></i>
                    </button>

                    <!-- PC MODAL -->
                    <div class="modal fade" id="displayPcDetailsModal<?php echo $pc['pc_id']; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Pc Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="edit_pc_details" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">Lab No:</label>
                                            <input type="text" class="form-control" id="lab_no" name="lab_no" placeholder="<?php echo $pc['lab_no']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">PC ID:</label>
                                            <input type="text" class="form-control" id="pc_id" name="pc_id" placeholder="<?php echo $pc['pc_id']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pc Name:</label>
                                            <input type="text" class="form-control" id="pc_name" name="pc_name" placeholder="<?php echo $pc['pc_name']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pc Details:</label>
                                            <input type="text" class="form-control" id="details" name="details" placeholder="<?php echo $pc_details; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Softwares:</label>
                                            <input type="text" class="form-control" id="softwares_installed" name="softwares_installed" placeholder="<?php echo $softwares_installed; ?>" readonly>
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
                }
                ?>

        <?php
                if ($i % 5 == 0) {
                    echo "<br>";
                }
                $i++;
            }
        }
        echo "</div>";

        ?>
    </div>
</div>


<div class="split right">
    <div class="centered">
        <h2 class="timetable">Timetable</h2>



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

    </div>
</div>
</body>

</html>