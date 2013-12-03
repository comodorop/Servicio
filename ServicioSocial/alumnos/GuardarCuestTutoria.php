<?php

session_start();
include '../Dao/daoServicio.php';
include '../Dao/DaoJoel.php';
include '../clases/CuestionarioTutoria.php';

$dao = new daoServicio();
$guardar = new CuestionarioTutoria();
$usuario = $_SESSION["UsuarioAlumno"];
$daoJoel = new DaoJoel();
?>
<?php

$guardar->setMatricula($usuario);
$guardar->setPregunta1($_GET["disposicion"]);
$guardar->setPregunta2($_GET["cordialidad"]);
$guardar->setPregunta3($_GET["respeto"]);
$guardar->setPregunta4($_GET["interes"]);
$guardar->setPregunta5($_GET["capacidad"]);
$guardar->setPregunta6($_GET["mostrar"]);
$guardar->setPregunta7($_GET["resolver"]);
$guardar->setPregunta8($_GET["orientar"]);
$guardar->setPregunta9($_GET["dificultades"]);
$guardar->setPregunta10($_GET["estimular"]);
$guardar->setPregunta11($_GET["formacion"]);
$guardar->setPregunta12($_GET["dominio"]);
$guardar->setPregunta13($_GET["localizar"]);
$guardar->setPregunta14($_GET["normativa"]);
$guardar->setPregunta15($_GET["seleccion"]);
$guardar->setPregunta16($_GET["canaliza"]);
$guardar->setPregunta17($_GET["mejorado"]);
$guardar->setPregunta18($_GET["programa"]);
$guardar->setPregunta19($_GET["satisfactorio"]);
$guardar->setPregunta20($_GET["asignado"]);

$dao->guardarEncuestaTUTO($guardar, $usuario);
$val2 = $daoJoel->dameMenu($usuario);
$_SESSION["menuAlumnos"] = $val2;

include '../Utilerias/class.phpmailer.php';
include '../Utilerias/class.smtp.php';
include '../clases/Correo.php';
include '../Utilerias/Utilerias.php';

$parametros = new Correo();
$parametros->setAsunto("Encuestra Resuelto");
$parametros->setMensaje("Se ha resuelto una encuesta");
$parametros->setPara("shanaxchornos@gmail.com");

$correo = new Utilerias();
$mail = new PHPMailer();

$correo->enviarCorreoElectronico($parametros, $mail);



header('Location: index.php');
?>
