<?php

include '../Dao/daoServicio.php';
$dao = new daoServicio();
$creaAlInsc = $dao->dameAlInsc($_GET["id"]);
echo"<div id='datos'>
                    <input value='".$creaAlInsc->getNombreGrupo()."' id='IdentificadorGrupo' type='text' placeholder='Nombre del Grupo' list='listaUsuario' style=' height: 30px'/>
                    <br>
                    <input value='".utf8_encode($creaAlInsc->getUsuario())."' id='Asignatura' type='text' placeholder='Usuario...' list='listaAsignaturas' style='height: 30px'/>
                    <br>
                    <input value='".utf8_encode($creaAlInsc->getMateria())."' id='Maestro' type='text' placeholder='Materia...' list='listaMaestro' style='height: 30px'/>
                    <br><br> 
                    <input type='submit' class='btn btn-primary' value='Actualizar' id='ActualizarDatos'/>
                </div>";

