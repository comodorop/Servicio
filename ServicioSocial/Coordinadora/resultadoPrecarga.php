<?php
include '../DaoConnection/coneccion.php';
include './plantillaEncabezado.php';
session_start();
?>
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
            <div class="" style="overflow-y: scroll; height: 220px">
                <?php
                $cn = new coneccion();
                $sql = " SELECT p.idMateria, count(p.idMateria) as prr, m.materia \n"
                        . "FROM precarga p, materias m \n"
                        . "where p.idMateria = m.id\n"
                        . "group by p.idMateria \n"
                        . " LIMIT 0, 30 ";
                $datos = mysql_query($sql, $cn->Conectarse());
                ?><table  class="table table-hover">
                    <th> materia </th><th> Alumnos Preinscritos</th>
                    <?php
                    While ($rs = mysql_fetch_array($datos)) {
                        ?>
                        <tr> <td><?php echo utf8_encode($rs["materia"]); ?></td> <td><?php echo utf8_encode($rs["prr"]); ?></td> 
                            <?php
                        }
                        ?></tr>
                </table>
                <?php
                $cn->cerrarBd();
                ?>
            </div>
        </div>
    </body> 
    <?php include './plantillaFooter.php'; ?>
</html>
