<?php
session_start();

include_once("../db_connect.php");
$radio = $_POST['select'];
$text = $_POST['textinput'];

$query = "INSERT INTO request (`uid`, `category`, `status`,`description`)
VALUES ('".$_SESSION['cID']."', '$radio', 'Pending','$text')";
if ($db->query($query) === TRUE) {
    echo "New service request created successfully.";
    header("Location: requests.php"); 
    exit();
}
else {
    echo "Error: ".$query."<br>".$db->error;
}

?>