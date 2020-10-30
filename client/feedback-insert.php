<?php
session_start();

include_once("../db_connect.php");
$file = $_POST['payment'];
$rating = $_POST['rate'];
$comment = $_POST['comment'];
$request = $_POST['reqID'];

$query = "INSERT INTO feedback (`feedbackComment`, `feedbackRating`, `reqID`)
VALUES ('$comment', '$rating','$request')";

//bill havent do
$billquery = "INSERT INTO bill (`billID`, `billDetails`, `paymentMethod`, `total`, `status`, `reqID`)
VALUES (1, 'testing', 'Transfer',50, 'Paid', $request)";

if (($db->query($query) === TRUE) && ($db->query($billquery) === TRUE)) {
    echo "Payment and Feedback sent successfully.";
    header("Location: dashboard.php"); 
    exit();
}
else {
    echo "Error: ".$query."<br>".$db->error;
}

?>