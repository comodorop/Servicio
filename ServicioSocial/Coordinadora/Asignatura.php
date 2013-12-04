<?php

session_start();
include '../DaoConnection/coneccion.php';
include '../clases/CrearGrupo.php';
include '../Dao/dao.php';
$cn = new coneccion();
$crearGrupo = new CrearGrupo();
$dao = new dao();
$asignatura = utf8_decode($_GET["Asignatura"]);
$Grupo = utf8_decode($_GET["IdentificadorGrupo"]);
$Maestro = utf8_decode($_GET["Maestro"]);
$idmaterias = "SELECT id from materias where materia= '$asignatura'";
$datosid = mysql_query($idmaterias, $cn->Conectarse());
While ($rs = mysql_fetch_array($datosid)) {
    $idmateria = $rs["id"];
}
$cn->cerrarBd();
$idmaestro = "SELECT id from maestros where maestro= '$Maestro'";
$datosid = mysql_query($idmaestro, $cn->Conectarse());
While ($rs = mysql_fetch_array($datosid)) {
    $idMaestro = $rs["id"];
}
$cn->cerrarBd();
$crearGrupo->setNombreGrupo($Grupo);
$crearGrupo->setIdMaestro($idMaestro);
$crearGrupo->setIdMateria($idmateria);
$crearGrupo->setCurso($_SESSION["cicloEscolar"]);
$crearGrupo->setAnio($_SESSION["anio"]);
$dao->guardarNuevoGrupo($crearGrupo);
?>
