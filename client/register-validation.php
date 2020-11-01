<?php
//Validate the client during login
session_start();
include 'Singleton.php';
include_once("../db_connect.php");

//use singleton to compare
$user1 = Account::getInstance();
$name1 = $user1->getwork();

//use singleton to insert
$user2 = Account::getInstance();
$name2 = $user2->getwork();

$query = "SELECT * FROM `client` WHERE `clientName` = '$name1'";
$result = $db->query($query);

if ($result->num_rows == 1)
{
    echo "Username Taken. `$result->num_rows != 1`)"; //Fail
}
else{ 

    $insertquery = "INSERT INTO client (`clientName`, `password`) VALUES ('$name1', '".$_POST[password]."')";

    if ($db->query($insertquery) === TRUE) {
    
    $queryentry = "SELECT * FROM `client` WHERE `clientName` = '$name2' AND password = '".$_POST[password]."'";
    $result = $db->query($queryentry);
    
    if ($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $_SESSION["cID"] = $row["clientID"];
    $_SESSION["clientName"] = $name2;

    header("Location: dashboard.php"); 
    exit();
        }
    }
    // use exit() to pause
}

?>