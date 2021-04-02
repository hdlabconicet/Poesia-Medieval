<?php
    require_once("config.php");
    $user = $_GET["user"];
    $pass = md5($_GET["pass"]);
    if (!preg_match('/^[a-zA-Z]+$/', $user)) {
        unset($_COOKIE["user"]);
        setcookie('user', null, -1);
        error_log("Error de seguridad en login");
        header('Location: ' + $BASE_URL + '/login.php');
    }
   /** Naive login **/
   if ($user == "dialogo" && $pass == "dc64440253839a9d359ac6546ccfaf03") {
        error_log("Login OK");
        setcookie('user', $user, time()+86400);
        header('Location: ' . $BASE_URL . '/index.php');
    } else {
        error_log("Login NOK : $user");
        unset($_COOKIE["user"]);
        setcookie('user', null, -1);
        header('Location: ' . $BASE_URL . '/login.php');
    }
?>
