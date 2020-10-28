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
    $file = "dashboard.php";
    include_once("nav.php");
    unset($_SESSION['reqID']);
    ?>
    <div class="container">
        <h2>Pending Requests</h2>
        <div class="card">
            <?php
            include_once("func/dashboard.php");
            $requests = getPendingRequests();
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
                    <tr class="<?php echo "pending-".$row['reqID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
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
        <!-- Ongoing requests -->
        <h2>Ongoing Requests</h2>
        <div class="card new-requests">
            <?php
            $requests = getOngoingRequests();
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
                    <tr class="<?php echo "pending-".$row['reqID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
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
        <!-- All requests -->
        <h2>All Requests</h2>
        <div class="card new-requests">
            <?php
            $requests = getAllRequests();
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
                    <tr class="<?php echo "all-".$row['reqID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
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
</body>
<script src="js/dashboard.js"></script>
</html>