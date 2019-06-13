<?PHP

require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/INCLUSIONS/linker_base.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/pagination/session_php.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/home/home_php.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/session_expire_php.php');

?>

<!DOCTYPE html>

<html lang="es">
<link rel="icon" href="../../images/CUBEVI.ico">

<head>
    <title>WebSys>>Inicio</title>
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

<br>

<div class="container-fluid mt-4">
    <div class="row justify-content-center">

        <div class="col-auto mb-3">

            <div class="card bg-light" style="width: 300px;">
                <img class="img-responsive bg-primary2" src="../../images/xusers.png" alt="Card image" style="max-width:300px; height:280px;">
                <div class="card-body">
                    <h4 class="card-title">>>Usuarios</h4>
                    <p class="card-text">Alta, edicion y consulta de usuarios.</p>
                    <a href="../USERS/usr_central.php" class="btn btn-primary btn-block">Ir a sección.</a>
                </div>
            </div>

        </div>
        <div class="col-auto mb-3">

            <div class="card bg-light" style="width: 300px;">
                <img class="img-responsive bg-primary2" src="../../images/xevent.png" alt="Card image" style="max-width:300px; height:280px;">
                <div class="card-body">
                    <h4 class="card-title">>>Eventos</h4>
                    <p class="card-text">Eventos de Usuarios.</p>

                    <a href="../EVENTS/events_central.php" class="btn btn-primary btn-block">Ir a sección.</a>
                </div>
            </div>

        </div>

        <div class="col-auto mb-3">

            <div class="card bg-light" style="width: 300px;">
                <img class="img-responsive bg-primary2" src="../../images/crepair.png" alt="Card image" style="max-width:300px; height:280px;">
                <div class="card-body">
                    <h4 class="card-title">>>Servicios</h4>
                    <p class="card-text">Servicios de reparacion.</p>

                    <a href="../SERVICIO/servicio_central.php" class="btn btn-primary btn-block">Ir a sección.</a>
                </div>
            </div>

        </div>

    </div>
</div>

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
