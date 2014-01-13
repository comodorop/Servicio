<?php
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$sql = "SELECT m.maestro, m.id FROM seguimientocurso s \n"
    . "inner join maestros m\n"
    . "on s.matriculaMaestro = m.id LIMIT 0, 30 ";

$datos = mysql_query($sql, $cn->Conectarse());
if ($datos == "") {
    echo '<select id="materia" name="materia"  >
          <option>Seleccione el maestro</option>
          </select>';
} else {
    echo "<select name='materia' id='materia' >";
    echo"<option>Seleccione el maestro</option>";
    While ($rs = mysql_fetch_array($datos)) {
        ?>
        <option value="<?php echo $rs["id"]; ?>"><?php echo $rs["maestro"] ?></option>
        <?php
    }
    echo "</select>";
}
?>