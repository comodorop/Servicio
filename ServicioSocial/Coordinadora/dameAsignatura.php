<?php

include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$grupo = $_GET["grupo"];
$sql = "SELECT materia  FROM gruposAlumnos
        INNER JOIN materias m 
        ON idMateria = id
        WHERE  nombreGrupo = '$grupo'";
$datos = mysql_query($sql, $cn->Conectarse());
echo "<select id='asignatura'>";
echo"<option>Seleccione una Asignatura</option>";
While ($rs = mysql_fetch_array($datos)) {
    echo'   <option value="' . utf8_encode($rs["materia"]) . '"> ' . utf8_encode($rs["materia"]) . '</option>';
}
echo"</select>";
?>
