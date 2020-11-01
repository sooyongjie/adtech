<?php
session_start();

include_once("../db_connect.php");
if($_POST['status'] == "Pending") {
    $query = "UPDATE request SET `status`='".$_POST['status']."', `empID` = NULL, `dateOfCompletion` = NULL 
    WHERE reqID = '".$_SESSION['reqID']."' ";
} else if($_POST['status'] == "Completed") {
    $datetime = date("Y-m-d H:i:s");
    $query = "UPDATE request SET `status`='".$_POST['status']."', `dateOfCompletion` = '".$datetime."' WHERE reqID = '".$_SESSION['reqID']."' ";
} else {
    $query = "UPDATE request SET `status`='".$_POST['status']."' WHERE reqID = '".$_SESSION['reqID']."' ";
}

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    echo "Record updated successfully";
    if($_POST['status'] == "Completed") {
        header( "Location: bill-add.php" );
    }
    else {
        header( "Location: request-view.php" );
    }
} else {
    echo "Error updating record: " . $db->error;
}

?>