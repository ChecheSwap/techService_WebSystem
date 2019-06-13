
<?php

    //require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/session_expire_php.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/DB/dbop_php.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/XVARS_php.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/generics_php.php');

    if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }

    if(isset($_SESSION[$SESVAR])){

        if(isset($_SESSION[$TIME_RECORD])){

            if(time() - $_SESSION[$TIME_RECORD] >= $INACTIVE_LAPSE){

                register_event($event_INACTIVIDAD, $_SESSION[$SESVAR]);
                unset($_SESSION[$TIME_RECORD]);
                unset($_SESSION[$SESVAR]);
                showMsg('Cerrando Sesion por Inactividad.');
                go("../../VIEWS/LOGIN/login.php");

            }
            else{
                $_SESSION[$TIME_RECORD] = time();
            }
        }
        else{
            $_SESSION[$TIME_RECORD] = time();
        }
    }

?>