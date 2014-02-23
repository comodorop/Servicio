
<?php
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$materia = utf8_decode($_GET["materia"]);
$curso = $_GET["Curso"];
$TipoCurso = $_GET["TipoCurso"];
//utf8_decode($materia);
//$sql = "SELECT * from materias WHERE materia = 'Taller de Herramientas Intelectuales'";
$sql = "SELECT id from materias WHERE materia = '$materia'";
$datos = mysql_query($sql, $cn->Conectarse());

//$dato = "";
while ($fila = mysql_fetch_assoc($datos)) {
$id =   $fila["id"];
}



$sql = "SELECT Distinct *\n"
    . "FROM calificacionesactual c\n"
    . "JOIN maestros m\n"
    . "ON m.id = c.idMaestro\n"
    . "WHERE c.anio = $curso and c.CursoEscolar = $TipoCurso and c.idMateria = $id group by maestro";
    $datos = mysql_query($sql, $cn->Conectarse());
    if($datos == 0){                       
     echo '<select id="materia" name="materia" >
          <option>Seleccione un maestro</option>
          </select>';
    }
    else
    {
        
        echo "<select name='materia' id='materia'  >";
    echo"<option>Seleccione Maestro</option>";
        While ($rs = mysql_fetch_array($datos)) {
                                ?>

                                <option value="<?php echo $rs["id"]; ?>"><?php echo $rs["maestro"] ?></option>
                                <?php
                            }
                            echo "</select>";
//   para el actual curso    SELECT *
//FROM calificacionesactual c
//JOIN maestros m
//ON m.id = c.idMaestro
//JOIN materiasmaestros mm
//ON mm.idMaestro = m.id and c.idMateria = mm.idMaterias
//WHERE c.CursoEscolar = 2011 and c.idMateria = 2
                            
                            
                            
    }
?>
