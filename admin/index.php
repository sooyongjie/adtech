<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <?php
  include_once("../head.php");
  session_start();
  unset($_SESSION['uid']);
  unset($_SESSION["type"]);
  unset($_SESSION["name"]);
  ?>
  <link rel="stylesheet" type="text/css" href="../css/login.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js" integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ==" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="welcome-img">
      <img src="../img/welcome.png" alt="" />
    </div>
    <div class="form">
      <form action="user-validation.php" method="POST" class="login-form">
        <div class="header">
          <h1>Login</h1>
          <?php 
          if(isset($_SESSION['errMsg'])) {
            echo "<span class='error'>".$_SESSION['errMsg']."</span>";
            unset($_SESSION['errMsg']);
          } else {
            echo "<span>Welcome to Adtech.</span>";
          }
          ?>
        </div>       
        <div class="user">
          <label for="">Employee ID</label>
        </div>
        <input type="text" name="empID" placeholder="Enter username" value="" required/>
        <div class="password">
          <label for="">Password</label>
          <a href="forgot-password.php">Forgot Password</a>
        </div>
        <input type="password" name="password" placeholder="Enter password" value="" required/>
        <div class="password">
          <button type="submit">Submit</button> 
        </div>
        <!-- <button type="button" href="dashboard.html"><a href="dashboard.html">Login</a></button> -->
      </form>
    </div>
  </div>
</body>
<script>
  var gsap = gsap.timeline();
  gsap.to(".welcome-img", {opacity: 1, duration: 0.3, delay: 0.3}); //wait 2 seconds
  gsap.to(".form", {opacity: 1, duration: 1}, "-=0.2"); //wait 2 seconds
</script>
</html>
