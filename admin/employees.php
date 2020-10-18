<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/employees.css" />
    <?php
    include_once("../head.php");
    ?>
</head>

<body>
    <?php
    $file = "employees.php";
    include_once("nav.php");
    unset($_SESSION['empID']);
    ?>
    <div class="container">
        <div class="header">
            <h2>Employees</h2>
            <button class="heading-btn" onclick="location.href='employee-add.php'">
                <i class="fas fa-plus"></i>
                <span>Add</span>
            </button>
        </div>
        <div class="card">
            <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM `employee`";
            $result = $db->query($query);
            if ($result->num_rows > 0) { 
                ?>
                <table>
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Current Jobs</th>
                        <th class="tr-button-heading"></th>
                    </tr>
                <?php
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr class="<?php echo "pending-".$row['empID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                        <td><?php echo '#'.$row['empID'] ?></td>
                        <td><?php echo $row['empName'] ?></td>
                        <td>
                            <?php
                            if($row['type'] == 1) {
                                echo "CEO";
                            } else if($row['type'] == 2) {
                                echo "Project Manager";
                            } else {
                                echo "Employee";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query2 = "SELECT COUNT(`status`) AS NumberOfJobs FROM request WHERE status <> 'Completed' AND empID = '".$row['empID']."'";
                            $result2 = $db->query($query2);
                            if($row2 = $result2->fetch_assoc()) {
                                echo $row2['NumberOfJobs'];
                            }
                            ?>
                        </td>
                        <td class="submit-btn">
                            <form action="employee-view.php" method="POST">
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
                ?>
                    <p>There are no employees. What the fuck.</p>
                <?php
            }
            ?>
            </table>
        </div>
    </div>
</body>
<script src="js/dashboard.js"></script>
</html>