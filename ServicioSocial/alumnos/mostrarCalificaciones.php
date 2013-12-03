<?php
include './plantilla.php';
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
                var materia;
                $('#materias').load("sacarMaterias.php");
                $('#materias').change(function() {
                    materia = $('#materias').val();
                    if (materia > 0) {
                        $('#calificaciones').load('sacarCalificaciones.php?materias=' + materia);
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <h3>Calificaciones</h3>
                <div class="well well-sm pagination-centered">
                    <select id="materias"></select>
                    <table style="width: 80%" id="calificaciones" class="table table-hover">
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include './plantillaFooter.php.'; ?>
