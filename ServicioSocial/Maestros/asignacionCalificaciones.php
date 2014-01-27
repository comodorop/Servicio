<?php
//session_start();
include './validacionseSession.php';
include '../DaoConnection/coneccion.php';
$validacion = new validacionseSession();
$validacion->verificacionDeLogue();
$usuario = $_SESSION['Usuario'];
include './plantillaEncabezado.php';
?>
<html>
    <head>
    </head>
    <script>
        $(document).ready(function() {
            $("#califica").hide();
            $("#grupo").change(function() {
                var info = $("#grupo").val();
                $("#listaMaterias").load("dameMaterias.php?grupo=" + info);
            });
            $("#listaMaterias").change(function() {
                var info = $("#grupo").val();
                var materia = $("#listaMaterias").val();
                var unidad = $("#Unidad").val();
                var tipoEvaluacion = $("#tipoEvaluacion").val();
                if (unidad > 0 && tipoEvaluacion > 0 && materia > 0) {
                    $("#alumnos").load("cargarAlumnos.php?grupo=" + info + "&idMateria=" + materia + "&unidad=" + unidad + "&tipo=" + tipoEvaluacion);
                }
                else {
                    materia = 0;
                    $("#alumnos").load("cargarAlumnos.php?grupo=" + info + "&idMateria=" + materia + "&unidad=" + unidad + "&tipo=" + tipoEvaluacion);
                }
            });
            $("#Unidad").change(function() {
                var info = $("#grupo").val();
                var materia = $("#listaMaterias").val();
                var unidad = $("#Unidad").val();
                var tipoEvaluacion = $("#tipoEvaluacion").val();
                if (unidad > 0 && tipoEvaluacion > 0 && materia > 0) {
                    $("#alumnos").load("cargarAlumnos.php?grupo=" + info + "&idMateria=" + materia + "&unidad=" + unidad + "&tipo=" + tipoEvaluacion);
                }
                else {
                    materia = 0;
                    $("#alumnos").load("cargarAlumnos.php?grupo=" + info + "&idMateria=" + materia + "&unidad=" + unidad + "&tipo=" + tipoEvaluacion);
                }
            });

            $("#tipoEvaluacion").change(function() {
                var info = $("#grupo").val();
                var materia = $("#listaMaterias").val();
                var unidad = $("#Unidad").val();
                var tipoEvaluacion = $("#tipoEvaluacion").val();
                if (unidad > 0 && tipoEvaluacion > 0 && materia > 0) {
                    $("#alumnos").load("cargarAlumnos.php?grupo=" + info + "&idMateria=" + materia + "&unidad=" + unidad + "&tipo=" + tipoEvaluacion);
                }
            });
            $("#alumnos").change(function() {
                var matricula = $("#alumnos").val();
                var materia = $("#grupo").val();
                var curso = $("#cursoEscolar").val();
                $("#informacion").load("traerInformacion.php?matricula=" + matricula + "&grupo=" + materia + "&curso=" + curso);
                $("#califica").slideDown("slow");
            });
            $("#cursoEscolar").change(function() {
                var matricula = $("#alumnos").val();
                var materia = $("#grupo").val();
                var curso = $("#cursoEscolar").val();
                $("#informacion").load("traerInformacion.php?matricula=" + matricula + "&grupo=" + materia + "&curso=" + curso);
                $("#informacion").slideDown('slow');
            });
            $("#calificar").click(function() {
                var id = $("#listaMaterias").val();
                var grupo = $("#grupo").val();
                var unidad = $("#Unidad").val();
                var tipoEvaluacion = $("#tipoEvaluacion").val();
//                alert(id);
                var calificacion = "calificacion=" + $("#materia").val() + "&alumno=" + $("#alumnos").val() + "&materia=" + id + "&grupo=" + grupo + "&unidad=" + unidad + "&tipo=" + tipoEvaluacion;
                $.get('enviarCalificacion.php', calificacion, function() {
                });
            });


            $("#GuardarCalificaciones").click(function() {
                var listaCalificaciones = new Array();
                var control = 0;
                $("#formInfo").find(':input').each(function() {
                    var elemento = this;
                    if (elemento.value == '') {
                        alertify.error("Error! Ingrese todas las calificaciones");
                        listaCalificaciones = new Array();
                        control = 1;
                        return false;
                    }
                    else {
                        listaCalificaciones.push(elemento.value);
                        control = 0;
                    }
                });
                if (control != 1) {

                    var lista = JSON.stringify(listaCalificaciones);
                    $.ajax({
                        type: "POST",
                        url: "insertarCalificaciones.php",
                        data: {data: lista},
                        cache: false,
                        success: function() {
                            alertify.success("Exito! Calificaciones dadas de Alta");
                        }
                    });
                }



            });
        });
    </script>
    <body>
        <div class="container">
            <center>
                <div   class="span12"  style="margin: auto; background-color: white; margin-top: -20px;">
                    <div class="well well-lg" style="margin: 3% 3% 3% 3%">
                        <center>
                            <br>
                            <form id="formInfo">
                                <select id="grupo" style="float: left">
                                    <option>Seleccione un Grupo</option>
                                    <?php
                                    $sql = "select * 
                                from gruposalumnos ga, maestros m, materias ma
                                where ga.idMaestro = m.id
                                and m.usuario='$usuario'
                                and ga.idMateria = ma.id";
                                    $cn = new coneccion();
                                    $datos = mysql_query($sql, $cn->Conectarse());
                                    while ($rs = mysql_fetch_array($datos)) {
                                        ?>
                                        <option value="<?php echo $rs[1]; ?>"><?php echo utf8_encode($rs[1]); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <select id="listaMaterias" style="float: left">
                                    <option>Seleccione una Materia</option>
                                </select>
                                <select id="Unidad" style="width:90px; float: left">
                                    <option>Unidad</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <select style="width:170px; float: left" id="tipoEvaluacion">
                                    <option value="0">Tipo de Evaluación</option>
                                    <option value="1">Ordinario</option>
                                    <option value="2">Recuperacion</option>
                                    <option value="3">Extraordinario</option>
                                </select>
                                <br>
                                <table id="alumnos" class="table table-hover">
                                </table>
                            </form>
                            <div id="boton">
                                <input id="GuardarCalificaciones" value="Calificar" type="button" class="btn btn-success"/>
                            </div>
                        </center>
                    </div>
                </div>
            </center>
            <?php include './plantillaFooter.php'; ?>
        </div>
    </body>
</html>