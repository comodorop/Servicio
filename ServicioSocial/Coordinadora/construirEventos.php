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
        $("#fechaInicial").datepicker({
        });
        $("#fechaFinal").datepicker({
        });
        var id;
        $('#aceptar').hide();

        $.fn.editarFechas = function(id2) {
            id = id2;
            $("#fechas").load('traerFechas.php?id=' + id2);
            $('#fechas').show();
            $('#aceptar').show();
        };
        $("#aceptar").click(function() {
            var fechaInicial = $('#fechaInicial').val();
            var fechaFinal = $('#fechaFinal').val();
            validarFechaMenorActual();
            var x = validarFechaMenorActual(fechaInicial, fechaFinal);
            if (x == true) {
                var datos = 'fechaIni=' + fechaInicial + '&fechaFin=' + fechaFinal + '&id=' + id;
                $.get('editandoEventos.php', datos, function() {
                    alertify.success("Datos guardados");
                    $("#tabla").load("construirEventos.php");
                    $('#fechas').hide();
                });
            }
            else {
                alertify.error("La fecha inicial debe ser menos a la final");
            }
        });
    });
</script>


<?php
include '../DaoConnection/coneccion.php';
$coneccion = new coneccion();
$sql = "SELECT  g.idEvento,c.curso, g.fechaInicial, g.fechaFinal, e.nombreEvento FROM guardarevento g, evento e, curso c WHERE e.idEvento = g.evento and c.id = cicloEscolar";
$datos2 = mysql_query($sql, $coneccion->Conectarse());
echo "<table border ='1' class='table table-hover'>";
While ($rs2 = mysql_fetch_array($datos2)) {
    echo"<tr> 
            <td>
<button  class='btn btn-link' onclick='$(this).editarFechas(" . $rs[0] . ");'> Editar Fechas</button> 
            </td> 
            <td>" . $rs2[1] . "</td> 
            <td>" . $rs2[2] . " </td>
            <td>" . $rs2[3] . "</td>
            <td>" . $rs2[4] . "</td>
    </tr>";
}
echo "</table>";
?>