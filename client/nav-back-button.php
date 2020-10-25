<?php
session_start();
?>
<nav>
    <div class="back" onclick="location.href='dashboard.php'">
        <i class="fas fa-arrow-left fa-xs"></i>
        <span>Back</span>
    </div>
    <p class="user"><?php echo $_SESSION['cName'] ?></p>
    <h1 onclick="location.href='dashboard.php'">Ad<span>tech</span></h1>
</nav>