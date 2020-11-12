<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/alerts.css" />
    <?php
    include_once("../head.php");
    ?>
</head>

<body>
    <?php
    $file = "alerts.php";
    include_once("nav.php");
    ?>
    <div class="container">
        <div class="header">
            <h2>Alerts</h2>
        </div>
        <div class="alerts-container">
            <div class="card">

            <?php
            include_once("../db_connect.php");
            error_reporting(0);
            $query = "SELECT reqID, dateOfCreation FROM `request` 
            WHERE dateOfCreation <= subdate(current_date, '6') AND dateOfCompletion IS NULL";
            $result = $db->query($query);
        
            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) { 
                    ?>
                    <form action="request-view.php" method="post" id="<?php echo $row['reqID'] ?>">
                        <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                    </form>
                    <a onclick="document.getElementById('<?php echo $row['reqID'] ?>').submit()">
                        <h3>Request #<?php echo $row['reqID'] ?></h3>
                    </a>
                    <p>This request has been ongoing for <?php echo date_diff(new DateTime(date("Y/m/d",strtotime($row['dateOfCreation']))), new DateTime())-> format("%d") ?> days.</p>
                    <?php
                }
            } else { ?>
                <p>There are no overdued requests.</p> <?php
            }
            ?>
            </div> 
        </div>
    </div>
</body>
<script src="js/dashboard.js"></script>
</html>