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
        <form action=".php" method="post">
            <!-- <div class="form-header" onclick="location.href='client.html'">
                <i class="fas fa-arrow-left fa-md"></i>
                <h2>Request Form</h2>
            </div> -->
            <h2>Feedback For Request <?php echo "#".$_POST['reqID'] ?></h2>
            <label for="">Payment</label>
            <input type="file">
            <label for="">Service Request Rating</label>
            <div class="star-widget">
                <input type="hidden" name="rate" value="0" id="rating">
                <i id="1" class="fas fa-star" onclick="setRating(1)" onmouseover="hover(1)"></i>
                <i id="2" class="fas fa-star" onclick="setRating(2)" onmouseover="hover(2)"></i>
                <i id="3" class="fas fa-star" onclick="setRating(3)" onmouseover="hover(3)"></i>
                <i id="4" class="fas fa-star" onclick="setRating(4)" onmouseover="hover(4)"></i>
                <i id="5" class="fas fa-star" onclick="setRating(5)" onmouseover="hover(5)"></i>
            </div>
            <label for="">Feedback Comment</label>
            <input type="text" name="textinput" placeholder="Enter comment">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

<script src="js/feedback.js"></script>