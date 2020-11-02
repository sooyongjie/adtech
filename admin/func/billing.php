<?php

if(isset($_GET['offset'])) {
    require("setOffset.php");
    setOffset($_GET['offset']);
} else {
    $_SESSION['offset'] = 0;
}

require("runQuery.php");

function getAllBillings() {
    $query = "SELECT billID, reqID, total, `status` FROM `bill` 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";
    if(runQuery($query) == 0) {
        $_SESSION['order'][0] = "billID";
        $_SESSION['order'][1] = "asc";
        header("Location: billing.php"); 
    }
    return runQuery($query);   
}

function getBilling($search) {
    $query = "SELECT billID, reqID, total, `status` FROM `bill` WHERE billID = $search";
    return runQuery($query);   
}

function countRows() {
    $query = "SELECT COUNT(`billID`) AS `count` FROM `bill`";
    return runQuery($query);
}

?>