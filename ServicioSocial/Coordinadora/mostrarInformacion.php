<?php

include '../DaoConnection/coneccion.php';
include './validacionseSession.php';
$validicaciones = new validacionseSession();
$validicaciones->verificacionDeLogue();
$cn = new coneccion();
$busqueda = $_GET["datos"];
$sql = "select * from datospersonales where usuario ='$busqueda'";
$datos = mysql_query($sql, $cn->Conectarse());
$sqlDatos = "SELECT * FROM cargaarchivos WHERE usuario = '$busqueda'";
echo"<div>";
while ($rs = mysql_fetch_array($datos)) {

    echo '<a title="Generar Organigrama" target="_blank" href="./organigrama/Dinamicamente.php?usuario=' . $busqueda . '"><img src="imagenes/orgaICO.png"/></a>
        <br>';
    echo "<div style='float:left'>
        <font size='4' face='Bookman Old Style'>Usuario: $rs[1].</font></div>";
    echo '<br>';
    echo '<br>';
    echo "<div><font size='4' face='Bookman Old Style'>Nombre: $rs[2] &nbsp $rs[3] &nbsp $rs[4].</font></div>";
}
$datosArchivos = mysql_query($sqlDatos, $cn->Conectarse());
echo '<div>';
echo '<br>';
echo "<font size='5' face='Bookman Old Style'>Actividades Complementarias</font>";
echo '<br>';
while ($rsDatos = mysql_fetch_array($datosArchivos)) {
    echo "<div style='float:left' class='form-inline'>
        <font size='4' face='Bookman Old Style'>
        <a href='$rsDatos[2]' target='blank'>
            Documento
        </a>
        </font>";
    if ($rsDatos[4] == 0) {
        echo 'No autorizado';
    } else {
        echo"Autorizado";
    }
    echo"&nbsp;&nbsp;";
    echo"<a onclick='rechazarDocumento(" . $rsDatos["id"] . ");'><i class='icon-remove' title='Rechazar Documento'></i></a>";
    echo"&nbsp;&nbsp;";
    echo"<a onclick='autorizarDocumento(" . $rsDatos["id"] . ");'><i class='icon-ok' title='Validar Documento'></i></a>";
    echo" </div>";
    echo '<br>';
    echo '<br>';
}
if (mysql_affected_rows() == 0) {
    echo "<font size='2' face='Bookman Old Style'>No Hay Actividades Extraescolares</font>";
}
echo '</div>';
echo"</div>";
echo"<script>
     $('#Informacion').slideDown('slow');
     </script>";
?>
