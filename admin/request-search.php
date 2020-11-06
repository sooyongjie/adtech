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
    $file = "requests.php";
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
            <div class="back" onclick="location.href='requests.php'">
                <i class="fas fa-arrow-left"></i>
                <h2>Pending Requests</h2>
            </div>
            <form action="request-search.php" method="post" class="search-bar" autocomplete="off">
                <input type="number" name="search" placeholder="Search requests">
                <i class="far fa-search" onclick="document.getElementById('.search-bar').submit()"></i>
            </form>
        </div>
        <div class="card">
            <?php
            include_once("func/requests.php");
            if($_SESSION['type'] != 3) {
                $requests = getRequest($_SESSION['search']);
            } else $requests = getTechnicianRequest($_SESSION['search'])    ;
           
            if($requests == 0) {
                exit();
            }
            ?>
            <table>
                <tr>
                    <th onclick="document.querySelector('#request').submit()">Request ID</th>
                    <th onclick="document.querySelector('#category').submit()">Category</th>
                    <th onclick="document.querySelector('#date').submit()">Date</th>
                    <th onclick="document.querySelector('#date').submit()">Time</th>
                    <th onclick="document.querySelector('#status').submit()">Status</th>
                    <th class="tr-button-heading"></th>
                </tr>
                <?php
                foreach($requests as $row) { 
                    ?>
                <tr class="<?php echo "pending-".$row['reqID'] ?>" onmouseover="showButton(this)"
                    onmouseout="hideButton(this)">
                    <td><?php echo '#'.$row['reqID'] ?></td>
                    <td><?php echo $row['category'] ?></td>
                    <td><?php echo date("Y/m/d",strtotime($row['dateOfCreation'])) ?></td>
                    <td><?php echo date("g:ia",strtotime($row['dateOfCreation'])) ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td class="submit-btn">
                        <form action="request-view.php" method="POST">
                            <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                            <button type="submit" id="<?php echo "pending-".$row['reqID'] ?>">
                                <i class="fas fa-arrow-circle-right "></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
    </div>
    <form action="func/dashboard-sort.php" method="post" id="request">
        <input type="hidden" name="sort" value="reqID">
    </form>
    <form action="func/dashboard-sort.php" method="post" id="category">
        <input type="hidden" name="sort" value="category">
    </form>
    <form action="func/dashboard-sort.php" method="post" id="date">
        <input type="hidden" name="sort" value="dateOfCreation">
    </form>
    <form action="func/dashboard-sort.php" method="post" id="status">
        <input type="hidden" name="sort" value="status">
    </form>
    <!-- offset -->
    <form action="">
        <input type="hidden" name="offset" value="0">
    </form>
</body>
<script src="js/dashboard.js"></script>
<script src="js/replace-window-state.js"></script>

</html>