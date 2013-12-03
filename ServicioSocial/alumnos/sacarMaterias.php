<?php
session_start();
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$alumno = $_SESSION['UsuarioAlumno'];
$sql = "SELECT cicloescolar, anio FROM fechascicloescolar f, curso c WHERE c.id=f.cicloEscolar AND f.idControl=0";
$datos = mysql_query($sql, $cn->Conectarse());
while ($rs = mysql_fetch_array($datos)) {
    $cicloescolar = $rs[0];
    $anio = $rs[1];
}

$sql2 = "SELECT DISTINCT idMateria,materia FROM calificacionesactual c, materias m WHERE c.CursoEscolar='$cicloescolar' AND c.anio='$anio' AND c.idAlumno='$alumno' AND c.idMateria=m.id";
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
