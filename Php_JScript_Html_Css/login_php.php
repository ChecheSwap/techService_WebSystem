<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/DB/dbop_php.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/XVARS_php.php');

if(!(session_status() == PHP_SESSION_ACTIVE)) {
    session_start();
}

if (isset($_SESSION[$SESVAR])) {
    go("../HOME/home.php");
}

validate();

function validate()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnok'])) {

        $usr = $_POST['txtusr'];
        $pass = $_POST['txtpass'];

        if (empty($usr) || empty($pass)) {
            showMsg("Ingrese Crendenciales!");
        } else if (exist_credential($usr, $pass)) {

            $_SESSION[$GLOBALS['SESVAR']] = $usr;
            $_SESSION[$GLOBALS['TIME_RECORD']] = time();

            register_event($GLOBALS['event_INICIO'], $_SESSION[$GLOBALS['SESVAR']]);

            switch (get_usrType($usr)) {

                case($GLOBALS['usr_ADMON']):
                    {
                        $_SESSION[$GLOBALS['FLAG_LOGIN_MODAL']] = TRUE;
                        go("../HOME/home.php");
                        break;
                    }
                case($GLOBALS['usr_EMP']):
                    {
                        $_SESSION[$GLOBALS['FLAG_LOGIN_MODAL']] = TRUE;
                        go("../HOME/home.php");
                        break;
                    }
                case($GLOBALS['usr_CUST']):
                    {
                        $_SESSION[$GLOBALS['FLAG_LOGIN_MODAL']] = TRUE;
                        go("../HOME/home_customer.php");
                        break;
                    }
                default:
                    {
                        break;
                    }
            }

        } else {
            showMsg("Credenciales Invalidas!");
            go("login.php");
        }
    }
}

?>

