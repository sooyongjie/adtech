<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?php
    include_once("../head.php");
    ?>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/detail-view.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/employee-view.css" />
</head>

<body>
    <?php
    $file = "employees.php";
    include_once("nav.php");
    ?>
    <div class="container">
        <div class="back" onclick="location.href='employees.php'">
            <i class="fas fa-arrow-left"></i>
            <h2>Employees</h2>
        </div>
            <div class="content">
                <h3>Add employee</h3>
            </div>
    </div>
    </div>
</body>
<script src="js/replace-window-state.js"></script>
</html>