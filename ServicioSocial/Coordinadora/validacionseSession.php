<?php

session_start();

class validacionseSession {

    function verificacionDeLogue() {
        $usuario = $_SESSION['UsuarioCoord'];
        if ($usuario == null) {
            echo "
        <script>
             document.location.href='../indexprincipal/indexgeneral.php';
        </script>";
            header('Location: ../indexprincipal/indexgeneral.php');
        }
    }

    function verificacionSession() {
        $usuarioSession = $_SESSION['UsuarioCoord'];
        if ($usuarioSession != null) {
            header('Location: index.php');
        }
    }

}

?>
