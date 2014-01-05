<?php
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$grupo = $_GET["grupo"];
$asignatura = $_GET["asignatura"];
$sql = "SELECT ai.usuario, Nombre, apellidoPaterno, apellidoMaterno ,idAlumnosInscritos
        FROM alumnosInscritos ai
        INNER JOIN gruposalumnos  ga
        on ga.idGrupo = ai.idGrupo 
        inner join materias m 
        on m.id = ai.idMateria
        inner join datosPersonales dp
        on dp.usuario = ai.usuario
        WHERE nombreGrupo = '$grupo' and materia= '" . utf8_decode($asignatura) . "'";
$datos = mysql_query($sql, $cn->Conectarse());
$cont =1;
echo "<table class='table table-hover'>";

while ($rs = mysql_fetch_array($datos)) {
    echo "<tr>";
    echo"<td>".$cont."</td>";
    echo "<td>" . $rs[0] . "</td>";
    echo "<td>" . $rs[1] . "&nbsp;" . $rs[2] . "&nbsp;" . $rs[3] . "</td>";
    echo' <td>
    <center>
    <a onclick="eliminarAlumno('.$rs[4].');" title="Quitar alumno"
    <i class = "icon-trash"></i>
    </a>
    </center>
    </td>
';
    echo "</tr>";
    $cont++;
}
echo "</table>";
?>
