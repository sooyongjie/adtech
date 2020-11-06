<?php

// error_reporting(0);

function getOvertime() {
    require("../db_connect.php");
    $arr = array();

    $query = "SELECT * FROM `overtime` INNER JOIN `employee` on `overtime`.empID = `employee`.empID 
    WHERE `date` >= '".$_SESSION['startDate']."' AND `date` <= '".$_SESSION['endDate']."' ";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return calculateOvertime($arr);
    } else {
        // echo "Error: ".$query."<br>".$db->error;
        echo "There is no overtime.";
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

function getWorkload() {
    require("../db_connect.php");
    
    $query = "SELECT empID, empName FROM `employee` WHERE `type` = 3";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $query2 = "SELECT COUNT(reqID) AS NumberOfJobs FROM `request` WHERE `empID` = '".$row['empID']."' 
            AND `dateOfCreation` >= '".$_SESSION['startDate']."' AND `dateOfCreation` <= '".$_SESSION['endDate']."' ";

            $result2 = $db->query($query2);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $arr[] = $row + $row2;
                }
            } else {
                echo "Error: ".$query2."<br>".$db->error;
                echo "There are no results.";
                return 0;
            }
        }
        return $arr;
    } else {
        // echo "Error: ".$query."<br>".$db->error;
        echo "There are no ongoing jobs.";
        return 0;
    }
}

function getRatings() {
    require("../db_connect.php");
    $arr = array();

    $query = "SELECT feedbackRating FROM `feedback` 
    WHERE `date` >= '".$_SESSION['startDate']."' AND `date` <= '".$_SESSION['endDate']."' ";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return countRatings($arr);
    } else {
        // echo "Error: ".$query."<br>".$db->error;
        echo "There are no ratings.";
        return 0;
    }
}

function getComments() {
    require("../db_connect.php");

    $query = "SELECT feedbackNo, feedbackComment FROM `feedback` 
    WHERE `date` >= '".$_SESSION['startDate']."' AND `date` <= '".$_SESSION['endDate']."' ";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    } else {
        // echo "Error: ".$query."<br>".$db->error;
        echo "There are no comments.";
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

function getDateTime() {
    return date("Y-m-d h:i:sa");
}

function insertToDatabase() {
    require("../db_connect.php");

    $date = getDateTime();

    $query = "INSERT INTO report (`date`) VALUES ($total)";
    if ($db->query($query) === FALSE) {
        echo "Error: ".$query."<br>".$db->error;
        exit();
    }
}



?>