<?php

$servername = "remotemysql.com";
$username = "ZZe8GUsMe0";
$password = "KeShDtycTx";
$dbname = "ZZe8GUsMe0";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
// else echo "Connected successfully";

?>

