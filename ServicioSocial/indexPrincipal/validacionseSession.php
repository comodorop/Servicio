<?php

session_start();

class validacionseSession {

    function verificacionDeLogue() {
        $usuario = $_SESSION['UsuarioAlumno'];
        if ($usuario == null) {
            echo "
        <script>
             document.location.href='indexgeneral.php';
        </script>
         ";
            header('Location: indexgeneral.php');
        }
    }

    function verificacionSession() {
        $usuarioSession = $_SESSION['UsuarioAlumno'];
        $tipo = $_SESSION["tipo"];
        if ($usuarioSession != null && $tipo == 1) {
            header('Location: ../Coordinadora/index.php');
        } else if ($usuarioSession != null && $tipo == 2) {
            header('Location: ../Maestros/index.php');
        } else if ($usuarioSession != null && $tipo == 3) {
            header('Location: ../alumnos/index.php');
        }
    }

}
