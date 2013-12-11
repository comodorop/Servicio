<?php

class DaoJoel {

    function __construct() {
        
    }

    function verificar() {
        $cn = new coneccion();
        $sql = "";
    }

    function dameMenu($usuario) {
//        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "SELECT control FROM verificacion WHERE matricula='$usuario'";
        $val = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($val)) {
            $val2 = $rs[0];
        }
        return $val2;
    }

    function accesoAlumnos(usuario $u) {
        include '../DaoConnection/coneccion.php';
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
            $sql = "SELECT * FROM usuarios  , maestros
                WHERE usuarios.usuario='" . $u->getUsuario() . "' AND usuarios.pass='" . $u->getPass() . "' and usuarios.usuario = maestros.usuario";
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

    function dameMenu2($usuario) {
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "SELECT control FROM verificacion WHERE matricula='$usuario' and tipo=2 ";
        $val = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($val)) {
            $resp = $rs[0];
        }
        return $resp;
    }

    function validarPrecargaHecha(fechascicloescolar $A) {
        $cn = new coneccion();
        $sql = "SELECT * FROM verificacion where matricula = '" . $A->getMatricula() . "'  anio = '" . $A->getAnio() . "' AND ciclo = '" . $A->getCicloEscolar() . "' AND tipo = 5 ";
        $consulta = mysql_query($sql, $cn->Conectarse());
    }

    function validarEncuestaTutorias(fechascicloescolar $A) {
        $cn = new coneccion();
        $sql = "SELECT fechaInicial, fechaFinal FROM guardarevento where anio = '" . $A->getAnio() . "' AND cicloEscolar = '" . $A->getCicloEscolar() . "' AND evento = 1 ";
        $consulta = mysql_query($sql, $cn->Conectarse());
        $valor = mysql_affected_rows();
        if ($valor > 0) {
            While ($rs2 = mysql_fetch_array($consulta)) {
                $fechaInicial = $rs2["fechaInicial"];
                $fechaFinal = $rs2["fechaFinal"];
            }
            $start_ts = strtotime($fechaInicial);
            $end_ts = strtotime($fechaFinal);
            $evaluame = date("Y/m/d");
            $user_ts = strtotime($evaluame); //fecha a evaluar
            return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
        } else {
            return false;
        }
    }

    function validarprecarga(fechascicloescolar $A) {
        $cn = new coneccion();
        $sql = "SELECT fechaInicial, fechaFinal FROM guardarevento where anio = '" . $A->getAnio() . "' AND cicloEscolar = '" . $A->getCicloEscolar() . "' AND evento = 5 ";
        $consulta = mysql_query($sql, $cn->Conectarse());
        While ($rs2 = mysql_fetch_array($consulta)) {
            $fechaInicial = $rs2["fechaInicial"];
            $fechaFinal = $rs2["fechaFinal"];
        }
        $start_ts = strtotime($fechaInicial);
        $end_ts = strtotime($fechaFinal);
        $evaluame = date("Y/m/d");
        $user_ts = strtotime($evaluame); //fecha a evaluar
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }

    //put your code here
}
