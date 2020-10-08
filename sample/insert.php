<?php
$query = "INSERT INTO request (`uid`, `description`, `dateOfCreation`)
VALUES ('".$_SESSION[$uid]."', '".$_POST[$description]."', '".$date."')";
if ($db->query($query) === TRUE) {
    echo "Ok";
}
else {
    echo "Error: ".$query."<br>".$db->error;
    exit();
}
?>