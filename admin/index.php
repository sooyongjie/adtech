<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <?php
    include_once("../head.php");
    session_start();
    unset($_SESSION['uid'])
    ?>
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
  </head>
  <body>
    <div class="container">
      <div class="welcome-img">
        <img src="../img/welcome.png" alt="" />
      </div>
      <div class="form">
        <form action="user-validation.php" method="POST" class="login-form">
          <h1>Login</h1>
          <label for="">User ID</label>
          <input type="text" name="empID" value="1"/>
          <div class="password">
            <label for="">Password</label>
            <a href="">Forgot Password</a>
          </div>
          <input type="password" name="password" value="poop"/>
          <button type="submit">Submit</button>
          <!-- <button type="button" href="dashboard.html"><a href="dashboard.html">Login</a></button> -->
        </form>
      </div>
    </div>
  </body>
</html>
