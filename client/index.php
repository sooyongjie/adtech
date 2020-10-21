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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
        integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
        crossorigin="anonymous"></script>
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

<script>
    var gsap = gsap.timeline();
    gsap.to(".button", {border: "1px solid #cccccc", duration: 0.1, stagger: 0.05}); //wait 2 seconds
    gsap.to("i", {opacity: 1, duration: 0.2, delay: 0}); //wait 2 seconds
    gsap.to("p", {opacity: 1, duration: 0.2}, "-=0.2"); //wait 2 seconds
</script>
</html>