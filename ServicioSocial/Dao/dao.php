<?php

include '../clases/verificacion.php';

//include '../DaoConnection/coneccion.php';

class dao {

    function guardarAlumnoGrupo(alumnosinscritos $A) {
        $cn = new coneccion();
        $validar = "SELECT * FROM alumnosinscritos Where  idGrupo = " . $A->getIdGrupo() . " and idMateria = " . $A->getIdMateria() . " and usuario ='" . $A->getUsuario() . "' ";
        mysql_query($validar, $cn->Conectarse());
        $validando = mysql_affected_rows();
        if ($validando <= 0) {
            $validar2 = "SELECT * FROM alumnosinscritos Where  idMateria = " . $A->getIdMateria() . " and usuario = '" . $A->getUsuario() . "' ";
            mysql_query($validar2, $cn->Conectarse());
            $validando2 = mysql_affected_rows();
            if ($validando2 <= 0) {
                $validar1 = "SELECT distinct m.materia FROM materias m\n"
                        . "INNER JOIN historial h ON h.idMateria = m.id\n"
                        . "WHERE idAcreditacion <=2 and h.calificacion > 70 and idMateria = " . $A->getIdMateria() . " and m.id NOT IN (SELECT idMateria FROM historial where usuario = '" . $A->getUsuario() . " ' )";
                mysql_query($validar1, $cn->Conectarse());
                $normal = mysql_affected_rows();
                $validarRepe = "SELECT concat_ws('-_- ', m.semestre, m.materia) as fusion, m.materia, m.semestre, m.id FROM historial h, materias m where h.idMateria = " . $A->getIdMateria() . " and h.usuario = '" . $A->getUsuario() . "' and h.idAcreditacion <=2 and h.calificacion < 70 and m.id = h.idMateria ";
                mysql_query($validarRepe, $cn->Conectarse());
                $repe = mysql_affected_rows();

                if ($normal > 0) {
                    $esNormal = 1;
                    $sql = "INSERT INTO alumnosinscritos(idGrupo,usuario, idMateria, anio, cursoEscolar, TipoCurso) 
                VALUES ('" . $A->getIdGrupo() . "', '" . $A->getUsuario() . "','" . $A->getIdMateria() . "','" . $A->getAnio() . "', '" . $A->getCursoEscolar() . "',$esNormal)";
                    mysql_query($sql, $cn->Conectarse());
                    $cn->cerrarBd();
                    return 1;
                }
                if ($repe > 0) {
                    $esRepe = 1;
                    $sql = "INSERT INTO alumnosinscritos(idGrupo,usuario, idMateria, anio, cursoEscolar, TipoCurso) 
                VALUES ('" . $A->getIdGrupo() . "', '" . $A->getUsuario() . "','" . $A->getIdMateria() . "','" . $A->getAnio() . "', '" . $A->getCursoEscolar() . "',$esRepe)";
                    mysql_query($sql, $cn->Conectarse());
                    $cn->cerrarBd();
                    return 1;
                }
//                $sql = "INSERT INTO alumnosinscritos(idGrupo,usuario, idMateria, anio, cursoEscolar, TipoCurso) 
//                VALUES ('" . $A->getIdGrupo() . "', '" . $A->getUsuario() . "','" . $A->getIdMateria() . "','" . $A->getAnio() . "', '" . $A->getCursoEscolar() . ",$normal')";
//                mysql_query($sql, $cn->Conectarse());
//                $cn->cerrarBd();
//                return 1;
            } else {
                return 2;
            }
        } else {

            return 0;
        }
    }

