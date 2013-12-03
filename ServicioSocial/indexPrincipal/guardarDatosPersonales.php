<?php

session_start();
$url = $_SESSION["url"];
include'../clases/usuario.php';
include '../Dao/daoServicio.php';
$guardar = new usuario();
$dao = new daoServicio();
$correo = $_GET["correo"];
if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $correo)) {
    $vacio = 3;
    echo json_encode($vacio);
} else {
    if ($_GET["usuario"] == "" || $_GET["nombre"] == "" || $_GET["apellidoP"] == "" || $_GET["apellidoM"] == "" || $_GET["correo"] == "") {
        $vacio = 2;
        echo json_encode($vacio);
    } else {
        $usuario = $_GET["usuario"];
        $rs = $dao->verificarUsuarioDuplicado($usuario);
        if ($rs > 0) {
            $valido = 0;
            echo json_encode($valido);
        } else {
            $guardar->setUsuario($_GET["usuario"]);
            $guardar->setNombres($_GET["nombre"]);
            $guardar->setApellidoPaterno($_GET["apellidoP"]);
            $guardar->setApellidoMaterno($_GET["apellidoM"]);
            $guardar->setEmail($_GET["correo"]);
            $guardar->setFoto($_SESSION["url"]);
            $_SESSION["usuario"] = $guardar->getUsuario();
            $dao->guardarRegistroDatos($guardar);
            $valido = 1;
            echo json_encode($valido);
        }
    }
}
?>






