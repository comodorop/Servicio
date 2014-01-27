<?php

//session_start();

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
        if (isset($_SESSION["UsuarioCoord"])) {
            $usuarioSession = $_SESSION["UsuarioCoord"];
            if ($usuarioSession == null) {
                $usuarioSession = $_SESSION["Usuario"];
                if ($usuarioSession == null) {
                    $usuarioSession = $usuarioSession = $_SESSION['UsuarioAlumno'];
                }
            }
        }
        if(isset($_SESSION["tipo"])){
           $tipo = $_SESSION["tipo"]; 
        }
        
        if (empty($usuarioSession) || empty($tipo)) {
            $usuarioSession = null;
            $tipo = 0;
        }
        if ($usuarioSession != null && $tipo == 1) {
            header('Location: ../Coordinadora/index.php');
        } else if ($usuarioSession != null && $tipo == 2) {
            header('Location: ../Maestros/index.php');
        } else if ($usuarioSession != null && $tipo == 3) {
            header('Location: ../alumnos/index.php');
        }
    }

}
