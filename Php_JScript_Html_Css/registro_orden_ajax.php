<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/DB/dbop_php.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/pagination/XVARS_php.php');


if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['xdata'])) {

        $myarr = json_decode($_POST['xdata'], true);

        $curp = $myarr["curp"];

        $prod_details = $myarr["array_prods"];

        $flag = true;

        if (exist_curp($curp)) {

            if (createOrder($curp, $_SESSION[$SESVAR])) {

                $orderId = getOrdenNumber() - 1;

                foreach ($prod_details as $row) {

                    if($row != NULL) {

                        if (!insertProduct($row, $orderId)) {

                            cancelServiceOrder($orderId);
                            $flag = !$flag;
                            break;
                        }
                    }

                }

                if (!$flag) {
                    echo(" ->Problema en la creacion de Orden de servicio!");
                } else {
                    echo("FINALIZADO");
                }
            }
        } else {
            echo('*CURP Invalida, no existe cliente registrado con dicha CURP.');
        }

    }
}

//NOTA: CREAR MANEJO DE EXCEPCIONES, YA INGRESA ORDEN SERVICIO Y PRODUCTOS, TAMBIEN CANCELA
?>