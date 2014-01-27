<?php

session_start();

class validacionseSession {

    function verificacionDeLogue() {
        $usuario = $_SESSION['Usuario'];
        if ($usuario == null) {
            echo "
        <script>
             document.location.href='../indexPrincipal/indexgeneral.php';
        </script>
         ";
            header('Location: ../indexPrincipal/indexgeneral.php');
        }
    }

    function verificacionSession() {
        $usuarioSession = $_SESSION['Usuario'];
        if ($usuarioSession != null) {
            header('Location: index.php');
        }
    }

}

?>
