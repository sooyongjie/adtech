<?php
session_start();

include_once("../db_connect.php");

$total = $_POST['rate'] * $_POST['hours'];

$query = "INSERT INTO bill (`total`, `status`, `reqID`)
VALUES ($total, 'Pending', '".$_SESSION['reqID']."')";
if ($db->query($query) === TRUE) {
    header( "Location: requests.php" );
}
else {
    echo "Error: ".$query."<br>".$db->error;
    exit();
}

?>