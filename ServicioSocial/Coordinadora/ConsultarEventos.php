<?php
//
include '../DaoConnection/coneccion.php';
include './plantillaEncabezado.php';
$coneccion = new coneccion();
//session_start();
?>
<style>


</style>

<html>
    <head>

        <script>
            var idx = 0;
            function validarFechaMenorActual(fechaInicial, FechaFinal)
            {
                var today = new Date(fechaInicial);
                var date2 = new Date(FechaFinal);
                if (date2 <= today)
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }
            function  dameValor(id) {
//                alert(id);
                idx = id;
//                mostrarFechas(id);
            }

            $(document).ready(function() {
                var id;
                $('#aceptar').hide();

                $.fn.editarFechas = function(id2) {
                    id= id2;
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
//                            $("#tabla").load("construirEventos.php");
                            $('#fechas').hide();
                            document.location.href='ConsultarEventos.php';
                        });
                    }
                    else {
                        alertify.error("La fecha inicial debe ser menos a la final");
                    }
                });
            });
        </script>
    </head> 

    <body style="background-color:  #e5e5e5">
        <div class="container">
            <center>
                <div   class="span12"  style="margin: auto; background-color: white; margin-top: -20px; height: 230px; overflow-y: scroll  " >
                    <div>
                        <table id="tabla" border ="1" class="table table-hover"> 
                            <?php
                            $sql = "SELECT  g.idEvento,c.curso, g.fechaInicial, g.fechaFinal, e.nombreEvento FROM guardarevento g, evento e, curso c WHERE e.idEvento = g.evento and c.id = cicloEscolar";
                            $datos2 = mysql_query($sql, $coneccion->Conectarse());
                            $cont = 0;
                            While ($rs2 = mysql_fetch_array($datos2)) {
                                ?>    <tr> 
                                    <td>
                                        <button  class="btn btn-link" onclick="$(this).editarFechas(<?php echo $rs2["idEvento"]; ?>);"> Editar Fechas</button> 
                                    </td> 
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
                    <div class="container" id="fechas">
                    </div> 
                    <button class="btn btn-success" id="aceptar">Aceptar </button>
                </div>
            </center>
        </div>

    </body> 
    <?php
    include './plantillaFooter.php ';
    ?>
</html>
