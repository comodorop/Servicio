<?php

session_start();
include '../Dao/DaoPablo.php';
include '../clases/seguimientoCurso.php';
$daoPablo = new daoPablo();
$segumiento = new seguimientoCurso();
$segumiento->setAnio($_SESSION["anio"]);
$segumiento->setCurso($_SESSION["cicloEscolar"]);
$segumiento->setPregunta1($_GET["1"]);
$segumiento->setPregunta2($_GET["2"]);
$segumiento->setPregunta3($_GET["3"]);
$segumiento->setPregunta4($_GET["4"]);
$segumiento->setPregunta5($_GET["5"]);
$segumiento->setPregunta6($_GET["6"]);
$segumiento->setPregunta7($_GET["7"]);
$segumiento->setPregunta8($_GET["8"]);
$segumiento->setPregunta9($_GET["9"]);
$segumiento->setPregunta10($_GET["10"]);
$segumiento->setPregunta11($_GET["11"]);
$segumiento->setPregunta12($_GET["12"]);
$segumiento->setPregunta13($_GET["13"]);
$segumiento->setPregunta14($_GET["14"]);
$segumiento->setPregunta15($_GET["15"]);
$segumiento->setPregunta16($_GET["16"]);
$segumiento->setPregunta17($_GET["17"]);
$segumiento->setPregunta18($_GET["18"]);
$segumiento->setPregunta19($_GET["19"]);
$segumiento->setPregunta20($_GET["20"]);
$segumiento->setPregunta21($_GET["21"]);
$segumiento->setPregunta22($_GET["22"]);
$segumiento->setPregunta23($_GET["23"]);
$segumiento->setPregunta24($_GET["24"]);
$daoPablo->guardarSeguimientoCurso($segumiento);
?>
