<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of verificacion
 *
 * @author Comodoro
 */
class verificacion {

    private $id;
    private $matricula;
    private $control;
    private $tipo;
    private $ciclo;
    private $año;
    private $ano;
    private $usuarioMaestro;

    public function getAno() {
        return $this->ano;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getControl() {
        return $this->control;
    }

    public function setControl($control) {
        $this->control = $control;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getCiclo() {
        return $this->ciclo;
    }

    public function setCiclo($ciclo) {
        $this->ciclo = $ciclo;
    }

    public function getAño() {
        return $this->año;
    }

    public function setAño($año) {
        $this->año = $año;
    }

    public function getUsuarioMaestro() {
        return $this->usuarioMaestro;
    }

    public function setUsuarioMaestro($usuarioMaestro) {
        $this->usuarioMaestro = $usuarioMaestro;
    }

}

?>
