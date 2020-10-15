<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?php
    include_once("../head.php");
    ?>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/detail-view.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/employee-view.css" />
</head>

<body>
    <?php
    $file = "dashboard.php";
    include_once("nav.php");
    if(!isset($_SESSION['empID'])) {
        $_SESSION['empID'] = $_POST['empID'];
    };
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
                        <form class="row c4">
                            <label for="">ID</label>
                            <label for="">Name</label>
                            <label for="">Type</label>
                            <label for="">Current Jobs</label>
                            <input type="text" name="" value="<?php echo $row['empID'] ?>" class="readonly" readonly/>
                            <input type="text" name="" value="<?php echo $row['empName'] ?>" class="editable" />
                            <input type="text" name="" value="<?php echo $row['type'] ?>" class="editable" />
                            <?php
                            $query2 = "SELECT COUNT(`status`) AS CurrentJobs FROM request WHERE status <> 'Completed' AND empID = '".$row['empID']."'";
                            $result2 = $db->query($query2);
                            if($row2 = $result2->fetch_assoc()) { ?>
                                <input type="text" name="" value="<?php echo $row2['CurrentJobs'] ?>" class="readonly" readonly/> <?php
                            }
                            ?>
                        </form>
                        <button class="submit">Submit</button>
                    </div>
                    <?php
                }
            } else {
                ?> <p>There are no employees.</p> <?php
            } ?>
    </div>
    </div>
</body>
<script src="js/replace-window-state.js"></script>
</html>