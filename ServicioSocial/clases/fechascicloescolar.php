<?php

class fechascicloescolar {
    private $anio;
    private $cicloEscolar;
    private  $fechaFinal;
    private $fechaInicial;
    private $idCicloEscolar;
    private $idControl;
    private $matricula;
    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

        public function getAnio() {
        return $this->anio;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }

    public function getCicloEscolar() {
        return $this->cicloEscolar;
    }

    public function setCicloEscolar($cicloEscolar) {
        $this->cicloEscolar = $cicloEscolar;
    }

    public function getFechaFinal() {
        return $this->fechaFinal;
    }

    public function setFechaFinal($fechaFinal) {
        $this->fechaFinal = $fechaFinal;
    }

    public function getFechaInicial() {
        return $this->fechaInicial;
    }

    public function setFechaInicial($fechaInicial) {
        $this->fechaInicial = $fechaInicial;
    }

    public function getIdCicloEscolar() {
        return $this->idCicloEscolar;
    }

    public function setIdCicloEscolar($idCicloEscolar) {
        $this->idCicloEscolar = $idCicloEscolar;
    }

    public function getIdControl() {
        return $this->idControl;
    }

    public function setIdControl($idControl) {
        $this->idControl = $idControl;
    }


}

?>
