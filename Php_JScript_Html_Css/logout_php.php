<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/DB/dbop_php.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/pagination/XVARS_php.php');

if (!(session_status() == PHP_SESSION_ACTIVE)) {
    session_start();
}


if (isset($_SESSION[$SESVAR])) {
    register_event($event_CIERRE, $_SESSION[$SESVAR]);
    unset($_SESSION[$SESVAR]);
    go("../../VIEWS/LOGIN/login.php");
} else {
    goBack();
}

?>
