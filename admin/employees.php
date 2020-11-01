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
    ?>
    <div class="container">
        <div class="heading">
            <div class="header">
                <h2>Employees</h2>
                <button class="heading-btn" onclick="location.href='employee-add.php'">
                    <i class="fas fa-plus"></i>
                    <span>Add</span>
                </button>
            </div>
            <form action="employees-search.php" method="post" class="search-bar" autocomplete="off">
                <input type="number" name="search" placeholder="Search employee">
                <i class="far fa-search" onclick="document.getElementById('.search-bar').submit()"></i>
            </form>
        </div>
        <div class="card">
            <?php
            include_once("func/employees.php");
            $employees = getAllEmployees();
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
            <div class="pagination">
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
        </div>
    </div>
    <form action="func/sort.php" method="post" id="empID">
        <input type="hidden" name="sort" value="empID">
        <input type="hidden" name="page" value="employees.php">
    </form>
    <form action="func/sort.php" method="post" id="empName">
        <input type="hidden" name="sort" value="empName">
        <input type="hidden" name="page" value="employees.php">
    </form>
    <form action="func/sort.php" method="post" id="type">
        <input type="hidden" name="sort" value="type">
        <input type="hidden" name="page" value="employees.php">
    </form>
</body>
<script src="js/dashboard.js"></script>
</html>