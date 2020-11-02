<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Register page for client (HAVE NOT DONE) -->
  <title>Register</title>
  <?php
  include_once("../head.php");
  session_start();
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
      <form action="register-validation.php" method="POST" class="login-form">
        <div class="header">
          <h1>Register</h1>
          <?php 
          if(isset($_SESSION['errMsg'])) {
            echo "<span class='error'>".$_SESSION['errMsg']."</span>";
            unset($_SESSION['errMsg']);
          } else {
            echo "<span>Enter a safe password</span>";
          }
          ?>
        </div>
        <label for="">Username</label>
        <input type="text" name="clientName" placeholder = "Enter username" required/>
        <div class="password">
          <label for="">Password</label>
        </div>
        <input type="password" name="password" placeholder = "Enter password" required/>
        <div class="password">
        <button type="submit">Submit</button>
        <a href="index.php">Already created an account? Click here</a>
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
