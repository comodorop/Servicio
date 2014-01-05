<?php
session_start();
include './plantillaEncabezado.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <link href="../jquery-ui-1.10.3.custom/css/ui-darkness/jquery-ui-1.10.3.custom.css" rel="stylesheet">

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
                var Evento = $('#Evento').val();
//                var curso = $('#curso').val();
//                validarFechaMenorActual(fechaInicial, fechaFinal);

                if (fechaInicial == "" || fechaFinal == "" || Evento == 0) {
                    alertify.error("Todos los campos son obligatorios");

                } else {
                    var fechaini = $('#fechaInicial').val()
                    var fechafin = $('#fechaFinal').val()
                    if (Date.parse(fechaini) >= Date.parse(fechafin)) {
                        alertify.error("Los orden de las fechas es incorrecto");
                        return false;
                    }
                    else {

                        var datos = 'fechaIni=' + $('#fechaInicial').val() +
                                '&fechaFin=' + $('#fechaFinal').val() +
                                '&Evento=' + $('#Evento').val();
//                                '&Curso=' + $('#curso').val() +
                        $.post('verificacionEvento.php', datos, function(respuesta) {
                            var info = $.parseJSON(respuesta);
                            if (info > 0) {
                                alertify.success("Los datos se han guardado exitosamente");
                                $.get('GuardarEvento.php', datos, function() {
                                    $("#tabla").load('tablaEventos.php');
                                });
                            }
                            else {
                                alertify.confirm("<p>Los datos de este evento ya existen,¿desea cambiarlos?.<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function(e) {
                                    if (e) {
                                        $.get('editarEvento.php', datos, function() {
                                            alertify.success("Los datos se han cambiado exitosamente");
                                            $("#tabla").load('tablaEventos.php');
                                        });

                                    } else {
                                        alertify.error("Se han cancelado los cambios");
                                    }
                                });



                            }
                        });

                    }
                }
            });
        });
    </script>
    <body>
        <div class="container">
            <center>
                <div class="span12"  style="margin: auto; background-color: white; margin-top: -20px">
                    <br>
                    Fecha Inicial:<input type="text" name="datepicker" id="fechaInicial" readonly="readonly" size="12" />
                    Fecha Final:<input type="text" name="datepicker" id="fechaFinal" readonly="readonly" size="12" />
                    <br>

                    <select style="width: 150px" id="Evento">
                        <option value="0">Seleccion Evento</option>
                        <?php
                        include '../DaoConnection/coneccion.php';
                        $coneccion = new coneccion();
                        $sql = "SELECT idEvento, nombreEvento FROM evento ";
                        $datos2 = mysql_query($sql, $coneccion->Conectarse());

                        While ($rs = mysql_fetch_array($datos2)) {
                            ?>
                            }
                            <option value="<?php echo utf8_encode($rs["idEvento"]); ?>"><?php echo utf8_encode($rs["nombreEvento"]); ?></option>
                            <?php
                        }
                        ?>

                    </select>
                    <br>
                    <input class="btn btn-success" type="button" id="aceptar" value="Aceptar"/>

                    <br><br>
                    <table id="tabla" class="table table-hover"> 
                        <?php
                        $sql = "SELECT  g.idEvento,c.curso, g.fechaInicial, g.fechaFinal, e.nombreEvento FROM guardarevento g, evento e, curso c WHERE e.idEvento = g.evento and c.id = cicloEscolar";
                        $datos2 = mysql_query($sql, $coneccion->Conectarse());
                        $cont = 0;
                        While ($rs2 = mysql_fetch_array($datos2)) {
                            ?>    <tr> 
                                <td><?php echo utf8_encode($rs2["curso"]); ?> </td> 
                                <td> <?php echo utf8_encode($rs2["fechaInicial"]); ?> </td>
                                <td> <?php echo utf8_encode($rs2["fechaFinal"]); ?> </td>
                                <td> <?php echo utf8_encode($rs2["nombreEvento"]); ?> </td>
                            </tr>
                            <?php
                        }
                        ?> 

                    </table> 
                </div>
                <script src="../jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
                <script src="../jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
                </body>
                <?php include './plantillaFooter.php.'; ?>
                </html>
