<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Portal de Alumnos Ing. Industrial</title>
        <link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap-responsive.css"/>
        <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
        <link rel="shortcut icon" href="../indexprincipal/picture/favicon.png">

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

                            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <!-- Be sure to leave the brand out there if you want it shown -->
                            <ul class="nav">
                                <li><a href="index.php">Inicio</a> </li>
                                <li class="divider-vertical"></li>
                            </ul>
                            <!-- Everything you want hidden at 940px or less, place within here -->
                            <div class="nav-collapse collapse">
                                <ul class="nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Grupos<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="inicializarCurso.php">Iniciar Curso</a></li>
                                            <li><a href="CreaGrupo.php">Crear grupo</a></li>
                                            <li><a href="#">Agregar alumnos</a></li>
                                        </ul>
                                    </li>                       
                                    <li class="divider-vertical"></li>
                                    <li><a href="comentarios.php">Avisos</a> </li>
                                    <li class="divider-vertical"></li>
                                    <li class="dropdown">
                                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Eventos<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="ConsultarEventos.php">Consultar Eventos</a> </li>
                                            <li><a href="fecha.php">Inicializar Eventos</a> </li>
                                        </ul>
                                    </li> 
                                    <li class="divider-vertical"></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tutorias<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="asignacionTutorAlumno.php">Asignar Tutor alumno</a></li>
                                            <li><a href="asignarMaestroTutor.php">Asignar Maestro Tutor</a></li>
                                        </ul>
                                    </li> 
                                    <li class="divider-vertical"></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="notasAlumnos.php">Consultar Alumnos</a> </li>
                                            <li><a href="autorizacionCorreos.php">Autorizaccion de Acceso</a></li>
                                            <li><a href="AlumnosGrupo.php">Agregar alumnos</a></li>
                                            <!--<li><a href="alumnosInscritos.php">Alumnos Inscritos</a></li>-->
                                        </ul>
                                    </li> 
                                    <li class="divider-vertical"></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resultados<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="resultadoPrecarga.php">Precarga</a></li>
                                            <li><a href="resultadosEncuestaTutorias.php">Encuestas</a></li>
                                        </ul>
                                    </li> 
                                    <li class="divider-vertical"></li>
                                    <li><a href="Estadisticos.php">Estadisticas</a></li>
                                    <li class="divider-vertical"></li>
                                    <li><a href="cerrarSesion.php">Cerrar Sessión</a> </li>
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

