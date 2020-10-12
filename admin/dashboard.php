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
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
</head>

<body>
    <?php
        $file = "dashboard.php";
        include_once("nav.php");
    ?>
    <div class="container">
        <h2>New Requests</h2>
        <div action="request-load.php" class="new-requests">
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
                    <tr>
                        <td><?php echo $row['reqID'] ?></td>
                        <td><?php echo $row['category'] ?></td>
                        <td><?php echo date("Y/m/d",strtotime($row['dateOfCreation'])) ?></td>
                        <td><?php echo date("g:ia",strtotime($row['dateOfCreation'])) ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td>
                            <form action="get-request" method="POST">
                                <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                                <button type="submit"><i class="fas fa-arrow-circle-right"></i></button>
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

</html>