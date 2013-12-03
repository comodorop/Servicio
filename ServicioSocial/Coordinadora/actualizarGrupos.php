<?php

include '../Dao/daoServicio.php';
include '../clases/CrearGrupo.php';
$crearGrupo = new CrearGrupo();
$dao = new daoServicio();
$crearGrupo = $dao->dameGrupo($_GET["id"]);
echo"<div id='datos'>
                    <input value='" . $crearGrupo->getNombreGrupo() . "' id='IdentificadorGrupo' type='text' placeholder='Nombre del Grupo' list='listaUsuario' style=' height: 30px'/>
                    <br>
                    <input value='" . utf8_encode($crearGrupo->getNombreMateria()) . "' id='Asignatura' type='text' placeholder='Asignatura....' list='listaAsignaturas' style='height: 30px'/>
                    <br>
                    <input value='" . $crearGrupo->getNombreMaestro() . "' id='Maestro' type='text' placeholder='Maestro....' list='listaMaestro' style='height: 30px'/>
                    <br><br> 
                    <input type='submit' class='btn btn-primary' value='Actualizar' id='ActualizarDatos'/>
                </div>";

