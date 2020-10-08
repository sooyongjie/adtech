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
    <link rel="stylesheet" type="text/css" href="../css/client.css" />
    <link rel="stylesheet" type="text/css" href="../css/client-new-request.css" />
</head>

<body>
    <?php include_once("nav-back-button.php") ?>
    <div class="container">
        <form action="">
            <!-- <div class="form-header" onclick="location.href='client.html'">
                <i class="fas fa-arrow-left fa-md"></i>
                <h2>Request Form</h2>
            </div> -->
            <h2>Request Form</h2>
            <label for="">Summary of issue</label>
            <input type="text" placeholder="Enter text">
            <label for="">Priority</label>
            <div class="radio">
                <input type="radio" value="ok">
                <span>Normal</span>
                <input type="radio" value="ok">
                <span>Urgent</span>
            </div>
            <button type="button">Submit</button>
        </form>
    </div>
</body>

</html>