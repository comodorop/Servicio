<?php

session_start();
$usuario = $_SESSION["usuario"];
if ($usuario == null) {
    
} else {

    $id_foto = date('YmdHis'); //extraemos la fecha del servidor
    $filename = "../fotos/" . $id_foto . '.jpg'; //nombre del archivo
    $result = file_put_contents($filename, file_get_contents('php://input')); //renombramos la fotografia y la subimos
    //$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $filename; //generamos la respuesta como la ruta completa
    $url = $filename; //generamos la respuesta
    include '../DaoConnection/coneccion.php';
    $cn = new coneccion();
    $_SESSION["url"] = $url;
    $sql = "UPDATE datosregistrousuario SET foto ='$url' WHERE usuario = '$usuario'";
    mysql_query($sql, $cn->Conectarse());
    session_destroy();
    //print "$url\n";
}
?>
