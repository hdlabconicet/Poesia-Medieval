<?php
    require_once("config.php");
    if (!isset($_COOKIE["user"])) {
        error_log("Intento de acceso no permitido");
        header("Location: " . $BASE_URL . "/login.php");
    } else {
        error_log("Acceso permitido: " . $_COOKIE["user"]);
    }
?>
