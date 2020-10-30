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
    if(isset($_POST['search'])) {
        $_SESSION['search'] = $_POST['search'];
    }
    else if(!isset($_SESSION['search'])) {
        $_SESSION['search'] = 0;
    }
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
            include_once("func/employees.php");
            $employees = getEmployee($_SESSION['search']);
            if($employees == 0) {
                exit();
            }
                ?>
                <table>
                    <tr>
                        <th onclick="document.querySelector('#empID').submit()">Employee ID</th>
                        <th onclick="document.querySelector('#empName').submit()">Name</th>
                        <th onclick="document.querySelector('#type').submit()">Type</th>
                        <th class="tr-button-heading"></th>
                    </tr>
                <?php
                foreach($employees as $row) {
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
            ?>
            </table>
            <?php
            $count = countRows(); 
            $num = round($count[0]['count']/5);
            if ($num == 0) {
                $num = 1;
            }
            for ($i = 0; $i < $num; $i++) {
                ?>
                <button>
                    <a href="?offset=<?php echo $i ?>"><?php echo $i+1 ?></a>
                </button>
                <?php
            }
            ?>
        </div>
    </div>
</body>
<script src="js/dashboard.js"></script>
</html>