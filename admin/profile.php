<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/detail-view.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/profile.css" />
    <?php
    include_once("../head.php");
    ?>
</head>

<body>
    <?php
    $file = "profile.php";
    include_once("nav.php");
    ?>
    <div class="container">
        <?php
        include_once("../db_connect.php");
        $query = "SELECT * FROM `employee` WHERE `empID` = '".$_SESSION['uid']."' ";
        $result = $db->query($query);
        if ($result->num_rows == 1) {
            if($row = $result->fetch_assoc()) {
                ?>
                <h2>Profile</h2>
                <div class="card">
                    <h3><?php echo $row['empName'] ?></h3>
                    <form action="user-update.php" method="post" class="row c3">
                        <label for="">ID</label>
                        <label for="">Name</label>
                        <label for="">Type</label>
                        <input type="text" name="" value="<?php echo $row['empID'] ?>" class="readonly" readonly />
                        <input type="text" name="" value="<?php echo $row['empName'] ?>" class="readonly" readonly />
                        <input type="text" name="" value="<?php echo $row['type'] ?>" class="readonly" readonly />
                        <label for="">Old password</label>
                        <label for="">New password</label>
                        <label for="">Confirm password</label>
                        <input type="password" name="" value="" class="editable" />
                        <input type="password" name="" value="" class="editable" />
                        <input type="password" name="" value="" class="editable" />
                    </form>
                    <button class="submit">Update</button>
                </div>                
                <?php
            }
        } else { ?>
            <p>No subjects are taught by you.</p> <?php
        } ?>
    </div>
</body>

</html>