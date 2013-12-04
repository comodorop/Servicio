<?php
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$sql = "SELECT anio, cicloEscolar, fechaInicial, fechaFinal,c.curso FROM fechascicloescolar f, curso c
                                where f.cicloEscolar = c.id";
$datos2 = mysql_query($sql, $cn->Conectarse());

echo "<table id = 'tabla' class = 'table table-hover'>";
While ($rs2 = mysql_fetch_array($datos2)) {
    echo"
  <tr> 
    <td>
        Ciclo Escolar en Curso:                                      
    </td> 
    <td>  " . utf8_encode($rs2["curso"]) . " </td> 
    <td> " . utf8_encode($rs2['fechaInicial']) . " </td>
    <td> " . utf8_encode($rs2["fechaFinal"]) . "  </td>
    <td> " . utf8_encode($rs2['anio']) . "</td>
</tr>";
}
echo "</table>";
?>
