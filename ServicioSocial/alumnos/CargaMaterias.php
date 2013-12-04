
<?php
session_start();
include '../DaoConnection/coneccion.php';
include './plantilla.php';
include './validacionseSessionAlumnos.php';
$validacion = new validacionseSessionAlumnos();
$validacion->verificacionDeLogueAlumnos();
$matricula = $_SESSION["UsuarioAlumno"];
$valido = $_SESSION["validarFechas"];
if ($valido != true) {
    ?> <script>  alertify.alert("<b>No es epoca de carga de materias</b>", function() {
            document.location.href = 'index.php';
        });</script> <?php
} else {
    ?>
    <html>
        <head>
            <style>
                .stlconten{
                    background-color: white;
                    -webkit-background-size: cover; 
                    -moz-background-size: cover; 
                    -o-background-size: cover; 
                    background-size: cover;
                    margin-top: -20px
                }
            </style>
            <script>
                $(document).ready(function() {



                    $('#bien').hide();
                    $('#mal').hide();
                    $('#malo').hide();
                    $('#botonazo').click(function() {

                        var busqueda = $("#origen option").length;
                        var valor = $('#horario').val();
                        if (valor != 0) {

                            if (busqueda <= 6 && busqueda > 4) {
                                $('#origen option').prop('disabled', false);
                                $('#origen option').prop('selected', 'selected');
                                var datos = 'Asignatura=' + $('#origen').val() +
                                        '&valor=' + valor;
                                $.get('GuardarCarga.php', datos, function(valor) {
                                    var paso = $.parseJSON(valor);
                                    if (valor != 0) {
                                        alertify.success("Carga Exitosa");
                                        location.href = 'index.php';
                                    }
                                    else {
                                        alertify.alert("<b>Ya has cargado anteriormente", function() {
                                            location.href = 'index.php';
                                        });
                                    }
                                });
                            } else {
                                $('#mal').show('slow');
                                $('#mal').hide('slow');
                            }

                        }
                        else {
                            $('#malo').show('slow');
                            $('#malo').hide('slow');
                        }
                    });

                    $().ready(function()
                    {
                        $('.pasar').click(function() {
                            return !$('#origen option:selected').remove().appendTo('#destino');
                        });
                        $('.quitar').click(function() {
                            return !$('#destino option:selected').remove().appendTo('#origen');
                        });
                        $('.pasartodos').click(function() {
                            $('#origen option').each(function() {
                                $(this).remove().appendTo('#destino');
                            });
                        });
                        $('.quitartodos').click(function() {
                            $('#destino option').each(function() {
                                $(this).remove().appendTo('#origen');
                            });
                        });
                        $('.submit').click(function() {
                            $('#destino option').prop('selected', 'selected');
                        });
                    });
                });
            </script>
        </head> 
        <body>
            <div class="container stlconten">
                <div class="span12" style="margin: auto"> 
                    <div style="margin: 3%">
                        <div class="well well-sm pagination-centered">
                            <select id="horario" style="width: 250px">
                                <option value="0">En que horario?</option>
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                                <
                            </select> 
                            <div id="bien" class="alert alert-success">
                                <strong>Se han Guardado las materias satisfactoriamente</strong>
                            </div>
                            <div id="mal" class="alert alert-error">
                                <strong> Deben ser 5 ó 6 materias seleccionadas</strong>
                            </div>

                            <div id="malo" class="alert alert-error">
                                <strong> Debes seleccionar el turno </strong>
                            </div>
                            <div class="row">
                                <select name="destino[]" id="destino" multiple="multiple" size="8" style="height: 30%; width: 30%">
    <?php
    $cn = new coneccion();
    $sql = "SELECT distinct concat_ws('-_- ', m.semestre, m.materia) as fusion,  m.materia, m.semestre, m.id FROM materias m,historial h WHERE idAcreditacion <=2 and h.calificacion > 70 and m.id NOT IN (SELECT idMateria FROM historial where usuario='$matricula' )LIMIT 0 , 10";

    $datos = mysql_query($sql, $cn->Conectarse());
    While ($rs = mysql_fetch_array($datos)) {
        ?>
                                        <option value="<?php echo utf8_encode($rs["materia"]); ?>" ><?php echo utf8_encode($rs["fusion"]); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <select name="origen[]" id="origen" multiple="multiple" size="8" style="height: 30%; width: 30%">
                                    <?php
                                    $cn = new coneccion();
                                    $sql = "SELECT concat_ws('-_- ', m.semestre, m.materia) as fusion, m.materia, m.semestre, m.id FROM historial h, materias m where h.usuario = '$matricula' and h.idAcreditacion <=2 and h.calificacion < 70 and m.id = h.idMateria ";

                                    $datos2 = mysql_query($sql, $cn->Conectarse());
                                    While ($rs2 = mysql_fetch_array($datos2)) {
                                        ?>
                                        <option value="<?php echo utf8_encode($rs2["materia"]); ?>" disabled="true"><?php echo utf8_encode($rs2["fusion"]) ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="button" class="quitar der btn btn-success" value="Agregar a la lista">
                            <input type="button" class="pasar izq btn btn-danger" value="Quitar de la lista">
                        </div>
    <?php
    echo $ciclo;
    $cn = new coneccion();
    $sql = " SELECT p.idMateria, count(p.idMateria) as prr, m.materia \n"
            . "FROM precarga p, materias m \n"
            . "where p.idMateria = m.id\n"
            . "group by p.idMateria \n"
            . " LIMIT 0, 30 ";
    $datos = mysql_query($sql, $cn->Conectarse());
    ?><table BORDER=1>
                            <th> materia </th><th> Alumnos Preinscritos</th>
                        <?php
                        While ($rs = mysql_fetch_array($datos)) {
                            ?>
                                <tr> <td><?php echo utf8_encode($rs["materia"]); ?></td> <td><?php echo utf8_encode($rs["prr"]); ?></td> 
                                <?php
                            }
                            ?></tr>
                        </table>
                                <?php
                                $cn->cerrarBd();
                                ?>
                    </div>
                    <input id="botonazo" class="btn btn-primary" type="button" title="" value="Guardar materias" >
                </div>
            </div>
        </div>
    </body>
    </html>

    <?php
    include './plantillaFooter.php';
}
?>