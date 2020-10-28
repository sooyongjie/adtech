<?php 

session_start();

if($_SESSION['order'][0] == $_POST['sort'] && $_SESSION['order'][1] == "asc") {
    $_SESSION['order'][1] = "desc";
} else if($_SESSION['order'][0] == $_POST['sort']){
    $_SESSION['order'][1] = "asc";
}
else {
    $_SESSION['order'][0] = $_POST['sort'];
    $_SESSION['order'][1] = "asc";
}

header("Location: ../dashboard.php"); 

?>