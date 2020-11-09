<?php
//old
if($row['category'] == "General") {
    $rate = "50";
} else if($row['category'] == "Software") {
    $rate = "80";
} else if($row['category'] == "Hardware") {
    $rate = "60";
}
echo "RM".$rate;

//new
echo calculateRate($row['category']);

function calculateRate($category) {
    if($category == "General") {
        $rate = "50";
    } else if($category == "Software") {
        $rate = "80";
    } else if($category == "Hardware") {
        $rate = "60";
    }
    return "RM".$rate;
}

?>