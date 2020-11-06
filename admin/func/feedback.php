<?php

if(isset($_GET['offset'])) {
    require("setOffset.php");
    setOffset($_GET['offset']);
} else {
    $_SESSION['offset'] = 0;
}

require("runQuery.php");

function getAllFeedback() {
    checkSort();
    $query = "SELECT feedbackNo, reqID, feedbackComment, feedbackRating FROM `feedback` 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";
    return runQuery($query);   
}

function getFeedback($search) {
    $query = "SELECT feedbackNo, reqID, feedbackComment, feedbackRating FROM `feedback` WHERE feedbackNo = $search";
    return runQuery($query);   
}

function countRows() {
    $query = "SELECT COUNT(`feedbackNo`) AS `count` FROM `feedback`";
    return runQuery($query);
}

function checkSort() {
    if($_SESSION['order'][0] != "feedbackNo" && $_SESSION['order'][0] != "reqID" && $_SESSION['order'][0] != "feedbackComment" && $_SESSION['order'][0] != "feedbackRating") {
        $_SESSION['order'][0] = "feedbackNo";
        $_SESSION['order'][1] = "asc";
        header("Location: feedback.php"); 
        exit();
    }
}

?>