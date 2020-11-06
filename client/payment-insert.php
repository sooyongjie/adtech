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
$query = "UPDATE request SET `status` = 'Paid'  
 WHERE reqID = '".$_POST['reqID']."' ";

$result = mysqli_query($db,$query);

if ($db->query($query) === TRUE) {
    header( "Location: requests.php" );
} else {
    echo "Error updating record: " . $db->error;
}

// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// echo $target_file ;
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

?>