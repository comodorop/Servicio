<?php
session_start();
include './validacionseSession.php';
$verificar = new validacionseSession;
$verificar->verificacionDeLogue();
include './plantillaEncabezado.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            .stlconten{
                background-color: white;
                margin-top: -20px
            }
        </style>
        <script>
            $(document).ready(function() {
                $('#avisosaMostrar').change(function() {
                    var opciones = $('#avisosaMostrar').val();
                    $('#avisos').load('avisos.php?opciones=' + opciones);
                });
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <div class="well well-sm">
                    <?php
                    include '../DaoConnection/coneccion.php';
                    $cn = new coneccion();
                    $sql = "SELECT * FROM avisos a, usuarios u, maestros m
                            WHERE a.control=1
                            and m.usuario = u.usuario
                            and u.usuario = a.usuario";
                    $datos = mysql_query($sql, $cn->Conectarse());

                    while ($row = mysql_fetch_array($datos)) {
                        echo "<table class='table table-hover'>
                            <tr>Escrito por: " . $row["maestro"] . " &nbsp; </tr>
                            <br>
                            <tr><strong>" . $row["titulo"] . "</strong></tr>
                            <br>
                            <tr>" . $row["detalles"] . "</tr>
                            ";
                    }
                    echo '</table>';
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include './plantillaFooter.php'; ?>