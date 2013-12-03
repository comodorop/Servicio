<?php
include '../clases/guardarEvento.php';
include '../Dao/dao.php';
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$cicloEvento =$_POST["Curso"];
$fechaFinal = $_POST["fechaIni"];
$anio =  explode( '/', $fechaFinal);
$sql = "Select * From fechascicloescolar where idControl = 0;";
$consulta = mysql_query($sql, $cn->Conectarse());
$d = mysql_affected_rows();
While ($rs = mysql_fetch_array($consulta)) {
                          $idmateria = $rs["idCicloEscolar"];     
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
