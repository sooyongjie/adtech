<?php
session_start();

include_once("../db_connect.php");

$query = "INSERT INTO overtime (`empName`, `emp`, `hours`)
VALUES ('".$_SESSION['empName']."', '".$_POST['emp']."', '".$_POST['hours']."')";
if ($db->query($query) === TRUE) {
    header( "refresh:0;url=employee-view.php" );
}
else {
    echo "Error: ".$query."<br>".$db->error;
    exit();
}

?>