<?php
session_start();

include_once("../db_connect.php");

$comment = $_POST['comment'];
$rating = $_POST['rate'];
$date = date("Y-m-d");
$request = $_POST['reqID'];

$query = "INSERT INTO feedback (`feedbackComment`, `feedbackRating`, `date`, `reqID`)
VALUES ('$comment', '$rating','$date','$request')";

if ($db->query($query) === TRUE) {
    $query = "UPDATE request SET `feedbackStatus` = 1 WHERE `reqID` = ".$request." ";

    if ($db->query($query) === TRUE) {
        header("Location: requests.php"); 
        exit();
    }
    else {
        echo "Error: ".$query."<br>".$db->error;
    }
}
else {
    echo "Error: ".$query."<br>".$db->error;
}

?>