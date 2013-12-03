<?php
include '../Dao/DaoPablo.php';
$matricula = $_GET["matricula"];
$status = $_GET["status"];
$daoP = new DaoPablo();
$daoP->actualizarStatus($matricula, $status);
?>