<?php
//Validate the client during login
session_start();
include 'Singleton.php';

    //use singleton to compare
    $s1 = Account::getInstance();
    $user = $s1->getwork();

    include_once("../db_connect.php");

$query = "SELECT * FROM `client` WHERE `clientName` = '$user' AND password = '".$_POST['password']."'";
$result = $db->query($query);

if ($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $_SESSION["cID"] = $row["clientID"];
    $_SESSION["clientName"] = $user;
    header("Location: dashboard.php"); 
    exit();
    // use exit() to pause
}
else echo "MEGA EPICC FAIL LMAO. `$result->num_rows != 1`)"; //Fail

?>