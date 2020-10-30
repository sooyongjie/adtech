<?php
session_start();
?>
<nav>
    <p class="user"><?php echo $_SESSION['cName'] ?></p>
    <div class="logout" onclick="location.href='index.php'">
    <p><span>Log Out</span></p>
    </div>
    <h1 onclick="location.href='dashboard.php'">Ad<span>tech</span></h1>
</nav>
