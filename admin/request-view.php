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
    if(!isset($_SESSION['reqID']) && isset($_POST['reqID'])) {
        $_SESSION['reqID'] = $_POST['reqID'];
    }
    ?>
    <div class="container">
        <div class="back" onclick="location.href='dashboard.php'">
            <i class="fas fa-arrow-left"></i>
            <h2>Requests</h2>
        </div>
            <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM `request` INNER JOIN `employee` on `request`.empID = `employee`.empID  
            WHERE reqID = '".$_SESSION['reqID']."' ";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc()) { ?>
                    <div action="request-assign.php" method="POST" class="card">
                        <h3>Request #<?php echo $row['reqID'] ?></h3>
                        <div class="row c4">
                            <label for="">Request ID</label>
                            <label for="">User ID</label>
                            <label for="">Employee ID</label>
                            <label for="">Category</label>
                            <p><?php echo $row['reqID'] ?></p>
                            <p><?php echo $row['uid'] ?></p>
                            <p><?php echo $row['empName'] ?></p>
                            <p><?php echo $row['category'] ?></p>
                        </div>
                        <div class="row c4">
                            <label for="">Description</label>
                            <label for="">Date of Creation</label>
                            <label for="">Status</label>
                            <label></label>
                            <p><?php echo $row['description'] ?></p>
                            <p><?php echo date("Y/m/d",strtotime($row['dateOfCreation'])).", ".date("g:ia",strtotime($row['dateOfCreation'])) ?></p>
                            <?php
                            if($row['status'] == "Pending") { ?> 
                                <form action="request-assign.php" method="post" class="form-status">
                                    <p><?php echo $row['status'] ?></p>
                                </form>
                                 <?php
                            }
                            else if($row['status'] != "Pending" && $row['status'] != "Completed") { ?> 
                                <form action="request-status-update.php" method="post" class="form-status">
                                    <input type="text" name="status" value="<?php echo $row['status'] ?>" class="editable" autocomplete="off">
                                </form>
                                <?php
                            } 
                            ?>
                        </div>
                        <button class="submit" onclick="document.querySelector('.form-status').submit()">
                        <?php
                        if($row['status'] == "Pending") { 
                            echo "Assign";
                        }
                        else if($row['status'] != "Pending" && $row['status'] !=  "Completed") {
                            echo "Update";
                        }
                        ?>
                        </button>
                    </div>
                    <?php
                }
            } else {
                ?> <p>No subjects are taught by you.</p> <?php
            } ?>
    </div>
    </div>
</body>
<script src="js/replace-window-state.js"></script>
</html>