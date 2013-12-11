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
                $("#altas").hide();
                $("#cmbMaestros").change(function() {
                    var matriculaMaestro = $("#cmbMaestros").val();
                    $("#status").load("dameStatusMaestro.php?matricula=" + matriculaMaestro);
                });
                $("#asignar").click(function() {
                    var matricula = $("#cmbMaestros").val();
                    var status = $("#status").val();
                    var informacion = 'matricula=' + matricula + '&status=' + status;
                    $.get('guardarStatus.php', informacion, function() {
                        alertify.success("Exito Status Cambiado");
                    });
                });
                $("#cancelarAltas").click(function() {
                    $("#nombMaestro").val('');
                    $("#nomUsuario").val('');
                    $("#nomPass").val('');
                    $("#altas").slideUp('slow');
                    $("#datos").slideDown('slow');
                });
                $("#agregarMaestros").click(function() {
                    var nombreM = $("#nombMaestro").val();
                    var usuarioM = $("#nomUsuario").val();
                    var passM = $("#nomPass").val();
                    var informacion = "maestro=" + nombreM + "&usuario=" + usuarioM + "&pass=" + passM;
                    if (nombreM == '' || usuarioM == '' || passM == '') {
                        alertify.error("Son requeridos Todos los campos");
                    }
                    else {
                        $.get('guardarMaestros.php', informacion, function() {
                            $("#nombMaestro").val('');
                            $("#nomUsuario").val('');
                            $("#nomPass").val('');
                            $("#altas").slideUp('slow');
                            $("#datos").slideDown('slow');
                            $("#cmbMaestros").load('dameMaestros.php');
                            alertify.success("Nuevo Maestro Disponible");
                        });
                    }
                });
                $("#asignarTutor").click(function() {
                    var info = $("#alumnos").val();
                    var maestro = $("#maestro").val();
                    if (info == '' || maestro == 0) {
                        alertify.error("Seleccione todos los campos");
                    }
                    else {
                        var informacion = "maestro=" + $("#maestro").val() + "&alumnos=" + info;
                        $.get('asignar.php', informacion, function() {
                            alertify.success("Exito Alumno Asignado");


                        });
                    }
                });
                $("#agregar").click(function() {
                    $("#altas").show('slow');
                    $("#datos").hide('slow');
                });
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <h3>Asignar Maestro Tutor</h3>
                <div class="well well-sm pagination-centered">
                    <br>

                    <br>
                    <div id="datos">
                        <div class="form-inline">
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
                            <button title="Agregar Maestros" id="agregar"><i class="icon-plus"></i></button>
                        </div>
                        <br>
                        <select id="status">
                            <option   value="0">Tutor</option>
                            <option  value="2">Si</option>
                            <option value="4">No</option>
                        </select>
                        <br>
                        <input id="asignar" type="submit" class="btn btn-success" value="Asignar"/>
                    </div>
                    <div id="altas">
                        <input type="text" placeholder="Maestro" id="nombMaestro"/>
                        <br>
                        <input type="text" placeholder="Usuario" id="nomUsuario"/>
                        <br>
                        <input type="password" placeholder="Contraseña" id="nomPass"/>
                        <br>
                        <input type="submit" value="Agregar" id="agregarMaestros" class="btn btn-success"/>
                        <input type="submit" value="Cancelar" id="cancelarAltas" class="btn btn-danger"/>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include './plantillaFooter.php'; ?>

