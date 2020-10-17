<?php
session_start();

include_once("../db_connect.php");

$query = "DELETE FROM employee WHERE empID = '".$_SESSION['empID']."'";
if ($db->query($query) === TRUE) {
    echo "Removed ".$_SESSION['empID'];
    header( "refresh:1;url=employees.php" );
}
else {
    echo "Error: ".$query."<br>".$db->error;
    // exit();
}

?>