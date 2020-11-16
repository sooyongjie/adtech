<?php 

error_reporting(0);

function runQuery($query) {
    require("../db_connect.php");
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    } else {
        // echo "Error: ".$query."<br>".$db->error;
        echo "There are no results 🙌🏻";
        return 0;
    }
}

?>