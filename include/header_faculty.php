<?php
session_start();
$srole = $_SESSION['user'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a70a238af9.js" crossorigin="anonymous"></script>
</head>

<body>
    <script src="./css/bootstrap.js"></script>
    <script src="./include/search.js"></script>
    <!-- navigation bar -->
    <div style="margin: 90px;">
        <header>
            <img src="./images/logo3.png" alt="Logo" class="site-logo">
            <nav class="navnavnav">
                <ul>
                    <li><a href="./lab_faculty.php">Home</a></li>

                    </li>

                    <li><a href="card.php"><i class="fa-solid fa-user"></i><?php echo " " . $srole; ?></a>
                        <ul style="padding: 0; margin: 0; text-align: center;">
                            <li><a href=" logout.php">Logout</a></li>
                        </ul>
                    </li>


            </nav>
        </header>
    </div>