<?php
include './plantilla.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
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
    <body>
        <div class="container">
            <center>
                <div class="span12"  style="margin: auto; background-color: white; margin-top: -20px">
                    <select id="materias">

                    </select>
                    <center>
                        <table style="width: 80%" id="calificaciones" class="table table-hover">

                        </table>
                    </center>
                </div>
            </center>
        </div>
    </body>
    <?php include './plantillaFooter.php.'; ?>
</html>
