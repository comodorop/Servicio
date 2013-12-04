<?php

session_start();
include '../DaoConnection/coneccion.php';
include '../clases/CrearGrupo.php';
include '../Dao/DaoPablo.php';
$cn = new coneccion();
$creaGrupo = new CrearGrupo();
$daoPablo = new DaoPablo();
$asignatura = ($_GET["Asignatura"]);
$creaGrupo->setNombreGrupo($_GET["IdentificadorGrupo"]);
$Maestro = ($_GET["Maestro"]);
$creaGrupo->setIdGrupo($_GET["id"]);
$creaGrupo->setAnio($_SESSION["anio"]);
$creaGrupo->setCurso($_SESSION["cicloEscolar"]);
$idmaterias = "SELECT id from materias where materia= '".utf8_decode($asignatura)."'";
$datos = mysql_query($idmaterias, $cn->Conectarse());
While ($rs = mysql_fetch_array($datos)) {
    $creaGrupo->setIdMateria($rs["id"]);
}
$cn->cerrarBd();
$idmaestro = "SELECT id from maestros where maestro= '$Maestro'";
$datosid = mysql_query($idmaestro, $cn->Conectarse());
While ($rs = mysql_fetch_array($datosid)) {
    $creaGrupo->setIdMaestro($rs["id"]);
}
$cn->cerrarBd();
$daoPablo->ActualizarCrearGrupo($creaGrupo);
?>
