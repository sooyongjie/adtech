<?php

if(isset($_GET['offset'])) {
    require("setOffset.php");
    setOffset($_GET['offset']);
} else {
    $_SESSION['offset'] = 0;
}

require_once("runQuery.php");

function getAllBillings() {
    checkSort();
    $query = "SELECT billID, reqID, total, `status`, `url` FROM `bill` 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";
    return runQuery($query);   
}

function getBilling($search) {
    $query = "SELECT billID, reqID, total, `status`, `url` FROM `bill` WHERE billID = $search";
    return runQuery($query);   
}

function calculateRate($category) {
    if($category == "General") {
        $rate = "50";
    } else if($category == "Software") {
        $rate = "80";
    } else if($category == "Hardware") {
        $rate = "60";
    }
    return "RM".$rate;
}

function countBillingRows() {
    $query = "SELECT COUNT(`billID`) AS `count` FROM `bill`";
    return runQuery($query);
}

function checkSort() {
    if($_SESSION['order'][0] != "billID" && $_SESSION['order'][0] != "reqID" && $_SESSION['order'][0] != "total" && $_SESSION['order'][0] != "status") {
        $_SESSION['order'][0] = "billID";
        $_SESSION['order'][1] = "asc";
        header("Location: requests.php"); 
        exit();
    }
}

?>