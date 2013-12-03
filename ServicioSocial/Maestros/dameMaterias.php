<?php

include '../clases/materias.php';
include '../Dao/DaoPablo.php';
session_start();
$dao = new DaoPablo();
$materia = new materias();
$grupo = $_GET["grupo"];
$cicloEscolar = $_SESSION["cicloEscolar"];
$anio = $_SESSION["anio"];
$idMaestro = $_SESSION["idMaestroSession"];
$listaMaterias = $dao->dameMateriasGrupo($idMaestro, $cicloEscolar, $anio, $grupo);
$combo = "<select id='listaMaterias'>";
$combo .="<option>Seleccione una Materia</option>";
foreach ($listaMaterias as $datos) {
    $combo .="<option value = " . $datos->getId() . " >" . utf8_encode($datos->getMateria()) . "</option>";
}
$combo .= "</select>";
echo $combo;
?>

