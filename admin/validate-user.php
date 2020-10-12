<?php
session_start();
?>
<?php

include_once("../db_connect.php");

$username = $_POST['uid'];
$password = $_POST['password'];
// $username = '1';
// $password = "poop";

$query = "SELECT * FROM employee WHERE uid = '". $username ."' AND password = '". $password ."'";
$result = $db->query($query);

if ($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    $_SESSION["name"] = $row["name"];
    $_SESSION["logged"] = $row["uid"];

    header("Location: dashboard.php"); 
    exit();
    // use exit() to pause
}
else echo "Please try again."; //Fail

?>