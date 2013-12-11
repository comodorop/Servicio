<?php
include './plantillaEncabezado.php';
include '../DaoConnection/coneccion.php';
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
                $("#altas").hide();
                $('#error').hide();
                $('#exito').hide();
                $("#actualizar").hide();
                $("#aparecer").hide();
                $("#actualizarAlumno").hide();
                var maestro = $('#maestro').val();
                $('#alumnos').load("alumnosDisponibles.php");
                var idMaestro;
                $('#maestro').change(function() {

                    if (maestro > 0) {
                        $("#actualizar").show('slow');
                        $("#agregar").hide('slow');

                    }
                    else {
                        var maestro = $("#maestro").val();
                        $("#alumnosMaestros").load("dameAlumnos.php");
                        $("#visualizarAlumnos").load("dameTutorados.php?idMaestro=" + maestro);
                        $("#agregar").show('slow');
                        $("#actualizar").hide('slow');
                    }
                });
               
               
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <h3>Asignar Tutor - Alumno</h3>
                <div class="well well-sm">
                   
                    <center>
                        <div id="asignacion">
                            <div class="form-inline">
                                <select id="maestro" style="width: 260px; height: 30px" >
                                    <option value="0">Seleccione un tutor</option>
                                    <?php
                                    $cn = new coneccion();
                                    $sql = "SELECT * FROM maestros, usuarios 
                                        WHERE maestros.usuario = usuarios.usuario
                                        and usuarios.tipo=2";
                                    $datos = mysql_query($sql, $cn->Conectarse());
                                    while ($rs = mysql_fetch_array($datos)) {
                                        ?>
                                        <option value="<?php echo $rs[0]; ?>"><?php echo $rs[1]; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <select id="alumnos" style="width: 260px;">
                                    <option>Alumno</option>
                                </select>
                                <a id="actualizarAlumno" data-toggle="modal" style="height: 20px" class="btn btn-warning"><i class="icon-pencil"></i></a>
                            </div>
                            <div id="tablaTutorados">
                                <table class="table table-hover" id="visualizarAlumnos">

                                </table>
                            </div>
                            <input id="asignarTutor" type="submit" value="Asignar" class="btn btn-success"/>
                            <input type="submit" value="Cancelar"  class="btn btn-danger"/> 
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
include './plantillaFooter.php';
?>

<div  id="myModal" class="modal hide fade"   aria-labelledby="myModalLabel" aria-hidden="true">
</div>
