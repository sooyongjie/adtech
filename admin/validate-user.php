<?php
session_start();

include_once("../db_connect.php");

unset($_SESSION["type"]);

$query = "SELECT * FROM employee WHERE empID = '".$_POST['empID']."' AND password = '".$_POST['password']."'";
$result = $db->query($query);

if ($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $_SESSION["type"] = $row["type"];

    header("Location: dashboard.php"); 
    exit();
    // use exit() to pause
}
else echo "Please try again."; //Fail

?>