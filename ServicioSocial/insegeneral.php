<?php
session_start();
include '../ServicioSocial/validacionseSession.php';
$validacion = new validacionseSession();
$validacion->verificacionSession();
?>
<!DOCTYPE html>
<html>
    <script src="../ServicioSocial/bootsTrap2/js/jquery.min.js"></script>
    <head>
        <script>
            $(document).ready(function() {
                $('#error').hide();
                $('#verificacion').click(function() {
                    var usua = $("#usua").val();
                    var pass = $('#pass').val();
                    $(this).load("verificacionLogin.php?usua=" + usua + "&pass=" + pass);
                });
            });
        </script>
    </head>
    <div id="myModal" class="modal hide fade"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <h3 id="myModalLabel">Iniciar Sesion</h3>
        </div>
        <div class="modal-body pagination-centered" >
            <input id="usua" type="text"  placeholder="Usuario" /><br> 
            <input  id="pass" type="password" placeholder="Contraseña"/>
        </div> 
        <div class="modal-footer pagination-centered">
            <button id="verificacion" type="submit" class="btn btn-primary"> <i class="icon-ok">&nbsp;</i>&nbsp;&nbsp;Iniciar</button>
        </div>
    </div>
</html>

