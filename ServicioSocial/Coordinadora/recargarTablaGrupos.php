<?php

include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$sql = "SELECT idGrupo, nombreGrupo, materia, maestro FROM gruposalumnos ga, materias m, maestros ma"
        . " WHERE ga.idMateria = m.id and ga.idMaestro = ma.id";
$datos4 = mysql_query($sql, $cn->Conectarse());
$datos = "<table id = 'tablaGrupos' class = 'table table-hover'>";
$datos.= "<tr>
          <td><center><strong>Grupo</strong></center></td>
          <td><center><strong>Materia</strong></center></td>
          <td><center><strong>Maestros</strong></center></td>
          <td><center><strong>Actualizar</strong></center></td>
          <td><center><strong>Eliminar</strong></center></td>
          </tr>";
while ($rsLista = mysql_fetch_array($datos4)) {
    $datos .="<tr>";
    $datos .="<td> " . $rsLista['nombreGrupo'] . "</td>";
    $datos .="<td>" . utf8_encode($rsLista['materia']) . "</td>";
    $datos .= "<td>" . $rsLista['maestro'] . "</td>";
    $datos .=" <td><center><a onclick ='actualizar(" . $rsLista[0] . ");'><i class = 'icon-pencil'></i></a></center></td>";
    $datos .= "<td><center>
                   <a onclick='eliminar(" . $rsLista[0] . ");'>
                     <i class='icon-trash'></i>
                   </a>
                   </center>
               </td>";
    $datos .="</tr>";
}
$datos .= "</table>";
echo $datos;
?>