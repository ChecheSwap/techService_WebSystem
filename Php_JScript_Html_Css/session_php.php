<?php

//require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/session_php.php');
  require_once("generics_php.php");
  require_once('XVARS_php.php');
  

  if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
  }

  if(!isset($_SESSION[$SESVAR])){
    showMsg("Acceso denegado!");
    go('../LOGIN/login.php');
  }
?>
