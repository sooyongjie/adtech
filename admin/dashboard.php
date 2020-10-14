<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/all.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
</head>

<body>
    <?php
    $file = "dashboard.php";
    include_once("nav.php");
    ?>
    <div class="container">
        <h2>Pending Requests</h2>
        <div class="content new-requests">
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
            include_once("../db_connect.php");
            $query = "SELECT * FROM `request` WHERE status = 'Pending'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr id="<?php echo "row-".$row['reqID'] ?>" class="<?php echo $row['reqID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                        <td><?php echo '#'.$row['reqID'] ?></td>
                        <td><?php echo $row['category'] ?></td>
                        <td><?php echo date("Y/m/d",strtotime($row['dateOfCreation'])) ?></td>
                        <td><?php echo date("g:ia",strtotime($row['dateOfCreation'])) ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td class="submit-btn">
                            <form action="request-edit.php" method="POST">
                                <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                                <button type="submit" id="<?php echo "btn-".$row['reqID'] ?>">
                                    <i class="fas fa-arrow-circle-right "></i>
                                </button>
                            </form> 
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                    <p>No subjects are taught by you.</p>
                <?php
            }
            ?>
            </table>
        </div>
        <!-- Ongoing requests -->
        <h2>Ongoing Requests</h2>
        <div class="content new-requests">
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
            include_once("../db_connect.php");
            $query = "SELECT * FROM `request` WHERE status <> 'Pending' AND status <> 'Completed'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr id="<?php echo "row-".$row['reqID'] ?>" class="<?php echo $row['reqID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                        <td><?php echo '#'.$row['reqID'] ?></td>
                        <td><?php echo $row['category'] ?></td>
                        <td><?php echo date("Y/m/d",strtotime($row['dateOfCreation'])) ?></td>
                        <td><?php echo date("g:ia",strtotime($row['dateOfCreation'])) ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td class="submit-btn">
                            <form action="request-edit.php" method="POST">
                                <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                                <button type="submit" id="<?php echo "btn-".$row['reqID'] ?>">
                                    <i class="fas fa-arrow-circle-right "></i>
                                </button>
                            </form> 
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                    <p>No subjects are taught by you.</p>
                <?php
            }
            ?>
            </table>
        </div>
        <!-- All requests -->
        <h2>All Requests</h2>
        <div class="content new-requests">
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
            include_once("../db_connect.php");
            $query = "SELECT * FROM `request`";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr id="<?php echo "row-".$row['reqID'] ?>" class="<?php echo $row['reqID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                        <td><?php echo '#'.$row['reqID'] ?></td>
                        <td><?php echo $row['category'] ?></td>
                        <td><?php echo date("Y/m/d",strtotime($row['dateOfCreation'])) ?></td>
                        <td><?php echo date("g:ia",strtotime($row['dateOfCreation'])) ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td class="submit-btn">
                            <form action="request-edit.php" method="POST">
                                <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                                <button type="submit" id="<?php echo "btn-".$row['reqID'] ?>">
                                    <i class="fas fa-arrow-circle-right "></i>
                                </button>
                            </form> 
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                    <p>No subjects are taught by you.</p>
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