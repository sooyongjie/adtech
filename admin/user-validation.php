<?php
session_start();

include_once("../db_connect.php");

$hash = md5($_POST['password']);

$query = "SELECT * FROM employee WHERE empID = '".$_POST['empID']."' AND password = '$hash'";
$result = $db->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION["type"] = $row["type"];
    $_SESSION["uid"] = $row["empID"];
    $_SESSION["name"] = $row["empName"];
    if($row['status'] == 0) 
    {
        $query = "UPDATE employee SET `status` = 1 WHERE empID = '".$_SESSION['uid']."' ";
        $result = mysqli_query($db,$query);
        if ($db->query($query) === FALSE) 
        {
            echo "Error updating record: " . $db->error;
            exit();
        } 
    }
    header("Location: requests.php"); 
    exit();
    // use exit() to pause
} else {
    $_SESSION['errMsg'] = "Please try again.";
    header("Location: index.php"); 
}

?>