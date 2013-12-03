<?php

include '../Dao/DaoPablo.php';
$dao = new DaoPablo();
$matricula = $_GET["matricula"];
$status = $dao->dameSatusMaestro($matricula);
if($status == 2){
    $marcado1 = "selected";
    $marcado2 = "";
}
else{
    $marcado1="";
    $marcado2 = "selected";
}
echo "<select id='status'>
        <option  value='0'>Tutor</option>
        <option ".$marcado1." value='2'>Si</option>
        <option ".$marcado2." value='4'>No</option>
      </select>";
?>