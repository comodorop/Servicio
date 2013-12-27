<?php
include '../Dao/DaoPablo.php';
$dao = new DaoPablo();
$id =$_GET["id"];
$valor =$_GET["autorizar"];
if($valor ==0){
   $dao->rechazarDocumento($id, $valor); 
}
else{
     $dao->autorizarDocumento($id, $valor); 
}

?>
