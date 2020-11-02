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
      </div>   
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
<script>
  var gsap = gsap.timeline();
  gsap.to(".welcome-img", {opacity: 1, duration: 0.3, delay: 0.3}); //wait 2 seconds
  gsap.to(".form", {opacity: 1, duration: 1}, "-=0.2"); //wait 2 seconds
</script>
</html>
