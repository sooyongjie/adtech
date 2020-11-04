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
    unset($_SESSION['reqID']);
    unset($_SESSION['search']);
    ?>
    <div class="container">
        <div class="heading">
            <h2>Clients</h2>
            <form action="clients-search.php" method="post" class="search-bar" autocomplete="off">
                <input type="number" name="search" placeholder="Search requests">
                <i class="far fa-search" onclick="document.getElementById('.search-bar').submit()"></i>
            </form>
        </div>
        <div class="card">
            <?php
            include_once("func/clients.php");
            $clients = getAllClients();
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
                <tr class="<?php echo "client".$row['clientID'] ?>" onmouseover="showButton(this)"
                    onmouseout="hideButton(this)">
                    <td><?php echo '#'.$row['clientID'] ?></td>
                    <td><?php echo $row['clientName']; ?></td>
                    <td class="submit-btn"><?php 
                        if($row['status'] == 0) { ?>
                            <form action="client-reset-password.php" method="POST">
                                <input type="hidden" name="clientID" value="<?php echo $row['clientID'] ?>">
                                <button type="submit" id="<?php echo "client".$row['clientID'] ?>">
                                    Reset to default password
                                </button>
                            </form>
                            <?php
                        } else if($row['status'] == 1) {
                            echo "Normal";
                        }
                        ?>
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

</html>