<?php
//Validate the client during login
session_start();
include 'Singleton.php';
include 'Proxy.php';

//use singleton to insert proxy
$user1 = Account::getInstance();
$name1 = $user1->getwork();

//use singleton to compare
$user2 = Account::getInstance();
$name2 = $user1->getwork();

//use singleton to put as session
$user3 = Account::getInstance();
$name3 = $user2->getwork();

//Proxy code
$Insertname = $name1;
$Insertpass = $_POST['password'];
function ProxyFunction(Subject $subject, string $name, string $pass)
{
    $subject->request($name, $pass);
}

$realSubject = new RealInsert();
$proxy = new Proxy($realSubject);
ProxyFunction($proxy, $Insertname, $Insertpass);

include("../db_connect.php");
$queryentry = "SELECT * FROM `client` WHERE `clientName` = '$name2' AND password = '".$_POST[password]."'";
$result = $db->query($queryentry);
if ($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $_SESSION["cID"] = $row["clientID"];
    $_SESSION["clientName"] = $name3;

    header("Location: dashboard.php"); 
    exit();
}
?>