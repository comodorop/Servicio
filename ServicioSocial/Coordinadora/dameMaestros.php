<?php

include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$sql = "SELECT m.maestro, m.usuario"
        . " FROM maestros m, usuarios u"
        . " WHERE m.usuario = u.usuario";
$datos = mysql_query($sql, $cn->Conectarse());
echo"<select>";
while ($rs = mysql_fetch_array($datos)) {
    echo "  <option  value=" . $rs[1] . "><" . $rs[0] . "</option>";
}
echo"</select>";
?>
