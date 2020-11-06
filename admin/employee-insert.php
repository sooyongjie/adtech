<?php
session_start();

include_once("../db_connect.php");

$hash = md5($_POST['password']);
$query = "INSERT INTO employee (`empName`, `type`, `password`, `status`) 
VALUES ('".$_POST['empName']."', '".$_POST['type']."', '$hash', 1)";
if ($db->query($query) === TRUE) {
    echo "Added ".$_POST['empName'];
    header( "Location: employees.php" );
}
else {
    echo "Error: ".$query."<br>".$db->error;
    exit();
}

?>