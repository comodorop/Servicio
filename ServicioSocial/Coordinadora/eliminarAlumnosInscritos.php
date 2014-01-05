<?php
include '../Dao/DaoPablo.php';
$daoPablo = new DaoPablo();
$daoPablo->eliminarAlumnosInscrito($_GET["id"]);
//$_GET["id"];
?>
