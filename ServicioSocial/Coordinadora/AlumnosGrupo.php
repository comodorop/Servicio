<?php
include './validacionseSession.php';
$validacion = new validacionseSession();
$validacion->verificacionDeLogue();
include '../DaoConnection/coneccion.php';
include '../Coordinadora/plantillaEncabezado.php';
$coneccion = new coneccion();
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
            function quitarEspacion(cadena) {
                var palabra = cadena.replace(/\s/g, "%20");
                return palabra;
            };
            function eliminarAlumno(idEliminar) {
                var datos = 'id=' + idEliminar;
                $.get('eliminarAlumnosInscritos.php', datos, function() {
                    alertify.success("Alumnos Eliminado Exitosamente");
                    var grupo = $("#grupo").val();
                    var asignatura = $("#asignatura").val();
                    asignatura = quitarEspacion(asignatura);
                    $("#tablaAlumnos").load("tablaAlumnosInscritos.php?grupo=" + grupo + "&asignatura=" + asignatura);
                });
            };

            $(document).ready(function() {
                $('#GuardarDatos').click(function() {
                    var datos = 'Asignatura=' + $('#asignatura').val() +
                            '&Grupo=' + $('#grupo').val() +
                            '&Usuario=' + $('#usuario').val();
                    var a = $('#Asignatura').val();
                    var b = $('#Grupo').val();
                    var c = $('#usuario').val();
                    if (a !== "" && b !== "" && c !== "") {

                        $.get('GrupoAlumno.php', datos, function(valor) {
                            $('#usuario').val("");
                            var info = $.parseJSON(valor);

                            if (info == 1) {
                                var grupo = $("#grupo").val();
                                var asignatura = $("#asignatura").val();
                                asignatura = quitarEspacion(asignatura);
                                $("#tablaAlumnos").load("tablaAlumnosInscritos.php?grupo=" + grupo + "&asignatura=" + asignatura);
                                alertify.success("Se han guardado los datos");
                            }
                            if (info == 0) {
                                alertify.error("Ya existen los datos");

                            }
                            if (info == 3) {
                                alertify.error("El grupo no existe");
                            }
                            if (info == 2) {
                                alertify.error("El alumno ya existe en esa materia");
                            }
                        });

                    } else {
                        alertify.error("Todos los datos son obligatorios");
                    }
                });
                $("#grupo").change(function() {
                    var grupo = $("#grupo").val();
                    $("#asignatura").load('dameAsignatura.php?grupo=' + grupo);
                });
                $("#asignatura").change(function() {
                    var grupo = $("#grupo").val();
                    var asignatura = $("#asignatura").val();
                    asignatura = quitarEspacion(asignatura);
                    $("#tablaAlumnos").load("tablaAlumnosInscritos.php?grupo=" + grupo + "&asignatura=" + asignatura);
                });
            });

        </script>
    </head> 

    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <h3>Grupos Alumnos</h3>
                <div class="well well-sm">
                    <center>
                        <div class="input-append" style="float: left; margin-left: 40px">
                            <select id="grupo">
                                <option>Seleccione un Grupo</option>
                                <?php
                                $sql = "Select  distinct nombreGrupo from gruposalumnos ";
                                $datos2 = mysql_query($sql, $coneccion->Conectarse());
                                While ($rs2 = mysql_fetch_array($datos2)) {
                                    ?>
                                    <option value="<?php echo utf8_encode($rs2["nombreGrupo"]); ?>"><?php echo utf8_encode($rs2["nombreGrupo"]) ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-append" style="float: left; margin-left: 40px">
                            <select id="asignatura">
                                <option>Seleccione una Asignatura</option>
                            </select>
                        </div>
                        <div class="input-append" style="float: left; margin-left: 40px">
                            <input  id="usuario" type="text" placeholder="Usuario...." list="listaUsuario"/>
                            <datalist id="listaUsuario">
                                <?php
                                $sql = "Select concat_ws(' ', Nombre, apellidoPaterno, apellidoMaterno) as persona, usuario from datospersonales";
                                $datos2 = mysql_query($sql, $coneccion->Conectarse());
                                While ($rs2 = mysql_fetch_array($datos2)) {
                                    ?>
                                    <option value="<?php echo utf8_encode($rs2["usuario"]); ?>"><?php echo utf8_encode($rs2["persona"]) ?></option>
                                    <?php
                                }
                                ?>

                            </datalist>

                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary" value="EnviarDatos" id="GuardarDatos"/>
                        </div>
                        <br> 

                    </center>
                </div>
                <center>
                    <table id="tablaAlumnos" class="table table-hover">
                    </table>
                </center>
            </div>
        </div>
    </body> 
    <?php
    include '../Coordinadora/plantillaFooter.php';
    ?>
</html>
