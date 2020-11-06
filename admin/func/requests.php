<?php

// if(!isset($_SESSION['order'])) {
//     $_SESSION['order'] = ["reqID"];
//     array_push($_SESSION['order'], "asc");
// }
if(isset($_GET['offset'])) {
    require("setOffset.php");
    setOffset($_GET['offset']);
} else {
    $_SESSION['offset'] = 0;
}

require("runQuery.php");

function getPendingRequests() {
    checkSort();
    $query = "SELECT reqID, category, dateOfCreation, `status` FROM `request` 
    WHERE `status` = 'Pending' 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";
    return runQuery($query);   
}

function getTechnicianPendingRequests() {
    checkSort();
    $query = "SELECT reqID, category, dateOfCreation, `status` FROM `request` 
    WHERE `status` = 'Pending' AND `empID` = '".$_SESSION['uid']."' 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";
    return runQuery($query);  
}

function getOngoingRequests() {
    $query = "SELECT reqID, category, dateOfCreation, `status` FROM `request` 
    WHERE `status` <> 'Pending' AND status <> 'Completed' 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";
    return runQuery($query);   
}

function getTechnicianOngoingRequests() {
    $query = "SELECT reqID, category, dateOfCreation, `status` FROM `request` 
    WHERE `status` <> 'Pending' AND status <> 'Completed' AND `empID` = '".$_SESSION['uid']."' 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";
    return runQuery($query);   
}

function getAllRequests() {
    $query = "SELECT reqID, category, dateOfCreation, `status` FROM `request` 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";
    return runQuery($query);
}

function getAllTechnicianRequests() {
    $query = "SELECT reqID, category, dateOfCreation, `status` FROM `request` 
    WHERE `empID` = '".$_SESSION['uid']."' 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";
    return runQuery($query);
}

function getRequest($search) {
    $query = "SELECT * FROM `request` WHERE `reqID` = $search ";
    return runQuery($query); 
}

function getTechnicianRequest($search) {
    $query = "SELECT * FROM `request` 
    WHERE `reqID` = $search AND `empID` = '".$_SESSION['uid']."' ";
    return runQuery($query); 
}

function countRows() {
    $query = "SELECT COUNT(`reqID`) AS `count` FROM `request`";
    return runQuery($query);
}

function countTechnicianRows() {
    $query = "SELECT COUNT(`reqID`) AS `count` FROM `request`
    AND `empID` = '".$_SESSION['uid']."' ";
    return runQuery($query);
}

function checkSort() {
    if($_SESSION['order'][0] != "reqID" && $_SESSION['order'][0] != "category" && $_SESSION['order'][0] != "date" && $_SESSION['order'][0] != "status") {
        $_SESSION['order'][0] = "reqID";
        $_SESSION['order'][1] = "asc";
        header("Location: requests.php"); 
        exit();
    }
}

?>