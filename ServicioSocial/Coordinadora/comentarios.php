<?php
session_start();
include './validacionseSession.php';
$vali = new validacionseSession();
$vali->verificacionDeLogue();
include './plantillaEncabezado.php';
?>
<!DOCTYPE html>
<html lang="es">
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
                $('#titulo').val('');
                $('#detalles').val('');
                $('#exito').hide();
                $('#error').hide();
                $('#guardar').click(function() {
                    var datos = 'titulo=' + $('#titulo').val() +
                            '&detalle=' + $('#detalles').val() +
                            '&para=' + $('#avisosaMostrar').val();
                    var titulo = $('#titulo').val();
                    var detalle = $('#detalles').val();
                    var para = $('#avisosaMostrar').val();
                    if (titulo == '' || detalle == '' || para == 0) {
                        $('#error').slideDown('slow');
                        $('#error').delay('1500');
                        $('#error').slideUp('slow');
                    }
                    else {
                        $.get('guardar.php', datos, function() {
                            $('#titulo').val('');
                            $('#detalles').val('');
                            $('#exito').slideDown('slow');
                            $('#exito').delay('1500');
                            $('#exito').slideUp('slow');
                        });
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <h3>Avisos</h3>
                <div class="well well-sm pagination-centered">
                    <div  id="exito" style="height: 35px" class="alert-info">
                        <center> <strong>Nuevos Avisos Disponibles</strong></center>
                    </div>
                    <div  id="error" style="height: 35px" class="alert-danger">
                        <center> <strong>Llene todos los campos</strong></center>
                    </div>
                    <br>
                    <center>

                        <select id="avisosaMostrar"name="mostrar" >
                            <option value="0">Avisos para...</option>
                            <option value="2">Maestros</option>
                            <option value="3">Alumnos</option>
                        </select>
                        <br />
                        <input id="titulo" placeholder="Titulo de Aviso..." type="text" name="textfield" />
                        <br/>
                        <textarea placeholder="Observaciones..." id="detalles" style="min-width: 100%px;  min-height: 100%; max-width: 100%; max-height: 100%;"></textarea>
                        <p><button id="guardar" class="btn btn-large btn-primary btn btn-success" type="button">Guardar</button></p>
                    </center>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include './plantillaFooter.php'; ?>
