<?php
//old
if($row['category'] == "General") {
    $rate = "50";
    echo "RM".$rate;
} else if($row['category'] == "Software") {
    $rate = "80";
    echo "RM".$rate;
} else if($row['category'] == "Hardware") {
    $rate = "60";
    echo "RM".$rate;
}

//new
if($row['category'] == "General") {
    $rate = "50";
} else if($row['category'] == "Software") {
    $rate = "80";
} else if($row['category'] == "Hardware") {
    $rate = "60";
}
echo "RM".$rate;

?>