<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/detail-view.css" />
    <?php
    include_once("../head.php");
    ?>
</head>

<body>
    <?php
    $file = "dashboard.php";
    include_once("nav.php");
    ?>
    <div class="container">
        <div class="back" onclick="location.href='requests.php'">
            <i class="fas fa-arrow-left"></i>
            <h2>Bill</h2>
        </div>
        <?php
        include_once("func/requests.php");
        $requests = getRequest($_SESSION['reqID']); 
        foreach($requests as $row) { 
        ?>
        <form action="bill-insert.php" method="post" class="card">
            <h3>Request #<?php echo $row['reqID'] ?></h3>
            <div class="row c4">
                <label for="">Request ID</label>
                <label for="">Category</label>
                <label for="">Hourly Rate</label>
                <label for="">Total hours</label>
                <p><?php echo $row['reqID'] ?></p>
                <p><?php echo $row['category'] ?></p>
                <p>
                    <?php 
                    include_once("func/billing.php");
                    $rate = calculateRate($row['category']);
                    echo "RM".$rate;
                    ?>
                    <input type="hidden" name="rate" value="<?php echo $rate ?>">
                </p>
                <input type="text" name="hours" class="editable" autocomplete="off" required>
            </div>
            <button class="submit" onclick="document.querySelector('.form-status').submit()">Submit</button>
        </form>
        <?php
        }
        ?>
    </div>
</body>
<script src="js/replace-window-state.js"></script>
</html>