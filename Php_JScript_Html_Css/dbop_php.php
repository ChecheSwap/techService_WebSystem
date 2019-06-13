<?php
////require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/DB/dbop_php.php');


require_once('dbkeys_php.php');
require_once('SQLQ_php.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/pagination/generics_php.php');


$dbconn = NULL;

function cancelServiceOrder($orderId){
    $flag = false;
    $stmt = NULL;

    if (xconn($dbconn)) {
        try {

            $stmt = mysqli_stmt_init($dbconn);

            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_CANCEL_SERVICE_ORDER'])) {

                if (mysqli_stmt_bind_param($stmt, 's', $orderId)) {

                    if (mysqli_stmt_execute($stmt)) {
                        $flag = !$flag;
                    } else {
                        throw new Exception('*Error en la ejecucion del stmt: ' . mysqli_error($dbconn));
                    }
                } else {
                    throw new Exception('*Error al enlazar parametros de statement: ' . mysqli_error($dbconn));
                }
            } else {
                throw new Exception('*Error en la preparacion de la consulta: ' . mysqli_error($dbconn));
            }

        } catch (Exception $ex) {
            showMsg("*Insert Product: " . $ex->getMessage());
        } finally {
            mysqli_stmt_close($stmt);
            xdisconn($dbconn);
        }
    }
    return $flag;
}

function insertProduct($vals,$order_id){
    $flag = false;
    $stmt = NULL;
    var_dump($vals);
    if (xconn($dbconn)) {
        try {

            $stmt = mysqli_stmt_init($dbconn);

            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_INSERT_PRODUCT'])) {
                if (mysqli_stmt_bind_param($stmt, 'ssssss', $vals[0], $vals[1], $vals[2], $vals[3],$vals[4],$order_id)) {

                    if (mysqli_stmt_execute($stmt)) {
                        $flag = !$flag;
                    } else {
                        throw new Exception('*Error en la ejecucion del stmt: ' . mysqli_error($dbconn));
                    }
                } else {
                    throw new Exception('*Error al enlazar parametros de statement: ' . mysqli_error($dbconn));
                }
            } else {
                throw new Exception('*Error en la preparacion de la consulta: ' . mysqli_error($dbconn));
            }

        } catch (Exception $ex) {
            showMsg("*Insert Product: " . $ex->getMessage());
        } finally {
            mysqli_stmt_close($stmt);
            xdisconn($dbconn);
        }
    }
    return $flag;
}

function exist_curp($curp)
{
    $flag = false;
    $xval = NULL;

    if (xconn($dbconn)) {
        $stmt = NULL;
        $res = NULL;
        try {
            $stmt = mysqli_stmt_init($dbconn);

            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_EXIST_CURP'])) {
                if (mysqli_stmt_bind_param($stmt, 's', $curp)) {
                    if (mysqli_stmt_execute($stmt)) {

                        $res = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
                            $xval = $row[0];
                            break;
                        }
                    } else {
                        throw new Exception('*Error ejecucion de query: ' . mysqli_error($dbconn));
                    }
                } else {
                    throw new Exception('*Error en enlace de parametros: ' . mysqli_error($dbconn));
                }
            } else {
                throw new Exception('*Error en preparacion de consulta: ' . mysqli_error($dbconn));
            }

        } catch (Exception $ex) {
            showMsg(">>EXIST_CURP: " . $ex->getMessage());
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_free_result($res);
            xdisconn($dbconn);
        }
    }

    if($xval == 1){
        return true;
    }
    else{
        return false;
    }
}

function createOrder($curp, $emp_alias)
{
    $flag = false;
    $stmt = NULL;

    if (xconn($dbconn)) {
        try {

            $stmt = mysqli_stmt_init($dbconn);

            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_CREATE_ORDER'])) {

                $fecha = NULL;
                $time = NULL;
                if (mysqli_stmt_bind_param($stmt, 'ssss', $curp, $emp_alias, $fecha, $time)) {

                    if (mysqli_stmt_execute($stmt)) {
                        $flag = !$flag;
                    } else {
                        throw new Exception('*Error en la ejecucion del stmt: ' . mysqli_error($dbconn));
                    }
                } else {
                    throw new Exception('*Error al enlazar parametros de statement: ' . mysqli_error($dbconn));
                }
            } else {
                throw new Exception('*Error en la preparacion de la consulta: ' . mysqli_error($dbconn));
            }

        } catch (Exception $ex) {
            showMsg("*createOrder: " . $ex->getMessage());
        } finally {
            mysqli_stmt_close($stmt);
            xdisconn($dbconn);
        }
    }
    return $flag;
}

