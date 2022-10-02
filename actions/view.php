<?php
session_start();
$_SESSION['lab_no'] = $roomno;

$query = "SELECT `timetable` from lab where lab_no=$roomno";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
$detail = $result['timetable'];

        echo "<div class='img_container'>";
        echo '<img src="data:image/jpeg;base64,' . base64_encode($result['timetable']) . '"/>';
        echo "</div>";
    ?>