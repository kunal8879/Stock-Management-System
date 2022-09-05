<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'db_connect.php';
    $sql = "SELECT * FROM  users WHERE username = '$_username' AND `password` = '$_password'";
    $result = $conn->query($sql);

    if ($result == true) {
        if (!($result->num_rows == 1)) {
            $_SESSION['error'] = 'Wrong Credentials !!!';
            header('location: ../index.php');
        } else {
            $row = $result->fetch_assoc();
            if ($row['role'] == 1) {
                $_SESSION['username'] = 'ADMIN';
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['role'] = 'admin';
                $_SESSION['success'] = 'Welcome ' . $row['username'] . ' to admin home page';

                header('location: ../home_page.php');
            } else {
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['role'] = 'lab administrator';
                $_SESSION['success'] = 'Welcome ' . $row['username'] . ' to lab home page';

                header('location: ../home_page.php');
            }
        }
    }
    //close connection
    $conn->close();
} else {
    $_SESSION['error'] = 'Something went wrong';
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div id="bg"></div>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="loginform">
        <div class="form-field">
            <input type="text" placeholder="Username" id="username" name="username" required />
        </div>

        <div class="form-field">
            <input type="password" placeholder="Password" id="password" name="password" required />
        </div>

        <div class="form-field">
            <input type="submit" name="submit" value="LOGIN" class="btn">
        </div>
        </div>
    </form>

</body>

</html>