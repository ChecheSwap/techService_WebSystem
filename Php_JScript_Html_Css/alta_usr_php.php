
<?php
//$name, $apellido, $rfc, $curp, $calle, $colonia, $numero, $cp, $fecha, $cd, $edo, $correo, $telcel, $telcasa
require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/DB/dbop_php.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/security/crypto.php');


include($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/XVARS_php.php');

session_start();
validate();


function validate(){
  if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['btnreg'])){

    $xarr = array("name"=> get_encrypt($_POST['txtname']),'apellido'=>get_encrypt($_POST['txtlname']),'rfc'=>$_POST['txtrfc'],'curp'=>$_POST['txtcurp'],'calle'=>get_encrypt($_POST['txtcalle']),'colonia'=>get_encrypt($_POST['txtcolonia']),'numero'=>$_POST['txtnumero'],'cp'=>$_POST['txtcp'],
          'fecha'=>$_POST['txtfecha'],'cd'=> get_encrypt($_POST['txtcd']), 'edo'=>$_POST['txtedo'], 'correo'=>$_POST['txtemail'], 'telcel' => $_POST['txttelmovil'], 'telcasa' => $_POST['txttelcasa']);

    $credentials = array("uname"=> $_POST['txtuname'], "pass1" => $_POST['txtpass1'], "pass2" => $_POST['txtpass2'], "curp" => $_POST['txtcurp']);

    if($credentials['pass1'] == $credentials['pass2']){

        if(!exist_usrname($credentials['uname'])){

          $state_regusr = register_user($xarr);

          if($state_regusr['state']==true){

            if(register_client_credential($credentials)){


              register_event_cc($GLOBALS['event_ALTA'],$_SESSION[$GLOBALS['SESVAR']],$credentials["uname"]);

              showMsg("Se ha registrado satisfactoriamente al Usuario!");

              go("../../VIEWS/USERS/usr_alta.php");
            }
            else{
              delete_user($credentials['curp']);
              showMsg("Problema al crear cuenta de Usuario, contacte al administrador.");
              goBack();
            }

          }
          else{
            showMsg('*Problema en el Registro de Usuario: '. $state_regusr['msg']);
            goBack();
          }
        }
        else{
          showMsg("Este nombre de usuario ya existe!");
          goBack();
        }
    }
    else{
      showMsg("Las contraseñas no coinciden!");
      goBack();
    }

  }
}
?>
