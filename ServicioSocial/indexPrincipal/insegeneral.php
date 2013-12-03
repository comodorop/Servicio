<!DOCTYPE html>
<html>
    <script src="../bootsTrap2/js/jquery.js"></script>
    <head>
        <script>
            $(document).ready(function() {
                $('#error').hide();
                $('#verificacion').click(function() {
                    var usua = $("#usua").val();
                    var pass = $('#pass').val();
                    if (usua != "" && pass != "") {
                        $(this).load("verificacionLogin.php?usua=" + usua + "&pass=" + pass);
                    } else {
                        alertify.log("Usuario y contraseña no pueden estar vacios.");
                    }
                });
            });
        </script>
    </head>
    <div id="myModal" class="modal hide fade"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <h3 id="myModalLabel">Iniciar Sesion</h3>
        </div>
        <div  id="error" style="height: 35px" class="alert-error">
            &nbsp;&nbsp;&nbsp;<Strong>Usuario o Contraseña</Strong> invalidos.
        </div>
        <div class="modal-body pagination-centered" >
            <form class="form-signin">
                <input id="usua" type="text" class="form-control"  placeholder="Usuario" required autofocus/><br> 
                <input  id="pass" type="password" class="form-control" placeholder="Contraseña" required/><br>
            </form>
        </div> 
        <div class="modal-footer pagination-centered">
            <button id="verificacion" type="submit" class="btn btn-primary"> <i class="icon-ok"></i>&nbsp;Iniciar</button>
        </div>
    </div>
</html>

