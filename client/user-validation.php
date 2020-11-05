<?php
//Validate the client during login
session_start();
include 'Singleton.php';

//use singleton to compare
$s1 = Account::getInstance();
$user = $s1->getUserName();

include_once("../db_connect.php");

$hash = md5($_POST['password']);

$query = "SELECT * FROM `client` WHERE `clientName` = '$user' AND `password` = '$hash' ";
$result = $db->query($query);

if ($result->num_rows == 1)
{
    $row = $result->fetch_assoc();

    $_SESSION["cID"] = $row["clientID"];
    $_SESSION["clientName"] = $user;

    if($row['status'] == 0) 
    {
        $query = "UPDATE client SET `status` = 1 WHERE clientName = '$user' ";
        $result = mysqli_query($db,$query);
        if ($db->query($query) === FALSE) 
        {
            echo "Error updating record: " . $db->error;
            exit();
        } 
    }
    header("Location: dashboard.php"); 
    exit();
} 
else 
{
    $_SESSION['errMsg'] = "Please try again.";
    header("Location: index.php"); 
}

?>