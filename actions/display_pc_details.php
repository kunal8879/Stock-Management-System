<?php
error_reporting(0);
require_once '../db_connect.php';


$roomno = $_GET['lab_no'];
$pc_id = $_GET['pc_id'];

$query = "SELECT *
 from pc_details WHERE pc_id='$pc_id' AND lab_no='$roomno'";
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
} elseif ($pc_condition == 0) {
    $condition = "Not Working";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <script src="../css/bootstrap.js"></script>
    <form action="" method="POST">
        <div class="container">
            <h1>Pc Details</h1>
            <hr>

            <label for="psw"><b>Lab No</b></label>
            <input type="text" class="info-input" name="lab_no" placeholder="<?php echo $roomno; ?>" readonly />

            <label for="psw"><b>Pc ID</b></label>
            <input type="text" class="info-input" name="pc_id" placeholder="<?php echo $pc_id; ?>" readonly />

            <label for="psw"><b>Pc Name</b></label>
            <input type="text" class="info-input" name="pc_name" placeholder="<?php echo $pc_name; ?>" readonly />

            <label for="psw-repeat"><b>Pc details</b></label>
            <input type="text" class="info-input" name="details" placeholder="<?php echo $details; ?>" readonly />

            <label for="psw-repeat"><b>Pc condition</b></label>
            <input type="text" class="info-input" name="pc_condition" placeholder="<?php echo $condition; ?>" readonly />



            <hr>

        </div>


    </form>


</body>

</html>