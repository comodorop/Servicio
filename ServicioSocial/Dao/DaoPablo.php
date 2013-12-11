<?php

class DaoPablo {

    function insertarCalifiaciones(CalificacionesActuales $calificaciones) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "INSERT INTO calificacionesactual(idAlumno, idMaestro, idMateria, Calificacion, Unidad, CursoEscolar, TipoCurso, anio)
                VALUES('" . $calificaciones->getUsuario() . "',
                '" . $calificaciones->getIdMaestro() . "',
                '" . $calificaciones->getIdMateria() . "', 
                '" . $calificaciones->getCalificaciones() . "',
                '" . $calificaciones->getUnidad() . "',
                '" . $calificaciones->getCursoEscolar() . "',
                '" . $calificaciones->getTipoCurso() . "',
                '" . $calificaciones->getAño() . "')";
        mysql_query($sql, $cn->Conectarse());
    }

    function eliminarAlumnInsc($id) {
        $cn = new coneccion();
        $sql = "DELETE  FROM alumnosinscritos WHERE idAlumnosInscritos = $id";
        mysql_query($sql, $cn->Conectarse());
    }

    function verificacion_de_ingresoMaestros(usuario $u) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $paso = false;
        $sql = "SELECT * FROM usuarios  , maestros    WHERE usuarios.usuario='" . $u->getUsuario() . "' AND usuarios.pass='" . $u->getPass() . "' and usuarios.usuario = maestros.usuario";
        $datos = mysql_query($sql, $cn->Conectarse());
        $columnas = mysql_affected_rows();
        while ($rs = mysql_fetch_array($datos)) {
            $_SESSION["idMaestroSession"] = $rs[4];
            $_SESSION["nombreMaestro"] = $rs[5];
        }
        if ($columnas > 0) {
            $paso = true;
        } else {
            $paso = false;
        }
        $cn->cerrarBd();
        return $paso;
    }

    function dameCalificacionesActuales(CalificacionesActuales $c) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "SELECT * FROM calificacionesactual ca, gruposalumnos ga
                where ga.nombreGrupo = '" . $c->getGrupo() . "'
                and ga.idMaestro = ca.idMaestro
                and ga.idMateria = ca.idMateria
                and ca.anio ='" . $c->getAño() . "'
                and ca.cursoEscolar='" . $c->getCursoEscolar() . "'
                and ca.idAlumno='" . $c->getUsuario() . "'";
        $datos = mysql_query($sql, $cn->Conectarse());
        $cont = 0;
        $arreglo;

        while ($rs = mysql_fetch_array($datos)) {
            $cal = new CalificacionesActuales();
            $cal->setCalificaciones($rs["Calificacion"]);
            $arreglo [$cont] = $cal;
            $cont++;
        }
        return $arreglo;
    }

    function dameSatusMaestro($matricula) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "SELECT tipo FROM usuarios WHERE usuario = '$matricula'";
        $datos = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($datos)) {
            $status = $rs[0];
        }
        return $status;
    }

    function actualizarStatus($matricula, $status) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "UPDATE usuarios set tipo ='$status' WHERE usuario = '$matricula'";
        mysql_query($sql, $cn->Conectarse());
    }

    function dameMenuMaestros($usuario) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "SELECT tipo FROM usuarios WHERE usuario='$usuario'";
        $val = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($val)) {
            $val2 = $rs[0];
        }
        $cn->cerrarBd();
        return $val2;
    }

    function dameTutorados($idMaestro) {
        include '../DaoConnection/coneccion.php';
        include '../clases/datosPersonales.php';
        $cn = new coneccion();
        $sql = "SELECT Nombre, apellidoPaterno, apellidoMaterno from tutotmaestrosalumnos tm, datosPersonales dp
            WHERE idMaestro = $idMaestro and realizado = 0 and  tm.matricula = dp.usuario";
        $datos = mysql_query($sql, $cn->Conectarse());
        $cont = 0;
        while ($rs = mysql_fetch_array($datos)) {
            $datosPersonales = new datosPersonales();
            $datosPersonales->getNombre($rs["Nombre"]);
            $datosPersonales->setApellidoPaterno($rs["apellidoPaterno"]);
            $datosPersonales->setApellidoMaterno($rs["apellidoMaterno"]);
            $listaAlumnos[$cont] = $datosPersonales;
            $cont++;
        }
        return $listaAlumnos;
    }

    function eliminarGrupo($id) {
        $cn = new coneccion();
        $sql = "DELETE  FROM gruposalumnos WHERE idGrupo = $id";
        mysql_query($sql, $cn->Conectarse());
    }

    function dameMateriasGrupo($idMaestro, $cicloEscolar, $anio, $grupo) {
        include '../DaoConnection/coneccion.php';
//        include '../clases/materias.php';
        $materias = new materias();
        $sql = "SELECT materias.materia, materias.id FROM gruposAlumnos, materias
        WHERE idMaestro = '$idMaestro'
        and curso = '$cicloEscolar' 
        and anio = '$anio'
        and nombreGrupo = '$grupo'
        and materias.id = gruposAlumnos.idMateria";

        $cn = new coneccion();
        $datos = mysql_query($sql, $cn->Conectarse());
        $cont = 0;
        while ($rs = mysql_fetch_array($datos)) {
            $materias->setId($rs[1]);
            $materias->setMateria($rs[0]);
            $listaMaterias [$cont] = $materias;
            $cont++;
        }
        return $listaMaterias;
    }

    function ActualizarCrearGrupo(CrearGrupo $creaGrupo) {
//        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "UPDATE gruposalumnos SET nombreGrupo = '" . $creaGrupo->getNombreGrupo() . "', idMateria = '" . $creaGrupo->getIdMateria() . "', idMaestro = '" . $creaGrupo->getIdMaestro() . "'
         WHERE idGrupo='" . $creaGrupo->getIdGrupo() . "'";
        mysql_query($sql, $cn->Conectarse());
    }

    function guardarMaestro($maestro, $usuario) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "INSERT INTO maestros(maestro, usuario) VALUES('$maestro', '$usuario')";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function guardarUsuario($usuario, $pass) {
        include '../Utilerias/Utilerias.php';
//        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $utilerias = new Utilerias();
        $contra = $utilerias->genera_md5($pass);
        $sql = "INSERT INTO usuarios(usuario, pass, tipo) VALUES('$usuario', '$contra', '4')";
        mysql_query($sql, $cn->Conectarse());
    }

}
