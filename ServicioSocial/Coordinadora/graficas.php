<?php

require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_bar.php');
require_once ("../jpgraph/src/jpgraph_pie.php");
include '../DaoConnection/coneccion.php';
$bandera = $_GET["bandera"];
$banderaBusqueda = $_GET["banderaBusqueda"];

if ($bandera == 1) {

    $materia = utf8_decode($_GET["materia"]);
    $Maestro = $_GET["Maestro"];
    $anio = $_GET["anio"];
    $Curso = $_GET["Curso"];
    $TipoCurso = $_GET["TipoCurso"];
    $Unidad = $_GET["Unidad"];
    $cn = new coneccion();
    $idmaterias = "SELECT id FROM materias WHERE materia= '$materia'";
    $datosid = mysql_query($idmaterias, $cn->Conectarse());
    While ($rs = mysql_fetch_array($datosid)) {
        $idmateria = $rs["id"];
    }
    $sql = "SELECT Calificacion FROM calificacionesactual WHERE idMaestro = $Maestro and idMateria = $idmateria and Calificacion >= 70 and unidad = $Unidad and CursoEscolar=$Curso and TipoCurso = $TipoCurso ";
    $datos = mysql_query($sql, $cn->Conectarse());
    $aprobados = mysql_affected_rows();

    $cn->cerrarBd();

    $cn = new coneccion();
    $sql2 = "SELECT Calificacion FROM calificacionesactual WHERE idMaestro = $Maestro and idMateria = $idmateria and Calificacion < 70 and unidad = $Unidad and anio=$Curso and cursoEscolar = $TipoCurso ";
    $datos2 = mysql_query($sql2, $cn->Conectarse());
    $reprobados = mysql_affected_rows();
    $cn->cerrarBd();
//
}
if ($bandera == 2 && $banderaBusqueda == "1") {

    $EscolarCurso = $_GET["anio"];
    $TipoCursoEsc2 = $_GET["Curso"];
    $SacaMaestros = $_GET["maestro"];

    $cn = new coneccion();
    $sql = "select calificacion from historial where anio = $EscolarCurso and curso =$TipoCursoEsc2 and idMaestro = $SacaMaestros and calificacion >= 70 ";
    $datos = mysql_query($sql, $cn->Conectarse());
    $aprobados = mysql_affected_rows();

    $cn->cerrarBd();
    $cn = new coneccion();
    $sql2 = "select calificacion from historial where anio = $EscolarCurso and curso =$TipoCursoEsc2 and idMaestro = $SacaMaestros and calificacion < 70";
    $datos2 = mysql_query($sql2, $cn->Conectarse());
    $reprobados = mysql_affected_rows();
    $cn->cerrarBd();
}

if ($bandera == 2 && $banderaBusqueda == "2") {

    $EscolarCurso = $_GET["anio"];
    $TipoCursoEsc2 = $_GET["Curso"];


    $cn = new coneccion();
    $sql = "select count(idMateria) as total, m.materia from historial h\n"
            . "inner join materias m on h.idMateria = m.id\n"
            . "where anio = $EscolarCurso and curso =$TipoCursoEsc2 and calificacion >= 70 \n"
            . "group by idMateria ";
    $datos = mysql_query($sql, $cn->Conectarse());

    echo"<div class='table-responsive' ><table id='tdProducto' cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered'><thead><th>materia</th><th>aprobados</th></thead><tbody>";

    while ($rs = mysql_fetch_array($datos)) {
        echo "<tr><td> ".utf8_encode($rs['materia'])."</td><td>$rs[total]</td>";
    }
    echo "</tr></tbody></table>";

    $cn->cerrarBd();
    $cn = new coneccion();
    $sql2 = "select count(idMateria) as total, m.materia from historial h\n"
            . "inner join materias m on h.idMateria = m.id\n"
            . "where anio = $EscolarCurso and curso =$TipoCursoEsc2 and calificacion < 70 \n"
            . "group by idMateria ";
    $datos2 = mysql_query($sql2, $cn->Conectarse());

    echo"<div class='table-responsive'><table id='tdProducto' cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered'><thead><th>materia</th><th>reprobados</th></thead><tbody>";

    while ($rs = mysql_fetch_array($datos2)) {
        echo "<tr><td> ".utf8_encode($rs['materia'])."</td><td>$rs[total]</td>";
    }
    echo "</tr></tbody></table>";


    $consulta = "select * from historial where anio = $EscolarCurso and curso =$TipoCursoEsc2 and calificacion >= 70";
    $datos3 = mysql_query($consulta, $cn->Conectarse());
    $aprobados = mysql_affected_rows();
    $consulta2 = "select * from historial where anio = $EscolarCurso and curso =$TipoCursoEsc2 and calificacion < 70";
    $datos4 = mysql_query($consulta2, $cn->Conectarse());
    $reprobados = mysql_affected_rows();
    $cn->cerrarBd();
}

// Se define el array de valores y el array de la leyenda
// Creamos el grafico

$datos = array($aprobados, $reprobados);
$labels = array("aprobados", "reprobados");

$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textint");
$grafico->title->Set("Estadisticas de Alumnos");
$grafico->xaxis->title->Set("Alumnos");
$grafico->xaxis->SetTickLabels($labels);
$grafico->yaxis->title->Set("Estado");
$barplot1 = new BarPlot($datos);
// Un gradiente Horizontal de morados
$barplot1->SetFillGradient("#BE81F7", "#E3CEF6", GRAD_HOR);
// 30 pixeles de ancho para cada barra
$barplot1->value->Show();
$barplot1->SetWidth(30);
$grafico->Add($barplot1);
$grafico->Stroke(_IMG_HANDLER);

$fileName = "grafica1.png";
$grafico->img->Stream($fileName);

// mostrarlo en el navegador
echo "<h5>Aprobados  $aprobados<h5>";

echo "<h5>Reprobados $reprobados<h5>";

echo "<br><img src=\"grafica1.png\" >  ";

//unlink("grafica1.png");
?>
