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

if($_POST['page']=="requests.php") {
    header("Location: ../requests.php"); 
} else if($_POST['page']=="feedback.php") {
    header("Location: ../feedback.php"); 
}
else if($_POST['page']=="employees.php") {
    header("Location: ../employees.php"); 
}

?>