<?php
//Validate the client during login
session_start();

include_once("../db_connect.php");

$query = "SELECT * FROM `client` WHERE `clientName` = '".$_POST['clientName']."'";
$result = $db->query($query);

if ($result->num_rows == 1)
{
    echo "Username Taken. `$result->num_rows != 1`)"; //Fail
}
else{ 

    $insertquery = "INSERT INTO client (`clientName`, `password`) VALUES ('".$_POST['clientName']."', '".$_POST[password]."')";

    if ($db->query($insertquery) === TRUE) {
    
    $queryentry = "SELECT * FROM `client` WHERE `clientName` = '".$_POST['clientName']."' AND password = '".$_POST[password]."'";
    $result = $db->query($queryentry);
    
    if ($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $_SESSION["cID"] = $row["clientID"];
    $_SESSION["cName"] = $_POST['clientName'];

    header("Location: dashboard.php"); 
    exit();
        }
    }
    // use exit() to pause
}

?>