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
</head>

<body>
    <?php
    $file = "employees.php";
    include_once("nav.php");
    // unset($_SESSION['reqID']);
    ?>
    <div class="container">
        <h2>Employees</h2>
        <div class="content">
            <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM `employee`";
            $result = $db->query($query);
            if ($result->num_rows > 0) { ?>
                <table>
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Employee Type</th>
                        <th>Current Jobs</th>
                        <th class="tr-button-heading"></th>
                    </tr>
                <?php
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr class="<?php echo "pending-".$row['empID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                        <td><?php echo '#'.$row['empID'] ?></td>
                        <td><?php echo $row['empName'] ?></td>
                        <td><?php echo $row['type'] ?></td>
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