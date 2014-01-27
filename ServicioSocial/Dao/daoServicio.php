<?php

//session_start();
include '../DaoConnection/coneccion.php';
include '../clases/maestros.php';
include '../clases/alumnosinscritos.php';

class daoServicio {

    function dameAlInsc($id) {
        $sql = "SELECT idAlumnosInscritos, usuario, nombreGrupo, materia FROM gruposalumnos ga, materias m, alumnosInscritos a"
                . " WHERE ga.idGrupo = a.idGrupo and m.id=a.idMateria and idAlumnosInscritos=$id";
        $cn = new coneccion();
        $datos = mysql_query($sql, $cn->Conectarse());
        $crea = new CrearAlumnInsc();
        while ($rs = mysql_fetch_array($datos)) {
            $crea->setNombreGrupo($rs["nombreGrupo"]);
            $crea->setUsuario($rs["usuario"]);
            $crea->setMateria($rs["materia"]);
        }
        return $crea;
    }

    function verificacion_de_ingresoMaestros(usuario $u) {
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

    function accesoAlumnos(usuario $u) {
        $cn = new coneccion();
        $paso = false;
        $sql = "SELECT * FROM usuarios WHERE usuario='" . $u->getUsuario() . "' AND pass='" . $u->getPass() . "'";
        $dato = mysql_query($sql, $cn->Conectarse());
        $columnas = mysql_affected_rows();
        while ($rs = mysql_fetch_array($dato)) {
            $tipo = $rs["tipo"];
            $_SESSION["tipo"] = $tipo;
        }
        if ($tipo == 2) {
            $sql = "SELECT * FROM usuarios  , maestros    WHERE usuarios.usuario='" . $u->getUsuario() . "' AND usuarios.pass='" . $u->getPass() . "' and usuarios.usuario = maestros.usuario";
            $d = mysql_query($sql, $cn->Conectarse());
            while ($rs = mysql_fetch_array($d)) {
                $_SESSION["idMaestroSession"] = $rs[4];
            }
        }
        if ($columnas > 0) {
            $paso = true;
        } else {
            $paso = false;
        }
        $cn->cerrarBd();
        return $paso;
    }

    function loginGeneral(usuario $usu) {
        $cn = new coneccion();
        $sql = "  SELECT * FROM usuarios WHERE usuario= '" . $usu->getUsuario() . "' AND pass='" . $usu->getPass() . "'";

        $datos = mysql_query($sql, $cn->Conectarse());
        $columnas = mysql_affected_rows();
        if ($columnas > 0) {
            session_start();
            $_SESSION['usuario'] = $usu->getUsuario();
            $_SESSION['estado'] = 'Autenticado';
            header("Location: encuestaTutorias.php");
        } else {
            echo 'mal';
        }
        $cn->cerrarBd();
        //return $paso;
    }

    function insertarHistorial(historialAcademico $h) {
        $c = new coneccion();
        $fecha = date("d-m-Y");
        $sql = "INSERT INTO historial (usuario, idMateria, idAcreditacion, calificacion,cursando, ingresoCursado,anio, curso, fecha) VALUES ('" . $h->getMatricula() . "','" . $h->getId_materia() . "','" . $h->getAcredito() . "','" . $h->getCalificacion() . "','" . $h->getCursando() . "','" . $h->getIngresoCursando() . "','" . $h->getAnio() . "','" . $h->getCurso() . "', '$fecha')";
        $conn = $c->Conectarse();
        try {
            $paso = mysql_query($sql, $conn);
        } catch (Exception $e) {
            $e->getMessage();
        }

        $c->cerrarBd();
    }

    function guardarEncuesta(tutorias $t, $usuario, $control, $tipo, $ciclo, $anio) {
        $c = new coneccion();
        $sqlguardar = "INSERT INTO TUTORIAS (Matricula, lugarViviendo, estCivilPadres, escPadre, escMadre, ingresosMenFam, NumHermanos, PerPlaticar, relacionPadre, relacionMadre, fuenteIngreso, habMaterias, estudiosExtTec, cualExtTec, pasatiempos, trabajas, dondeTrabajas, ocupacionTrab, porqTrab, ingresastRazTec, ingresastRazCar, alergias, cualAlergia, cronica, cronicaCual, atencionPsi, cualAtencionPsi, atencionMedica, bebidasAlc, fumador, problemLegal, motivo, deporte, cualDep, frecuenciaDep, realizado, lugarOcupas, especialidad, promedioFinalPrepa, hereditaria, hereditariaQuien, enfermedadMental, enfermedadMentalCual, escuela1, estado1, grado1, escuela2, estado2, grado2, escuela3, estado3, grado3) VALUES('" . $t->getUsuario() . "','" . $t->getLugarViviendo() . "','" . $t->getEstCivilPadre() . "',
            '" . $t->getEscPadre() . "','" . $t->getEscMadre() . "','" . $t->getIngresosMenFam() . "','" . $t->getNumHermanos() . "','" . $t->getPerPlaticar() . "','" . $t->getRelacionPadre() . "','" . $t->getRelacionMadre() . "','" . $t->getFuenteIngreso() . "','" . $t->getHabMaterias() . "','" . $t->getEstudiosExtTec() . "','" . $t->getCualExtTec() . "','" . $t->getPasatiempos() . "','" . $t->getTrabajas() . "','" . $t->getDondeTrabajas() . "','" . $t->getOcupacionTrab() . "','" . $t->getPorqTrab() . "','" . $t->getIngresastRazTec() . "','" . $t->getIngresastRazCar() . "','" . $t->getAlergias() . "','" . $t->getCualAlergia() . "','" . $t->getCronica() . "','" . $t->getCronicaCual() . "','" . $t->getAtencionPsi() . "','" . $t->getCualAtencionPsi() . "','" . $t->getAtencionMedica() . "','" . $t->getBebidasAlc() . "','" . $t->getFumador() . "','" . $t->getProblemLegal() . "','" . $t->getMotivo() . "','" . $t->getDeporte() . "','" . $t->getCualDep() . "','" . $t->getFrecuenciaDept() . "','" . $t->getRealizado() . "','" . $t->getLugarOcupas() . "','" . $t->getEspecialidad() . "','" . $t->getPromedio() . "','" . $t->getHereditaria() . "','" . $t->getHereditariaQuien() . "','" . $t->getMental() . "','" . $t->getMentalCual() . "','" . $t->getEscuela1() . "','" . $t->getEstado1() . "','" . $t->getGrado1() . "','" . $t->getEscuela2() . "','" . $t->getEstado2() . "','" . $t->getGrado2() . "','" . $t->getEscuela3() . "','" . $t->getEstado3() . "','" . $t->getGrado3() . "')";
        mysql_query($sqlguardar, $c->Conectarse());
        $sqlactualiza = "INSERT INTO verificacion (matricula, control, tipo, ciclo, anio) VALUES ('$usuario', '$control', '$tipo', '$ciclo', '$anio')";
        mysql_query($sqlactualiza, $c->Conectarse());
        $c->cerrarBd();
    }

