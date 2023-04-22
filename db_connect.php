<?php

$host = "mysql.cwfdvw0pptzn.us-east-1.rds.amazonaws.com";
$username = "root";
$password = "";
$dbname = "stock";

$conn = new mysqli($host, $username, $password, $dbname);

if (!$conn) {
    die('Connection Failed' . mysqli_connect_error());
}
