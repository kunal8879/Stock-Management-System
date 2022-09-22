<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" conntent="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/login.css">
</head>

<body>
  <div class="login-form">
    <form action="./actions/login_user.php" method="post">
      <div class="imgconntainer">
        <img src="images/img_avatar.png" alt="" class="avatar">
      </div>

      <div class="conntainer">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Faculty Id" name="fid2" required>

        <button type="submit" name="submit">Login</button>
      </div>
    </form>
  </div>
</body>

</html>