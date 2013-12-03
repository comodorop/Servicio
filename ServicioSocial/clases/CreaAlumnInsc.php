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
class CrearAlumnInsc {

    private $idAlumnInsc;
    private $idGrupo;
    private $usuario;
    private $idMateria;
    
    public function getIdAlIns() {
        return $this->idAlumnInsc;
    }

    public function setIdAlIns($idAlIns) {
        $this->idAlumnInsc = $idAlIns;
    }
    
    public function getNombreGrupo() {
        return $this->idGrupo;
    }

    public function setNombreGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }
    
     public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    public function getMateria() {
        return $this->idMateria;
    }

    public function setMateria($idMateria) {
        $this->idMateria = $idMateria;
    }

}

?>
