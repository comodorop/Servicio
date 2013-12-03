<?php

include '../DaoConnection/coneccion.php';
$coneccion = new coneccion();
?>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<script type="text/javascript" src="../bootsTrap2/js/jquery.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap.css"/>-->
<script src="../bootsTrap2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
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
        function validarFechaMenorActual(fechaInicial, FechaFinal)
        {

            var today = new Date(fechaInicial);
            var date2 = new Date(FechaFinal);

            if (date2 <= today)
            {

                alertify.error("La fecha inicial debe ser menos a la final");
                return false;

            }
            else
            {
                var fechaIni = $("fechaInicial").val();
                var fechaFin = $("fechaFinal").val();
                var id = $("aceptar").val();

                var datos = 'fechaIni=' + fechaIni + '&fechaFin=' + fechaFin + '&id=' + id;
                $.get('editarEventos.php', null, function() {
                    alertify.success("Datos guardados");
                });

                return true;
            }
        }
//////
        $("#fechaInicial").datepicker({
        });
        $("#fechaFinal").datepicker({
        });
////
//        $('#aceptar').click(function() {
////                    alert("dasdas")
//            var fechaInicial = $('#fechaInicial').val();
//            var fechaFinal = $('#fechaFinal').val();
//             $.get('editarEventos.php', null, function() {
//                    alertify.success("Datos guardados");
//                });
////            validarFechaMenorActual(fechaInicial, fechaFinal);
//        });
    });
</script>
<?php

$id = $_GET["id"];

$sql = "SELECT fechaInicial, fechaFinal FROM guardarEvento WHERE idEvento= $id";
$datos2 = mysql_query($sql, $coneccion->Conectarse());
While ($rs2 = mysql_fetch_array($datos2)) {

    $FechaInicial = $rs2["fechaInicial"];
    $FechaFinal = $rs2["fechaFinal"];
}

echo 'Fecha Inicial:<input type="text" name="datepicker" id="fechaInicial" readonly="readonly" size="12" value="' . $FechaInicial . '"/>
      Fecha Final:<input type="text" name="datepicker" id="fechaFinal" readonly="readonly" size="12" value="' . $FechaFinal . '" />
      ';
?>
