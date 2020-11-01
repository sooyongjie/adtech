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
    
    <h1 onclick="location.href='dashboard.php'">Ad<span>tech</span></h1>
    <!--use singleton to display name-->
    <div class="user">
      <span><?php AccountSingleton() ?></span>
      <div class="logout" onclick="location.href='index.php'">
        <i class="fas fa-sign-out-alt"></i>
      </div>
    </div>

</nav>

