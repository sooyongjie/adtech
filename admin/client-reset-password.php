<?php
session_start();

include_once("../db_connect.php");

$query = "UPDATE client SET `password` = 12345678, `status` = 1 WHERE clientID = '".$_POST['clientID']."' ";

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    header( "Location: clients.php" );
} else {
    echo "Error updating record: " . $db->error;
}

?>