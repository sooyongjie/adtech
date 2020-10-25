<?php
session_start();
?>
<nav>
    <p class="user"><?php echo $_SESSION['cName'] ?></p>
    <h1 onclick="location.href='dashboard.php'">Ad<span>tech</span></h1>
</nav>
