
<?php
include '../Dao/dao.php';
session_start();
include './validacionseSessionAlumnos.php';
$validacion = new validacionseSessionAlumnos();
$validacion->verificacionDeLogueAlumnos();
$matricula = $_SESSION["UsuarioAlumno"];
$cursoEscolar = $_SESSION["cicloEscolar"];
$anio = $_SESSION["anio"];
//$Asignaturas[] = $_POST["Asignatura"];
$valor = $_GET["valor"];
$cn = new coneccion();
$tamanio = count($Asignaturas);



$seleccionados = explode(',',  utf8_decode($_GET['Asignatura'])); // convierto el string a un array.
 $validando="SELECT * FROM verificacion where matricula = '$matricula' and anio = '$anio' and ciclo = '$cursoEscolar' and tipo = 5";
 $d = mysql_query($validando, $cn->Conectarse());
 $d= mysql_affected_rows();
 if($d<=0){
    for ($i=0;$i<count($seleccionados);$i++) { 
      $sql2 = "SELECT id FROM materias where materia = '$seleccionados[$i]'";  
         $datos = mysql_query($sql2, $cn->Conectarse());
         While ($rs = mysql_fetch_array($datos)) { 
             $idMa=$rs["id"];
             
         }   
         
    $sql = "INSERT INTO `precarga` (`Matricula`, `IdMateria`, `Horario`) VALUES ( '$matricula', '$idMa', '$valor');";
mysql_query($sql, $cn->Conectarse());



    } 
      $sql = "INSERT INTO `verificacion` (`matricula`, `control`, `tipo`,`ciclo`,`anio`) VALUES ( '$matricula', '1', '5', '$cursoEscolar', '$anio');";
mysql_query($sql, $cn->Conectarse());
$valido=1;
echo json_encode($valido);
 }
 else {
     $valido = 0;
  echo json_encode($valido);
     
 }

       

//$cn->cerrarBd();
?>
