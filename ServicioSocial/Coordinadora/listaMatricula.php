<?php

session_start();
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$sql = "SELECT usuario from usuarios WHERE tipo = 3";
$datos = mysql_query($sql, $cn->Conectarse());
echo "<datalist>";
while ($rs = mysql_fetch_array($datos)) {
    echo"<option>" . $rs[0] . "</option>";
}
echo "</datalist>";
$cn->cerrarBd();
?>