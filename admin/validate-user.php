<?php
session_start();

include_once("../db_connect.php");

// $username = '1';
// $password = "poop";

$query = "SELECT * FROM employee WHERE empID = '".$_POST['empID']."' AND password = '".$_POST['password']."'";
$result = $db->query($query);

if ($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $_SESSION["name"] = $row["name"];
    $_SESSION["empID"] = $row["empID"];
    $_SESSION["type"] = $row["type"];

    header("Location: dashboard.php"); 
    exit();
    // use exit() to pause
}
else echo "Please try again."; //Fail

?>