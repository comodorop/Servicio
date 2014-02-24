<?php

class DaoPablo {

    function insertarCalifiaciones(CalificacionesActuales $calificaciones) {
//        include '../DaoConnection/coneccion.php';
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
            $datosPersonales->setNombre($rs["Nombre"]);
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
        $sql = "SELECT materias.materia, materias.id FROM gruposalumnos, materias
        WHERE idMaestro = '$idMaestro'
        and curso = '$cicloEscolar' 
        and anio = '$anio'
        and nombreGrupo = '$grupo'
        and materias.id = gruposalumnos.idMateria";

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

    function dameAlumnos($grupo, $usuario, $idMateria) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "select Nombre, apellidoPaterno, apellidoMaterno, dp.usuario from gruposalumnos gp
               inner join materias m
               on m.id = gp.idMateria
               inner join maestros ma 
               on ma.id = gp.idMaestro
               inner join alumnosinscritos al
               on al.idMateria= $idMateria
               inner join datospersonales dp
               on dp.usuario = al.usuario
               where ma.usuario = '$usuario'
               and gp.idMateria = $idMateria
               and nombreGrupo ='$grupo';";
        $dtos = mysql_query($sql, $cn->Conectarse());
        $cont = 0;
        while ($rs = mysql_fetch_array($dtos)) {
            $alumnos = new alumnosinscritos();
            $alumnos->setUsuario($rs[3]);
            $alumnos->setNombre($rs[0] . " " . $rs[1] . " " . $rs[2]);
            $datos[$cont] = $alumnos;
            $cont++;
        }
        return $datos;
    }

    function rechazarDocumento($id, $valor) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "UPDATE cargaarchivos set autorizacion=$valor WHERE id ='$id'";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function autorizarDocumento($id, $valor) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "UPDATE cargaarchivos set autorizacion=$valor WHERE id ='$id'";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function guardarSeguimientoCurso(seguimientoCurso $seguimiento) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "INSERT INTO seguimientoCurso
            (usuario, anio, curso, matriculaMaestro, pregunta1, pregunta2, pregunta3, pregunta4
            , pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, pregunta11
            , pregunta12, pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18
            , pregunta19, pregunta20, pregunta21, pregunta22, pregunta23, pregunta24)
            VALUES('" . $seguimiento->getUsuario() . "', '" . $seguimiento->getAnio() . "', '" . $seguimiento->getCurso() . "',
                '" . $seguimiento->getMatriculaMaestro() . "', '" . $seguimiento->getPregunta1() . "','" . $seguimiento->getPregunta2() . "',
                '" . $seguimiento->getPregunta3() . "','" . $seguimiento->getpregunta4() . "' ,'" . $seguimiento->getpregunta5() . "','" . $seguimiento->getpregunta6() . "'
               ,'" . $seguimiento->getpregunta7() . "','" . $seguimiento->getpregunta8() . "','" . $seguimiento->getpregunta9() . "'
               ,'" . $seguimiento->getpregunta10() . "','" . $seguimiento->getpregunta11() . "','" . $seguimiento->getpregunta12() . "'
               ,'" . $seguimiento->getpregunta13() . "','" . $seguimiento->getpregunta14() . "','" . $seguimiento->getpregunta15() . "'
               ,'" . $seguimiento->getpregunta16() . "','" . $seguimiento->getpregunta17() . "','" . $seguimiento->getpregunta18() . "'
               ,'" . $seguimiento->getpregunta19() . "','" . $seguimiento->getpregunta20() . "','" . $seguimiento->getpregunta21() . "'
               ,'" . $seguimiento->getpregunta22() . "','" . $seguimiento->getpregunta23() . "','" . $seguimiento->getpregunta24() . "')";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function eliminarAlumnosInscrito($id) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "DELETE FROM alumnosInscritos WHERE idAlumnosInscritos = $id";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

}

?>