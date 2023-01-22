<?php

if (!isset($_SESSION)){
    session_start();
}
if (isset($_POST['btn-logout'])){
    session_destroy();
    echo header("Location: ../../login/login.php");
}

?>