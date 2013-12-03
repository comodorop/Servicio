<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CalificacionesActuales
 *
 * @author comod_000
 */
class CalificacionesActuales {
    private  $id;
    private $usuario;
    private $idMaestro;
    private $idMateria;
    private $calificaciones;
    private $unidad;
    private $cursoEscolar;
    private $tipoCurso;
    private $año;
    private $grupo;
    public function getGrupo() {
        return $this->grupo;
    }

    public function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

        
    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getIdMaestro() {
        return $this->idMaestro;
    }

    public function getIdMateria() {
        return $this->idMateria;
    }

    public function getCalificaciones() {
        return $this->calificaciones;
    }

    public function getUnidad() {
        return $this->unidad;
    }

    public function getCursoEscolar() {
        return $this->cursoEscolar;
    }

    public function getTipoCurso() {
        return $this->tipoCurso;
    }

    public function getAño() {
        return $this->año;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setIdMaestro($idMaestro) {
        $this->idMaestro = $idMaestro;
    }

    public function setIdMateria($idMateria) {
        $this->idMateria = $idMateria;
    }

    public function setCalificaciones($calificaciones) {
        $this->calificaciones = $calificaciones;
    }

    public function setUnidad($unidad) {
        $this->unidad = $unidad;
    }

    public function setCursoEscolar($cursoEscolar) {
        $this->cursoEscolar = $cursoEscolar;
    }

    public function setTipoCurso($tipoCurso) {
        $this->tipoCurso = $tipoCurso;
    }

    public function setAño($año) {
        $this->año = $año;
    }


    
}
