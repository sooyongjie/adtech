<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?php
    include_once("../head.php");
    ?>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/detail-view.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/employees.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/employee-view.css" />
</head>

<body>
    <?php
    $file = "employees.php";
    include_once("nav.php");
    if(isset($_POST['empID'])) {
        $_SESSION['empID'] = $_POST['empID'];
    };
    ?>
    <div class="container">
        <div class="header">
            <div class="back" onclick="location.href='employees.php'">
            <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM `employee` WHERE `empID` = '".$_SESSION['empID']."'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc()) { ?>
                        <i class="fas fa-arrow-left"></i>
                        <h2><?php echo $row['empName'] ?></h2>
                    </div>
                    <button class="heading-btn" onclick="location.href='employee-delete.php'" type="button">
                        <i class="fas fa-trash"></i>
                        <span>Delete</span>
                    </button>
                    <button class="heading-btn" onclick="location.href='employee-reset-password.php'" type="button">
                        <i class="fas fa-times"></i>
                        <span>Reset Password</span>
                    </button>
                </div>
                <div class="card">
                    <h3>Employee Details</h3>
                    <form action="employee-update.php" method="post" class="row c6">
                        <label for="">ID</label>
                        <label for="">Name</label>
                        <label for="">Type</label>
                        <label for="">Current Jobs</label>
                        <label for="">Status</label>
                        <label></label>
                        <input type="text" name="empID" value="<?php echo $row['empID'] ?>" class="readonly" readonly/>
                        <input type="text" name="empName" value="<?php echo $row['empName'] ?>" class="editable" />
                        <input type="text" name="type" value="<?php echo $row['type'] ?>" class="editable" />
                        <?php
                        $query2 = "SELECT COUNT(`status`) AS CurrentJobs FROM request WHERE status <> 'Completed' AND empID = '".$row['empID']."'";
                        $result2 = $db->query($query2);
                        if($row2 = $result2->fetch_assoc()) { ?>
                            <input type="text" name="" value="<?php echo $row2['CurrentJobs'] ?>" class="readonly" readonly/> <?php
                        }
                        ?>
                        <input type="text" name="status" value="<?php echo $row['status'] ?>" class="readonly" readonly/>
                        <button class="submit">Submit</button>
                    </form>
                </div>
                <?php
            }
        } else echo "<p>There are no employees.</p>";
        ?>        
        <?php
        include_once("../db_connect.php");
        $query = "SELECT * FROM `overtime` WHERE `empID` = '".$_SESSION['empID']."'";
        $result = $db->query($query); ?>
        <h2>Overtime</h2>
        <div class="card"> <?php
            if ($result->num_rows > 0) { ?>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Overtime (hours)</th>
                        <th>Sign off</th>
                    </tr> <?php
                while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo date("Y/m/d", strtotime($row['date'])) ?></td>
                        <td><?php echo date("l", strtotime($row['date'])) ?></td>
                        <td><?php echo $row['hours'] ?></td>
                        <td><?php echo date("g:ia", strtotime("18:00:00")+(60*60*$row['hours'])) ?></td>
                    </tr>
                    <?php
                }
                echo "</table>";
            } else {
                ?> <p>There is no overtime history.</p> <?php
            } 
        ?>
        </div>
        <div class="card overtime-container">
            <h3>Add Overtime</h3>
            <form action="overtime-insert.php" method="post" class="row c3">
                <label for="">Date</label>
                <label for="">Hours</label>
                <label></label>
                <input type="date" name="date" value="" class="editable">
                <input type="number" name="hours" placeholder="1" class="editable">
                <button class="submit">Add</button>
            </form>
        </div>
    </div>
</body>
<script src="js/replace-window-state.js"></script>
</html>