<?php

include '../clases/alumnosinscritos.php';
include '../Dao/dao.php';
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$GrupoAlumno = new alumnosinscritos();
$dao = new dao();
$asignatura = utf8_decode($_GET["Asignatura"]);
$Grupo = utf8_decode($_GET["Grupo"]);
$usuario = $_GET["Usuario"];

$idmaterias = "SELECT id from materias where materia= '$asignatura'";
$datosid = mysql_query($idmaterias, $cn->Conectarse());
While ($rs = mysql_fetch_array($datosid)) {
    $idmateria = $rs["id"];
}
$idGrupos = "Select  idGrupo from gruposAlumnos where nombreGrupo = '$Grupo'";
$datosGrupos = mysql_query($idGrupos, $cn->Conectarse());
$validandox = mysql_affected_rows();
if($validandox > 0){
While ($rs2 = mysql_fetch_array($datosGrupos)) {
    $idGrupo = $rs2["idGrupo"];
}
$cn->cerrarBd();
$GrupoAlumno->setIdGrupo($idGrupo);
$GrupoAlumno->setIdMateria($idmateria);
$GrupoAlumno->setUsuario($usuario);
$valor = $dao->guardarAlumnoGrupo($GrupoAlumno);
echo json_encode($valor);
}else {
    $valor = 3;
    echo json_encode($valor);
}

?>

