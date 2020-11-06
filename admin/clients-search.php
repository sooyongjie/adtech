<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <?php
    include_once("../head.php");
    ?>
</head>

<body>
    <?php
    $file = "clients.php";
    include_once("nav.php");
    if(isset($_POST['search'])) {
        $_SESSION['search'] = $_POST['search'];
    }
    else if(!isset($_SESSION['search'])) {
        $_SESSION['search'] = 0;
    }
    ?>
    <div class="container">
        <div class="heading">
            <div class="back" onclick="location.href='clients.php'">
                <i class="fas fa-arrow-left"></i>
                <h2>Clients</h2>
            </div>            
            <form action="clients-search.php" method="post" class="search-bar" autocomplete="off">
                <input type="text" name="search" placeholder="Search clients">
                <i class="far fa-search" onclick="document.getElementById('.search-bar').submit()"></i>
            </form>
        </div>
        <div class="card">
            <?php
            include_once("func/clients.php");
            $clients = getClient($_SESSION['search']);
            if($clients == 0) exit();
            ?>
            <table>
                <tr>
                    <th onclick="document.querySelector('#clientID').submit()">Client ID</th>
                    <th onclick="document.querySelector('#clientName').submit()">Client Name</th>
                    <th onclick="document.querySelector('#status').submit()">Status</th>
                    <th class="tr-button-heading"></th>
                </tr>
                <?php
                foreach($clients as $row) { 
                    ?>
                <tr class="<?php echo "pending-".$row['clientID'] ?>" onmouseover="showButton(this)"
                    onmouseout="hideButton(this)">
                    <td><?php echo '#'.$row['clientID'] ?></td>
                    <td><?php echo '#'.$row['clientName'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
    <form action="func/sort.php" method="post" id="request">
        <input type="hidden" name="page" value="clients.php">
        <input type="hidden" name="sort" value="clientID">
    </form>
    <form action="func/sort.php" method="post" id="category">
        <input type="hidden" name="page" value="clients.php">
        <input type="hidden" name="sort" value="clientName">
    </form>
    <form action="func/sort.php" method="post" id="date">
        <input type="hidden" name="page" value="clients.php">
        <input type="hidden" name="sort" value="status">
    </form>
</body>
<script src="js/dashboard.js"></script>
<script src="js/replace-window-state.js"></script>
</html>