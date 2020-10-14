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
    if(!isset($_SESSION['reqID'])) {
        $_SESSION['reqID'] = $_POST['reqID'];
    } else if(isset($_POST['reqID'])) {
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
            $query = "SELECT * FROM `request` WHERE `reqID` = '".$_SESSION['reqID']."'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc()) { ?>
                    <div action="request-assign.php" method="POST" class="content">
                        <h3>Request #<?php echo $row['reqID'] ?></h3>
                        <div class="row c4">
                            <label for="">Request ID</label>
                            <label for="">User ID</label>
                            <label for="">Employee ID</label>
                            <label for="">Category</label>
                            <p><?php echo $row['reqID'] ?></p>
                            <p><?php echo $row['uid'] ?></p>
                            <p><?php echo $row['empID'] ?></p>
                            <p><?php echo $row['category'] ?></p>
                        </div>
                        <div class="row c2">
                            <label for="">Description</label>
                            <label for="">Date of Creation</label>
                            <p><?php echo $row['description'] ?></p>
                            <p><?php echo $row['dateOfCreation'] ?></p>
                        </div>
                        <?php
                        if($row['status'] == "Pending") { ?> 
                            <form action="request-assign.php" method="post" class="form-status">
                                <label for="">Status</label>
                                <!-- <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>" /> -->
                                <p><?php echo $row['status'] ?></p>
                                <button type="submit">Assign Task</button> 
                            </form> <?php
                        }
                        else if($row['status'] != "Pending" && $row['status'] != "Completed") { ?> 
                            <form action="request-status-update.php" method="post" class="form-status">
                                <label for="">Status</label>
                                <!-- <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>" /> -->
                                <input type="text" name="status" value="<?php echo $row['status'] ?>" class="editable" autocomplete="off">
                                <button type="submit">Update</button> 
                            </form> <?php
                        } 
                        ?>
                    </div>
                    <?php
                }
            } else {
                ?> <p>No subjects are taught by you.</p> <?php
            } ?>
    </div>
    </div>
</body>

</html>