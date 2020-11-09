<?php
//old
// Create connection
$db = new mysqli("remotemysql.com", "ZZe8GUsMe0", "KeShDtycTx", "ZZe8GUsMe0");
 
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
// else echo "Connected successfully";

//new
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