<?php
class guardarEvento {
    private $cicloEscolar;
    private $anio;
    private $evento;
    private $fechaInicial;
    private $fechaFinal;
    public function getCicloEscolar() {
        return $this->cicloEscolar;
    }

    public function setCicloEscolar($cicloEscolar) {
        $this->cicloEscolar = $cicloEscolar;
    }

    public function getAnio() {
        return $this->anio;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }

    public function getEvento() {
        return $this->evento;
    }

    public function setEvento($evento) {
        $this->evento = $evento;
    }

    public function getFechaInicial() {
        return $this->fechaInicial;
    }

    public function setFechaInicial($fechaInicial) {
        $this->fechaInicial = $fechaInicial;
    }

    public function getFechaFinal() {
        return $this->fechaFinal;
    }

    public function setFechaFinal($fechaFinal) {
        $this->fechaFinal = $fechaFinal;
    }


}

?>
