<?php

session_start();
include '../clases/usuario.php';
include '../Dao/DaoJoel.php';
include '../Utilerias/Utilerias.php';
$utilierias = new Utilerias();
$usuario = new usuario();
$dao = new DaoJoel();
$usuario->setUsuario($_GET["usua"]);
$usuario->setPass($utilierias->genera_md5($_GET["pass"]));
$valido = $dao->accesoAlumnos($usuario);
$cn = new coneccion();
$sql = "SELECT cicloEscolar, anio FROM fechascicloescolar WHERE idControl = 0";
$consulta = mysql_query($sql, $cn->Conectarse());
While ($rs2 = mysql_fetch_array($consulta)) {
    $cicloEscolar = $rs2["cicloEscolar"];
    $anio = $rs2["anio"];
}

$_SESSION["cicloEscolar"] = $cicloEscolar;
$_SESSION["anio"] = $anio;

$tipo = $_SESSION["tipo"];
if ($valido == false) {
    echo '
<i class="icon-ok"></i>&nbsp;Iniciar';
    echo "
         <script>
//         $('#error').slideDown('slow');
//         $('#error').delay('1500');
//         $('#error').slideUp('slow');
alertify.error(\"Usuario o Contraseña incorrectos.\");
         </script>
            ";
}
if ($tipo == 1) {
    $_SESSION["UsuarioCoord"] = $usuario->getUsuario();
    echo '
<i class="icon-ok"></i>&nbsp;Iniciar';
    echo "
        <script>
             document.location.href='../Coordinadora/index.php';
        </script>
         ";
} else if ($tipo == 2 || $tipo == 4) {
    $_SESSION["Usuario"] = $usuario->getUsuario();
    echo '
<i class="icon-ok"></i>&nbsp;Iniciar';
    echo "
        <script>
             document.location.href='../Maestros/index.php';
        </script>
         ";
} else if ($tipo == 3) {
    $_SESSION["UsuarioAlumno"] = $usuario->getUsuario();
    include '../clases/fechascicloescolar.php';
    $fechascicloescolar = new fechascicloescolar();
    $anio = $_SESSION["anio"];
    $ciclo = $_SESSION["cicloEscolar"];
    $fechascicloescolar->setAnio($anio);
    $fechascicloescolar->setCicloEscolar($ciclo);
    $valido = $dao->validarEncuestaTutorias($fechascicloescolar);
    $val2 = $dao->dameMenu($_SESSION["UsuarioAlumno"]);
    $_SESSION["menuAlumnos"] = $val2;
    $_SESSION["validarFechas"] = $valido;
    echo '
<i class="icon-ok"></i>&nbsp;Iniciar';
    echo "
        <script>
             document.location.href='../alumnos/index.php';
        </script>
         ";
}
?>