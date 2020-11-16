<?php
session_start();

include_once("../db_connect.php");

$hash = md5("12345678");
$query = "UPDATE client SET `password` = '$hash', `status` = 1 WHERE clientID = '".$_POST['clientID']."' ";

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    header( "Location: clients.php" );
} else {
    echo "Error updating record: " . $db->error;
}

?>