    function guardarNuevoGrupo(crearGrupo $C) {
        $cn = new coneccion();
        $sql = "INSERT INTO gruposalumnos( nombreGrupo,idMateria, idMaestro, curso, anio) 
VALUES (
'" . $C->getNombreGrupo() . "', '" . $C->getIdMateria() . "','" . $C->getIdMaestro() . "','" . $C->getCurso() . "', '" . $C->getAnio() . "')";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function Intercambiomaterias($matricula, $materia, $semestre, $control, $obligatorias, $idMateria) {
        $cn = new coneccion();
        $fecha = date("Y-m-d");
        utf8_encode($materia);
        if ($control == "aceptar") {
            $sql = "INSERT INTO temporalcargadas( matricula,materias, semestre, obligatoria, idMateria, fecha ) 
VALUES (
'$matricula','$materia', '$semestre','$obligatorias','$idMateria','$fecha'
)";

            mysql_query($sql, $cn->Conectarse());
            $sql = "DELETE FROM temporalseleccionar where materias = '$materia' and matricula= '$matricula'";
            mysql_query($sql, $cn->Conectarse());
            $cn->cerrarBd();
            return;
        }
        if ($control == "cancelar") {
            $sql2 = "INSERT INTO temporalseleccionar( matricula,materias, semestre, obligatoria, idMateria ) 
VALUES (
'$matricula','$materia', '$semestre','$obligatorias','$idMateria'
)";
            mysql_query($sql2, $cn->Conectarse());
            $sql2 = "DELETE FROM temporalcargadas where materias = '$materia' and matricula= '$matricula'";
            mysql_query($sql2, $cn->Conectarse());
            $cn->cerrarBd();
            return;
        }
    }

