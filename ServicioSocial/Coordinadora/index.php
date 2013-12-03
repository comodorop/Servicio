<?php
session_start();
include './validacionseSession.php';
$verificar = new validacionseSession;
$verificar->verificacionDeLogue();
include './plantillaEncabezado.php';
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
        <script>
            $(document).ready(function() {
                $('#avisosaMostrar').change(function() {
                    var opciones = $('#avisosaMostrar').val();
                    $('#avisos').load('avisos.php?opciones=' + opciones);
                });
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <div class="well well-sm">
                    <select id="avisosaMostrar"name="mostrar">
                        <option value="0">Seleccione avisos a mostrar</option>
                        <option value="2">Maestros</option>
                        <option value="3">Alumnos</option>
                    </select>
                    <div id="avisos"></div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include './plantillaFooter.php'; ?>