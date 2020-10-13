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
    <link rel="stylesheet" type="text/css" href="../css/admin/request-edit.css" />
</head>

<body>
    <?php
        $file = "dashboard.php";
        include_once("nav.php");
    ?>
    <div class="container">
        <div class="back" onclick="location.href='dashboard.php'">
            <i class="fas fa-arrow-left"></i>
            <h2>New Requests</h2>
        </div>
        <form action="request-update.php" class="content">
            <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM `request` WHERE `reqID` = '".$_POST['reqID'].   "'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <h3>Request #<?php echo $row['reqID'] ?></h3>
                    <div class="row c4">
                        <label for="">Request ID</label>
                        <label for="">User ID</label>
                        <label for="">Employee ID</label>
                        <label for="">Category</label>
                        <input type="text" name="reqID" value="<?php echo $row['reqID'] ?>" class="readonly" readonly>
                        <input type="text" name="uid" value="<?php echo $row['uid'] ?>" class="readonly" readonly>
                        <input type="text" name="empID" value="<?php echo $row['empID'] ?>" class="readonly" readonly>
                        <input type="text" name="category" value="<?php echo $row['category'] ?>" class="readonly" readonly>
                    </div>
                    <div class="row c2">
                        <label for="">Description</label>
                        <label for="">Date of Creation</label>
                        <input type="text" name="description" value="<?php echo $row['description'] ?>" class="readonly" readonly>
                        <input type="text" name="dateOfCreation" value="<?php echo $row['dateOfCreation'] ?>" class="readonly" readonly>
                    </div>
                    <label for="">Status</label>
                    <input type="text" name="status" value="<?php echo $row['status'] ?>" class="editable input-status">
                    <button type="submit">Update</button>
                    <?php
                }
            } else {
                ?>
                    <p>No subjects are taught by you.</p>
                <?php
            }
            ?>
        </form>
    </div>
    </div>
</body>

</html>