//Obtiene el numero de orden de servicio actual
function getOrdenNumber()
{
    $dval = NULL;

    if (xconn($dbconn)) {

        $stmt = NULL;
        $result = NULL;
        try {
            $stmt = mysqli_stmt_init($dbconn);


            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_GET_ORDEN_ID'])) {

                if (mysqli_stmt_execute($stmt)) {

                    $result = mysqli_stmt_get_result($stmt);

                    //showMsg(mysqli_num_rows($result));

                    if ($result) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                            $dval = $row[0];
                            break;
                        }
                    }
                } else {
                    throw new Exception("*Error en ejecucion de consulta: " . mysqli_error($dbconn));
                }
            } else {

                throw new Exception("*Error en preparacion de consulta: " . mysqli_error($dbconn));

            }
        } catch (Exception $ex) {
            showMsg($ex->getMessage());
        } finally {

            mysqli_stmt_close($stmt);

            if ($result) {
                mysqli_free_result($result);
            }

            xdisconn($dbconn);

        }
    }

    return $dval;
}

function getCatprods() //REGRESA NOMBRE DE LAS CATEGORIAS DE product_categories
{
    $dvals = NULL;

    if (xconn($dbconn)) {

        $stmt = NULL;
        $result = NULL;
        try {
            $stmt = mysqli_stmt_init($dbconn);


            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_GET_CATEGORIES_PRODUCTS'])) {

                if (mysqli_stmt_execute($stmt)) {

                    $result = mysqli_stmt_get_result($stmt);

                    //showMsg(mysqli_num_rows($result));

                    if ($result) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                            $dvals[] = $row;
                        }
                    }
                } else {
                    throw new Exception("*Error en ejecucion de consulta: " . mysqli_error($dbconn));
                }
            } else {

                throw new Exception("*Error en preparacion de consulta: " . mysqli_error($dbconn));

            }
        } catch (Exception $ex) {
            showMsg($ex->getMessage());
        } finally {

            mysqli_stmt_close($stmt);

            if ($result) {
                mysqli_free_result($result);
            }

            xdisconn($dbconn);

        }
    }

    return $dvals;
}

function getRegisters($xusr, $xname, $xd1, $xd2)
{
    $dvals = NULL;

    if (xconn($dbconn)) {

        $stmt = NULL;
        $result = NULL;
        try {
            $stmt = mysqli_stmt_init($dbconn);


            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_GET_REGISTERS_USRDATE'])) {

                if (mysqli_stmt_bind_param($stmt, 'ssss', $xusr, $xname, $xd1, $xd2)) {

                    if (mysqli_stmt_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);

                        //showMsg(mysqli_num_rows($result));

                        if ($result) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                $dvals[] = $row;
                            }
                        }
                    } else {
                        throw new Exception("*Error en ejecucion de consulta: " . mysqli_error($dbconn));
                    }
                } else {
                    throw new Exception("*Error en enlaze de parametros: " . mysqli_error($dbconn));
                }

            } else {

                throw new Exception("*Error en preparacion de consulta: " . mysqli_error($dbconn));

            }
        } catch (Exception $ex) {
            showMsg($ex->getMessage());
        } finally {

            mysqli_stmt_close($stmt);

            if ($result) {
                mysqli_free_result($result);
            }

            xdisconn($dbconn);

        }
    }

    return $dvals;
}

function get_usrType($alias)
{
    $utype = NULL;

    if (xconn($dbconn)) {
        $stmt = NULL;
        $res = NULL;
        try {
            $stmt = mysqli_stmt_init($dbconn);

            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_GETUSRTYPE'])) {
                if (mysqli_stmt_bind_param($stmt, 's', $alias)) {
                    if (mysqli_stmt_execute($stmt)) {
                        $res = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                            $utype = $row["ROL"];
                            break;
                        }
                    } else {
                        throw new Exception('*Error ejecucion de query: ' . mysqli_error($dbconn));
                    }
                } else {
                    throw new Exception('*Error en enlace de parametros: ' . mysqli_error($dbconn));
                }
            } else {
                throw new Exception('*Error en preparacion de consulta: ' . mysqli_error($dbconn));
            }

        } catch (Exception $ex) {
            showMsg(">>get_usrType: " . $ex->getMessage());
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_free_result($res);
            xdisconn($dbconn);
        }
    }

    return $utype;
}

