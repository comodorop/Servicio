<?php

include './DaoConnection/coneccion.php';

class connecti {

    function dameValores() {
        try {
            $cn = new connection();
        } catch (Exception $ex) {
            $ex->getMessage();
        }

        $s = "";
    }

}
