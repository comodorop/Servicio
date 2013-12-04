<?php
include './validacionseSession.php';
$validicaciones = new validacionseSession();
$validicaciones->verificacionDeLogue();
include './plantillaEncabezado.php';
include '../DaoConnection/coneccion.php';
$coneccion = new coneccion();
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
        <link rel="stylesheet" type="text/css" href="../jquery-ui-1.10.3.custom/css/ui-darkness/jquery-ui-1.10.3.custom.css" />
        <script>
            $(document).ready(function() {
                jQuery(function($) {
                    $.datepicker.regional['es'] = {
                        closeText: 'Cerrar',
                        prevText: '&#x3c;Ant',
                        nextText: 'Sig&#x3e;',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mi&eacute;', 'Juv', 'Vie', 'S&aacute;b'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S&aacute;'],
                        weekHeader: 'Sm',
                        dateFormat: 'yy/mm/dd',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''};

                    $.datepicker.setDefaults($.datepicker.regional['es']);
                });
                $("#fechaInicial").datepicker({
                });
                $("#fechaFinal").datepicker({
                });
                $('#aceptar').click(function() {

                    var fechaInicial = $('#fechaInicial').val();
                    var fechaFinal = $('#fechaFinal').val();
                    var curso = $('#curso').val();

                    if (fechaInicial == "" || fechaFinal == "" || curso == 0) {
                        alertify.error("Todos los campos son obligatorios")

                    } else {
                        var fechaini = $('#fechaInicial').val()
                        var fechafin = $('#fechaFinal').val()
                        if (Date.parse(fechaini) >= Date.parse(fechafin)) {
                            alertify.error("La fecha inicial debe ser anterior a la final");
                            return false;
                        }
                        else {

                            var datos = 'fechaIni=' + $('#fechaInicial').val() +
                                    '&fechaFin=' + $('#fechaFinal').val() +
                                    '&Curso=' + $('#curso').val();


                            $.post('verificacionInicioCurso.php', datos, function(respuesta) {
                                var info = $.parseJSON(respuesta);
                                if (info > 0) {
                                    alertify.success("Los datos se han guardado satisfactoriamente");
                                    $.get('GuardarInicioCurso.php', datos, function() {
                                    });
                                }
                                else {

                                    alertify.confirm("<p>Desea cambiar los datos?.<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function(e) {
                                        if (e) {
                                            $.get('editarInicioCurso.php', datos, function() {
                                                $("#tabla").load("tablaInicioCurso.php");

                                            });
                                            alertify.success("Se han Guardado los cambios'" + alertify.labels.ok + "'");

                                        } else {
                                            alertify.error("No se han guardado los datos'" + alertify.labels.cancel + "'");
                                        }
                                    });

                                }

                            });

                        }
                    }
                })
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div class="container">
                <div style="margin: 3% 3% 3% 3%">
                    <h3>Iniciar Curso</h3>
                    <div class="well well-sm pagination-centered">
                        <table id="tabla" class="table table-hover"> 
                            <?php
                            $sql = "SELECT anio, cicloEscolar, fechaInicial, fechaFinal,c.curso FROM fechascicloescolar f, curso c
                                where f.cicloEscolar = c.id";
                            $datos2 = mysql_query($sql, $coneccion->Conectarse());
                            $cont = 0;
                            While ($rs2 = mysql_fetch_array($datos2)) {
                                ?>    <tr> 
                                    <td>
                                        Ciclo Escolar en Curso:                                      
                                    </td> 
                                    <td><?php echo utf8_encode($rs2["curso"]); ?> </td> 
                                    <td> <?php echo utf8_encode($rs2["fechaInicial"]); ?> </td>
                                    <td> <?php echo utf8_encode($rs2["fechaFinal"]); ?> </td>
                                    <td> <?php echo utf8_encode($rs2["anio"]); ?> </td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </table>

                        <select style="width: 120px" id="curso">
                            <option value="0">Curso</option>
                            <option value="1">Enero-Agosto</option>
                            <option value="2">Verano</option>
                            <option value="3">Agosto-Diciembre</option>
                        </select>
                        <br>

                        Fecha Inicial:<input type="text" name="datepicker" id="fechaInicial" readonly="readonly" size="12" />
                        Fecha Final:<input type="text" name="datepicker" id="fechaFinal" readonly="readonly" size="12" />
                        <br>
                        <button class="btn btn-success" id="aceptar" class="" > Aceptar </button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
    </body>
</html>
<?php include './plantillaFooter.php.'; ?>
