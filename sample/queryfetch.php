<?php
include_once("../db_connect.php");
$query = "SELECT * FROM ``";
$result = $db->query($query);
if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {

    }
} else {

}
?>