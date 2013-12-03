<?php
session_start();
include './validacionseSession.php';
$vali = new validacionseSession();
$vali->verificacionDeLogue();
include './plantillaEncabezado.php';
?>
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
                <div class="well well-sm">
                    <div  id="exito" style="height: 35px" class="alert-info">
                        <center> <strong>Nuevos Avisos Disponibles</strong></center>
                    </div>
                    <div  id="error" style="height: 35px" class="alert-danger">
                        <center> <strong>Llene todos los campos</strong></center>
                    </div>
                    <br>
                    <center>
                        <select id="avisosaMostrar"name="mostrar" style="width: 250px; margin-right: 250px">
                            <option value="0">Avisos para...</option>
                            <option value="1">Coordinador</option>
                            <option value="3">Alumnos</option>
                        </select>
                        <br />
                        <input id="titulo" placeholder="Titulo de Aviso..." type="text" name="textfield" style="width: 250px; height: 30px;  margin-right: 250px"/>
                        <br/>
                        <textarea placeholder="Observaciones..." id="detalles" style="min-width: 500px;  min-height: 200px; max-width: 500px; max-height: 200px;"></textarea>
                        <p><button id="guardar" class="btn btn-primary" type="button">Guardar</button></p>
                    </center>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include './plantillaFooter.php'; ?>
