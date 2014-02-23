<?php
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$materia =$_GET["materia"];
$maestro=$_GET["maestro"];
$sql = "SELECT Distinct anio FROM `calificacionesactual`";
$datos = mysql_query($sql, $cn->Conectarse());
    if($datos == ""){                       
     echo '<select id="materia" name="materia" ">
          <option>Seleccione el año</option>
          </select>';
    }
    else
    {
        echo "<select name='materia' id='materia' >";
    echo"<option>Seleccione el año</option>";
        While ($rs = mysql_fetch_array($datos)) {
                                ?>
                                <option value="<?php echo $rs["anio"]; ?>"><?php echo $rs["anio"] ?></option>
                                <?php
                            }
       echo "</select>";
    }

?>
