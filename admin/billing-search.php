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
    $file = "billing.php";
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
            <div class="back" onclick="location.href='billing.php'">
                <i class="fas fa-arrow-left"></i>
                <h2>Billing</h2>
            </div>
            <form action="billing-search.php" method="post" class="search-bar" autocomplete="off">
                <input type="number" name="search" value="<?php $_SESSION['search'] ?>" placeholder="Search billings">
                <i class="far fa-search" onclick="document.getElementById('.search-bar').submit()"></i>
            </form>
        </div>        
        <div class="card new-requests">
            <?php
            include_once("func/billing.php");
            $billings = getBilling($_SESSION['search']);
            if($billings == 0) {
                exit();
            }
            ?>
            <table>
                <tr>
                    <th onclick="document.querySelector('#billID').submit()">Bill ID</th>
                    <th onclick="document.querySelector('#reqID').submit()">Request ID</th>
                    <th onclick="document.querySelector('#total').submit()">Total</th>
                    <th onclick="document.querySelector('#status').submit()">Status</th>
                    <th>File</th>
                </tr>
            <?php
            foreach($billings as $row) {
                ?>
                <tr id="<?php echo "row-".$row['billID'] ?>" class="<?php echo $row['billID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                    <td><?php echo '#'.$row['billID'] ?></td>
                    <td>
                        <form action="request-view.php" method="post" id="<?php echo $row['reqID'] ?>">
                            <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                        </form>
                        <a onclick="document.getElementById('<?php echo $row['reqID'] ?>').submit()"><?php echo '#'.$row['reqID'] ?></a>
                    </td>
                    <td><?php echo $row['total'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td>
                        <a href="../img/receipt/<?php echo $row['url'] ?>" class="receipt-url">
                            <i class="far fa-file-image"></i>
                            <span><?php echo $row['url'] ?></span>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </table>
        </div>
    <form action="func/sort.php" method="post" id="billID">
        <input type="hidden" name="sort" value="billID">
        <input type="hidden" name="page" value="billing.php">
    </form>
    <form action="func/sort.php" method="post" id="reqID">
        <input type="hidden" name="sort" value="reqID">
        <input type="hidden" name="page" value="billing.php">
    </form>
    <form action="func/sort.php" method="post" id="total">
        <input type="hidden" name="sort" value="total">
        <input type="hidden" name="page" value="billing.php">
    </form>
    <form action="func/sort.php" method="post" id="status">
        <input type="hidden" name="sort" value="status">
        <input type="hidden" name="page" value="billing.php">
    </form>
</body>
<script src="js/dashboard.js"></script>
<script src="js/replace-window-state.js"></script>

</html>