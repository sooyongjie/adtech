<?php

if(!isset($_SESSION['order'])) {
    $_SESSION['order'] = ["reqID"];
    array_push($_SESSION['order'], "asc");
}

function getPendingRequests() {
    require("../db_connect.php");
    $arr = array();

    $query = "SELECT * FROM `request` WHERE status = 'Pending' ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";
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

function getOngoingRequests() {
    require("../db_connect.php");
    $arr = array();

    $query = "SELECT * FROM `request` WHERE status <> 'Pending' AND status <> 'Completed' ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";

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

function getAllRequests() {
    require("../db_connect.php");
    $arr = array();

    $query = "SELECT * FROM `request` ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";
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

?>