<?php

    //require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/servicio/registro_orden_php.php');

    require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/DB/dbop_php.php');




    $cats_names = getCatprods();
    $catvals = NULL;
    $orden_number = 'Orden #'.(string)getOrdenNumber();

    $i = 0;

    foreach($cats_names as $x){
        $catvals .= $x[0];

        if(!($i == sizeof($cats_names)-1)){
            $catvals .= ' , ';
        }
        else{
            $catvals .= ".";
        }

        $i++;
    }
?>