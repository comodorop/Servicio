<?php
include '../Dao/DaoPablo.php';
$dao = new DaoPablo();
$maestro = $_GET["maestro"];
$usuario =$_GET["usuario"];
$pass = $_GET["pass"];
$dao->guardarMaestro($maestro, $usuario);
$dao->guardarUsuario($usuario, $pass);
?>
