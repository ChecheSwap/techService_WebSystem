<?php

define("PUBLICKEY","xkeyPublic.key");
define("PRIVATEKEY","xkeyPrivate.key");



function createKeys($var)
{

    $sslConfigPath = "D:/PROGRAMAS_LOCAL/XAMPP/php/extras/ssl/openssl.cnf";

    $flag = false;

    if ($var) {

        $pairKeys = NULL;
        $pubKey = NULL;
        $privKey =NULL;

        try {

            $keyparams = array('private_key_bits'=> 2048, "private_key_type" => OPENSSL_KEYTYPE_RSA);


            if($pairKeys = openssl_pkey_new($keyparams)) {


                if(openssl_pkey_export($pairKeys, $privKey)) {

                    if($pubKey = openssl_pkey_get_details($pairKeys)) {


                        file_put_contents(PRIVATEKEY, $privKey);

                        file_put_contents(PUBLICKEY, $pubKey["key"]);

                        openssl_free_key($pairKeys);

                        $flag = !$flag;
                    }
                    else{
                        throw new Exception();
                    }
                }
                else{
                    throw new Exception();
                }
            }
            else{
                throw new Exception();
            }

        } catch (Exception $ex) {
            echo(openssl_error_string());
        }
    }

    return $flag;
}


function get_encrypt($value)
{
    $base = $value;

    $encripted = NULL;

    $base = gzcompress($base);

    $path = "file://".$_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/security/'.PUBLICKEY;

    if(!($pubKey = openssl_pkey_get_public($path))){
        echo "*Error al obtener clave publica!";
        return false;
    }

    $pubKey_val = openssl_pkey_get_details($pubKey);


    openssl_public_encrypt($base,$encripted, $pubKey);

    openssl_free_key($pubKey);

    return $encripted;
}


function get_decrypt($value){

    $path = "file://".$_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/security/'.PRIVATEKEY;

    $decripted = NULL;


    if(!($privateKey = openssl_pkey_get_private($path))){
        echo "*Error al obtener clave privada";
        return false;
    }

    $privKey_value = openssl_pkey_get_details($privateKey);


    if(!(openssl_private_decrypt($value, $decripted, $privateKey))){
        echo openssl_error_string();
    }

    return gzuncompress($decripted);
}

?>