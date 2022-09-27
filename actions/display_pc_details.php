<?php

require_once '../db_connect.php';


$roomno = $_GET['lab_no'];
$pc_id = $_GET['pc_id'];

$query = "select `pc_name`,`details`
 from pc_details WHERE pc_id='$pc_id'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
$pc_name = $result['pc_name'];
$details = $result['details'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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


            <hr>

        </div>


    </form>


</body>

</html>