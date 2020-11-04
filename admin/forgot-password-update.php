<?php
session_start();

include_once("../db_connect.php");

$query = "UPDATE employee SET `status` = 0 WHERE empID = '".$_POST['empID']."' ";

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    $_SESSION['errMsg'] = "A password reset is submitted. The temporary password will be '12345678'.";
    header( "Location: index.php" );
} else {
    echo "Error updating record: " . $db->error;
}

?>