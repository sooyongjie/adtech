<?php
session_start();
include 'Singleton.php';
include 'Observer.php';
function AccountSingleton() {
    $s2 = Account::getInstance();
    $user = $s2->getUserName(); 
    echo $user;
  }

function Notification(){
    $subject2 = new Subject();
    $o2 = new ConcreteObserverA();
    $subject2->attach($o2);
    $subject2->CompletedService();
  }

?>
<nav>
    <div class="back" onclick="location.href='dashboard.php'">
        <i class="fas fa-arrow-left fa-xs"></i>
        <span>Back</span>
    </div>
    <!--use singleton to display name-->
    <h1 onclick="location.href='dashboard.php'">Ad<span>tech</span></h1>
    <div class="user">
      <a href="profile.php"><?php AccountSingleton() ?></a>
      <?php Notification() ?>
      <div class="logout" onclick="location.href='index.php'">
        <i class="fas fa-sign-out-alt"></i>
      </div>
    </div>
</nav>