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
                    <form action="profile-update.php" method="post" id="form-profile" class="row c3">
                        <label for="">ID</label>
                        <label for="">Name</label>
                        <label for="">Type</label>
                        <input type="text" name="empID" value="<?php echo $row['empID'] ?>" class="readonly" readonly />
                        <input type="text" name="empName" value="<?php echo $row['empName'] ?>" class="readonly" readonly />
                        <input type="text" name="type" value="<?php echo $row['type'] ?>" class="readonly" readonly />
                        <label for="">New password</label>
                        <label for="">Confirm password</label>
                        <label></label>
                        <input type="password" name="newPassword" value="" class="editable" />
                        <input type="password" name="confirmPassword" value="" class="editable" />
                        <p><?php
                            if(isset($_SESSION['errMsg'])) {
                                echo $_SESSION['errMsg'];
                                unset($_SESSION['errMsg']);
                            }
                            ?>
                        </p>
                    </form>
                    <button class="submit" onclick="document.querySelector('#form-profile').submit()">Update</button>
                </div>                
                <?php
            }
        } else { ?>
            <p>No subjects are taught by you.</p> <?php
        } ?>
    </div>
</body>

</html>