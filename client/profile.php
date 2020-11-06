<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/all.css">
    <!--load all styles -->
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/client/client.css" />
    <link rel="stylesheet" type="text/css" href="../css/client/client-new-request.css" />
</head>

<body>
    <?php include_once("nav-back-button.php") ?>
    <div class="container">
        <form action="profile-update.php" method="post">
            <!-- <div class="form-header" onclick="location.href='client.html'">
                <i class="fas fa-arrow-left fa-md"></i>
                <h2>Request Form</h2>
            </div> -->
            <h2>Profile</h2>
            <label for="">Name</label>
            <input type="text" name="clientName" value="<?php echo $_SESSION['clientName'] ?>">
            <label for="">New Password</label>
            <input type="password" name="newPassword" placeholder="Enter new password">
            <label for="">Confirm Password</label>
            <input type="password" name="confirmPassword" placeholder="Re-enter password">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>