<?php

session_start();
include '../Dao/DaoPablo.php';
$daoPablo = new DaoPablo();
include '../clases/CalificacionesActuales.php';
include '../clases/alumnosinscritos.php';
$datos = $_SESSION["listaAlumnos"];
$data = json_decode(stripslashes($_POST['data']));
$contador = 0;
for ($x = 4; $x <= $data; $x++) {
    if ($data[$x] == null) {
        break;
    }
    $califica = new CalificacionesActuales();
    $califica->setGrupo($data[0]);
    $califica->setIdMateria($data[1]);
    $califica->setUnidad($data[2]);
    $califica->setTipoCurso($data[3]);
    $califica->setCalificaciones($data[$x]);
    $califica->setAño($_SESSION["anio"]);
    $califica->setCursoEscolar($_SESSION["cicloEscolar"]);
    $listaCalificaciones[$contador] = $califica;
    $contador++;
}
$usuario = $_SESSION["Usuario"];
$datos = $daoPablo->dameAlumnos($data[0], $usuario, $data[1]);
$alumnos;
$cont = 0;
foreach ($datos as $listaUsuarios) {
    $alumnos[$cont] = $listaUsuarios->getUsuario();
    $cont++;
}
$cont = 0;
foreach ($listaCalificaciones as $listaCali) {

    $listaCali->setUsuario($alumnos[$cont]);
    $listaCali->setIdMaestro($_SESSION["idMaestro"]);
    $daoPablo->insertarCalifiaciones($listaCali);
    $cont++;
}
    
?>
