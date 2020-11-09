<?php
function getAllBillings() {
     //old
    $query = "SELECT billID, reqID, total, `status` FROM `bill` 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";
     $result = $db->query($query);
     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             $arr[] = $row;
            }
        } else {
            $_SESSION['order'][0] = "billID";
        $_SESSION['order'][1] = "asc";
        header("Location: billing.php"); 
        return 0;
        }
    }
    return $arr;   
}

// new
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
 
function runQuery($query) {
    require("../db_connect.php");
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    } else {
        echo "No results were returned";
        return 0;
    }
}

?>