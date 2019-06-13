<?PHP

require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/session_php.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/session_expire_php.php');

?>

<!DOCTYPE html>

<html lang="es">
<link rel="icon" href="../../images/CUBEVI.ico">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Jesús José Navarrete Baca">
  <meta name="author" content="Jesús José Navarrete Baca">
  <title>WebSys>>Inicio</title>
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../CSS/cssLogin.css" rel="stylesheet">

</head>
  <nav class="navbar navbar-expand  navbar-dark bg-dark static-top">
  <a class="navbar-brand mr-1" href="home_customer.php">
    <img class="xresize" src="../../images/tlogo.png"/>
  </a>

  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
  </form>

  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown no-arrow ">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-2x"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#"> Información</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../../LOGIC/pagination/logout_php.php" >Salir</a>
      </div>
    </li>

  </ul>

  </nav>

<body class="bg-primary">


<footer class="footer custom-footer bg-dark">
    <div class="container my-auto text-center">

        <div class="copyright text-center my-auto">
            <br>
            <span class="font-italic text-white"> Powered by: @ChecheSwap </span>
            <hr style="border-color:white">
            <a href="https://github.com/ChecheSwap" target="_blank"><img class="img-responsive" align=center src='../../images/ft.png' style="max-height:40px;" ></a>
            <br>
        </div>
    </div>
</footer>


<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>
