<!DOCTYPE html>
<html lang="en">
<!-- Display all request -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Requests</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/all.css">
    <!--load all styles -->
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/client/client.css" />
    <link rel="stylesheet" type="text/css" href="../css/client/client-requests.css" />
</style>
</head>

<body>
    <?php include_once("nav-back-button.php") ?>
    <div class="container">
    <?php
            include_once("../db_connect.php");
            $query = "SELECT * FROM request WHERE `uid` = '".$_SESSION['cID']."'";
            $result = $db->query($query);
            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) { ?>
                    <div class="request">
                        <h2>Request <?php echo " #" . $row['reqID'] ?></h2>
                        <label for="">Category of request</label>
                        <p><?php echo $row['category'] ?></p>
                        <label for="">Description of request</label>
                        <p><?php echo $row['description'] ?></p>
                        <label for="">Status</label>
                        <p><?php echo $row['status'] ?></p>
                        <?php
                        if ($row['status'] == 'Paid' && is_null($row['feedbackStatus'])) { ?>
                            <form action="feedback.php" method="POST">
                                <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                                <button type="submit">Feedback</button>
                            </form> <?php   
                        }
                        else if ($row['status'] == 'Completed'){ ?>
                            <form action="payment.php" method="POST">
                                <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                                <button type="submit">Make Payment</button>
                            </form> <?php   
                        }
                        else if ($row['feedbackStatus'] == TRUE){ ?>
                            <label for="">Submitted Feedback</label> <?php   
                        } ?>
                    </div> <?php  
                }
            } else {
                ?>
                <p>No history on service request.</p>
            <?php
        }
        ?>
    </div>
</body>

</html>