<?php
session_start();

include_once("../db_connect.php");

$comment = $_POST['comment'];
$rating = $_POST['rate'];
$request = $_POST['reqID'];

$query = "INSERT INTO feedback (`feedbackComment`, `feedbackRating`, `reqID`)
VALUES ('$comment', '$rating','$request')";

if ($db->query($query) === TRUE) {
    header("Location: requests.php"); 
    exit();
}
else {
    echo "Error: ".$query."<br>".$db->error;
}

?>