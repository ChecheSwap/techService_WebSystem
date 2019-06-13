<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/pagination/session_php.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/websys/INCLUSIONS/linker_base.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/session_expire_php.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>WebSys>>Alta de Cliente</title>

</head>

<nav class="navbar navbar-expand  navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="../LOGIN/login.php">
        <img class="xresize" src="../../images/tlogo.png" alt=""/>
    </a>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow ">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-2x"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#"> Información</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../LOGIC/pagination/logout_php.php">Salir</a>
            </div>
        </li>
    </ul>
</nav>


<body class="bg-secondary">

<div class="jumbotron bg-gray">
    <h1 class="text-center font-italic">Registro de Cliente</h1>
    <p class="text-center">Dar de alta un cliente al sistema al igual que la creacion de su cuenta de acceso.</p>
</div>

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header"> >>Registro de Cliente</div>
        <div class="card-body">

            <form action="../../LOGIC/users/alta_usr_php.php" method="POST">

                <div class="form-group">

                    <div class="form-row">

                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="txtname" id="txtname" class="form-control" placeholder="Nombre"
                                       required="required" autofocus>
                                <label for="txtname">*Nombre(s)</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="txtlname" id="txtlname" class="form-control"
                                       placeholder="Apellido(s)" required="required">
                                <label for="txtlname">*Apellido(s)</label>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ROW 1-->
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="date" name="txtfecha" id="txtfecha" class="form-control" placeholder="#"
                                       required="required">
                                <label for="txtfecha">Fecha de Nacimiento</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="email" name="txtemail" id="txtemail" class="form-control"
                                       placeholder="Dirección de correo electrónico" required="required">
                                <label for="txtemail"> *Dirección de correo electrónico</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" name="txtuname" id="txtuname" class="form-control"
                               placeholder="Nombre de Usuario" required="required">
                        <label for="txtuname"> *Nombre de Usuario (Alias)</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="password" name="txtpass1" id="txtpass1" class="form-control"
                                       placeholder="Contraseña" required="required">
                                <label for="txtpass1">*Contraseña</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="password" name="txtpass2" id="txtpass2" class="form-control"
                                       placeholder="Confirmar Contraseña" required="required">
                                <label for="txtpass2">*Confirmar Contraseña</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROW 4-->
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="txtcurp" id="txtcurp" class="form-control" placeholder="CURP"
                                       required="required" maxlength="18">
                                <label for="txtcurp"> *CURP</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="txtrfc" id="txtrfc" class="form-control"
                                           placeholder="R.F.C"
                                           required="required" maxlength="13">
                                    <label for="txtrfc"> R.F.C. </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---ROW5 --->
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="txtcalle" id="txtcalle" class="form-control"
                                       placeholder="*Calle"
                                       required="required">
                                <label for="txtcalle"> *Calle</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="txtcolonia" id="txtcolonia" class="form-control"
                                           placeholder="*Colonia" required="required">
                                    <label for="txtcolonia"> *Colonia </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- ROW6 --->
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="txtnumero" id="txtnumero" class="form-control"
                                       placeholder="*Numero Vivienda" required="required">
                                <label for="txtnumero"> *Numero Vivienda </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="txtcp" id="txtcp" class="form-control" placeholder="*Cp."
                                           required="required">
                                    <label for="txtcp"> *CP. </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- row 7 --->
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="txtcd" id="txtcd" class="form-control" placeholder="*Ciudad"
                                       required="required">
                                <label for="txtcd"> *Ciudad </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="txtedo" id="txtedo" class="form-control"
                                           placeholder="*Estado"
                                           required="required">
                                    <label for="txtedo"> *Estado </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- row 8--->
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="txttelmovil" id="txttelmovil" class="form-control"
                                       placeholder="*Telefono Celular" required="required">
                                <label for="txttelmovil"> *Telefono Celular </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="txttelcasa" id="txttelcasa" class="form-control"
                                           placeholder="*Telefono de Casa" required="required">
                                    <label for="txttelcasa"> *Telefono de Casa </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- ROW 9--->

                <button type="submit" class="btn btn-primary btn-block" name="btnreg" id="btnreg">Registrar</button>
            </form>
        </div>
    </div>
</div>

<br>


<div class="container bg-transparent" align="center">
    <a class="btn btn-info align-content-center font-weight-bold" href="usr_central.php">Regresar a Sección
        Principal</a>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<footer class="footer custom-footer bg-dark">
    <div class="container my-auto text-center">

        <div class="copyright text-center my-auto">
            <br>
            <span class="font-italic text-white"> Powered by: @ChecheSwap </span>
            <hr style="border-color:white">
            <a href="https://github.com/ChecheSwap" target="_blank"><img class="img-responsive" align=center
                                                                         src='../../images/ft.png' style="max-height:40px;"></a>
            <br>
        </div>
    </div>
</footer>

</body>
</html>

