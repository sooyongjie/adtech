<?php
session_start();

include_once("../db_connect.php");

$query = "UPDATE employee SET `empName`='".$_POST['empName']."', `type`='".$_POST['type']."' WHERE empID ='".$_SESSION['empID']."' ";

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    echo "Record updated successfully";
    header( "Location: employee-view.php" );
} else {
    echo "Error updating record: " . $db->error;
}

?>