<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="../alumnos/lib/alertify.js"></script>
        <link rel="stylesheet" href="../alumnos/themes/alertify.core.css" />
        <link rel="stylesheet" href="../alumnos/themes/alertify.default.css" />
        <script type="text/javascript" src="webcam.js"></script>
        <script src="validCampoFranz.js"></script>
        <script language="JavaScript">
            $(document).ready(function() {
                $("#oculta").hide();
                $("#cancelar").click(function() {
                    $("#usuario").val("");
                    $("#nombres").val("");
                    $("#apellidoM").val("");
                    $("#apellidoP").val("");
                    $("#email").val("");
                });

                $("#guardar").click(function() {
                    alert("click me");
//                  do_upload();
                    var usuario = $("#usuario").val();
                    var nombre = $("#nombres").val();
                    var apellidoM = $("#apellidoM").val();
                    var apellidoP = $("#apellidoP").val();
                    var correo = $("#email").val();
                    var info = "usuario=" + usuario + "&nombre=" + nombre + "&apellidoM=" + apellidoM + "&apellidoP=" + apellidoP + "&correo=" + correo;
                    $.get('guardarDatosPersonales.php', info, function(respuesta) {
                        var info = $.parseJSON(respuesta);
                        if (info == 3)
                        {
                            alertify.error("Formato de email no valido.");
                        }
                        if (info == 2)
                        {
                            alertify.error("Todos los campos son obligatorios.");
                        }
                        if (info == 0) {
                            alertify.error("Este usuario ya existe");
                        }
                        if (info == 1) {
                            $("#oculta").trigger("click");
                            $("#usuario").val("");
                            $("#nombres").val("");
                            $("#apellidoM").val("");
                            $("#apellidoP").val("");
                            $("#email").val("");
                            alertify.success("¡Bien! Tus datos han sido enviados para validación.");
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3 id="myModalLabel">Regitro de Usuario</h3>
            </div>
            <div class="modal-body">
                <form class="alguna" name="guardar">
                    <div class="row-fluid">
                        <div class="span6">
                            <input style="height: 30px" id="usuario" type="text" name="usuario" placeholder="Matricula" /> 
                        </div> 
                        <div>
                            <input  style="height: 30px" id="nombres" type="text" name="nombres" placeholder="Nombre(s)"/> 
                        </div>
                    </div> 
                    <div class="row-fluid">
                        <div class="span6">
                            <input style="height: 30px" id="apellidoP" type="text" name="ApellidoPaterno" placeholder="Apellido Paterno" /> 
                        </div> 
                        <div>
                            <input style="height: 30px" id="apellidoM" type="text" name="ApellidoMaterno" placeholder="Apellido Materno"/> 
                        </div>
                    </div> 
                    <div class="row-fluid">
                        <div class="span6">
                            <input required  style="height: 30px" id="email" type="email" name="Email" placeholder="Email"/> 
                        </div> 
                    </div>
<!--                    <div class="row-fluid">
                        <div align="center" id="cuadro_camara">    
                            <div id="visualizacionCamara" style="padding-top: 1%">
                                <script language="JavaScript">
                                    document.write(webcam.get_html(250, 250)); //dimensiones de la camara
                                </script>
                            </div>
                            <br>
                            <input type=button value="Tomar Foto" onClick="webcam.freeze()" class="btn btn-info">
                            <input type=button value="Borrar" onClick="webcam.reset()" class="btn btn-warning">
                            <br>
                            <br>
                        </div>
                    </div> -->
                </form>
            </div> 
            <div class="modal-footer">
                <input id="cancelar" type="button" value="Cancelar" data-dismiss="modal" class="btn btn-danger" />
                <input id="guardar" type=button value="Guardar "  name="dato" class="btn btn-success"/>
                <input id="oculta" type=button value="Guardar "  name="dato" class="btn btn-success" data-dismiss="modal"/>
                <!-- data-dismiss="modal" -->
            </div>
        </div>
    </body>
</html>



