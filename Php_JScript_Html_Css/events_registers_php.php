<?php

$dvals =NULL;

session_start();

include($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/DB/dbop_php.php');
include($_SERVER['DOCUMENT_ROOT']."/websys/LOGIC/pagination/XVARS_php.php");

require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/security/crypto.php');


if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnok'])) {


    $xvals = array("alias" => $_POST['txtalias'], "name" => $_POST['txtname'], "fecha1" => $_POST['txtd1'], "fecha2" => $_POST['txtd2']);

    $xres = getRegisters($xvals["alias"], $xvals["name"], $xvals["fecha1"], $xvals["fecha2"]);

    $_SESSION['DVALS'] = $xres;

    $_SESSION['TEST'] = TRUE;

    goBack();

}
else {

    if (isset($_SESSION['TEST'])) {

        if ($_SESSION["TEST"] == TRUE) {

            $_SESSION["TEST"] = FALSE;

            $dvals = $_SESSION['DVALS'];
        } else {
            $dvals = vDefault();
        }

    } else {
        $dvals = vDefault();
    }

}


function vDefault()
{
    return getRegisters(NULL, NULL, NULL, NULL);
}


?>