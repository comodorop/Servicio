<?php

session_start();
include '../DaoConnection/coneccion.php';
include '../clases/guardarEvento.php';
include '../Dao/dao.php';
$guardarEventos = new guardarEvento();
$dao = new dao();
$guardarEventos->setCicloEscolar($_SESSION["cicloEscolar"]);
$guardarEventos->setAnio($_SESSION["anio"]);
$guardarEventos->setEvento($_GET["Evento"]);
$guardarEventos->setFechaInicial($_GET["fechaIni"]);
$guardarEventos->setFechaFinal($_GET["fechaFin"]);
$dao->guardarEvento($guardarEventos);
include '../clases/maestros.php';
if ($guardarEventos->getEvento() == 7) {
    $listaMaestros = $dao->dameMaestros();
    foreach ($listaMaestros as $lista) {
        $listaVerificacion = $dao->enviarEncuestaAleatoriaAlumnos($lista->getId());
        foreach ($listaVerificacion as $listaV) {
            $dao->insertarVerificacion($listaV);
        }
    }
}
?>
