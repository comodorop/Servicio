<?php
include '../DaoConnection/coneccion.php';
$coneccion = new coneccion();
$sql = "SELECT  g.idEvento,c.curso, g.fechaInicial, g.fechaFinal, e.nombreEvento FROM guardarevento g, evento e, curso c WHERE e.idEvento = g.evento and c.id = cicloEscolar";
$datos2 = mysql_query($sql, $coneccion->Conectarse());
$cont = 0;
echo "<table id='tabla' class='table table-hover'>";
While ($rs2 = mysql_fetch_array($datos2)) {
    echo' <tr>
    <td>' . utf8_encode($rs2['curso']) . '</td> 
    <td> ' . utf8_encode($rs2["fechaInicial"]) . ' </td>
    <td> ' . utf8_encode($rs2["fechaFinal"]) . ' </td>
    <td>'.utf8_encode($rs2["nombreEvento"]).' </td>
    </tr>';
}
echo "</table>"
?> 
