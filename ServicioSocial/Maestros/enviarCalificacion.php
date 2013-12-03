<?php

session_start();
include '../clases/CalificacionesActuales.php';
include '../Dao/DaoPablo.php';
$daoPablo = new DaoPablo();
$calificacionesActuales = new CalificacionesActuales();
$calificacionesActuales->setAño($_SESSION["anio"]);
$calificacionesActuales->setCalificaciones($_GET["calificacion"]);
$calificacionesActuales->setCursoEscolar($_SESSION["cicloEscolar"]);
$calificacionesActuales->setGrupo($_GET["grupo"]);
$calificacionesActuales->setIdMaestro($_SESSION["idMaestroSession"]);
$calificacionesActuales->setIdMateria($_GET["materia"]);
$calificacionesActuales->setTipoCurso($_GET["tipo"]);
$calificacionesActuales->setUnidad($_GET["unidad"]);
$calificacionesActuales->setUsuario($_GET["alumno"]);
$daoPablo->insertarCalifiaciones($calificacionesActuales);
?>