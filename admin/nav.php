<?php
session_start();
?>

<nav>
    <h1>Ad<span>tech</span></h1>
    <?php
    if($file == "dashboard.php") {
        ?>
        <div class="button active" onclick="location.href='dashboard.php'">
            <div class="button-l">
                <i class="fas fa-clipboard-list fa-lg "></i>
                <p>Requests</p>
            </div>
            <div class="button-r">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="button" onclick="location.href='dashboard.php'">
            <div class="button-l">
                <i class="fas fa-clipboard-list fa-lg "></i>
                <p>Requests</p>
            </div>
        </div>
        <?php
    }
    if($file == "feedback.php") {
    ?>
    <div class="button active" onclick="location.href='feedback.php'">
        <div class="button-l">
            <i class="fas fa-comment-alt"></i>
            <p>Feedback</p>
        </div>
        <div class="button-r">
            <i class="fas fa-angle-right"></i>
        </div>
    </div>
    <?php
    } else {
        ?>
        <div class="button" onclick="location.href='feedback.php'">
            <div class="button-l">
                <i class="fas fa-comment-alt"></i>
                <p>Feedback</p>
            </div>
        </div>
        <?php
    }
    // Employee
    if($_SESSION['type'] != "3" && $file == "employees.php") {
        ?>
        <div class="button active" onclick="location.href='employees.php'">
            <div class="button-l">
                <i class="fas fa-users"></i>
                <p>Employees</p>
            </div>
            <div class="button-r">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="button" onclick="location.href='employees.php'">
            <div class="button-l">
                <i class="fas fa-users"></i>
                <p>Employees</p>
            </div>
        </div>
        <?php
    }
    // if CEO
    if($_SESSION['type'] == 1 && $file == "report.php") {
        ?>
        <div class="button active" onclick="location.href='report.php'">
            <div class="button-l">
                <i class="fas fa-chart-bar"></i>
                <p>Report</p>
            </div>
            <div class="button-r">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <?php
        } else if($_SESSION['type'] == 1) {
            ?>
            <div class="button" onclick="location.href='report.php'">
                <div class="button-l">
                    <i class="fas fa-chart-bar"></i>
                    <p>Report</p>
                </div>
            </div>
        <?php
    }
    if($file == "report.php") {
        ?>
        <div class="profile button active" onclick="location.href='profile.php'">
            <div class="button-l">
                <i class="fad fa-user-circle"></i>
                <p><?php echo $_SESSION['name'] ?></p>
            </div>
            <div class="button-r">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <?php
        } else if($_SESSION['type'] == 1) {
            ?>
            <div class="profile button" onclick="location.href='profile.php'">
                <div class="button-l">
                    <i class="fad fa-user-circle"></i>
                    <p><?php echo $_SESSION['name'] ?></p>
                </div>
            </div>
        <?php
    }
    ?>
</nav>