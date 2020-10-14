<?php
session_start();

include_once("../db_connect.php");

$query = "UPDATE request SET `status`='".$_POST['status']."' WHERE reqID ='".$_SESSION['reqID']."' ";

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    echo "Record updated successfully";
    header( "refresh:1;url=request-view.php" );
} else {
    echo "Error updating record: " . $db->error;
}
?>