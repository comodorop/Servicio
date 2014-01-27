<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Portal de Alumnos Ing. Industrial</title>
        <link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap-responsive.css"/>
        <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
        <link rel="shortcut icon" href="../indexPrincipal/picture/favicon.png">
        <style>
            .edgeLoad-EDGE-3614109{
                visibility:hidden; 
            }
            body{ 
                background: url(galeria/backgroundfinal.png)  center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="masthead">
                <div style="padding: 0 0 25% 0; border-radius: 5px;" id="Stage" class="EDGE-3614109"/></div>
            <div class="navbar-wrapper">
                <div class="container">
                    <div class="navbar navbar-inverse">
                        <div class="navbar-inner">
                            <!--                        .btn-navbar is used as the toggle for collapsed navbar content -->
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <!--                        Be sure to leave the brand out there if you want it shown -->
                            <ul class="nav">
                                <li><a href="index.php">Inicio</a></li>
                            </ul>
                            <!--                        Everything you want hidden at 940px or less, place within here -->
                            <div class="nav-collapse collapse">
                                <ul class="nav">
                                    <li class="divider-vertical"></li>
                                    <li><a href="perfil.php">Editar perfil</a></li>
                                    <li class="divider-vertical"></li>
                                    <li><a href="organigrama/Dinamicamente.php">Historial</a></li>
                                    <li class="divider-vertical"></li>
                                    <li><a href="mostrarCalificaciones.php">Calificaciones</a> </li>
                                    <li class="divider-vertical"></li>
                                    <li><a href="cargaArchivos.php">Creditos Extra</a> </li>
                                    <li class="divider-vertical"></li>
                                    <li><a href="cargaMaterias.php">Creacion de grupos</a> </li>
                                    <?php
                                    session_start();
                                    $val2 = $_SESSION["menuAlumnos"];
                                    $valido = $_SESSION["validarFechas"];
                                    if ($valido == true) {
//                                    $usuario = $_SESSION['UsuarioAlumno'];
//                                    include '../Dao/dao.php';
//                                    $dao = new dao();
//                                    $val2 = $dao->dameMenu($usuario);
                                        if ($val2 == 0) {
                                            ?>
                                            <li class="divider-vertical"></li>
                                            <li><a href="cuestionarioTutoria.php">Encuesta Tutoria</a> </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <li class="divider-vertical"></li>
                                    <li><a href="encuestaTutorias.php">Encuesta Socieconomica</a> </li>
                                    <li class="divider-vertical"></li>
                                    <li><a href="cerrarSesion.php">Cerrar sesion</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <script src="../bootsTrap2/js/jquery.js"></script>
    <script src="../bootsTrap2/js/bootstrap.js"></script>
    <script type="text/javascript" src="../alertify/lib/alertify.js"></script>
    <script type="text/javascript" charset="utf-8" src="../headeranima/koko_edgePreload.js"></script>
</body>
</html>
