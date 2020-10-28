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
    <div class="container" onclick="setRating(2)">
        <form action=".php" method="post">
            <!-- <div class="form-header" onclick="location.href='client.html'">
                <i class="fas fa-arrow-left fa-md"></i>
                <h2>Request Form</h2>
            </div> -->
            <h2>Feedback For Request <?php echo "#".$_POST['reqID'] ?></h2>
            <label for="">Service Request Rating</label>
            <div class="star-widget">
            <input type="hidden" name="rate" value="5" id="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            </div>
            <label for="">Feedback Comment</label>
            <input type="text" name="textinput" placeholder="Enter comment">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

<script>
        function setRating(num){
        const inputElement = document.querySelector('#rating')
        inputElement.value = num
    }
</script>