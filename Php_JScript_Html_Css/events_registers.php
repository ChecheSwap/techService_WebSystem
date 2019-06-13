<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/websys/INCLUSIONS/linker_events_registers.php"); //SCRIPTS

require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/LOGIC/events_registers/events_registers_php.php'); //CONTROLLER

require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/session_php.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/session_expire_php.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>WebSys>>Registro de Eventos</title>

    <link rel="icon" type="image/x-icon" href="../images/CUBEVI.ico"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Jesús José Navarrete Baca">
    <meta name="author" content="Jesús José Navarrete Baca">
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../CSS/cssBase.css" rel="stylesheet">


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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
    <h1 class="text-center font-italic">Consulta de Eventos (Version Estandar)</h1>
    <p class="text-center">Realizar consultas de los eventos generados por los usuarios al interactuar con el
        sistema.</p>
</div>

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header"> Rubricas de Consulta</div>

        <div class="card-body">

            <form method="POST" action="../../LOGIC/events_registers/events_registers_php.php">

                <div class="form-group">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" name="txtalias" id="txtalias" class="form-control"
                                           placeholder="Alias Usuario" autofocus>
                                    <label for="txtalias">Alias Usuario</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" name="txtname" id="txtname" class="form-control"
                                           placeholder="Nombre de Usuario" autofocus>
                                    <label for="txtname">Nombre de Usuario</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="form-row">

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" name="txtd1" id="txtd1" class="form-control"
                                           placeholder="Fecha Inicial" autofocus>
                                    <label for="txtd1">Fecha Inicial</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" name="txtd2" id="txtd2" class="form-control"
                                           placeholder="Fecha Final" autofocus>
                                    <label for="txtd2">Fecha Final</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" name="btnok" id="btnok" class="btn btn-primary btn-success btn-block">Realizar
                        Busqueda
                    </button>

                    <button type="reset" name="btnclear" id="btnclear" class="btn btn-secondary btn-block">Limpiar
                        Datos
                    </button>
            </form>
        </div>
    </div>
</div>
<br>
<div class="container bg-light">
    <div class="card-header">>>Lista de Eventos</div>
    <div class="card-body">

        <table class="table table-striped" id="xtable">

            <thead>
            <tr class="table-info">

                <th scope="col">-Tipo de Evento</th>
                <th scope="col">-Alias de Usuario</th>
                <th scope="col">-Nombre de Usuario</th>
                <th scope="col">-Rol</th>
                <th scope="col">-Fecha</th>
                <th scope="col">-Hora</th>
                <th scope="col">-Comentario</th>

            </tr>

            </thead>
            <tfoot style="font-style: italic">
            <tr class="table-info">

                <td>Tipo de Evento</td>
                <td>Alias Usuario</td>
                <td>Nombre de Usuario</td>
                <td>Rol de Usuario</td>
                <td>Fecha</td>
                <td>Hora</td>
                <td>Comentario</td>

            </tr>
            </tfoot>

            <tbody>

            <?php
            if (!empty($dvals)) {

                foreach ($dvals as $keyheader => $key) {

                    ?>
                    <tr>
                        <td><?php echo $key["TIPO_DE_EVENTO"] ?></td>
                        <td><?php echo $key["ALIAS_USUARIO"] ?></td>
                        <td><?php echo $key["NOMBRE"]." ".$key["APELLIDO"] ?></td>
                        <td><?php echo $key["ROL_DE_USUARIO"] ?></td>
                        <td><?php echo $key["FECHA"] ?></td>
                        <td><?php echo $key["HORA"] ?></td>
                        <td><?php echo $key["COMENTARIO"] ?></td>
                    </tr>

                <?php }
            }

            ?>

            </tbody>

        </table>
    </div>
</div>

<br>

<div class="container bg-transparent" align="right">
    <a class="btn btn-dark align-content-center font-weight-bold" href="events_registers_complex.php">*Ver Version Extendida</a>
    <a class="btn btn-warning align-content-center font-weight-bold" href="events_central.php">Regresar a Sección Principal</a>
</div>


<br>
<br>
<br>
<br>
<br>


<
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


<script type="text/javascript">
    $(document).ready(function () {
        $('#xtable').DataTable(
            {
                "language":
                    {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "*Mostrar _MENU_ Eventos",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible",
                        "sInfo": "Resultados del (_START_) al (_END_) de (_TOTAL_) eventos",
                        "sInfoEmpty": "Resultado del 0 al 0 de un total de 0 eventos",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ eventos)",
                        "sInfoPostFix": "",
                        "sSearch": "*Sub Busqueda:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }

                , "scrollY": 600
                , "scrollX": false
            }
        );
    });
</script>

</body>
</html>