    function consultatablaseleccionar($matricula) {
        $cn = new coneccion();
        $sql = "select materias,semestre,obligatoria, idMateria from temporalseleccionar where matricula='$matricula' order by semestre asc    ";
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

    function consultatablaObligadas($matricula) {
        $cn = new coneccion();
        $sql = "select materias,semestre,obligatoria,idMateria from temporalcargadas where matricula='$matricula' order by semestre asc ";
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

    function tablatemporalcargadas($materias, $matricula) {

        $cn = new coneccion();
        //setencia sql para crear la tabla
        $renglon = $materias[0];
        $sql = "create table IF NOT EXISTS temporalcargadas (id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,matricula varchar(20), materias varchar(20),semestre varchar(20), obligatoria int(1),idMateria int(20), fecha DATE) \n"
                . " ";
        mysql_query($sql, $cn->Conectarse());
        $sql = "DELETE FROM temporalcargadas WHERE matricula='$matricula'";
        mysql_query($sql, $cn->Conectarse());
        $fecha = date("Y-m-d");
        foreach ($materias as $renglon) {

            foreach ($renglon as $campo => $valor) {
                if ($campo == "materia") {
                    $materia = $valor;
                }
                if ($campo == "semestre") {
                    $semestre = $valor;
                }
                if ($campo == "id") {
                    $idMateria = $valor;
                }
                if (($materia && $semestre && $idMateria) != "") {

                    $sql = "INSERT INTO temporalcargadas (matricula, materias, semestre, obligatoria,idMateria, fecha) VALUES ('$matricula','$materia',' $semestre', 1 , '$idMateria', '$fecha') ";
                    mysql_query($sql, $cn->Conectarse());
                    $cn->cerrarBd();
                    $materia = "";
                    $semestre = "";
                    $idMateria = "";
                }



                $paso = false;
            }
        }

        //ejecuto la sentencia
    }

    function tablatemporalSeleccionar($materias, $matricula) {

        $cn = new coneccion();
        //setencia sql para crear la tabla
        $renglon = $materias[0];

        $sql = "create table IF NOT EXISTS temporalseleccionar (id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY, matricula varchar(20),materias varchar(20),semestre varchar(20),obligatoria int(1), idMateria int(20))";
        mysql_query($sql, $cn->Conectarse());
        $sql = "DELETE FROM temporalseleccionar WHERE matricula='$matricula'";
        mysql_query($sql, $cn->Conectarse());
        foreach ($materias as $renglon) {

            foreach ($renglon as $campo => $valor) {
//                if ($campo == "materia") {
//                    $materia = $valor;
//                }
                if ($campo == "semestre") {
                    $semestre = $valor;
                }
                if ($campo == "id") {
                    $idMateria = $valor;
                }
                if ($campo == "Ligada") {
                    $liga = $valor;
                }
                if ($campo == "materia" && $liga == 1) {


                    if (utf8_encode($valor) == "Cálculo Diferencial") {
                        $materia = $valor;
                        $control = 1;
                    } else {
                        if ((utf8_encode($valor) == "Cálculo Integral") && $control != 1) {
                            $materia = $valor;
                            $control = 1;
                        } else {
                            if (utf8_encode($valor) == "Cálculo Vectorial" && $control != 1) {
                                $materia = $valor;
                                $control = 1;
                            }
                            if (utf8_encode($valor) == "Física" && $control != 1) {
                                $materia = $valor;
                                $control = 1;
                            }
                        }
                    }
                    if (utf8_encode($valor) == "Fundamentos de Investigación") {
                        $materia = $valor;
                        $control1 = 1;
                    } else {
                        if (utf8_encode($valor) == "Taller de Investigación I" && $control != 1) {
                            $materia = $valor;
                            $control1 = 1;
                        } else {

                            if (utf8_encode($valor) == "Taller de Investigación II" && $control != 1) {
                                $materia = $valor;
                                $control1 = 1;
                            }
                        }
                    }

                    if (utf8_encode($valor) == "Propiedad de los Materiales") {
                        $materia = $valor;
                        $control2 = 1;
                    } else {
                        if (utf8_encode($valor) == "Procesos de Fabricación" && $control2 != 1) {
                            $materia = $valor;
                            $control2 = 1;
                        }
                    }

                    if (utf8_encode($valor) == "Probabilidad y Estadística") {
                        $materia = $valor;
                        $control3 = 1;
                    } else {
                        if (utf8_encode($valor) == "Estadística Inferencial I" && $control3 != 1) {
                            $materia = $valor;
                            $control3 = 1;
                        } else {
                            if (utf8_encode($valor) == "Control Estadístico de la Calidad" && $control3 != 1) {
                                $materia = $valor;
                                $control3 = 1;
                            }
                        }
                    }

                    if (utf8_encode($valor) == "Estudio del Trabajo I") {
                        $materia = $valor;
                        $control4 = 1;
                    } else {
                        if (utf8_encode($valor) == "Estudio del Trabajo II" && $control4 != 1) {
                            $materia = $valor;
                            $control4 = 1;
                        } else {
                            if (utf8_encode($valor) == "Ergonomia" && $control4 != 1) {
                                $materia = $valor;
                                $control4 = 1;
                            }
                        }
                    }

                    if (utf8_encode($valor) == "Administración de las Operaciones II") {
                        $materia = $valor;
                        $control5 = 1;
                    } else {
                        if (utf8_encode($valor) == "Administración de las Operaciones I" && $control5 != 1) {
                            $materia = $valor;
                            $control5 = 1;
                        } else {
                            if (utf8_encode($valor) == "Planeación y Diseño de Instalaciones" && $control5 != 1) {
                                $materia = $valor;
                                $control5 = 1;
                            }
                        }
                    }

                    if (utf8_encode($valor) == "Álgebra Lineal" || utf8_encode($valor) == "Economia") {

                        $materia = $valor;
                        $control6 = 1;
                    } else {
                        if (utf8_encode($valor) == "Investigación de Operaciones I" && $control6 != 1) {
                            $materia = $valor;
                            $control6 = 1;
                        } else {
                            if (utf8_encode($valor) == "Investigación de Operaciones II" && $control6 != 1) {
                                $materia = $valor;
                                $control6 = 1;
                            }
                        }
                    }

                    if ((utf8_encode($valor) == "Investigación de Operaciones II")) {
                        $carga = 1;
                    }
                    if (utf8_encode($valor) == "Ergonomia") {
                        $materia = $valor;
                        $control7 = 1;
                    } else {
                        if (utf8_encode($valor) == "Planeación y Diseño de Instalaciones" && $carga == 1) {
                            $materia = $valor;
                            $control7 = 1;
                        }
                    }

                    if (utf8_encode($valor) == "Algoritmos y Lenguajes de Programación") {
                        $materia = $valor;
                        $control8 = 1;
                    } else {
                        if (utf8_encode($valor) == "Simulación" && $control8 != 1) {
                            $materia = $valor;
                            $control8 = 1;
                        } else {
                            if (utf8_encode($valor) == "Atomatización Industrial" && $control8 != 1) {
                                $materia = $valor;
                                $control8 = 1;
                            }
                        }
                    }

                    if (utf8_encode($valor) == "Gestión de Costos") {
                        $materia = $valor;
                        $control9 = 1;
                    } else {
                        if (utf8_encode($valor) == "Ingeniería Económica" || utf8_encode($valor) == "Mercadotecnia" && $control9 != 1) {
                            $materia = $valor;
                            $control9 = 1;
                        } else {
                            if (utf8_encode($valor) == "Planeación Financiera" || utf8_encode($valor) == "Planeación y Diseño de Instalaciones" && $control9 != 1) {
                                $materia = $valor;
                                $control9 = 1;
                            } else {
                                if (utf8_encode($valor) == "Formulación y Evaluación de Proyectos" && $control9 != 1) {
                                    $materia = $valor;
                                    $control9 = 1;
                                }
                            }
                        }
                    }
                } else {
                    if ($campo == "materia") {
                        $materia = $valor;
                    }
                }


                if (($materia && $semestre && $idMateria) != "") {
                    $sql = "INSERT INTO temporalseleccionar (matricula, materias, semestre, obligatoria, idMateria) VALUES ('$matricula','$materia',' $semestre',2,'$idMateria') ";
                    mysql_query($sql, $cn->Conectarse());
                    $cn->cerrarBd();
                    $materia = "";
                    $semestre = "";
                    $idMateria = "";
                    $liga = "";
                }



                $paso = false;
            }
        }

        //ejecuto la sentencia
    }

    function consultaMateriasObligatorias($matricula) {
        $cn = new coneccion();
        $paso = false;
        $sql = "SELECT m.materia, m.semestre, m.id FROM historial h, materias m where h.usuario = '$matricula' and h.idAcreditacion <=2 and h.calificacion < 70 and m.id = h.idMateria";
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

    function consultaMateriasSeleccionadas($matricula) {
        $cn = new coneccion();
        $paso = false;
        $sql = "SELECT distinct m.materia, m.semestre, m.id FROM materias m,historial h WHERE idAcreditacion <=2 and h.calificacion > 70 and m.id NOT IN (SELECT idMateria FROM historial where usuario='$matricula')";
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

    function verificacion_de_ingreso(usuario $u) {
        $cn = new coneccion();
        $paso = false;
        $sql = "SELECT * FROM usuarios WHERE usuario='" . $u->getUsuario() . "' AND pass='" . $u->getPass() . "'";
        $datos = mysql_query($sql, $cn->Conectarse());
        $columnas = mysql_affected_rows();
        while ($rs = mysql_fetch_array($datos)) {
            $_SESSION["idMaestroSession"] = $rs["id"];
            $_SESSION["nombreMaestro"] = $rs["Nombre"] . "&nbsp;" . $rs["ApellidoPaterno"] . "&nbsp;" . $rs["ApellidoMaterno"];
        }
        if ($columnas > 0) {
            $paso = true;
        } else {
            $paso = false;
        }
        $cn->cerrarBd();
        return $paso;
    }

    function ActualizarContraseña(Usuario $u) {
        include '../DaoConnection/coneccion.php';
        $sql = "UPDATE usuarios set pass ='" . $u->getPass() . "' WHERE usuario ='" . $u->getUsuario() . "'";
        $cn = new coneccion();
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function editarEvento(guardarEvento $A) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "UPDATE guardarevento SET anio = '" . $A->getAnio() . "', cicloEscolar = '" . $A->getCicloEscolar() . "', evento = '" . $A->getEvento() . "', fechaInicial = '" . $A->getFechaInicial() . "', fechaFinal = '" . $A->getFechaFinal() . "' WHERE anio = '" . $A->getAnio() . "' and cicloEscolar = '" . $A->getCicloEscolar() . "' and evento = '" . $A->getEvento() . "'";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function guardarEvento(guardarEvento $A) {
        $cn = new coneccion();
        $sql = "INSERT INTO guardarevento(cicloEscolar, anio, evento, fechaInicial, fechaFinal) 
                VALUES (
                " . $A->getCicloEscolar() . ", '" . $A->getAnio() . "','" . $A->getEvento() . "','" . $A->getFechaInicial() . "','" . $A->getFechaFinal() . "'
                )";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function dameMenu($usuario) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "SELECT control FROM verificacion WHERE matricula='$usuario'";
        $val = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($val)) {
            $val2 = $rs[0];
        }
        return $val2;
    }

    function dameMenu2($usuario) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "SELECT control FROM verificacion WHERE matricula='$usuario'";
        $val = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($val)) {
            $val2 = $rs[0];
        }
        return $val2;
    }

    function Guardarfechascicloescolar(fechascicloescolar $A) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "INSERT INTO fechascicloescolar( cicloEscolar, fechaInicial, fechaFinal, anio, idControl) 
VALUES (
" . $A->getCicloEscolar() . ", '" . $A->getFechaInicial() . "','" . $A->getFechaFinal() . "','" . $A->getAnio() . "','" . $A->getIdControl() . "'
)";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function editarEventos(guardarEvento $A) {
        $cn = new coneccion();
        $sql = "UPDATE guardarevento SET fechaInicial = '" . $A->getFechaInicial() . "', fechaFinal = '" . $A->getFechaFinal() . "' WHERE idEvento = " . $A->getid() . "";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function editarfechaInicio(fechascicloescolar $A) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "UPDATE fechascicloescolar SET anio = '" . $A->getAnio() . "', cicloEscolar = '" . $A->getCicloEscolar() . "', fechaInicial = '" . $A->getFechaInicial() . "', fechaFinal = '" . $A->getFechaFinal() . "' WHERE idControl = 0";
        mysql_query($sql, $cn->Conectarse());
        $cn->cerrarBd();
    }

    function validarprecarga(fechascicloescolar $A) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "SELECT fechaInicial, fechaFinal FROM guardarevento where anio = '" . $A->getAnio() . "' AND cicloEscolar = '" . $A->getCicloEscolar() . "' AND evento = 5 ";
        $consulta = mysql_query($sql, $cn->Conectarse());
        While ($rs2 = mysql_fetch_array($consulta)) {
            $fechaInicial = $rs2["fechaInicial"];
            $fechaFinal = $rs2["fechaFinal"];
        }
        $validando = mysql_affected_rows();
        if ($validando > 0) {
            $start_ts = strtotime($fechaInicial);
            $end_ts = strtotime($fechaFinal);
            $evaluame = date("Y/m/d");
            $user_ts = strtotime($evaluame); //fecha a evaluar
            return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
        } else {
            return false;
        }
    }

