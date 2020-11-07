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
    $file = "requests.php";
    include_once("nav.php");
    if(isset($_POST['reqID'])) {
        $_SESSION['reqID'] = $_POST['reqID'];
    }
    ?>
    <div class="container">
        <div class="back" onclick="location.href='requests.php'">
            <i class="fas fa-arrow-left"></i>
            <h2>Requests</h2>
        </div>
            <?php
            include_once("func/requests.php");
            $requests = getRequest($_SESSION['reqID']); 
            foreach($requests as $row) { 
            ?>
            <div action="request-assign.php" method="POST" class="card">
                <h3>Request #<?php echo $row['reqID'] ?></h3>
                <div class="row c4">
                    <label for="">Request ID</label>
                    <label for="">User ID</label>
                    <label for="">Employee ID</label>
                    <label for="">Category</label>
                    <p><?php echo $row['reqID'] ?></p>
                    <p><?php echo $row['uid'] ?></p>
                    <p>
                        <?php
                        if(!$row['empID']) {
                            echo "Unassigned";
                        } else echo $row['empID'];
                        ?>
                    </p>
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
                    else if($row['status'] != "Pending") { ?> 
                        <form action="request-status-update.php" method="post" class="form-status"><?php
                            if($_SESSION['type'] != 1) { ?>
                                <input type="text" name="status" value="<?php echo $row['status'] ?>" class="editable" autocomplete="off"> <?php
                            } else {
                                ?>
                                <input type="text" name="status" value="<?php echo $row['status'] ?>" class="readonly" autocomplete="off" readonly> <?php
                            }
                        ?>
                        </form>
                        <?php
                    } 
                    ?>
                </div> <?php
                if($_SESSION['type'] != 1) { ?>
                    <button class="submit" onclick="document.querySelector('.form-status').submit()"> <?php
                    if($row['status'] == "Pending") { 
                        echo "Assign";
                    }
                    else {
                        echo "Update";
                    } ?>
                    </button> <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
        </div>
    </div>
</body>
<script src="js/replace-window-state.js"></script>
</html>