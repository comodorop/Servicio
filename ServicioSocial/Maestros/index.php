<?php
//session_start();
include './validacionseSession.php';
$verificar = new validacionseSession;
$verificar->verificacionDeLogue();
include '../DaoConnection/coneccion.php';
include '../clases/usuario.php';
$usuario = new usuario();
$usuario->setUsuario($_SESSION["Usuario"]);
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
    </head>
    <body>
        <div class="container stlconten">
            <div style="margin: 3% 3% 3% 3%">
                <div class="well well-sm pagination-centered">

                    <?php
                    $cn = new coneccion();
                    $sql = "SELECT * FROM tutotmaestrosalumnos t,
                     maestros m,
                     avisos a
                     where t.idMaestro = m .id 
                     and a.control = 2
                     and a.usuario = t.matricula
                     and m.usuario = '" . $usuario->getUsuario() . "'";
                    $datos = mysql_query($sql, $cn->Conectarse());
                    $cn->cerrarBd();
                    ?>

                    <?php
                    while ($row = mysql_fetch_array($datos)) {
                        echo "<div style='float:left ; margin-left: 100px'>
                            <h3>"
                        . $row["titulo"] .
                        "</h3>
                                </div>
                                <br> <br>
                            ";

                        echo "<center>
                            <div style='width:60%'>
                                <p align='justify'>"
                        . $row["detalles"] . "
                                </p>
                            </div>
                     </center>
                              <br/>                                
                              ";
                    }
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>
<?php
include './plantillaFooter.php';
?>