    function guardarAlumnos(datosPersonales $datosP) {
        $cn = new coneccion();
        $sql = "INSERT INTO datosPersonales(usuario, nombre, apellidoPaterno, apellidoMaterno)
         VALUES('" . ucwords(strtolower($datosP->getUsuario())) . "','" . ucwords(strtolower($datosP->getNombre())) . "','" . ucwords(strtolower($datosP->getApellidoPaterno())) . "'
             ,'" . ucwords(strtolower($datosP->getApellidoMaterno())) . "')";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function guardarRegistroDatos(usuario $usuario) {
        $cn = new coneccion();
        $sql = "INSERT INTO datosregistrousuario(usuario, nombres ,apellidoPaterno,apellidoMaterno,email, foto)
         VALUES('" . $usuario->getUsuario() . "','" . $usuario->getNombres() . "','" . $usuario->getApellidoPaterno() . "'
             ,'" . $usuario->getApellidoMaterno() . "','" . $usuario->getEmail() . "', '" . $usuario->getFoto() . "')";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

//JOSE!!!!!!!!
    function guardarTutorias(avisosTutor $avisosT) {
        $cn = new coneccion();
        $sql = "INSERT INTO avisos (titulo,detalles,usuario,control,leido) 
                VALUES ('" . $avisosT->getTitulo() . "','" . $avisosT->getDetalle() . "','" . $avisosT->getUsuario() . "','" . $avisosT->getControl() . "','" . $avisosT->getLeido() . "')";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    //JOSE!!!!
    function mandarPassAutorizado(usuario $u) {
        $cn = new coneccion();
        $sql = "INSERT INTO usuarios (usuario,pass,tipo) VALUES ('" . $u->getUsuario() . "','" . $u->getPass() . "','" . $u->getTipo() . "' )";
        mysql($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    //jose!!!!!!!!!!!!!!!!!!!!!!!!!
    function guardarEncuestaTUTO(CuestionarioTutoria $t, $usuario) {
        $cn = new coneccion();
        $sql = "INSERT INTO cuestionariotutorias (matricula, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, pregunta11, pregunta12, pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18, pregunta19, pregunta20) VALUES ('" . $t->getMatricula() . "','" . $t->getpregunta1() . "','" . $t->getpregunta2() . "','" . $t->getpregunta3() . "','" . $t->getpregunta4() . "','" . $t->getpregunta5() . "','" . $t->getpregunta6() . "','" . $t->getpregunta7() . "','" . $t->getpregunta8() . "','" . $t->getpregunta9() . "','" . $t->getpregunta10() . "','" . $t->getpregunta11() . "','" . $t->getpregunta12() . "','" . $t->getpregunta13() . "','" . $t->getpregunta14() . "','" . $t->getpregunta15() . "','" . $t->getpregunta16() . "','" . $t->getpregunta17() . "','" . $t->getpregunta18() . "','" . $t->getpregunta19() . "','" . $t->getpregunta20() . "')";
        mysql_query($sql, $cn->Conectarse());
        $sql2 = "UPDATE verificacion SET control=1 WHERE matricula='$usuario';";
        mysql_query($sql2, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function guardarSessionTutorado(sessionTutorias $sesion) {
        $cn = new coneccion();
        $sql = "INSERT INTO sesiontutorias(matricula, fecha, descripcionSesion, objetivos, observaciones, tareasAsignadas, numeroSesion)
            VALUES('" . $sesion->getMatricula() . "','" . $sesion->getFecha() . "','" . $sesion->getDescripcionSesion() . "','" . $sesion->getObjetivos() . "','" . $sesion->getObservaciones() . "','" . $sesion->getTareasAsignadas() . "','" . $sesion->getNumeroSession() . "')";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

//<!--JOEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEELLLLLLLLLLLLLL-->
    function guardaArchivos(cargaArchivos $cargar) {
        $cn = new coneccion();
        $sql = "INSERT INTO cargaarchivos (usuario,ubicacion,nombre) 
           VALUES ('" . $cargar->getUsuario() . "','" . $cargar->getHubicacion() . "','" . $cargar->getNombreArchivo() . "')";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    //<!--JOEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEELLLLLLLLLLLLLL-->   
    function dameNumeroSession($matricula) {
        $cn = new coneccion();
        $numeroSession = 0;
        $sql = "SELECT count(*) as numeroSession from sesiontutorias where matricula ='$matricula';";
        $datos = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($datos)) {
            $numeroSession = $rs["numeroSession"];
        }
        $numeroSession+=1;
        $cn->cerrarBd();
        return $numeroSession;
    }

    function consultavalidar(historialAcademico $h) {
        $cn = new coneccion();
        $sql = "SELECT * FROM historial WHERE usuario='" . $h->getMatricula() . "'and idMateria='" . $h->getId_materia() . "'";
        $consulta = mysql_query($sql, $cn->Conectarse());
        $registro = array();
        if ($consulta != false) {
            while ($renglon = mysql_fetch_array($consulta, MYSQL_ASSOC)) {
                $registro[] = $renglon;
            }
            mysql_free_result($consulta);
        }

        $cn->cerrarBd();
        return $registro;
    }

    function verificacionInsertarPrecarga($usuario) {
        $paso = false;
        $sql = "SELECT * FROM precarga WHERE usuario = '$usuario'";
        $datos = mysql_affected_rows();
        if ($datos > 0) {
            $paso = true;
        }
        return $paso;
    }

    function dameInfoMaestro($id) {
        $cn = new coneccion();
        $maestro = new maestros();
        $sql = "SELECT * FROM maestros WHERE id = $id";
        $datos = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($datos)) {
            $maestro->setId($rs[0]);
            $maestro->setMaestro($rs[1]);
        }
        $cn->cerrarBd();
        return $maestro;
    }

    function asignarAlumnoTutor(tutotMaestrosAlumnos $tutorAlumno) {
        $cn = new coneccion();
        $sql = "INSERT INTO tutotmaestrosalumnos(matricula, idMaestro) VALUES('" . $tutorAlumno->getMatricula() . "', '" . $tutorAlumno->getIdMaestro() . "')";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function dameMaterias($idSemestre) {
//        include '../clases/historialAcademico.php';
        try {
            $cn = new coneccion();
        } catch (Exception $e) {
            $e->getMessage();
        }
        $historial = new historialAcademico();
        $materias = array($historial);
        $sql = "SELECT * FROM materias WHERE semestre = $idSemestre";
        $contador = 0;
        $datos = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($datos)) {
            $historial->setMateria(utf8_decode($rs["materia"]));
            $materias[$contador] = $historial;
            $contador++;
        }
        return materias;
    }

    //---------------------------------------------------------------------
    function actulizarRegistroDatos(usuario $usuario) {
        $cn = new coneccion();
        $sql = "UPDATE datosregistrousuario  SET nombres ='" . $usuario->getNombres() . "',apellidoPaterno='" . $usuario->getApellidoPaterno() . "',apellidoMaterno='" . $usuario->getApellidoMaterno() . "',email='" . $usuario->getEmail() . "' WHERE usuario = '" . $usuario->getUsuario() . "'";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function dameAlumnos($grupo, $usuario, $idMateria) {
        $cn = new coneccion();
        $sql = "select Nombre, apellidoPaterno, apellidoMaterno, dp.usuario, idMaestro from gruposalumnos gp
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
            $_SESSION["idMaestro"] = $rs[4];
            $cont++;
        }
        return $datos;
    }

    //jose!!!!!!!!!!!!!!!!!!!!!!!!!
    function verificarUsuarioDuplicado($usuario) {
        $cn = new coneccion();
        $sql = "SELECT * FROM datosregistrousuario WHERE usuario='$usuario'";
        $val = mysql_query($sql, $cn->Conectarse());
        $rs = mysql_affected_rows();
        return $rs;
    }

    function dameMenu($usuario) {
        $cn = new coneccion();
        $sql = "SELECT control FROM verificacion WHERE matricula='$usuario'";
        $val = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($val)) {
            $val2 = $rs[0];
        }
        return $val2;
    }

    function dameGrupo($id) {
        $sql = "SELECT idGrupo, nombreGrupo, materia, maestro FROM gruposalumnos ga, materias m, maestros ma"
                . " WHERE ga.idMateria = m.id and ga.idMaestro = ma.id"
                . " and idGrupo = $id";
        $cn = new coneccion();
        $datos = mysql_query($sql, $cn->Conectarse());
        $crea = new CrearGrupo();
        while ($rs = mysql_fetch_array($datos)) {
            $crea->setIdGrupo($rs["idGrupo"]);
            $crea->setNombreGrupo($rs["nombreGrupo"]);
            $crea->setNombreMaestro($rs["maestro"]);
            $crea->setNombreMateria($rs["materia"]);
        }
        return $crea;
    }

    function dameAlumnosRepe($grupo, $usuario, $idMateria, $unidad) {
        $cn = new coneccion();
        $sql = "select Nombre, apellidoPaterno, apellidoMaterno, dp.usuario, idMaestro from calificacionesactual ca
                inner join maestros m 
                on m.id = ca.idMaestro
                inner join datospersonales dp
                on dp.usuario = ca.idAlumno
                where m.usuario='$usuario'
                and calificacion <70 
                and TipoCurso = 1
                and Unidad = '$unidad';";
        $dtos = null;
        $dtos = mysql_query($sql, $cn->Conectarse());
        $cont = 0;
        $datos = null;
        while ($rs = mysql_fetch_array($dtos)) {
            $alumnos = new alumnosinscritos();
            $alumnos->setUsuario($rs[3]);
            $alumnos->setNombre($rs[0] . " " . $rs[1] . " " . $rs[2]);
            $datos[$cont] = $alumnos;
            $_SESSION["idMaestro"] = $rs[4];
            $cont++;
        }
        return $datos;
    }

    function dameAlumnosExtraordinario($grupo, $usuario, $idMateria, $unidad) {
        $cn = new coneccion();
        $datos = null;
        $sql = "select Nombre, apellidoPaterno, apellidoMaterno, dp.usuario, idMaestro from calificacionesactual ca
                inner join maestros m 
                on m.id = ca.idMaestro
                inner join datospersonales dp
                on dp.usuario = ca.idAlumno
                where m.usuario='$usuario'
                and calificacion <70 
                and TipoCurso = 2
                and Unidad = '$unidad';";
        $dtos = mysql_query($sql, $cn->Conectarse());
        $cont = 0;
        while ($rs = mysql_fetch_array($dtos)) {
            $alumnos = new alumnosinscritos();
            $alumnos->setUsuario($rs[3]);
            $alumnos->setNombre($rs[0] . " " . $rs[1] . " " . $rs[2]);
            $datos[$cont] = $alumnos;
            $_SESSION["idMaestro"] = $rs[4];
            $cont++;
        }
        return $datos;
    }

    function verificar($curso, $anio, $usuario, $idMateria, $idTipo, $unidad) {
        $cn = new coneccion();
        $sql = "SELECT dp.usuario, dp.Nombre, dp.apellidoPaterno, dp.apellidoMaterno, ca.Calificacion
                    from calificacionesactual ca
                    inner join maestros m 
                    on m.id = ca.idMaestro
                    inner join datospersonales dp 
                    on dp.usuario = ca.idAlumno
                    where anio = '$anio'
                    and TipoCurso = $idTipo
                    and CursoEscolar = $curso 
                    and unidad = $unidad 
                    and idMateria = $idMateria
                    and m.usuario = '$usuario'";
        $rs = mysql_query($sql, $cn->Conectarse());
        return $rs;
    }

}
?>

