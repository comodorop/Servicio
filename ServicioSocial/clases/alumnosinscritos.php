<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alumnosinscritos
 *
 * @author Solis
 */
class alumnosinscritos {

    private $idGrupo;
    private $usuario;
    private $idMateria;
    private $nombre;
    private $anio;
    private $cursoEscolar;

    public function getAnio() {
        return $this->anio;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }

    public function getCursoEscolar() {
        return $this->cursoEscolar;
    }

    public function setCursoEscolar($cursoEscolar) {
        $this->cursoEscolar = $cursoEscolar;
    }

    public function getIdGrupo() {
        return $this->idGrupo;
    }

    public function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getIdMateria() {
        return $this->idMateria;
    }

    public function setIdMateria($idMateria) {
        $this->idMateria = $idMateria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}

?>
