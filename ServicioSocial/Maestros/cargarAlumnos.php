<?php

session_start();
include '../Dao/daoServicio.php';
$grupo = $_GET["grupo"];
$idMateria = $_GET["idMateria"];
$daoServicio = new daoServicio();
$usuario = $_SESSION["Usuario"];
$datos = $daoServicio->dameAlumnos($grupo, $usuario, $idMateria);
echo "<select id='alumnos'>";
echo "<option>Seleccione un Usuario</option>";
foreach ($datos as $alumnos) {
      echo "<option value=" . $alumnos->getUsuario() . ">" . $alumnos->getNombre() . "</option>";
//    echo "<option>Hola</option>";
}
echo "</select>";

?>