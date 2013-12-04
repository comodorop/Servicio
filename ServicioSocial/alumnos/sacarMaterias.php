<?php
session_start();
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$alumno = $_SESSION['UsuarioAlumno'];
$sql2 = "SELECT * FROM alumnosinscritos ai, materias m
where usuario = '$alumno'
and ai.idMateria = m.id
and anio = '".$_SESSION["anio"]."'
and cursoEscolar = '".$_SESSION["cicloEscolar"]."'";
$datos2 = mysql_query($sql2, $cn->Conectarse());
if ($datos2 == "") {
//    echo '<select id="materias" name="materia"  >
        echo '  <option>Seleccione una materia</option>';
//          </select>';
} else {
//    echo "<select name='materias' id='materias' >";
    echo"<option value = 0>Seleccione una materia</option>";
    While ($rs2 = mysql_fetch_array($datos2)) {
        ?>
<option value="<?php echo $rs2["idMateria"]; ?>"><?php echo utf8_encode($rs2["materia"]) ?></option>
        <?php
    }
//    echo "</select>";
}
?>
