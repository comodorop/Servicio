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
            $('#mal').hide();
            $('#alertas').hide();
            $('#bien').hide();
            $('#revision').hide();
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
                    $('#revision').show("slow");
                    $('#revision').hide("slow");

                } else {
                    var fechaini = $('#fechaInicial').val()
                    var fechafin = $('#fechaFinal').val()
                    if (Date.parse(fechaini) >= Date.parse(fechafin)) {
                        $('#mal').show("slow");
                        $('#mal').hide("slow");
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
                                $('#bien').show("slow");
                                $('#bien').hide("slow");
                                $.get('GuardarEvento.php', datos, function() {
                                });
                            }
                            else {
                                $('#alertas').show("slow");
                                $("#okey").click(function() {
                                    $.get('editarEvento.php', datos, function() {
                                        $('#alertas').hide("slow");
                                        $('#bien').show("slow");
                                        $('#bien').hide("slow");
                                    });
                                });
                                $("#NoOkey").click(function() {
                                    $('#alertas').hide("slow");
                                });
                            }
                        });

                    }
                }
            })
        });
    </script>

    <body>
        <div class="container">
            <center>
                <div id="alertas" class="alert alert-block">
                    <strong>Ya existe este Evento registrado, desea cambiarlo por el actual? </strong>
                    <button id="okey" type="button" class="alert-danger">oko</button> 
                    <button id="NoOkey" type="button" class="alert-success">No</button> 


                </div>


                <div class="span12"  style="margin: auto; background-color: white; margin-top: -20px">
<!--                    <select style="width: 120px" id="curso">
                        <option value="0">Curso</option>
                        <option value="1">Enero-Agosto</option>
                        <option value="2">Verano</option>
                        <option value="3">Agosto-Diciembre</option>
                    </select>-->
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

                    <div id="mal" class="alert alert-error">
                        <strong>mal!!!!!!! prr!!!</strong>
                    </div>
                    <div id="revision" class="alert alert-info">
                        <strong>Deben estar todos los campos llenos</strong>
                    </div>
                    <div id="bien" class="alert alert-success">
                        <strong>Bien!!! se han guardado los datos</strong>
                    </div>
                    <br>
                    <input type="button" id="aceptar" value="Aceptar"/>
                </div>
                <script src="../jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
                <script src="../jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
                </body>
                <?php include './plantillaFooter.php.'; ?>
                </html>
