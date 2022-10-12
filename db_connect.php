<?php

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "stock4";

$conn = new mysqli($localhost, $username, $password, $dbname);

if (!$conn) {
    die('Connection Failed' . mysqli_connect_error());
}
