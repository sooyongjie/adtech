<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/all.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/request-view.css" />
</head>

<body>
    <?php
    $file = "dashboard.php";
    include_once("nav.php");
    if(!isset($_SESSION['empID'])) {
        $_SESSION['empID'] = $_POST['empID'];
    } else if(isset($_POST['empID'])) {
        $_SESSION['empID'] = $_POST['empID'];
    }
    ?>
    <div class="container">
        <div class="back" onclick="location.href='employees.php'">
            <i class="fas fa-arrow-left"></i>
            <h2>Employees</h2>
        </div>
            <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM `employee` WHERE `empID` = '".$_SESSION['empID']."'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc()) { ?>
                    <div class="content">
                        <h3>Employee #<?php echo $row['empID'] ?></h3>
                        <div class="row c4">
                            <label for="">Request ID</label>
                            <label for="">User ID</label>
                            <label for="">Employee ID</label>
                            <label for="">Current Jobs</label>
                            <p><?php echo $row['empID'] ?></p>
                            <p><?php echo $row['name'] ?></p>
                            <p><?php echo $row['type'] ?></p>
                            <p><?php echo "[tba]" ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?> <p>There are no employees.</p> <?php
            } ?>
    </div>
    </div>
</body>

</html>