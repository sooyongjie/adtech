<?php
session_start();

include_once("../db_connect.php");

$query = "UPDATE employee SET `password` = 12345678, `status` = 1 WHERE empID = '".$_SESSION['empID']."' ";

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    header( "Location: employee-view.php" );
} else {
    echo "Error updating record: " . $db->error;
}

?>