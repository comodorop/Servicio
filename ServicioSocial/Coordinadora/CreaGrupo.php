<?php
session_start();
include './validacionseSession.php';
$validacion = new validacionseSession();
$validacion->verificacionDeLogue();
include '../DaoConnection/coneccion.php';
include './plantillaEncabezado.php';
$coneccion = new coneccion();
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
            function eliminar(id) {
                var informacion = "id=" + id;
                $.get('eliminarGrupo.php', informacion, function(tabla) {
                    $('#tablaGrupos').html(tabla);
                    alertify.success("Exito! Registro eliminado");
                });
            }

            function actualizar(id) {
                $("#datos").slideUp("slow");
                var info = "id=" + id;
                $.get('actualizarGrupos.php', info, function(datos) {
                    $("#datos").html(datos);
                    $("#GuardarDatos").hide('slow');
                    $("#datos").show('slow');
                    $("#Actualizar").show('slow');
                    $("#Cancelar").show('slow');

                });
            }
            $(document).ready(function() {
                $("#Actualizar").hide();
                $("#Cancelar").hide();
                $('#bien').hide();
                $('#Existen').hide();
                $('#mal').hide();
                $('#GuardarDatos').click(function() {
//                  alert("guardo");
                    var IdentificadorGrupo = $('#IdentificadorGrupo').val();
                    var Asignatura = $('#Asignatura').val();
                    var Maestro = $('#Maestro').val();
                    if (IdentificadorGrupo == "" || Asignatura == "" || Maestro == "") {
                        alertify.error("Llene todos los campos");
                        $('#mal').show('slow');
                        $('#mal').hide('slow');
                    }
                    else {
                        var datos = 'Asignatura=' + $('#Asignatura').val() +
                                '&IdentificadorGrupo=' + $('#IdentificadorGrupo').val() +
                                '&Maestro=' + $('#Maestro').val();
                        $.post('verificacionGrupo.php', datos, function(respuesta) {
                            var info = $.parseJSON(respuesta);
                            if (info > 0) {
                                $('#bien').show("slow");
                                $('#bien').hide("slow");
                                $.get('Asignatura.php', datos, function() {
                                    $('#tablaGrupos').load('recargarTablaGrupos.php');
                                    alertify.success("Grupo creado Correctamente");
                                    $("#Asignatura").val('');
                                    $("#IdentificadorGrupo").val('');
                                    $("#Maestro").val('');
                                });
                            } else {
                                alertify.error("Este Grupo ya esta asignado");
                            }
                        });
                    }
                });

                $("#Actualizar").click(function() {
                    var datos = 'Asignatura=' + $('#Asignatura').val() +
                            '&IdentificadorGrupo=' + $('#IdentificadorGrupo').val() +
                            '&Maestro=' + $('#Maestro').val() + '&id=' + $("#idValor").val();
                    $.get('actualizarCreaGrupo.php', datos, function() {
                        $('#Asignatura').val("");
                        $('#Maestro').val("");
                        $('#IdentificadorGrupo').val("");
                        $('#tablaGrupos').load('recargarTablaGrupos.php');
                        $("#datos").load('nuevoRegistro.php');
                        $("#Actualizar").hide('slow');
                        $("#Cancelar").hide('slow');
                        $("#GuardarDatos").show('slow');
                        alertify.success("Exito! Registro Actualizado");
                    });
                });
                $("#Cancelar").click(function() {
                    $('#Asignatura').val("");
                    $('#Maestro').val("");
                    $('#IdentificadorGrupo').val("");
                    $('#tablaGrupos').load('recargarTablaGrupos.php');
                    $("#datos").load('nuevoRegistro.php');
                    $("#Actualizar").hide('slow');
                    $("#Cancelar").hide('slow');
                    $("#GuardarDatos").show('slow');
                });
            });
        </script>
    </head> 
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <h3>Crear Grupo</h3>
                <div class="well well-sm pagination-centered">
                    <datalist id="listaUsuario">
                        <?php
                        $sql = "SELECT Distinct nombreGrupo FROM gruposalumnos ";
                        $datos2 = mysql_query($sql, $coneccion->Conectarse());
                        While ($rs2 = mysql_fetch_array($datos2)) {
                            ?>
                            <option value="<?php echo utf8_encode($rs2["nombreGrupo"]); ?>"><?php echo utf8_encode($rs2["nombreGrupo"]) ?></option>
                            <?php
                        }
                        ?>
                    </datalist>
                    
                    
                            <datalist id="listaAsignaturas">
                        <?php
                        $sql = "Select materia from materias ";
                        $datos = mysql_query($sql, $coneccion->Conectarse());
                        While ($rs = mysql_fetch_array($datos)) {
                            ?>
                                <option value="<?php echo utf8_encode($rs["materia"]); ?>"><?php echo utf8_encode($rs["materia"]); ?></option>
                                <?php
                            }
                            ?>

                        </datalist>

                    </datalist>                
                    <datalist id="listaAsignaturas">
                        <?php
                        $sql = "Select materia from materias ";
                        $datos = mysql_query($sql, $coneccion->Conectarse());
                        While ($rs = mysql_fetch_array($datos)) {
                            ?>
                            <option value="<?php echo utf8_encode($rs["materia"]); ?>"><?php echo utf8_encode($rs["materia"]); ?></option>
                            <?php
                        }
                        ?>

                    </datalist>
                    <datalist id="listaMaestro">
                        <?php
                        $sql = "Select  maestro from maestros ";
                        $datos2 = mysql_query($sql, $coneccion->Conectarse());
                        While ($rs2 = mysql_fetch_array($datos2)) {
                            ?>
                            <option value="<?php echo utf8_encode($rs2["maestro"]); ?>"><?php echo utf8_encode($rs2["maestro"]) ?></option>
                            <?php
                        }
                        ?>
                    </datalist>
                    <div id="datos">
                        <input  id="IdentificadorGrupo" type="text" placeholder="Nombre del Grupo" list="listaUsuario" style=" height: 30px"/>
                        <br>
                        <input  id="Asignatura" type="text" placeholder="Asignatura...." list="listaAsignaturas" style=" height: 30px"/>
                        <br>
                        <input  id="Maestro" type="text" placeholder="Maestro...." list="listaMaestro" style=" height: 30px"/>

                        <br><br> 
                    </div>
                    <input type="submit" class="btn btn-primary" value="EnviarDatos" id="GuardarDatos"/>
                    <input type='submit' class='btn btn-success' value='Actualizar' id='Actualizar'/>
                    <input type='submit' class='btn btn-warning' value='Cancelar' id='Cancelar'/>
                    <br>
                    <br>
                    <table id="tablaGrupos" class="table table-hover">
                        <tr>
                            <td><center><strong>Grupo</strong></center></td>
                        <td><center><strong>Materia</strong></center></td>
                        <td><center><strong>Maestros</strong></center></td>
                        <td><center><strong>Actualizar</strong></center></td>
                        <td><center><strong>Eliminar</strong></center></td>
                        </tr>
                        <?php
                        $sql = "SELECT idGrupo, nombreGrupo, materia, maestro FROM gruposalumnos ga, materias m, maestros ma"
                                . " WHERE ga.idMateria = m.id and ga.idMaestro = ma.id";
                        $datos4 = mysql_query($sql, $coneccion->Conectarse());
                        while ($rsLista = mysql_fetch_array($datos4)) {
                            ?>
                            <tr>
                                <td><?php echo $rsLista["nombreGrupo"]; ?>  </td>
                                <td><?php echo utf8_encode($rsLista["materia"]); ?>  </td>
                                <td><?php echo $rsLista["maestro"]; ?> </td>
                                <td>
                            <center>
                                <a onclick="actualizar(<?php echo $rsLista[0]; ?>);">
                                    <i class="icon-pencil"></i>
                                </a>
                            </center>
                            </td>
                            <td>
                            <center>
                                <a onclick="eliminar(<?php echo $rsLista[0]; ?>);">
                                    <i class="icon-trash"></i>
                                </a>
                            </center>
                            </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
include './plantillaFooter.php ';
?>
