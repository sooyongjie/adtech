<?php

function setOffset($num) {
    if($num > 0) {
        $_SESSION['offset'] = $num * 5;
    } else $_SESSION['offset'] = 0;
}

?>