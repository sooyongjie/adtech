<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/billing.css" />
    <?php
    include_once("../head.php");
    ?>
</head>

<body>
    <?php
    $file = "billing.php";
    include_once("nav.php");
    ?>
    <div class="container">
        <div class="heading">
            <h2>Billing</h2>
            <form action="billing-search.php" method="post" class="search-bar" autocomplete="off">
                <input type="number" name="search" placeholder="Search billings">
                <i class="far fa-search" onclick="document.getElementById('.search-bar').submit()"></i>
            </form>
        </div>        
        <div class="card new-requests">
            <?php
            include_once("func/billing.php");
            $billings = getAllBillings();
            if($billings != 0) { ?>
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
                    <td> <?php
                        if($row['status'] != "Pending") { ?>
                            <a href="../img/receipt/<?php echo $row['url'] ?>" class="receipt-url">
                                <i class="far fa-file-image"></i>
                                <span><?php echo $row['url'] ?></span>
                            </a> <?php
                        } else {
                            echo "N/A";
                        } ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </table>
            <div class="pagination">
                <?php 
                $count = countBillingRows(); 
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
            </div> <?php
            } ?>
            </div>
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

</html>