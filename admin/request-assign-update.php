<?php
session_start();

include_once("../db_connect.php");

$query = "UPDATE request SET empID = '".$_POST['empID']."', status = 'Assigned' WHERE reqID = '".$_SESSION['reqID']."'";

$result = $db->query($query);

if ($db->query($query) === TRUE) {
    echo "Record updated successfully.";
    header( "refresh:1;url=requests.php" );
} else {
    echo "Error updating record: " . $db->error;
}

?>