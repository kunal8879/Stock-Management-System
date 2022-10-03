<?php
session_start();
require_once '../db_connect.php';
$uname = $_SESSION['username'];
$srole = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="CSS/.css"> -->
    <script src="https://kit.fontawesome.com/a70a238af9.js" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>

<body>
    <!-- <div style="margin: 90px;">
        <header>
            <img src="image/logo3.png" alt="" class="site-logo">
            <nav class="navnavnav">
                <ul>
                    <li><a href="index_admin.php">Home</a></li>

                    <li><a href="items.php">Stocks</a></li>

                    <li><a href="profile.php"><i class="fa-solid fa-user"></i><?php echo " " . $srole; ?></a>
                        <ul>
                            <li><a href="profile.php">My Profile</a>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
    </div> -->

    <main>
        <table class="content-table" style="border-collapse: separate; float:centre;">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Faculty ID</th>
                    <th>Role</th>
                    <!-- <th colspan="2">Operations</th> -->
                </tr>
            </thead>
            <?php
            $query = "select * from admin";
            $data = mysqli_query($conn, $query);
            $rows = mysqli_num_rows($data);


            if ($rows != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    if ($result['role'] == 1) {
                        $user = 'Admin';
                    } elseif ($result['role'] == 0) {
                        $user = 'Faculty';
                    }
                    echo "<tr>
                <td>" . $result['firstname'] . "</td>
                <td>" . $result['middlename'] . "</td>
                <td>" . $result['lastname'] . "</td>
                <td>" . $result['username'] . "</td>
                <td>" . $result['fid'] . "</td>
                <td>" . $user . "</td>
                </tr>";
                }
            }
            ?>
        </table>
        <!-- <button class="button" role="button" style="float: right;  margin: 20px 120px 30px 100px;"><a
                href="faculty_details.php">Add New Faculty</button> -->
    </main>
    </div>
</body>

</html>