<?php
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
            $(document).ready(function() {
//                $('#bien').hide();
                $('#GuardarDatos').click(function() {

                    var datos = 'Asignatura=' + $('#Asignatura').val() +
                            '&Grupo=' + $('#Grupo').val() +
                            '&Usuario=' + $('#usuario').val();
                    if ($('#Asignatura').val() != "" || $('#Grupo').val() != "" || $('#Grupo').val() != "") {

                    $.get('GrupoAlumno.php', datos, function(valor) {
                        $('#usuario').val("");
                        var info = $.parseJSON(valor);

                        if (info = 1) {
                            alertify.success("Se han guardado los datos");
                        }
                        if (info = 0) {
                            alertify.error("Ya existen los datos");

                        }
                        );
                    } else {
                    alertify.error("Todos los datos son obligatorios");
                }

                })
            });
        </script>
    </head> 

    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <h3>Grupos Alumnos</h3>
                <div class="well well-sm">
                    <center>
<!--                        <div id="bien" class="alert alert-success">
                            <strong>Se ha creado el grupo satisfactoriamente</strong>
                        </div>-->

                        <div class="input-append" style="float: left; margin-left: 40px">
                            <input  id="Grupo" type="text" placeholder="Grupo...." list="listaGrupo" style=" height: 30px"/>
                            <datalist id="listaGrupo">
                                <?php
                                $sql = "Select  distinct nombreGrupo from gruposAlumnos ";
                                $datos2 = mysql_query($sql, $coneccion->Conectarse());
                                While ($rs2 = mysql_fetch_array($datos2)) {
                                    ?>
                                    <option value="<?php echo utf8_encode($rs2["nombreGrupo"]); ?>"><?php echo utf8_encode($rs2["nombreGrupo"]) ?></option>
                                    <?php
                                }
                                ?>

                            </datalist>
                        </div>

                        <div class="input-append" style="float: left; margin-left: 40px">
                            <input  id="Asignatura" type="text" placeholder="Asignatura...." list="listaAsignaturas" style=" height: 30px"/>
                            <datalist id="listaAsignaturas">
                                <?php
                                $sql = "Select materia  from gruposAlumnos, materias
                                 WHERE   idMateria = id";
                                $datos = mysql_query($sql, $coneccion->Conectarse());
                                While ($rs = mysql_fetch_array($datos)) {
                                    ?>
                                    <option value="<?php echo utf8_encode($rs["materia"]) ?>"><?php echo utf8_encode($rs["materia"]) ?></option>
                                    <?php
                                }
                                ?>

                            </datalist>

                        </div>


                        <div class="input-append" style="float: left; margin-left: 40px">
                            <input  id="usuario" type="text" placeholder="usuario...." list="listaUsuario" style=" height: 30px"/>
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
                    </center>
                </div>
            </div>
        </div>
    </body> 
    <?php
    include '../Coordinadora/plantillaFooter.php';
    ?>
</html>
