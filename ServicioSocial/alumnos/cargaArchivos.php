<?php
session_start();
include './validacionseSessionAlumnos.php';
$validacion = new validacionseSessionAlumnos();
$validacion->verificacionDeLogueAlumnos();

$usuario = $_SESSION["UsuarioAlumno"];
include './plantilla.php';
include '../Dao/daoServicio.php';
include '../clases/cargaArchivos.php';

$cn = new coneccion();
if ($_REQUEST['guardaarchivo'] != null) {
    $nombre = $_FILES['buscaarchivo']['name'];
    $ruta = $_FILES['buscaarchivo']['tmp_name'];
    $tipo = $_FILES['buscaarchivo']['type'];
    $tamano = $_FILES['buscaarchivo']['size'];
    $maximo = 700 * 1024;
    $ubicacion = "../alumnos/subidas/" . $nombre;

    $ext_permitidas = array('pdf');
    $partes_nombre = explode('.', $nombre);
    $extension = end($partes_nombre);
    $ext_correcta = in_array($extension, $ext_permitidas);


    if ($ext_correcta && $tamano <= $maximo) {
        if (copy($ruta, $ubicacion)) {
            $cargar = new cargaArchivos();
            $cargando = new daoServicio();
            $cargar->setHubicacion($ubicacion);
            $cargar->setUsuario($usuario);
            $cargar->setNombreArchivo($nombre);
            $cargando->guardaArchivos($cargar);
        }
    } else {
        echo '<script> alertify.error("Archivo invalido o muy grande.");</script>';
    }
}
?>
<!DOCYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <style>
            .stlconten{
                background-color: white;
                margin-top: -20px
            }
        </style>
        <script src="../bootsTrap2/js/bootstrap.file-input.js"></script>
        <script>
            $(document).ready(function() {
                $('input[type=file]').bootstrapFileInput();
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div class="span12" style="margin: auto">
                <form name="subearchivos" action="cargaArchivos.php" method="post" enctype="multipart/form-data" style="margin: 3% 3% 3% 3%">
                    <h3>Creditos Extra</h3>
                    <div class="btn-group">
                        <input type="file" name="buscaarchivo" size="200" accept="application/pdf" title="Buscar Archivo">
                        <input type="submit" name="guardaarchivo" value="Enviar" class="btn btn-primary">
                    </div>
                    <span class="label">Tamaño maximo de los archivos: 700Kb</span>
                    <div class="well well-sm" style="margin-top: 20px">
                        <!-----------------------Mostrar archivos subidos--------------------------------------->
                        <?php
                        $sql = "SELECT * FROM cargaarchivos WHERE usuario='$usuario'";
                        $datos = mysql_query($sql, $cn->Conectarse());
                        while ($rs = mysql_fetch_array($datos)) {
                            echo"<div class='form-inline'>";
                            echo "<a target='_blank' href='" . $rs[2] . "'>".$rs[3]."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            if ($rs[4] == 0) {
                                echo '<i class="icon-remove" title="Documento no Validado"></i>';
                            } else {
                                echo '<i class="icon-ok" title="Documento validado"></i>';
                            }
                            echo"</div>";
                        }
                        $cn->cerrarBd();
                        ?>
                    </div>
                </form>
            </div>
            <a></a>
        </div>
    </body>
</html>
<?php
include './plantillaFooter.php';
?>