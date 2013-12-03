<?php
include '../DaoConnection/coneccion.php';
include './plantillaEncabezado.php';
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
                $("#buscar").click(function() {
                    var id = $("#datosBuscar").val();
                    document.location.href = 'autorizarOrechazar.php?idusuario=' + id;
                    $("#datosBuscar").val("");
                });
            });
        </script>
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <div class="well well-sm pagination-centered">
                    <div class="input-append">
                        <input  id="datosBuscar" type="text" placeholder="Matricula" list="listaAlumnos"/>
                        <datalist id="listaAlumnos">
                            <?php
                            $cn = new coneccion();
                            $sql = "SELECT usuario FROM datosregistrousuario";
                            $dato = mysql_query($sql, $cn->Conectarse());
                            while ($rs = mysql_fetch_array($dato)) {
                                ?>
                                <option><?php echo $rs[0]; ?></option>
                                <?php
                            }
                            ?>
                            <option></option>
                        </datalist>
                        <input type="submit" class="btn btn-primary" value="Buscar" id="buscar"/>
                    </div>
                    <br />
                    <br />
                    <?php
                    $cn = new coneccion();
                    $sql = "SELECT * FROM `datosregistrousuario` where autorizado = 0";
                    $datos = mysql_query($sql, $cn->Conectarse());
                    echo '<div>';
                    while ($rs = mysql_fetch_array($datos)) {
                        ?>
                        <a href="autorizarOrechazar.php?idusuario=<?php echo $rs[1]; ?>">Contraseña pedida por el usuario: <?php echo $rs[1]; ?></a><br />
                        <?php
                    }
                    echo '</div>'
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
include './plantillaFooter.php';
?>