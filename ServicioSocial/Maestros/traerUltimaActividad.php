<?php

include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$usuario = $_GET["id"];

$sql = "SELECT MAX(id) , fecha, objetivos , tareasAsignadas FROM sesiontutorias
    where matricula = '$usuario'";
$datos = mysql_query($sql, $cn->Conectarse());

while ($rs = mysql_fetch_array($datos)) {
    echo '
          <div>
          Fecha de la session: ' . $rs['fecha'] . '
          <br>
          Objetivos:
          <br>
          ' . $rs['objetivos'] . '
          <br>
          Tareas Asignadas:
          <br>
          ' . $rs['tareasAsignadas'] . '
          </div>
        ';
    
    
    echo"
        <script>
        $('#tareasAnteriores').show('slow');
        </script>
        ";
}
?>
