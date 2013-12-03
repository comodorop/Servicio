<?php

include '../Dao/DaoPablo.php';
$daoPablo = new DaoPablo();
$listaTutorados = $daoPablo->dameTutorados($_GET["idMaestro"]);

echo "<table>";
foreach ($listaTutorados as $datos) {
    echo "<tr>
         <td>".$datos->getNombre()."&nbsp;".$datos->getApellidoPaterno()."&nbsp;".$datos->getApellidoMaterno()."</td>
         <tr>";
}
echo "</table>";
?>
