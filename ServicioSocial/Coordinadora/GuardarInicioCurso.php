<?php
include '../clases/fechascicloescolar.php';
include '../Dao/dao.php';
$fechascicloescolar = new fechascicloescolar(); 
$dao= new dao();
$cicloEvento =$_GET["Curso"];

$FechaInicial = $_GET["fechaIni"];
$fechaFinal = $_GET["fechaFin"];


$anio =  explode( '/', $fechaFinal);
$fechascicloescolar ->setCicloEscolar($cicloEvento);
$fechascicloescolar ->setAnio($anio[0]);

$fechascicloescolar ->setFechaInicial($FechaInicial);
$fechascicloescolar ->setFechaFinal($fechaFinal);
$dao->Guardarfechascicloescolar($fechascicloescolar);
?>
