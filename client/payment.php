<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Request Form</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/all.css">
    <!--load all styles -->
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/client/client.css" />
    <link rel="stylesheet" type="text/css" href="../css/client/client-new-request.css" />
    <link rel="stylesheet" type="text/css" href="../css/client/feedback.css" />
</head>

<body>
    <?php include_once("nav-back-button.php") ?>
    <div class="container">
        <form action="payment-insert.php" method="post" enctype="multipart/form-data">
            <h2>Request <?php echo "#".$_POST['reqID'] ?></h2>
            <label for="">Upload Payment</label>
            <input type="file" name="image">
            <input type="hidden" name="reqID" value="<?php echo $_POST['reqID'] ?>">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

<script src="js/feedback.js"></script>