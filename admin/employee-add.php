<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?php
    include_once("../head.php");
    ?>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/detail-view.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/employee-add.css" />
</head>

<body>
    <?php
    $file = "employees.php";
    include_once("nav.php");
    ?>
    <div class="container">
        <div class="back" onclick="location.href='employees.php'">
            <i class="fas fa-arrow-left"></i>
            <h2>New Employee</h2>
        </div>
            <div class="content">
                <h3>Employee</h3>
                <form action="employee-insert.php" method="post" class="row c4">
                    <label for="">Employee Name</label>
                    <label for="">Employee Position</label>
                    <label for="">Temporary Password</label>
                    <label></label>
                    <input type="text" name="empName" class="editable" />
                    <input type="number" name="type" class="editable" />
                    <input type="password" name="password" class="editable" />
                    <button class="submit">Submit</button>
                </form>
            </div>
    </div>
    </div>
</body>
<script src="js/replace-window-state.js"></script>
</html>