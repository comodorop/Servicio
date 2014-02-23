<?php
include '../DaoConnection/coneccion.php';
include './plantillaEncabezado.php';
//session_start();
?>
<style>


</style>

<html>
    <head>

        <!--        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> -->
<!--        <script type="text/javascript" src="../bootsTrap2/js/jquery.min.js"></script>
        <script src="../bootsTrap2/js/bootstrap.min.js"></script>-->
        <script>
            $(document).ready(function() {
                var maestro;
                $('#Sacarmaestros').load('maestrosEncuesta.php');
                $('#Sacarmaestros').change(function() {
                    maestro = $('#Sacarmaestros').val();
                    alert(maestro);
                    $('#mostrarDatos').load('estudioCuestionarioTutorias.php?tutor=' + maestro);
                });
                
                
            });
        </script>
    </head> 

    <body style="background-color:  #e5e5e5">
        <div class="container" >
            <div   class="span12"  style="margin: auto; background-color: white; margin-top: -20px">
                <div  id="seleccionar">
                    <select id="Sacarmaestros" style="float: left; margin-left: 40px">
                        <option value="0">Seleccione un maestro</option>
                    </select>   
                </div>
                </br></br></br>
                <div id="mostrarDatos">
                    
                </div>
<!--                <center>
                <button class="btn-success" id="botonazo">aceptar</button>
                </center>-->
            </div>

    </body> 
    <?php
    include './plantillaFooter.php ';
    ?>
</html>
