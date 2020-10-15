<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/request-assign.css" />
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
        <div class="back" onclick="location.href='request-view.php'">
            <i class="fas fa-arrow-left"></i>
            <h2>Request <?php echo "#".$_SESSION['reqID'] ?></h2>
        </div>
        <div class="content">
            <h3>Task Assignment</h3>
            <table>
                <tr>
                    <th>Employee</th>
                    <th></th>
                </tr>
                <?php
                include_once("../db_connect.php");
                $query = "SELECT * FROM `request` INNER JOIN `employee` on `request`.empID = `employee`.empID  
                WHERE status <> 'Pending' AND status <> 'Completed'";
                $result = $db->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { ?>
                    <tr class="<?php echo "pending-".$row['empID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                        <td><?php echo $row['empName'] ?></td>
                        <td class="submit-btn">
                            <form action="request-assign-update.php" method="post">
                                <input type="hidden" name="empID" value="<?php echo $row['empID'] ?>">
                                <button type="submit" id="<?php echo "pending-".$row['empID'] ?>">
                                    <i class="fas fa-arrow-circle-right "></i>
                                </button>
                            </form> 
                        </td>
                    </tr>
                    <?php
                    }
                } else {
                    ?> <p>No subjects are taught by you.</p> <?php
                } ?>
            </table>
        </div>
    </div>
</body>
<script src="js/dashboard.js"></script>
<script src="js/replace-window-state.js"></script>
</html>