    function validarEstadoPrecarga(verificacion $A) {
//        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $validando = "SELECT * FROM verificacion where matricula = '" . $A->getMatricula() . "' and anio = '" . $A->getAno() . "' and ciclo = '" . $A->getCiclo() . "' and tipo = 5";
        $d = mysql_query($validando, $cn->Conectarse());
        $d = mysql_affected_rows();
        if ($d <= 0) {
            $cn->cerrarBd();
            return 0;
        } else {
            $cn->cerrarBd();
            return 1;
        }
    }

    function dameMaestros() {
        $cn = new coneccion();
        $sql = "SELECT m.id 
            FROM maestros m , usuarios u 
            WHERE m.usuario= u.usuario";
        $datos = mysql_query($sql, $cn->Conectarse());
        $cont = 0;
        while ($rs = mysql_fetch_array($datos)) {
            $maestros = new maestros();
            $maestros->setId($rs[0]);
            $listaMaestros[$cont] = $maestros;
            $cont++;
        }
        return $listaMaestros;
    }

    function enviarEncuestaAleatoriaAlumnos($id) {
        $cn = new coneccion();
//        $sql = "select matricula,m.usuario  from tutotmaestrosalumnos tma
//            inner join maestros m 
//            on m.id= tma.idMaestro
//            where idMaestro = $id
//            order by  rand($id)  
//            limit 5";
        $sql = "select   al.usuario, m.usuario from alumnosinscritos al
                inner join gruposalumnos ga
                on al.idGrupo = ga.idGrupo
                inner join maestros m 
                on m.id = ga.idMaestro
                where idMaestro = $id
                order by rand()
                limit 5;";
        $datos = mysql_query($sql, $cn->Conectarse());
        $cont = 0;
        while ($rs = mysql_fetch_array($datos)) {
            $verificacion = new verificacion();
            $verificacion->setUsuarioMaestro($rs[1]);
            $verificacion->setAño($_SESSION["anio"]);
            $verificacion->setCiclo($_SESSION["cicloEscolar"]);
            $verificacion->setControl(0);
            $verificacion->setMatricula($rs[0]);
            $verificacion->setTipo(1);
            $listaVerificacionAleatoria[$cont] = $verificacion;
            $cont++;
        }
        return $listaVerificacionAleatoria;
    }

    function insertarVerificacion(verificacion $verificacion) {
        $cn = new coneccion();
        $sql = "INSERT INTO verificacion (matricula, control, tipo, ciclo, anio, usuarioMaestro)
            VALUES  ('" . $verificacion->getMatricula() . "', '" . $verificacion->getControl() . "',
                '7', '" . $_SESSION["cicloEscolar"] . "', '" . $_SESSION["anio"] . "','" . $verificacion->getUsuarioMaestro() . "')";
        $datos = mysql_query($sql, $cn->Conectarse());
        echo $datos;
    }

}

?>
