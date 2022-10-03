<?php
$lab_no = $_GET['lab_no'];
$pc_id = $_GET['id'];
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
    <form action="./pc_details.php" method="POST">
        <div class="container">
            <h1>Pc Details</h1>
            <hr>
            <label for="psw"><b>Lab No</b></label>
            <input type="text" class="info-input" name="lab_no" placeholder="<?php echo $lab_no; ?>" value="<?php echo $lab_no; ?>" readonly />

            <label for="psw"><b>Pc ID</b></label>
            <input type="text" class="info-input" name="pc_id" placeholder="<?php echo $pc_no; ?>" value="<?php echo $pc_id; ?>" readonly />

            <label for="psw"><b>Pc Name</b></label>
            <input type="text" class="info-input" name="pc_name" placeholder="APSIT Pc Name" required />

            <label for="psw-repeat"><b>Pc details</b></label>
            <input type="text" class="info-input" name="details" placeholder="Pc Details" required />


            <label for="psw"><b>Pc condition</b></label>
            <label class="container">Working
                <input type="radio" name="pc_condition" value="1" required/>

            </label>
            <label class="container">Not Working
                <input type="radio" name="pc_condition" value="0" required/>

            </label>

            <hr>

            <button type="submit" name="submit" class="registerbtn">Add</button>
        </div>

    </form>


</body>

</html>