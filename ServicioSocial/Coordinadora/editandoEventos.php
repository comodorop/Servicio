<?php

include '../clases/guardarEvento.php';
include '../Dao/dao.php';
$cn = new coneccion();
$EditarEventos= new guardarEvento(); 
$dao= new dao();
$id = $_GET["id"];
$FechaInicial = $_GET["fechaIni"];
$fechaFinal = $_GET["fechaFin"];
$anio =  explode( '/', $fechaFinal);

$EditarEventos ->setId($id);
$EditarEventos->setFechaInicial($FechaInicial);
$EditarEventos ->setFechaFinal($fechaFinal);
$dao->editarEventos($EditarEventos);
?>
