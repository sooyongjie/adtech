<?php

function getOvertime() {
    require("../db_connect.php");
    $arr = array();

    $query = "SELECT * FROM `overtime` INNER JOIN `employee` on `overtime`.empID = `employee`.empID ";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return calculateOvertime($arr);
    } else {
        echo "Error: ".$query."<br>".$db->error;
        return 0;
    }
}

function calculateOvertime($arr) {
    $overtime = array();
    foreach($arr as $row) {
        $overtime[] = array("empName"=>$row['empName'],"hours"=>$row['hours'], "rate"=>"RM".$row['hours']*20);
    }
    return $overtime;
}

function getRatings() {
    require("../db_connect.php");
    $arr = array();

    $query = "SELECT feedbackRating FROM `feedback`";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return countRatings($arr);
    } else {
        echo "Error: ".$query."<br>".$db->error;
        return 0;
    }
}

function countRatings($arr) {
    $ratings = array("1" => 0, "2" => 0, "3" => 0, "4" => 0, "5" => 0);

    foreach($arr as $row) {
        if($row['feedbackRating'] == 1) {
            $ratings["1"]++;
        } else if($row['feedbackRating'] == 2) {
            $ratings["2"]++;
        } else if($row['feedbackRating'] == 3) {
            $ratings["3"]++;
        } else if($row['feedbackRating'] == 4) {
            $ratings["4"]++;
        } else if($row['feedbackRating'] == 5) {
            $ratings["5"]++;
        }
    }
    return $ratings;
}

?>