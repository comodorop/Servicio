<?php

include '../clases/fechascicloescolar.php';
include '../Dao/dao.php';
$editarfechaInicio= new fechascicloescolar(); 
$dao= new dao();
$cicloEvento =$_GET["Curso"];
$FechaInicial = $_GET["fechaIni"];
$fechaFinal = $_GET["fechaFin"];
$anio =  explode( '/', $fechaFinal);
$editarfechaInicio ->setCicloEscolar($cicloEvento);
$editarfechaInicio ->setAnio($anio[0]);

$editarfechaInicio ->setFechaInicial($FechaInicial);
$editarfechaInicio ->setFechaFinal($fechaFinal);
$dao->editarfechaInicio($editarfechaInicio);

?>
