<?php
session_start();

if(!isset($_SESSION['uid'])) {
    header("Location: index.php"); 
}

?>

<nav>
    <h1>Ad<span>tech</span></h1>
    <?php
    if($file == "requests.php") {
        ?>
        <div class="button active" onclick="location.href='requests.php'">
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
        <div class="button" onclick="location.href='requests.php'">
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
    // Project Manager
    if($_SESSION['type'] != "3" && $file == "billing.php") {
        ?>
        <div class="button active" onclick="location.href='billing.php'">
            <div class="button-l">
                <i class="fas fa-money-check-alt"></i>
                <p>Billing</p>
            </div>
            <div class="button-r">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="button" onclick="location.href='billing.php'">
            <div class="button-l">
                <i class="fas fa-money-check-alt"></i>
                <p>Billing</p>
            </div>
        </div>
        <?php
    }
    // Project Manager
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
    // Alert
    include_once("../db_connect.php");
    $query = "SELECT reqID, dateOfCreation FROM `request`";
    $result = $db->query($query);
    if ($result->num_rows > 0) { 
        if($row = $result->fetch_assoc()) {
            $dot = "<div class='dot'></div>";
        }
    }
    if($file == "alerts.php") {
        ?>
        <div class="button active" onclick="location.href='alerts.php'">
            <div class="button-l">
                <i class="fas fa-bell"></i>
                <p>Alerts</p> <?php
                if(isset($dot)) {
                    echo $dot;
                } ?>
            </div>
            <div class="button-r">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <?php
        } else {
            ?>
            <div class="button" onclick="location.href='alerts.php'">
                <div class="button-l">
                    <i class="fas fa-bell"></i>
                    <p>Alerts</p> <?php
                    if(isset($dot)) {
                        echo $dot;
                    } ?>
                </div>
            </div>
        <?php
    }
    // Profile
    if($file == "profile.php") {
        ?>
        <div class="profile button active" onclick="location.href='profile.php'">
            <div class="button-l">
                <i class="fad fa-user-circle"></i>
                <p><?php echo $_SESSION['name'] ?></p>
            </div>
        </div>
        <?php
        } else {
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