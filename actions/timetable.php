<?php
session_start();
$roomno = $_GET['lab_no'];
$_SESSION['lab_no'] = $roomno;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
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
        .try02
        {
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
            border: black;
        }
    </style>

    <title>Document</title>
</head>

<body>
    <?php
    $query = "SELECT `timetable` from lab where lab_no=$roomno";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    $detail = $result['timetable'];
    if ($detail == null) {
    ?>
        <h3>Upload Timetable:</h3>
        <div class="drop-zone">
            <form action=./upload.php method="post" enctype="multipart/form-data">

                <input class="try02"type="file" name="image">
                <input class="try01" type="submit" name="submit" value="Upload">
            </form>
        </div>
    <?php } else {
        echo "<div class='img_container'>";
        echo '<img src="data:image/jpeg;base64,' . base64_encode($result['timetable']) . '"/>';
        echo "</div>";
    ?>

        <h4>Change Timetable:</h4>
        <div class="">
            <form action=./upload.php method="post" enctype="multipart/form-data">

                <input type="file" name="image">
                <input class="" type="submit" name="submit" value="Upload">
            </form>
        </div>

    <?php }  ?>

</body>

</html>