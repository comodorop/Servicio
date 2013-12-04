<?php
session_start();
include '../clases/guardarEvento.php';
include '../Dao/dao.php';
//$cn = new coneccion();
$EditarEventos= new guardarEvento(); 
$dao= new dao();
$cicloEvento =$_GET["Curso"];
$cicloEvento=$_SESSION["cicloEscolar"];
$Evento = $_GET["Evento"];
$FechaInicial = $_GET["fechaIni"];
$fechaFinal = $_GET["fechaFin"];
//$anio =  explode( '/', $fechaFinal);
$anio = $_SESSION["anio"];
$EditarEventos ->setCicloEscolar($cicloEvento);
$EditarEventos ->setAnio($anio);
$EditarEventos ->setEvento($Evento);
$EditarEventos->setFechaInicial($FechaInicial);
$EditarEventos ->setFechaFinal($fechaFinal);
$dao->editarEvento($EditarEventos);
?>
