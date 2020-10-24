<?php
//Validate the client during login
session_start();

include_once("../db_connect.php");

$query = "SELECT * FROM `client` WHERE `clientName` = '".$_POST['clientName']."' AND password = '".$_POST['password']."'";
$result = $db->query($query);

if ($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $_SESSION["cID"] = $row["clientID"];
    $_SESSION["cName"] = $row["clientName"];

    header("Location: dashboard.php"); 
    exit();
    // use exit() to pause
}
else echo "MEGA EPICC FAIL LMAO. `$result->num_rows != 1`)"; //Fail

?>