
<?php

require_once '../db_connect.php';


    $roomno=$_GET['lab_no'];

    $query="select * from lab WHERE lab_no='$roomno'";
    $data= mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($data);
    $pcquantity=$result['pcquantity'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a70a238af9.js' crossorigin='anonymous'></script>
    <!-- <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/style.css"> -->
    <title>Lab Info Display</title>
    <style>
        .roomno1{
            font-size: 350%;
            text-align: center;
            border: 2px outset #000000;
            background-color: #00b3aa;
            margin: 20px 300px 20px 300px;
        }

        .icon_style {
            text-align: center;
            position: absolute;
            left: -200px;

            height: 350px;
            width: 400px;
            

            margin: 80px 500px 80px 500px;
            border: 2px outset #000000;
        }

        <?php 
        for($i=0;$i<=$pcquantity;$i++){
            echo "<style>
            #pcicon$i{
                width: 50px;
                padding-top:10px;
                margin: 10px;
            }
            </style>
            ";
        }
        ?>

        
    </style>
    
</head>
<body>
<div style="margin: 90px;">
<?php
// require_once '../include/header.php'
?>
    <!-- <header>
        <img src="image/logo3.png" alt="" class="site-logo">
        <nav class="navnavnav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                    
                
            </ul>
        </nav>
    </header> -->
    </div>
    <?php
    
   
    
    echo "<div class='roomno1'>
    Lab No: $roomno
    </div>";
    ?>
    

<?php
    
    echo "<div class='icon_style'>";
    for($i=1;$i<=$pcquantity;$i++){

        echo "<i id='pcicon$i' class='fa-solid fa-desktop  fa-2x '></i>";
        echo " ";
        if($i%5==0){
            echo "<br>";
        }
    }
    echo "</div>";

    ?>
</body>
</html>