<?php
session_start();

include_once("../db_connect.php");

$hash = md5($_POST['confirmPassword']);

$query = "UPDATE client SET `password` = '$hash', `status` = 1 WHERE clientID = '".$_SESSION['empID']."' ";

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    header( "Location: dashboard.php" );
} else {
    echo "Error updating record: " . $db->error;
}

?>