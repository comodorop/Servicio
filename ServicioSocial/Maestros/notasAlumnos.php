
<?php
session_start();
include './validacionseSession.php';
$verif = new validacionseSession();
$verif->verificacionDeLogue();
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

            function quitarEspacion(cadena) {
                var palabra = cadena.replace(/\s/g, "%20");
                return palabra;
            }
            $(document).ready(function() {
                $('#listaAlumnos').load('listaMatricula.php');
                $('#Informacion').hide();
                $('#Buscar').click(function() {
                    $('#Informacion').slideUp('slow');
                    var informacion = $('#datosBuscar').val();
                    informacion = quitarEspacion(informacion);
                    $('#Informacion').load('mostrarInformacion.php?datos=' + informacion);
                });
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <div class="well well-sm">
                    <div class="input-append">
                        <input  id="datosBuscar" type="text" placeholder="Matricula o Nombre...." list="listaAlumnos"/>
                        <datalist id="listaAlumnos">
                        </datalist>
                        <input type="submit" class="btn btn-primary" value="Buscar" id="Buscar"/>
                    </div><br>
                    <div id="Informacion" ></div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
include './plantillaFooter.php';
?>