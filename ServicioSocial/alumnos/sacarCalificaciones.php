<?php
session_start();
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$idmateria=$_GET["materias"];
$alumno = $_SESSION['UsuarioAlumno'];
$sql2 = "SELECT Calificacion FROM calificacionesactual c, materias m WHERE c.CursoEscolar='".$_SESSION["cicloEscolar"]."' AND c.anio='".$_SESSION["anio"]."' AND c.idAlumno='$alumno' AND c.idMateria=m.id AND idMateria='$idmateria'";
$datos2 = mysql_query($sql2, $cn->Conectarse());
echo " <table>";
while ($rs2 = mysql_fetch_array($datos2)) {
     echo "<td width='10px;'>".$rs2["Calificacion"]."</td>";
}
echo "</table>";
?>
