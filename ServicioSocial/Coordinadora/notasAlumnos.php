
<?php
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
                    if (informacion == '') {
                        alertify.error("No hay datos para buscar");
                    }
                    else {
                        $('#Informacion').load('mostrarInformacion.php?datos=' + informacion);
                    }

                });
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div>
                <h3>Consultar Alumnos</h3>
                <div class="well well-sm" style="margin: 3% 3% 3% 3%">
                    <div class="input-append" style="float: left; margin-left: 40px">
                        <input  id="datosBuscar" type="text" placeholder="Matricula o Nombre...." list="listaAlumnos"/>
                        <datalist id="listaAlumnos">
                        </datalist>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Buscar" id="Buscar"/>
                    <br>
                    <br>
                </div>

                <div  class="well well-sm" id="Informacion" style="float: left; width: 400px; margin-left: 40px; ">

                </div>
            </div>
        </div>
    </body>
</html>
<?php
include './plantillaFooter.php';
?>