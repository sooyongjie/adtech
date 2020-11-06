<?php
session_start();

include_once("../db_connect.php");

$query = "INSERT INTO overtime (`empID`, `date`, `hours`)
VALUES ('".$_SESSION['empID']."', '".$_POST['date']."', '".$_POST['hours']."')";
if ($db->query($query) === TRUE) {
    header( "refresh:0;url=employee-view.php" );
}
else {
    echo "Error: ".$query."<br>".$db->error;
    exit();
}

?>