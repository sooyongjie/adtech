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
        <div class="content">
            <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM `request` WHERE status = 'Pending' ORDER BY reqID asc";
            $result = $db->query($query);
            if ($result->num_rows > 0) { ?>
                <table>
                    <tr>
                        <th>Request ID</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th class="tr-button-heading"></th>
                    </tr>
                <?php
                while($row = $result->fetch_assoc()) {
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
            } else {
                ?>
                    <p>There are no pending requests.</p>
                <?php
            }
            ?>
            </table>
        </div>
        <!-- Ongoing requests -->
        <h2>Ongoing Requests</h2>
        <div class="content new-requests">
            <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM `request` INNER JOIN `employee` on `request`.empID = `employee`.empID  
            WHERE status <> 'Pending' AND status <> 'Completed' ORDER BY reqID asc";
            $result = $db->query($query);
            if ($result->num_rows > 0) { ?>
                <table>
                    <tr>
                        <th>Request ID</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Employee</th>
                        <th>Status</th>
                        <th class="tr-button-heading"></th>
                    </tr>
                <?php
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr class="<?php echo "ongoing-".$row['reqID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                        <td><?php echo '#'.$row['reqID'] ?></td>
                        <td><?php echo $row['category'] ?></td>
                        <td><?php echo date("Y/m/d",strtotime($row['dateOfCreation'])) ?></td>
                        <td><?php echo $row['empName'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td class="submit-btn">
                            <form action="request-view.php" method="POST">
                                <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                                <button type="submit" id="<?php echo "ongoing-".$row['reqID'] ?>">
                                    <i class="fas fa-arrow-circle-right "></i>
                                </button>
                            </form> 
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                    <p>There are no ongoing request.</p>
                <?php
            }
            ?>
            </table>
        </div>
        <!-- All requests -->
        <h2>All Requests</h2>
        <div class="content new-requests">
            <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM `request` ORDER BY reqID asc";
            $result = $db->query($query);
            if ($result->num_rows > 0) { ?>
                <table>
                    <tr>
                        <th>Request ID</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th class="tr-button-heading"></th>
                    </tr>
                <?php
                while($row = $result->fetch_assoc()) {
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
            } else {
                ?>
                    <p>There are no request.</p>
                <?php
            }
            ?>
            </table>
        </div>
    </div>
    </div>
</body>
<script src="js/dashboard.js"></script>
</html>