<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/login/login_php.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/INCLUSIONS/linker_login.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>WebSys>>Ingresar</title>
</head>

<nav class="navbar navbar-expand  navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="login.php">
        <img class="xresize" src="../../images/tlogo.png" alt="I1"/>
    </a>
</nav>

<body class="bg-primary">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header"> >>Iniciar Sesión<<</div>
        <div class="card-body">

            <form method="POST">

                <div class="form-group">

                    <div class="form-label-group">

                        <input name=txtusr type="text" id="inputEmail" class="form-control"
                               placeholder="Usuario"
                               required="required" autofocus="autofocus">
                        <label for="inputEmail">*Usuario</label>

                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <input name=txtpass type="password" id="inputPassword" class="form-control"
                               placeholder="Contraseña" required="required">
                        <label for="inputPassword">*Contraseña</label>
                    </div>
                </div>

                <br>
                <button name="btnok" class="btn btn-primary btn-block">Ingresar</button>
            </form>
        </div>
        <div class="card-footer text-muted text-center bg-light">Set Web Beta</div>
    </div>
</div>

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
</div>


</body>
</html>
