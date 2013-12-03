<?php
session_start();
include './validacionseSession.php';
$checar = new validacionseSession;
$checar->verificacionSession();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Portal de Alumnos Ing. Industrial</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap-responsive.css"/>
        <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
        <link rel="shortcut icon" href="../indexprincipal/picture/favicon.png">
        <style>
            /* GLOBAL STYLES
     -------------------------------------------------- */
            /* Padding below the footer and lighter body text */

            body {
                padding-bottom: 40px;
                color: #5a5a5a;
            }
            /* CUSTOMIZE THE NAVBAR
            -------------------------------------------------- */

            /* Special class on .container surrounding .navbar, used for positioning it into place. */
            .navbar-wrapper {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                z-index: 10;
                margin-top: 20px;
                margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
            }
            .navbar-wrapper .navbar {
            }
            /* Remove border and change up box shadow for more contrast */
            .navbar .navbar-inner {
                border: 0;
                -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
                -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
                box-shadow: 0 2px 10px rgba(0,0,0,.25);
            }
            /* Downsize the brand/project name a bit */
            .navbar .brand {
                padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
                font-size: 16px;
                font-weight: bold;
                text-shadow: 0 -1px 0 rgba(0,0,0,.5);
            }
            /* Navbar links: increase padding for taller navbar */
            .navbar .nav > li > a {
                padding: 15px 20px;
            }
            /* Offset the responsive button for proper vertical alignment */
            .navbar .btn-navbar {
                margin-top: 10px;
            }
            /* CUSTOMIZE THE CAROUSEL
            -------------------------------------------------- */
            /* Carousel base class */
            .carousel {
                margin-bottom: 60px;
            }
            .carousel .container {
                position: relative;
                z-index: 9;
            }
            .carousel-control {
                height: 80px;
                margin-top: 0;
                font-size: 120px;
                text-shadow: 0 1px 1px rgba(0,0,0,.4);
                background-color: transparent;
                border: 0;
                z-index: 10;
            }
            .carousel .item {
                height: 500px;
            }
            .carousel img {
                position: absolute;
                top: 0;
                left: 0;
                min-width: 100%;
                height: 500px;
            }
            .carousel-caption {
                background-color: transparent;
                position: static;
                max-width: 550px;
                padding: 0 20px;
                margin-top: 200px;
            }
            .carousel-caption h1,
            .carousel-caption .lead {
                margin: 0;
                line-height: 1.25;
                color: #fff;
                text-shadow: 0 1px 1px rgba(0,0,0,.4);
            }
            .carousel-caption .btn {
                margin-top: 10px;
            }
            /* MARKETING CONTENT
            -------------------------------------------------- */
            /* Center align the text within the three columns below the carousel */
            .marketing .span4 {
                text-align: center;
            }
            .marketing h2 {
                font-weight: normal;
            }
            .marketing .span4 p {
                margin-left: 10px;
                margin-right: 10px;
            }
            /* Featurettes
            ------------------------- */
            .featurette-divider {
                margin: 80px 0; /* Space out the Bootstrap <hr> more */
            }
            .featurette {
                padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
                overflow: hidden; /* Vertically center images part 2: clear their floats. */
            }
            .featurette-image {
                margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
            }

            /* Give some space on the sides of the floated elements so text doesn't run right into it. */
            .featurette-image.pull-left {
                margin-right: 40px;
            }
            .featurette-image.pull-right {
                margin-left: 40px;
            }
            /* Thin out the marketing headings */
            .featurette-heading {
                font-size: 50px;
                font-weight: 300;
                line-height: 1;
                letter-spacing: -1px;
            }
            /* RESPONSIVE CSS
            -------------------------------------------------- */
            @media (max-width: 979px) {

                .container.navbar-wrapper {
                    margin-bottom: 0;
                    width: auto;
                }
                .navbar-inner {
                    border-radius: 0;
                    margin: -20px 0;
                }

                .carousel .item {
                    height: 500px;
                }
                .carousel img {
                    width: auto;
                    height: 500px;
                }

                .featurette {
                    height: auto;
                    padding: 0;
                }
                .featurette-image.pull-left,
                .featurette-image.pull-right {
                    display: block;
                    float: none;
                    max-width: 40%;
                    margin: 0 auto 20px;
                }
            }
            @media (max-width: 767px) {

                .navbar-inner {
                    margin: -20px;
                }

                .carousel {
                    margin-left: -20px;
                    margin-right: -20px;
                }
                .carousel .container {

                }
                .carousel .item {
                    height: 300px;
                }
                .carousel img {
                    height: 300px;
                }
                .carousel-caption {
                    width: 65%;
                    padding: 0 70px;
                    margin-top: 100px;
                }
                .carousel-caption h1 {
                    font-size: 30px;
                }
                .carousel-caption .lead,
                .carousel-caption .btn {
                    font-size: 18px;
                }

                .marketing .span4 + .span4 {
                    margin-top: 40px;
                }

                .featurette-heading {
                    font-size: 30px;
                }
                .featurette .lead {
                    font-size: 18px;
                    line-height: 1.5;
                }

            }
        </style>
    </head>
    <body>
        <div class="navbar-wrapper">
            <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
            <div class="container">
                <div class="navbar navbar-inverse">
                    <div class="navbar-inner">
                        <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="brand" href="#myModal" data-toggle="modal">Iniciar Sesion</a>
                        <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <li><a href="#myModal2" data-toggle="modal">Registro de Usuario</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div><!-- /.navbar-inner -->
                </div><!-- /.navbar -->
            </div> <!-- /.container -->
        </div><!-- /.navbar-wrapper -->
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="../indexprincipal//carrusel/indusreel.png" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Te damos la bienvenida</h1>
                            <p class="lead">Al portal de alumnos de la carrera en ingeniería industrial.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="../indexprincipal//carrusel/tecreel.png" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Itmerida.edu.mx</h1>
                            <p class="lead">Vista la página oficial del Instituto Tecnológico de Mérida.</p>
                            <a class="btn btn-primary" href="#">Ir</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div><!-- /.carousel -->
        <div class="container marketing">
            <div class="featurette">
                <img class="featurette-image pull-right" src="../indexprincipal//picture/bom.png">
                <h2 class="featurette-heading">Objetivo <span class="muted">de la carrera.</span></h2>
                <p class="lead">Formar Ingenieros Industriales con las competencias genéricas y específicas de la disciplina que le permitan demostrar sus conocimientos, habilidades y actitudes en el campo de la ciencia y la tecnología, con una visión humana, creativa y emprendedora para atender con eficiencia y pertinencia los requerimientos que genera el desarrollo de la sociedad, mediante la planeación, diseño, construcción, administración, conservación, y operación de sistemas de producción con desarrollo sustentable.</p>
            </div>
            <hr class="featurette-divider">
            <div class="featurette">
                <img class="featurette-image pull-left" src="../indexprincipal//picture/bom.png">
                <h2 class="featurette-heading">Campo <span class="muted">de trabajo.</span></h2>
                <p class="lead">Las funciones para las cuales estará capacitado el egresado de la licenciatura en ingeniería industrial son: planeación, diseño, administración, operación y mantenimiento sistemas de producción.
                    Además, tiene la flexibilidad suficiente para adaptarse a las necesidades de cada región, pudiendo ampliar o profundizar sus conocimientos en algún área específica para atender las demandas de su entorno.
                </p>
            </div>
            <hr class="featurette-divider">
            <div class="featurette">
                <img class="featurette-image pull-right" src="../indexprincipal//picture/bom.png">
                <h2 class="featurette-heading">El Ingeniero Industrial <span class="muted">es un profesional capaz de:</span></h2>
                <p class="lead">Aplicar conocimientos, habilidades y actitudes en las áreas de matemáticas, física y química, así como los fundamentos de la Ingeniería Industrial a la identificación, formulación, resolución y evaluación de problemas de ineficiencia e improductividad en organizaciones de los diferentes sectores productivos.</p>
                <p class="lead">Implementar, administrar y mejorar sistemas integrados de abastecimiento, producción y distribución de organizaciones productoras de bienes y servicios, de forma sustentable y considerando las normas nacionales e internacionales.</p>
            </div>

            <hr class="featurette-divider">
            <footer>
                <p>&copy; INSTITUTO TECNOLOGICO DE MERIDA 2013 <!--&middot; <a href="#">Politica de Privacidad</a> &middot; <a href="#">Terminos</a>--></p>
            </footer>
        </div>
        <script src="../bootsTrap2/js/jquery.js"></script>
        <script src="../bootsTrap2/js/bootstrap.js"></script>
        <script type="text/javascript" src="../alertify/lib/alertify.js"></script>
    </body>
</html>
<?php
include './insegeneral.php';
include './datosPersonales.php';
include '../irarriba/irarriba.php';
?>

