<?php
session_start();
include './validacionseSession.php';
$validacion = new validacionseSession();
$validacion->verificacionDeLogue();
include '../DaoConnection/coneccion.php';
$id = $_SESSION["idMaestroSession"];
$nombreMaestro = $_SESSION["nombreMaestro"];
include './plantillaEncabezado.php';
?>
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
                $('#descripcion').val('');
                $('#objetivos').val('');
                $('#observaciones').val('');
                $('#tareasAsignadas').val('');
                $("#guardar").click(function() {
                    var datos = 'usuarios=' + $('#usuarios').val() +
                            '&fecha=' + $('#fecha').val() +
                            '&numeroSesion=' + $('#numeroSesion').val() +
                            '&descripcion=' + $('#descripcion').val() +
                            '&objetivos=' + $('#objetivos').val() +
                            '&observaciones=' + $('#observaciones').val() +
                            '&tareasAsignadas=' + $('#tareasAsignadas').val() +
                            '&numeroSession=' + $('#numeroSession').val();
                    $.get('guardarSession.php', datos, function() {
                        alertify.success("Exito! Datos insertados Satisfactoriamente");
                    });
                });
                $('#usuarios').change(function() {
                    $var = $('#usuarios').val();

                });
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <h3>Session de Tutorias</h3>
                <div class="well well-sm pagination-centered">
                    <?php $cn = new coneccion(); ?>
                    <div>
                        <div style="float: right ; margin-right: 40px"><strong>Bienvenido: <?php echo $nombreMaestro; ?></strong></div>
                    </div>
                    <br>
                    <input style="height: 30px; width: 220px" type="date" id="fecha"/>
                    <br>
                    <select id="usuarios">
                        <option value="0">Seleccione un Usuario</option>
                        <?php
                        $sql = "SELECT * from tutotmaestrosalumnos, datosPersonales WHERE idMaestro = $id and matricula = usuario";
                        $datos = mysql_query($sql, $cn->Conectarse());
                        while ($rs = mysql_fetch_array($datos)) {
                            ?>
                            <option value="<?php echo $rs["matricula"]; ?>"><?php echo $rs["Nombre"] . "&nbsp;" . $rs["apellidoPaterno"] . "&nbsp;" . $rs["apellidoMaterno"]; ?></option>
                            <?php
                        }
                        $cn->cerrarBd()
                        ?>
                    </select>
                    <br>
                    <div data-spy="scroll">
                        <strong>Tareas Anteriores:</strong>
                        <div id="tareasAnteriores"></div>
                        <center>
                            <table>
                                <tr>
                                    <td>
                                        <textarea id="descripcion" placeholder="Descripcion de la Session.." style="min-width: 200px;  min-height: 100px; max-width: 200px; max-height: 100px;" >
                                        </textarea>
                                    </td>
                                    <td>
                                        <textarea id="objetivos" placeholder="Objetivos..." style="min-width: 200px;  min-height: 100px; max-width: 200px; max-height: 100px;">
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea id="observaciones" placeholder="Observaciones..." style="min-width: 200px;  min-height: 100px; max-width: 200px; max-height: 100px;">
                                        </textarea>
                                    </td>
                                    <td>
                                        <textarea id="tareasAsignadas" placeholder="Tareas Asignadas..."style="min-width: 200px;  min-height: 100px; max-width: 200px; max-height: 100px;">
                                        </textarea>
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" class="btn btn-danger" value="Cancelar"/>
                            <input type="submit" id="guardar" class="btn btn-primary" value="Guardar"/>
                            <br>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
<?php include './plantillaFooter.php'; ?>
