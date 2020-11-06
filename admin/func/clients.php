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

function getAllClients() {
    $query = "SELECT clientID, clientName, `status` FROM client 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";
    checkClientSort();
    
    return runQuery($query);   
}

function getClient($search) {
    $query = "SELECT * FROM client WHERE clientID = $search ";

    return runQuery($query); 
}

function countRows() {
    $query = "SELECT COUNT(`clientID`) AS `count` FROM `client`";
    return runQuery($query);
}

function checkClientSort() {
    if($_SESSION['order'][0] != "clientID" && $_SESSION['order'][0] != "clientName" && $_SESSION['order'][0] != "status") {
        $_SESSION['order'][0] = "clientID";
        $_SESSION['order'][1] = "asc";
        header("Location: clients.php"); 
        exit();
    }
}

?>