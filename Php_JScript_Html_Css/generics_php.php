<?php

//require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/generics_php.php');

function showMsg($txt){
  echo '<script language="javascript"> alert("'.$txt.'") </script>';
}

function go($link){
   echo '<script language="javascript"> window.location.href = "'.$link.'"</script>';
}

function goBack(){
  echo '<script language ="javascript"> window.history.go(-1) </script>';
}

?>