function register_event_cc($etype, $usrname, $comm)
{
    $flag = false;
    $stmt = NULL;

    if (xconn($dbconn)) {
        try {

            $stmt = mysqli_stmt_init($dbconn);

            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_INSERT_EVENT2'])) {

                if (mysqli_stmt_bind_param($stmt, 'sss', $etype, $usrname, $comm)) {

                    if (mysqli_stmt_execute($stmt)) {
                        $flag = !$flag;
                    } else {
                        throw new Exception('*Error en la ejecucion del stmt: ' . mysqli_error($dbconn));
                    }
                } else {
                    throw new Exception('*Error al enlazar parametros de statement: ' . mysqli_error($dbconn));
                }
            } else {
                throw new Exception('*Error en la preparacion de la consulta: ' . mysqli_error($dbconn));
            }

        } catch (Exception $ex) {
            showMsg("*Registro de evento: " . $ex->getMessage());
        } finally {
            mysqli_stmt_close($stmt);
            xdisconn($dbconn);
        }
    }
    return $flag;
}


function register_event($etype, $usrname)
{
    $flag = false;
    $stmt;

    if (xconn($dbconn)) {
        try {

            $stmt = mysqli_stmt_init($dbconn);

            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_INSERT_EVENT'])) {

                if (mysqli_stmt_bind_param($stmt, 'ss', $etype, $usrname)) {

                    if (mysqli_stmt_execute($stmt)) {
                        $flag = !$flag;
                    } else {
                        throw new Exception('*Error en la ejecucion del stmt: ' . mysqli_error($dbconn));
                    }
                } else {
                    throw new Exception('*Error al enlazar parametros de statement: ' . mysqli_error($dbconn));
                }
            } else {
                throw new Exception('*Error en la preparacion de la consulta: ' . mysqli_error($dbconn));
            }

        } catch (Exception $ex) {
            showMsg($ex->getMessage());
        } finally {
            mysqli_stmt_close($stmt);
            xdisconn($dbconn);
        }
    }
    return $flag;
}

function delete_user($curp)
{
    $flag = false;
    $stmt;
    if (xconn($dbconn)) {

        try {
            $stmt = mysqli_stmt_init($dbconn);

            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_DELETEUSR'])) {

                if (!mysqli_stmt_bind_param($stmt, 's', $curp)) {
                    throw new exception('Error al enlazar parametros:' . mysqli_error($dbconn));
                } elseif (!mysqli_stmt_execute($stmt)) {
                    throw new Exception("Error en ejecucion de Query: " . mysqli_error($dbconn));
                } else {
                    $flag = !$flag;
                }
            } else {
                throw new exception("Fallo preparacion de la sentencia: " . mysqli_error($dbconn));
            }
        } catch (Exception $ex) {
            showMsg($ex->getMessage());
        } finally {
            mysqli_stmt_close($stmt);
            xdisconn($dbconn);
        }
    }
    return $flag;
}


//$name, $apellido, $rfc, $curp, $calle, $colonia, $numero, $cp, $fecha, $cd, $edo, $correo, $telcel, $telcasa
function register_user($_arr)
{
    $flag = ['state' => true, 'msg' => NULL];
    $stmt = NULL;
    if (xconn($dbconn)) {
        try {

            if ($stmt = mysqli_prepare($dbconn, $GLOBALS['SP_INSERT_USR'])) {

                if (!mysqli_stmt_bind_param($stmt, 'ssssssssssssss', $_arr['name'], $_arr['apellido'], $_arr['rfc'], $_arr['curp'], $_arr['calle'], $_arr['colonia'], $_arr['numero'], $_arr['cp'], $_arr['fecha'], $_arr['cd'], $_arr['edo'], $_arr['correo'], $_arr['telcel'], $_arr['telcasa'])) {
                    throw new exception('Error al enlazar parametros: ' . mysqli_error($dbconn));
                } elseif (!mysqli_stmt_execute($stmt)) {
                    throw new exception(mysqli_error($dbconn));
                }
            } else {
                throw new exception("Error en preparacion de consulta: " . mysqli_error($dbconn));
            }
        } catch (Exception $ex) {
            $flag['msg'] = $ex->getMessage();
            $flag['state'] = !$flag['state'];
        } finally {
            mysqli_stmt_close($stmt);
            xdisconn($dbconn);
        }
    }
    return $flag;
}

