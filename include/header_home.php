<?php
session_start();
$srole = $_SESSION['user'];
$username = $_SESSION['username'];
$lab_no = $_SESSION['lab_no'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/display_lab.css">
    <script src="https://kit.fontawesome.com/a70a238af9.js" crossorigin="anonymous"></script>
</head>

<body>
    <script src="../css/bootstrap.js"></script>
    <script src="../include/search.js"></script>
    <script src="../include/sort.js"></script>

    <!-- navigation bar -->
    <div style="margin: 90px;">
        <header>
            

                <img src='../images/logo3.png' alt='Logo' class='site-logo'>
            
            <!-- <div class="back_icon">
                <i onclick="history.back()" class="fa-solid fa-arrow-left fa-2xl"></i>
            </div> -->

            <?php if ($srole == 'Admin') { ?>
                <nav class="navnavnav">
                    <ul>
                        <li><a href="../home.php">Home</a></li>
                        <li><a href="#">Items &plus;</a>
                            <ul style="padding: 0;">
                                <li><a href="../items.php" style="padding: 7px; text-align: center;">Items</a></li>
                                <li><a href="../allocate.php" style="padding: 7px; text-align: center;">Allocate</a></li>
                            </ul>
                        </li>
                        <li><a href="../lab.php">Labs</a></li>
                        <li><a href="../supplier.php">Supplier</a></li>
                        <li><a href="../card.php"><i class="fa-solid fa-user"></i><?php echo " " . $srole; ?></a>
                            <ul style="padding: 0; margin: 0; text-align: center;">
                                <li><a href="../display_details.php" style="padding: 0px;">Manage Faculty</a></li>
                                <li><a href="../logout.php">Logout</a></li>
                            </ul>
                        </li>
                </nav>
            <?php } elseif ($srole == 'Faculty') { ?>
                <nav class="navnavnav">
                    <ul>
                        <li><a href="../lab_faculty.php">Home</a></li>

                        <li><a href="../card.php"><i class="fa-solid fa-user"></i><?php echo " " . $srole; ?></a>
                            <ul style="padding: 0; margin: 0; text-align: center;">
                                <li><a href="../logout.php">Logout</a></li>
                            </ul>
                        </li>
                </nav>
            <?php } else { ?>
                <nav class="navnavnav">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../login.php">LogIn</a></li>
                        </li>
                </nav>
            <?php } ?>
        </header>
    </div>