<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/INCLUSIONS/linker_base.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/INCLUSIONS/linker_datatable_editable.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/pagination/session_php.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/session_expire_php.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/servicio/registro_orden_php.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>WebSys>>Crear Orden de Servicio</title>

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
    <h1 class="text-center font-italic">Orden de Reparacion-Recepcion</h1>
    <p class="text-center">Se crea una orden de reparacion con uno o varios productos.</p>
</div>



<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-gray"> >>Orden de Reparación</div>
        <br>
        <p>-Numero de Orden:</p>
        <input name=idreparacion type="text" id="idreparacion" class="form-control rounded-0" placeholder="*Numero de Reparacion" required="required" autofocus="autofocus" maxlength="18" minlength="18" readonly="true" value="<?php echo htmlspecialchars($orden_number)?>">

        <div class="card-body bg-light">

            <div class="container">
                <div class="card-header bg-info">1.- CURP Cliente</div>
                <div class="card-body bg-gray">
                    <p>*Ingrese CURP de cliente:</p>
                    <input name=txtcurp type="text" id="txtcurp" class="form-control" placeholder="*CURP" required="required" autofocus="autofocus" maxlength="18" minlength="18">

                </div>
            </div>

            <br>

            <div class="text-center">
                <p class="text-capitalize">*Lista de Categorias de productos:</p>
                <textarea class="form-control rounded-0" cols="100" readonly="true"><?php echo($catvals) ?></textarea>
            </div>

            <br>

            <div class="container-fluid">

                <div class="card">
                    <div class="card-header bg-info font-weight-bold text-center">2.- Equipo de Orden</div>

                    <div class="card-body bg-light">

                        <table class="table table-responsive-md table-sm table-bordered" id="makeEditable">
                            <thead>
                            <tr>
                                <th>*Numero de Serie</th>
                                <th>*Categoria</th>
                                <th>*Marca</th>
                                <th>*Modelo</th>
                                <th>*Descripcion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <span style="float:right"><button id="but_add" class="btn btn-info">Agregar Equipo</button></span>

                    </div>
                </div>


            </div>

            <br>

            <input type="button" onclick="ajax_request()" class="btn-block btn-warning btn" value="Crear Orden de Servicio">
        </div>
    </div>
</div>

<br>


<div class="container bg-transparent" align="center">
    <a class="btn btn-info align-content-center font-weight-bold" href="servicio_central.php">Regresar a Sección
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
                                                                         src='../../images/ft.png'
                                                                         style="max-height:40px;"></a>
            <br>
        </div>
    </div>
</footer>


<script src="registro_orden_js.js"></script>

</body>
</html>
