<?php
session_start();

include_once("../db_connect.php");
$radio = $_POST['select'];
$text = $_POST['textinput'];

$query = "INSERT INTO request (`uid`, `category`, `status`,`description`)
VALUES ('1', '$radio', 'Pending','$text')";
if ($db->query($query) === TRUE) {
    echo "New service request created successfully.";
}
else {
    echo "Error: ".$query."<br>".$db->error;
}

?>