<?php
session_start();

include_once("../db_connect.php");


$query = "SELECT * FROM employee WHERE empID = '".$_POST['empID']."' AND password = '".$_POST['password']."'";
$result = $db->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION["type"] = $row["type"];
    $_SESSION["uid"] = $row["empID"];
    $_SESSION["name"] = $row["empName"];

    header("Location: requests.php"); 
    exit();
    // use exit() to pause
} else {
    $_SESSION['errMsg'] = "Please try again.";
    header("Location: index.php"); 
}

?>