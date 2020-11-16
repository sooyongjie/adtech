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
    unset($_SESSION['reqID']);
    unset($_SESSION['search']);
    ?>
    <div class="container">
        <div class="heading">
            <h2>Pending Requests</h2>
            <form action="request-search.php" method="post" class="search-bar" autocomplete="off">
                <input type="number" name="search" placeholder="Search requests">
                <i class="far fa-search" onclick="document.getElementById('.search-bar').submit()"></i>
            </form>
        </div>
        <div class="card">
            <?php
            include_once("func/requests.php");
            if($_SESSION['type'] != 3) {
                $requests = getPendingRequests();
            } else $requests = getTechnicianPendingRequests();

            if($requests != 0) {
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
                </table><?php
            }
            ?>
        </div>
        <!-- Ongoing requests -->
        <h2>Ongoing Requests</h2>
        <div class="card new-requests">
            <?php
            if($_SESSION['type'] != 3) {
                $requests = getOngoingRequests();
            } else $requests = getTechnicianOngoingRequests();

            if($requests != 0) {
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
                </table><?php
            } ?>
        </div>
        <!-- All requests -->
        <h2>All Requests</h2>
        <div class="card new-requests">
            <?php
            if($_SESSION['type'] != 3) {
                $requests = getAllRequests();
            } else $requests = getAllTechnicianRequests();

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
                <tr class="<?php echo "all-".$row['reqID'] ?>" onmouseover="showButton(this)"
                    onmouseout="hideButton(this)">
                    <td><?php echo '#'.$row['reqID'] ?></td>
                    <td><?php echo $row['category'] ?></td>
                    <td><?php echo date("Y/m/d",strtotime($row['dateOfCreation'])) ?></td>
                    <td><?php echo date("g:ia",strtotime($row['dateOfCreation'])) ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td class="submit-btn">
                        <form action="request-view.php" method="POST">
                            <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                            <button type="submit" id="<?php echo "all-".$row['reqID'] ?>">
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

            if($num == 0) $num++;
            if(($count[0]['count']/5) - $num >= 0) $num++;
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
    <form action="func/sort.php" method="post" id="request">
        <input type="hidden" name="page" value="requests.php">
        <input type="hidden" name="sort" value="reqID">
    </form>
    <form action="func/sort.php" method="post" id="category">
        <input type="hidden" name="page" value="requests.php">
        <input type="hidden" name="sort" value="category">
    </form>
    <form action="func/sort.php" method="post" id="date">
        <input type="hidden" name="sort" value="dateOfCreation">
        <input type="hidden" name="page" value="requests.php">
    </form>
    <form action="func/sort.php" method="post" id="status">
        <input type="hidden" name="page" value="requests.php">
        <input type="hidden" name="sort" value="status">
    </form>
</body>
<script src="js/dashboard.js"></script>

</html>