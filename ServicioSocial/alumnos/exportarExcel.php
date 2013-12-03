<?php
session_start();
$usuario = $_SESSION['UsuarioAlumno'];
include './excelwriter.inc.php';
include '../DaoConnection/coneccion.php';
$dao = new coneccion();
$excel = new ExcelWriter("materias.xls");
if ($excel == false) {
    echo $excel->error;
}
//Escribimos la primera fila con las cabeceras
$myArr = array("Materia", "Calificacion");
$excel ->writeLine($myArr);
$sql2 = "SELECT materia, calificacion
FROM materias m, historial h
WHERE h.idMateria = m.id
AND usuario =  'E13080477'
LIMIT 0 , 30";
$result2 = mysql_query($sql2, $dao ->Conectarse());
//Escribimos todos los registros de la base de datos
//en el fichero EXCEL
while ($Rs2 = mysql_fetch_array($result2)) {
    $myArr = array(
        $Rs2[0],
        $Rs2[1],
    );
    $excel->writeLine($myArr);
//Otra forma es
//$excel->writeLine($Rs2);
//De este modo volcariamos todos los registros seleccionados
//Sin necesidad de colocarlos/filtrar previamente en $myArr
}
$excel->close();
$dao ->cerrarBd();
echo "exitoso"
//Abrimos el fichero excel que acabamos de crear

?>