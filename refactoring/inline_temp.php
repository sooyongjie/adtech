<?php
//old
function getAllBillings() {
    $query = "SELECT billID, reqID, total, `status` FROM `bill` 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";
    if(runQuery($query) == 0) {
        $_SESSION['order'][0] = "billID";
        $_SESSION['order'][1] = "asc";
        header("Location: billing.php"); 
    }
    $arr = runQuery($query);
    return $arr;   
}

//new
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

?>