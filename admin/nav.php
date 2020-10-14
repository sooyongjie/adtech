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
    if($file == "employee.php") {
        ?>
        <div class="button active" onclick="location.href='employee.php'">
            <div class="button-l">
                <i class="fas fa-users"></i>
                <p>Employee</p>
            </div>
            <div class="button-r">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <?php
        } else {
            ?>
            <div class="button" onclick="location.href='employee.php'">
                <div class="button-l">
                    <i class="fas fa-users"></i>
                    <p>Employee</p>
                </div>
            </div>
            <?php
        }
    // if CEO
    if($_SESSION['userType'] == "1" && $file == "report.php") {
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
        } else if($_SESSION['userType'] == 1) {
            ?>
            <div class="button" onclick="location.href='report.php'">
                <div class="button-l">
                    <i class="fas fa-chart-bar"></i>
                    <p>Report</p>
                </div>
            </div>
        <?php
    }
    // if Project Manager
    if($_SESSION['type'] == "2" && $file == "report.php") {
        ?>
        <div class="button active" onclick="location.href='report.php'">
            <div class="button-l">
                <i class="fas fa-chart-bar"></i>
                <p>Employee Status</p>
            </div>
            <div class="button-r">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <?php
        } else if($_SESSION['type'] == 2) {
            ?>
            <div class="button" onclick="location.href='report.php'">
                <div class="button-l">
                    <i class="fas fa-chart-bar"></i>
                    <p>Employee Status</p>
                </div>
            </div>
        <?php
    }
    ?>
</nav>