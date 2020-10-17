<?php
session_start();

include_once("../db_connect.php");

$query = "INSERT INTO employee (`empName`, `type`, `password`)
VALUES ('".$_POST['empName']."', '".$_POST['type']."', '".$_POST['password']."')";
if ($db->query($query) === TRUE) {
    echo "Added ".$_POST['empName'];
    header( "refresh:1;url=employee-view.php" );
}
else {
    echo "Error: ".$query."<br>".$db->error;
    exit();
}

?>