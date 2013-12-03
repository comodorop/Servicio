<?php

include '../DaoConnection/coneccion.php';
include '../clases/CrearGrupo.php';
include '../Dao/dao.php';
$cn = new coneccion();
$crearGrupo = new CrearGrupo();
$dao = new dao();
$asignatura = utf8_decode($_POST["Asignatura"]);
$Grupo = utf8_decode($_POST["IdentificadorGrupo"]);
$Maestro = utf8_decode($_POST["Maestro"]);
$idmaterias = "SELECT id from materias where materia= '$asignatura'";
$datosid = mysql_query($idmaterias, $cn->Conectarse());
While ($rs = mysql_fetch_array($datosid)) {
    $idmateria = $rs["id"];
}

$idmaestro = "SELECT id from maestros where maestro= '$Maestro'";
$datosid = mysql_query($idmaestro, $cn->Conectarse());
While ($rs = mysql_fetch_array($datosid)) {
    $idMaestro = $rs["id"];
}


$sql = "Select * From gruposalumnos where nombreGrupo = '$Grupo' and idMateria = '$idmateria' and idMaestro = '$idMaestro'";
$consulta = mysql_query($sql, $cn->Conectarse());
$d = mysql_affected_rows();

if ($d < 1) {
    $valido = 1;
    echo json_encode($valido);
} else {
    $valido = 0;
    echo json_encode($valido);
}
mysql_free_result($consulta);
$cn->cerrarBd();
?>
