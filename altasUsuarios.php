<?php
include './Encabezado.php';
?>
<html>
    <head>
        <style>
            .stlconten{
                background-color: white;
                margin-top: -20px
            }
        </style>
    </head>
    <body>
        <div class="container stlconten">
            <div class="col-lg-12">
                <div class="well">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contraseña:</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Staus:</label>
                        <select class="form-control">
                            <option>Status</option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuario</option>
                            <option value="3">Invitado</option>
                        </select>
                    </div>
                    <center>
                        <input type="submit"
                               value="Guardar" 
                               class="btn btn-success"
                               title="Guardar Usuario"/>
                        <input type="submit" 
                               value="Cancelar" 
                               class="btn btn-danger"
                               title="Cancelar Usuario"/>
                    </center>
                </div>
                <?php
                include './footeer.php';
                ?>
            </div>
        </div>
    </body>
</html>

