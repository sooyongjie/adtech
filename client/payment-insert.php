<?php

session_start();

include_once("../db_connect.php");

$target_dir = "";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

$query = "UPDATE bill SET billDetails = '".$_POST['refNo']."', paymentMethod = 'Bank Transfer', `status` = 'Paid', `url` = '".$target_file."'  
 WHERE reqID = '".$_POST['reqID']."' ";

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    header( "Location: requests.php" );
} else {
    echo "Error updating record: " . $db->error;
}

// update request status
$query = "SELECT billID FROM bill WHERE `reqID` = '".$_POST['reqID']."'";
$result = $db->query($query);
if ($result->num_rows == 1) { 
    $row = $result->fetch_assoc();

    $query = "UPDATE request SET `status` = 'Paid', `billID` = '".$row['billID']."'
    WHERE reqID = '".$_POST['reqID']."' ";
    $result = mysqli_query($db,$query);
    if ($db->query($query) === TRUE) {
        header( "Location: requests.php" );
    } else {
        echo "Error updating record: " . $db->error;
    }
}

?>