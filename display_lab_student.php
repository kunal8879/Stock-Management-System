<?php
// error_reporting();
session_start();

require_once 'db_connect.php';
require_once 'include/header_student.php';

// $srole = $_SESSION['user'];
// if ($srole == null) {
//     $srole = 'Student';
// }

$roomno = $_GET['lab_no'];

$sql1 = "SELECT * FROM lab WHERE lab_no='$roomno'";
$sql_run1 = mysqli_query($conn, $sql1);
$result = mysqli_fetch_assoc($sql_run1);
$pcquantity = $result['pcquantity'];

$_SESSION['lab_no'] = $roomno;

?>

<h2 class="roomno">Lab No:- <?= $roomno ?></h2>

<?php
$sql2 = "SELECT * FROM `pc_lab$roomno`";
$sql_run2 = mysqli_query($conn, $sql2);
$result = mysqli_fetch_assoc($sql_run2);
$pc_details = $result['pc_details'];
$pc_softwares = $result['pc_softwares'];

$i = 1;

if (mysqli_num_rows($sql_run2) > 0) {
    echo "<div class='icon_style'>";
    foreach ($sql_run2 as $pc) {

        if ($pc_details == null) {
            $pc_details = "No Registered data";
        }
        if ($pc_softwares == null) {
            $pc_softwares = "No Softwares Installation Details";
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
                            <form action="edit_pc_details.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Lab No:</label>
                                    <input type="text" class="form-control" id="lab_no" name="lab_no" value="<?php echo $pc['lab_no']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">PC ID:</label>
                                    <input type="text" class="form-control" id="pc_id" name="pc_id" value="<?php echo $pc['pc_id']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pc Name:</label>
                                    <input type="text" class="form-control" id="pc_name" name="pc_name" value="<?php echo $pc['pc_name']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pc Details:</label>
                                    <input type="text" class="form-control" id="pc_details" name="pc_details" value="<?php echo $pc['pc_details']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Software:</label>
                                    <input type="text" class="form-control" id="pc_softwares" name="pc_softwares" value="<?php echo $pc['pc_softwares']; ?>" readonly>
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
                            <form action="edit_pc_details.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Lab No:</label>
                                    <input type="text" class="form-control" id="lab_no" name="lab_no" value="<?php echo $pc['lab_no']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">PC ID:</label>
                                    <input type="text" class="form-control" id="pc_id" name="pc_id" value="<?php echo $pc['pc_id']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pc Name:</label>
                                    <input type="text" class="form-control" id="pc_name" name="pc_name" value="<?php echo $pc['pc_name']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pc Details:</label>
                                    <input type="text" class="form-control" id="pc_details" name="pc_details" value="<?php echo $pc['pc_details']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Software:</label>
                                    <input type="text" class="form-control" id="pc_softwares" name="pc_softwares" value="<?php echo $pc['pc_softwares']; ?>" readonly>
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
        $i++;
    }
}
echo "</div>";

?>

<a class="scroll" href="#image">
    <h2 class="timetable">Timetable</h2>
</a>




<?php
$query = "SELECT `timetable` from lab where lab_no=$roomno";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
$detail = $result['timetable'];
if ($detail == null) {
?>
    <div class="img_container">
        <p>No Timetable Uploaded</p>
    </div>
<?php } else {
    echo "<div class='img_container'>";
    echo '<img id="image" src="data:image/jpeg;base64,' . base64_encode($result['timetable']) . '"/>';
    echo "</div>";
?>
   

<?php }  ?>

</body>

</html>