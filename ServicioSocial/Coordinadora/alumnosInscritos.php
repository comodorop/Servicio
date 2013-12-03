<?php
session_start();
include '../DaoConnection/coneccion.php';
include './plantillaEncabezado.php';
$coneccion = new coneccion();
?>
<html>
    <head>
        <!--        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> -->
        <script type="text/javascript" src="../bootsTrap2/js/jquery.min.js"></script>
        <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
        <!--<script src="../bootsTrap2/js/bootstrap.min.js"></script>-->
        <script>
            function eliminar(id) {
                var informacion = "id=" + id;
                $.get('eliminarAlumnInsc.php', informacion, function(tabla) {
                    $('#tablaGrupos').html(tabla);
                });
            }

            function actualizar(id) {
                $("#datos").slideUp("slow");
                var info = "id="+id;
                $.get('actualizaAlumnInsc.php', info, function(datos) {
                    $("#datos").html(datos);
                    $("#datos").show('slow');
                });
            }

            $(document).ready(function() {

                $('#bien').hide();
                $('#Existen').hide();
                $('#mal').hide();
                $('#GuardarDatos').click(function() {
//                  alert("guardo");
                    var IdentificadorGrupo = $('#IdentificadorGrupo').val();
                    var Asignatura = $('#Asignatura').val();
                    var Maestro = $('#Maestro').val();
                    if (IdentificadorGrupo == "" || Asignatura == "" || Maestro == "") {
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
                                });
                            } else {
                                $('#Existen').show('slow');
                                $('#Existen').hide('slow');
                            }
                        });
                    }
                });
            });
        </script>
    </head> 
    <div class="container">
        <center>
            <div   class="span12"  style="margin: auto; background-color: white; margin-top: -20px; height: 500px ; overflow-y: scroll;">
                <!--                    <div id="bien" class="alert alert-success">
                                        <strong>Datos correctos</strong>
                                    </div>
                                    <div id="mal" class="alert alert-error">
                                        <strong>Debes llenar todos los campos</strong>
                                    </div>
                                    <div id="Existen" class="alert alert-error">
                                        <strong>Ya existe el grupo con esa materia.</strong>
                                    </div>-->
                <br><br>


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
                </datalist> <datalist id="listaAsignaturas">
                    <?php
                    $sql = "Select materia from materias ";
                    $datos = mysql_query($sql, $coneccion->Conectarse());
                    While ($rs = mysql_fetch_array($datos)) {
                        ?>
                        <option value="<?php echo utf8_encode($rs["materia"]); ?>"><?php echo utf8_encode($rs["materia"]); ?></option>
                        <?php
                    }
                    ?><datalist id="listaAsignaturas">
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
                    <input type="submit" class="btn btn-primary" value="EnviarDatos" id="GuardarDatos"/>
                </div>
                <br>
                <br>
                <table id="tablaGrupos" class="table table-hover">
                    <tr>
                        <td><center><strong>IDAlumno</strong></center></td>
                    <td><center><strong>Grupo</strong></center></td>
                    <td><center><strong>Usuario</strong></center></td>
                    <td><center><strong>Materia</strong></center></td>
                    <td><center><strong>Actualizar</strong></center></td>
                <td><center><strong>Eliminar</strong></center></td>
                    </tr>
                    <?php
                    $sql = "SELECT idAlumnosInscritos, usuario, nombreGrupo, materia FROM gruposalumnos ga, materias m, alumnosInscritos a"
                            . " WHERE ga.idGrupo = a.idGrupo and m.id=a.idMateria";
                    $datos4 = mysql_query($sql, $coneccion->Conectarse());
                    while ($rsLista = mysql_fetch_array($datos4)) {
                        ?>
                        <tr>
                            <td><?php echo $rsLista["idAlumnosInscritos"]; ?>  </td>
                            <td><?php echo utf8_encode($rsLista["nombreGrupo"]); ?>  </td>
                            <td><?php echo $rsLista["usuario"]; ?> </td>
                            <td><?php echo utf8_encode($rsLista["materia"]); ?> </td>

                        <center>
                            <td>
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
        </center>
    </div>
    <?php
    include './plantillaFooter.php ';
    ?>
</html>
