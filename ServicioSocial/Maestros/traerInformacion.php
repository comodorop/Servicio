<?php

include '../clases/CalificacionesActuales.php';
include '../clases/historialAcademico.php';
include '../Dao/DaoPablo.php';
$dao = new DaoPablo();
$calificacionesActuales = new CalificacionesActuales();
$historial = new historialAcademico();
$historial = $_GET["matricula"];
$calificacionesActuales->setUsuario($_GET["matricula"]);
$calificacionesActuales->setGrupo($_GET["grupo"]);
$calificacionesActuales->setCursoEscolar($_GET["curso"]);
$calificacionesActuales->setAño(date('Y'));
if ($calificacionesActuales->getUsuario() != null && $calificacionesActuales->getGrupo() != null && $calificacionesActuales->getCursoEscolar() != null) {
    $datos = $dao->dameCalificacionesActuales($calificacionesActuales);
    $cont = 1;
    echo "<table>";
    foreach ($datos as $califi) {
//      echo  $califi->getCalificaciones();
        echo "
       <tr>
       <td>
       <font size='4' face='Bookman Old Style'>Calificación Unidad " . $cont . ": </font>"
        . "</td>"
        . "<td> <font size='4' face='Bookman Old Style'>" . $califi->getCalificaciones() . "</font>"
        . "</td>"
        . "<td> <a onclick=''>Eliminar</a></td>"
        . "</tr>";
        $cont++;
    }
    echo "</table>";
}
?>