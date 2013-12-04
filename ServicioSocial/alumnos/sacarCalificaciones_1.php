<?php

session_start();
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$idmateria=$_GET["materias"];
$alumno = $_SESSION['UsuarioAlumno'];
$sql = "SELECT cicloescolar, anio FROM fechascicloescolar f, curso c WHERE c.id=f.cicloEscolar AND f.idControl=0";
$datos = mysql_query($sql, $cn->Conectarse());
while ($rs = mysql_fetch_array($datos)) {
    $cicloescolar = $rs[0];
    $anio = $rs[1];
}

$sql2 = "SELECT Calificacion FROM calificacionesactual c, materias m WHERE c.CursoEscolar='$cicloescolar' AND c.anio='$anio' AND c.idAlumno='$alumno' AND c.idMateria=m.id AND idMateria='$idmateria'";
$datos2 = mysql_query($sql2, $cn->Conectarse());
echo " <table>";
while ($rs2 = mysql_fetch_array($datos2)) {
     echo "<td width='10px;'>".$rs2["Calificacion"]."</td>";
}
echo "</table>";
?>
