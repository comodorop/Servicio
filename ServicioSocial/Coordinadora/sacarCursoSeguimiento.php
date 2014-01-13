
<?php
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$sql = "SELECT id, curso FROM curso";

$datos = mysql_query($sql, $cn->Conectarse());
if ($datos == "") {
    echo '<select id="materia" name="materia"  >
          <option>Seleccione un curso</option>
          </select>';
} else {
    echo "<select name='materia' id='materia' >";
    echo"<option>Seleccione un curso</option>";
    While ($rs = mysql_fetch_array($datos)) {
        ?>
        <option value="<?php echo $rs["id"]; ?>"><?php echo $rs["curso"] ?></option>
        <?php
    }
    echo "</select>";
}
