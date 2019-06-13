<?php
//$_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/home/home_php.php'

require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/XVARS_php.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/utils_b.php');


if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
}

if(isset($_SESSION[$FLAG_LOGIN_MODAL]) && $_SESSION[$FLAG_LOGIN_MODAL]==TRUE){

    $_SESSION[$FLAG_LOGIN_MODAL] = FALSE;

    xshow_Msg_normal('Set Web Inicio','Bienvenido al Sistema: '.$_SESSION[$SESVAR]);
}

?>