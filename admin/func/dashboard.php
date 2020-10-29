<?php

if(!isset($_SESSION['order'])) {
    $_SESSION['order'] = ["reqID"];
    array_push($_SESSION['order'], "asc");
}
if(!isset($_SESSION['offset'])) {
    $_SESSION['offset'] = 0;
}
if(isset($_GET['offset'])) {
    setOffset($_GET['offset']);
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
    $query = "SELECT reqID, category, dateOfCreation, `status` FROM `request` WHERE status = 'Pending' 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";
    
    return runQuery($query);   
}

function getOngoingRequests() {
    $query = "SELECT reqID, category, dateOfCreation, `status` FROM `request` WHERE status <> 'Pending' AND status <> 'Completed' ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]."";

    return runQuery($query);   
}

function getAllRequests() {
    $query = "SELECT reqID, category, dateOfCreation, `status` FROM `request` 
    ORDER BY ".$_SESSION['order'][0]." ".$_SESSION['order'][1]." LIMIT 5 OFFSET ".$_SESSION['offset']." ";

    return runQuery($query);   
}

function countRows() {
    $query = "SELECT COUNT(`reqID`) AS `count` FROM `request`";
    $count = runQuery($query);
    $num = round($count[0]['count']/5);
    if ($num == 0) {
        $num = 1;
    }
    for ($i = 0; $i < $num; $i++) {
        ?>
        <button>
            <a href="?offset=<?php echo $i ?>"><?php echo $i ?></a>
        </button>
        <?php
    }
}

function setOffset($num) {
    if($num > 0) {
        echo $_SESSION['offset'];
        $_SESSION['offset'] = $num * 5;
    } else $_SESSION['offset'] = 0;
}

?>