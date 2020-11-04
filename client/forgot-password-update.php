<?php
session_start();
include_once("../db_connect.php");

$query = "UPDATE client SET `status` = 0 WHERE clientName = '".$_POST['username']."' ";

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    $_SESSION['errMsg'] = "A password reset is submitted. The temporary password will be is '12345678'.";
    header( "Location: index.php" );
} else {
    echo "Error updating record: " . $db->error;
}

?>