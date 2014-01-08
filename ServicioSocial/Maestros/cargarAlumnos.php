<?php

session_start();
include '../Dao/daoServicio.php';
$grupo = $_GET["grupo"];
$idMateria = $_GET["idMateria"];
$usuario = $_SESSION["Usuario"];
$tipo = $_GET["tipo"];
$daoServicio = new daoServicio();
if ($tipo == 1) {
    $datos = $daoServicio->dameAlumnos($grupo, $usuario, $idMateria);
}
else{
    $tipo = $tipo -1;
    $datos = $daoServicio->dameAlumnos($grupo, $usuario, $idMateria);
}

$_SESSION["listaAlumnos"] = $datos;
//echo '<table>';
foreach ($datos as $alumnos) {
//    echo '<tr>';
//    echo "" . $alumnos->getUsuario() . "";
    echo "" . $alumnos->getNombre() . ":&nbsp;&nbsp;";
    echo "<input type = 'text' id='calificacion'/>";
    echo"<br>";
//    echo '</tr>';
}
//echo "</table>";
?>