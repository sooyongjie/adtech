<?php
session_start();

include_once("../db_connect.php");

if($_POST['newPassword'] == $_POST['confirmPassword']) {
    $hash = md5($_POST['confirmPassword']);
    $query = "UPDATE employee SET `password` = '$hash' 
    WHERE empID ='".$_SESSION['empID']."' ";

    $result = mysqli_query($db,$query);

    if ($db->query($query) === TRUE) {
        header( "Location: profile.php" );
    } else {
        echo "Error updating record: " . $db->error;
    }
} else {
    $_SESSION['errMsg'] = "The password do not match";
    header( "Location: profile.php" );
}



?>