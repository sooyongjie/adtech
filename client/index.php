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
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/client/client.css" />
    <link rel="stylesheet" type="text/css" href="../css/client/client-landing-page.css" />
</head>

<body>
    <?php include_once("nav.php") ?>

    <div class="container">
        <div class="button" onclick="location.href='new-request.php'">
            <i class="fal fa-sticky-note fa-2x"></i>
            <p>Service Request</p>
        </div>
        <div class="button" onclick="location.href='requests.php'">
            <i class="fal fa-history fa-2x"></i>
            <p>Service Request</p>
        </div>
    </div>
</body>

</html>