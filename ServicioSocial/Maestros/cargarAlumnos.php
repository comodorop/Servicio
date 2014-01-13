<?php

session_start();
include '../Dao/daoServicio.php';
$grupo = $_GET["grupo"];
$idMateria = $_GET["idMateria"];
$usuario = $_SESSION["Usuario"];
$tipo = $_GET["tipo"];
$unidad = $_GET["unidad"];
$daoServicio = new daoServicio();
if ($tipo == 1) {
    $datos = $daoServicio->dameAlumnos($grupo, $usuario, $idMateria);
} else if ($tipo == 2) {
    $datos = $daoServicio->dameAlumnosRepe($grupo, $usuario, $idMateria, $unidad);
} else if ($tipo == 3) {
    $datos = $daoServicio->dameAlumnosExtraordinario($grupo, $usuario, $idMateria, $unidad);
}
$_SESSION["listaAlumnos"] = $datos;
//echo '<table>';
foreach ($datos as $alumnos) {
//    echo '<tr>';
//    echo "" . $alumnos->getUsuario() . "";
    echo '<table>';
    echo '<tr>';
    echo " <td><label style='float:left'>" . $alumnos->getNombre() . ":</label></td>";
    echo "<td><input  style='float:rigth' type = 'text' id='calificacion'/></td>";
    echo '</tr>';
    echo"</table>";
}


//echo "</table>";
?>