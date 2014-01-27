<?php

session_start();
include '../Dao/daoServicio.php';
$grupo = $_GET["grupo"];
$idMateria = $_GET["idMateria"];
$usuario = $_SESSION["Usuario"];
$tipo = $_GET["tipo"];
$unidad = $_GET["unidad"];
$cicloEscolar = $_SESSION["cicloEscolar"];
$anio = $_SESSION["anio"];
$usuarioMaestro = $_SESSION["Usuario"];
$daoServicio = new daoServicio();
$datos = null;
$rs = null;
if ($tipo == 1) {
    $rs = $daoServicio->verificar($cicloEscolar, $anio, $usuarioMaestro, $idMateria, $tipo, $unidad);
    $datos = $daoServicio->dameAlumnos($grupo, $usuario, $idMateria);
} else if ($tipo == 2) {
    $rs = $daoServicio->verificar($cicloEscolar, $anio, $usuarioMaestro, $idMateria, $tipo, $unidad);
    $datos = $daoServicio->dameAlumnosRepe($grupo, $usuario, $idMateria, $unidad);
} else if ($tipo == 3) {
    $rs = $daoServicio->verificar($cicloEscolar, $anio, $usuarioMaestro, $idMateria, $tipo, $unidad);
    $datos = $daoServicio->dameAlumnosExtraordinario($grupo, $usuario, $idMateria, $unidad);
}
$_SESSION["listaAlumnos"] = $datos;
$informacion = false;
echo '<table>';
if ($rs == true) {
    while ($datosCalificaciones = mysql_fetch_array($rs)) {
        echo '<tr>';
        echo " <td><label style='float:left'>" . $datosCalificaciones[0] . " &nbsp; ".$datosCalificaciones[1]." &nbsp; ".$datosCalificaciones[2]." &nbsp; ".$datosCalificaciones[3]."</label></td>";
        echo "<td><label  style='float:rigth'> " . $datosCalificaciones[4] . "</label></td>";
        echo '</tr>';
        $informacion = true;
    }
}
if ($informacion == false) {

    if (is_array($datos)) {
        foreach ($datos as $alumnos) {
//    echo '<tr>';
//    echo "" . $alumnos->getUsuario() . "";

            echo '<tr>';
            echo " <td><label style='float:left'>" . $alumnos->getNombre() . ":</label></td>";
            echo "<td><input  style='float:rigth' type = 'text' id='calificacion'/></td>";
            echo '</tr>';
        }
    }
    echo"</table>";
}
//echo "</table>";
?>