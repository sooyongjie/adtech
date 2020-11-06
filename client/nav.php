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
    $subject = new Subject();
    $o1 = new ConcreteObserverA();
    $subject->attach($o1);
    $subject->CompletedService();
  }

?>
<nav>
    
    <img src="../img/logo-dark.svg" alt="Adtech" onclick="location.href='dashboard.php'">
    <!--use singleton to display name-->
    <div class="user">
      <a href="profile.php"><?php AccountSingleton() ?></a>
      <?php Notification() ?>
      <div class="logout" onclick="location.href='index.php'">
        <i class="fas fa-sign-out-alt"></i>
      </div>
    </div>

</nav>

