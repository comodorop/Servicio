<?php
include './plantillaEncabezado.php';
include '../DaoConnection/coneccion.php';
?>
<!DOCTYPE html>
<html lang="es">
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
                $("#cmbMaestros").change(function() {
                    var matriculaMaestro = $("#cmbMaestros").val();
                    $("#status").load("dameStatusMaestro.php?matricula=" + matriculaMaestro);
                });
                $("#asignar").click(function() {
                    var matricula = $("#cmbMaestros").val();
                    var status = $("#status").val();
                    var informacion = 'matricula=' + matricula + '&status=' + status;
                    $.get('guardarStatus.php', informacion, function() {
                    });
                });
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <h3>Asignar Maestro Tutor</h3>
                <div class="well well-sm pagination-centered">
                    <select id="cmbMaestros">
                        <option value="0">Seleccione un Maestro</option>
                        <?php
                        $cn = new coneccion();
                        $sql = "SELECT m.maestro, m.usuario"
                                . " FROM maestros m, usuarios u"
                                . " WHERE m.usuario = u.usuario";
                        $datos = mysql_query($sql, $cn->Conectarse());
                        while ($rs = mysql_fetch_array($datos)) {
                            ?>
                            <option  value=<?php echo $rs[1]; ?>><?php echo $rs[0]; ?></option>
                            <?php
                        }
                        ?> 
                    </select>
                    <br>
                    <select id="status">
                        <option   value="0">Tutor</option>
                        <option  value="2">Si</option>
                        <option value="4">No</option>
                    </select>
                    <br>
                    <input id="asignar" type="submit" class="btn btn-success" value="Asignar"/>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include './plantillaFooter.php'; ?>