//$arr = ["name"=>'jose saul','apellido'=>'de lira','rfc'=>'123456','curp'=>'12345657','calle'=>'LOS CABOS','colonia'=>'centro','numero'=>'7','cp'=>33800,'fecha'=>'2015-01-28','cd'=>'chihuahua','edo'=>'ed chihuahua', 'correo'=>'a30142e59@uach.mx', 'telcel' => '6275257501', 'telcasa' => '6271137795'];
function register_client_credential($_arr)
{
    $flag = true;
    $stmt = NULL;
    if (xconn($dbconn)) {
        try {

            if ($stmt = mysqli_prepare($dbconn, $GLOBALS['SP_INSERT_CUST'])) {

                if (!mysqli_stmt_bind_param($stmt, 'sss', $_arr['uname'], $_arr['pass1'], $_arr['curp'])) {
                    throw new exception('Error al enlazar parametros: ' . mysqli_error($dbconn));
                } elseif (!mysqli_stmt_execute($stmt)) {
                    throw new exception(mysqli_error($dbconn));
                }
            } else {
                throw new exception("Error en preparacion de consulta: " . mysqli_error($dbconn));
            }
        } catch (Exception $ex) {
            showMsg($ex->getMessage());
            $flag = !$flag;
        } finally {
            mysqli_stmt_close($stmt);
            xdisconn($dbconn);
        }
    }
    return $flag;
}


function exist_usrname($alias)
{
    $flag = false;
    $stmt = NULL;
    if (xconn($dbconn)) {
        try {
            $stmt = mysqli_stmt_init($dbconn);

            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_USRNAME'])) {

                if (!mysqli_stmt_bind_param($stmt, 's', $alias)) {
                    throw new exception('Error al enlazar parametros:' . mysqli_error($dbconn));
                } elseif (!mysqli_stmt_execute($stmt)) {
                    throw new Exception("Error en ejecucion de Query: " . mysqli_error($dbconn));
                } else {
                    $res = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
                        $flag = !$flag;
                        break;
                    }
                }
            } else {
                throw new exception("Fallo preparacion de la sentencia: " . mysqli_error($dbconn));
            }
        } catch (Exception $ex) {
            showMsg($ex->getMessage());
        } finally {
            mysqli_stmt_close($stmt);
            xdisconn($dbconn);
        }
    }
    return $flag;
}

function exist_credential(&$alias, &$pass)
{
    $flag = false;
    $stmt = NULL;
    if (xconn($dbconn)) {

        $alias = stripslashes($alias);
        $pass = stripslashes($pass);

        try {
            $stmt = mysqli_stmt_init($dbconn);

            if (mysqli_stmt_prepare($stmt, $GLOBALS['SP_LOGIN'])) {

                if (!mysqli_stmt_bind_param($stmt, 'ss', $alias, $pass)) {
                    throw new exception('Error al enlazar parametros:' . mysqli_error($dbconn));
                } elseif (!mysqli_stmt_execute($stmt)) {
                    throw new Exception("Error en ejecucion de Query: " . mysqli_error($dbconn));
                } else {
                    $res = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
                        $flag = !$flag;
                        break;
                    }
                }
            } else {
                throw new exception("Fallo preparacion de la sentencia: " . mysqli_error($dbconn));
            }
        } catch (Exception $ex) {
            showMsg($ex->getMessage());
        } finally {
            mysqli_stmt_close($stmt);
            xdisconn($dbconn);
        }
    }
    return $flag;
}

function xconn(&$conn)
{
    $var = false;
    try {
        $conn = mysqli_connect($GLOBALS['db_hostname'], $GLOBALS['db_usr'], $GLOBALS['db_pass'], $GLOBALS['db_name']);

        if ($conn) {
            $var = !$var;
        } else {
            throw new Exception("Imposible Conectarse: " . mysqli_error($conn));
        }
    } catch (Exception $ex) {
        showMsg($ex->getMessage());
    }
    return $var;
}

function xdisconn(&$conn)
{
    $var = false;
    try {
        if (!mysqli_close($conn)) {
            throw new exception("No se ha podido desconectar del servidor: " . mysqli_error($dbconn));
        } else {
            $var = !$var;
        }
    } catch (Exception $ex) {
        showMsg($ex->getMessage());
    }
    return $var;
}

function fogeo()
{
    if (xconn($dbconn)) {

        $sql = "SELECT * FROM USERS";
        if ($res = mysqli_query($dbconn, $sql)) {
            if (mysqli_num_rows($res) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Firstname</th>";
                echo "<th>Lastname</th>";
                echo "<th>CURP</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['apellido'] . "</td>";
                    echo "<td>" . $row['rfc'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No matching records are found.";
            }

            xdisconn($dbconn);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconn);
        }

    }
}

?>
