<?php

if(isset($_GET['offset'])) {
    require("setOffset.php");
    setOffset($_GET['offset']);
} else {
    $_SESSION['offset'] = 0;
}

require("runQuery.php");

function getAllEmployees() {
    checkSort();
    $query = "SELECT empID, empName, `type`, `status` FROM `employee` 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";
    return runQuery($query);   
}

function countJobs() {
    $query = "SELECT employee.empID, empName, `type`, COUNT(request.status) AS NumberOfJobs FROM `employee` 
    INNER JOIN request on employee.empID = request.empID 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";
    return runQuery($query);   
}

function getEmployee($search) {
    $query = "SELECT empID, empName, `type`, `status` FROM `employee` WHERE empName LIKE '%{$search}%'";
    return runQuery($query);   
}

function countRows() {
    $query = "SELECT COUNT(`empID`) AS `count` FROM `employee`";
    return runQuery($query);
}

function checkSort() {
    if($_SESSION['order'][0] != "empID" && $_SESSION['order'][0] != "empName" && $_SESSION['order'][0] != "type" && $_SESSION['order'][0] != "status") {
        $_SESSION['order'][0] = "empID";
        $_SESSION['order'][1] = "asc";
        header("Location: employees.php"); 
        exit();
    }
}

?>