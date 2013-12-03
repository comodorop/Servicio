<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author Solis
 */
class CrearGrupo {

    private $nombreGrupo;
    private $idMateria;
    private $idMaestro;
    private $nombreMaestro;
    private $nombreMateria;

    public function getNombreMaestro() {
        return $this->nombreMaestro;
    }

    public function getNombreMateria() {
        return $this->nombreMateria;
    }

    public function setNombreMaestro($nombreMaestro) {
        $this->nombreMaestro = $nombreMaestro;
    }

    public function setNombreMateria($nombreMateria) {
        $this->nombreMateria = $nombreMateria;
    }

    public function getNombreGrupo() {
        return $this->nombreGrupo;
    }

    public function setNombreGrupo($nombreGrupo) {
        $this->nombreGrupo = $nombreGrupo;
    }

    public function getIdMateria() {
        return $this->idMateria;
    }

    public function setIdMateria($idMateria) {
        $this->idMateria = $idMateria;
    }

    public function getIdMaestro() {
        return $this->idMaestro;
    }

    public function setIdMaestro($idMaestro) {
        $this->idMaestro = $idMaestro;
    }

}

?>
