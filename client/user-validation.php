<?php
//Validate the client during login
session_start();
include 'Singleton.php';

    //use singleton to compare
    $s1 = Account::getInstance();
    $user = $s1->getUserName();

    include_once("../db_connect.php");

$query = "SELECT * FROM `client` WHERE `clientName` = '$user' AND password = '".$_POST['password']."'";
$result = $db->query($query);

if ($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $query = "UPDATE client SET `status` = 1 WHERE clientName = '$user' ";

    $result = mysqli_query($db,$query);

    if ($db->query($query) === TRUE) {
        $_SESSION["cID"] = $row["clientID"];
        $_SESSION["clientName"] = $user;
        header("Location: dashboard.php"); 
        exit();
    } else {
        echo "Error updating record: " . $db->error;
    }
    
    // use exit() to pause
} else {
    $_SESSION['errMsg'] = "Please try again.";
    header("Location: index.php"); 
}



?>