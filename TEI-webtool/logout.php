<?php
    unset($_COOKIE["user"]);
    setcookie('user', null, -1);
    require_once("config.php");
    header('Location: ' . $BASE_URL . '/login.php');
?>
