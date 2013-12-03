<?php
session_start();
include '../clases/guardarEvento.php';
include '../DaoConnection/coneccion.php';
include '../Dao/dao.php';
$cn = new coneccion();
//$cicloEvento =$_POST["Curso"];
$cicloEvento = $_SESSION["cicloEscolar"];
$Evento = $_POST["Evento"];
$fechaFinal = $_POST["fechaFin"];
//$anio =  explode( '/', $fechaFinal);
$anio = $_SESSION["anio"];
$sql = "Select * From guardarevento where anio = '$anio' and cicloEscolar = $cicloEvento  and evento = $Evento";
$consulta = mysql_query($sql, $cn->Conectarse());
$d = mysql_affected_rows();
While ($rs = mysql_fetch_array($consulta)) {
                          $idmateria = $rs["idEvento"];     
                            }       
        if ($d < 1 ) {
            $valido = 1;
            echo json_encode($valido);
            }
            else{
                $valido = 0;
                echo json_encode($valido);
            }
            mysql_free_result($consulta);
        

        $cn->cerrarBd();
?>
