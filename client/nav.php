<?php
session_start();
include 'Singleton.php';
function AccountSingleton() {
    $s2 = Account::getInstance();
    $user = $s2->getwork(); 
    echo $user;
  }
?>
<nav>
    <!--use singleton to display name-->
    <p class="user"><?php AccountSingleton() ?></p>
    <div class="logout" onclick="location.href='index.php'">
    <p><span>Log Out</span></p>
    </div>
    <h1 onclick="location.href='dashboard.php'">Ad<span>tech</span></h1>
</nav>

