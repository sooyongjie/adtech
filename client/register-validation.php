<?php
//Validate the client during login
session_start();
include 'Singleton.php';
include 'Proxy.php';

//use singleton to insert proxy
$user1 = Account::getInstance();
$name1 = $user1->getUserName();

//Proxy code
$Insertname = $name1;
$Insertpass = md5($_POST['password']);
function ProxyFunction(RegisterCheck $subject, string $name, string $pass)
{
    $subject->request($name, $pass);
}

$realSubject = new RealInsert();
$proxy = new CheckingInformation($realSubject);
ProxyFunction($proxy, $Insertname, $Insertpass);

if(!isset($_SESSION['errMsg'])) {
    include("../db_connect.php");
    $queryentry = "SELECT * FROM `client` WHERE `clientName` = '$name1' AND `password` = '$Insertpass'";
    $result = $db->query($queryentry);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $_SESSION["cID"] = $row["clientID"];
        $_SESSION["clientName"] = $name1;

        header("Location: dashboard.php"); 
        exit();
    } else $_SESSION['errMsg'] = "Auto login failed.";
} else header("Location: register.php"); 
?>