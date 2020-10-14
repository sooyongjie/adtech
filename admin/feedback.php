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
    $file = "feedback.php";
    include_once("nav.php");
    ?>
    <div class="container">
        <h2>Feedback</h2>
        <div class="content new-requests">
            <table>
                <tr>
                    <th>Feedback#</th>
                    <th>Request ID</th>
                    <th>Comments</th>
                    <th>Rating</th>
                    <th class="tr-button-heading"></th>
                </tr>
            <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM `feedback`";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr id="<?php echo "row-".$row['reqID'] ?>" class="<?php echo $row['reqID'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                        <td><?php echo '#'.$row['feedbackNo'] ?></td>
                        <td>
                            <form action="request-view.php" method="post" id="<?php echo $row['reqID'] ?>">
                                <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                            </form>
                            <a onclick="document.getElementById('<?php echo $row['reqID'] ?>').submit()"><?php echo '#'.$row['reqID'] ?></a>
                        </td>
                        <td><?php echo $row['feedbackComment'] ?></td>
                        <td><?php echo $row['feedbackRating'] ?></td>
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
</body>

</html>