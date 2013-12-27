<?php

session_start();
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$sql = "SELECT usuario from datosPersonales";
$datos = mysql_query($sql, $cn->Conectarse());
echo "<datalist>";
while ($rs = mysql_fetch_array($datos)) {
    echo"<option>" . $rs[0] . "</option>";
}
echo "</datalist>";
$cn->cerrarBd();
?>