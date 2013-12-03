<?php

session_start();

class validacionseSessionAlumnos {

    function verificacionDeLogueAlumnos() {
        $usuario = $_SESSION['UsuarioAlumno'];
        if ($usuario == null) {
            echo "
        <script>
             document.location.href='../indexprincipal/indexgeneral.php';
        </script>
         ";
             header('Location: ../indexprincipal/indexgeneral.php');
        }
    }

    function verificacionSessionAlumnos() {
        $usuarioSession = $_SESSION['UsuarioAlumno'];
        if ($usuarioSession != null) {
            header('Location: index.php');
        }
    }

}

?>
