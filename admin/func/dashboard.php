<?php

if(!isset($_SESSION['order'])) {
    $_SESSION['order'] = ["reqID"];
    array_push($_SESSION['order'], "asc");
}

function runQuery($query) {
    require("../db_connect.php");
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    } else {
        echo "Error: ".$query."<br>".$db->error;
        return 0;
    }
}

function getPendingRequests() {
    $query = "SELECT * FROM `request` WHERE status = 'Pending' 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";
    
    return runQuery($query);   
}

function getOngoingRequests() {
    $query = "SELECT * FROM `request` WHERE status <> 'Pending' AND status <> 'Completed' ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";

    return runQuery($query);   
}

function getAllRequests() {
    $query = "SELECT * FROM `request` 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";

    return runQuery($query);   
}

?>