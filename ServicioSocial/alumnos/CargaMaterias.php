
<?php
//include '../DaoConnection/coneccion.php';
session_start();
include './plantilla.php';
include '../Dao/dao.php';
include './validacionseSessionAlumnos.php';
include '../clases/fechascicloescolar.php';
include '../clases/verificacion.php';

$dao = new Dao();
$fechascicloescolar = new fechascicloescolar();
$verificacion = new verificacion();
$validacion = new validacionseSessionAlumnos();
$validacion->verificacionDeLogueAlumnos();
$matricula = $_SESSION["UsuarioAlumno"];

$anio = $_SESSION["anio"];
$ciclo = $_SESSION["cicloEscolar"];

//$fechascicloescolar->setmatricula($matricula);
$fechascicloescolar->setAnio($anio);
$fechascicloescolar->setCicloEscolar($ciclo);
$valido = $dao->validarprecarga($fechascicloescolar);
//$validoPrecarga = $dao->validarPrecargaHecha($fechascicloescolar);
if ($valido != true) {
    ?> <script>  alertify.alert("<b>No es epoca de carga de materias</b>", function() {
            document.location.href = 'index.php';
        });</script> <?php
} else {
    $verificacion->setAno($anio);
    $verificacion->setCiclo($ciclo);
    $verificacion->setMatricula($matricula);
    $d = $dao->validarEstadoPrecarga($verificacion);


    if ($d == 0) {
        ?>
        <html>
            <head>
                <style>
                    .stlconten{
                        background-color: white;
                        -webkit-background-size: cover; 
                        -moz-background-size: cover; 
                        -o-background-size: cover; 
                        background-size: cover;
                        margin-top: -20px
                    }
                </style>
                <script>
                    $(document).ready(function() {




                        $('#botonazo').click(function() {

                            var busqueda = $("#origen option").length;
                            var valor = $('#horario').val();
                            if (valor != 0) {

                                if (busqueda <= 6 && busqueda > 4) {
                                    $('#origen option').prop('disabled', false);
                                    $('#origen option').prop('selected', 'selected');
                                    var datos = 'Asignatura=' + $('#origen').val() +
                                            '&valor=' + valor;
                                    $.get('GuardarCarga.php', datos, function(valor) {
                                        var paso = $.parseJSON(valor);
                                        if (valor != 0) {
                                            alertify.success("Carga Exitosa");
                                            location.href = 'index.php';
                                        }
                                        else {
                                            alertify.alert("<b>Ya has cargado anteriormente", function() {
                                                location.href = 'index.php';
                                            });
                                        }
                                    })
                                } else {
                                    alertify.error("Debes seleccionar de 5 a 6 materias");
                                }

                            }
                            else {
                                alertify.error("Debes seleccionarun horario");
                            }
                        });

                        $().ready(function()
                        {
                            $('.pasar').click(function() {
                                return !$('#origen option:selected').remove().appendTo('#destino');
                            });
                            $('.quitar').click(function() {
                                return !$('#destino option:selected').remove().appendTo('#origen');
                            });
                            $('.pasartodos').click(function() {
                                $('#origen option').each(function() {
                                    $(this).remove().appendTo('#destino');
                                });
                            });
                            $('.quitartodos').click(function() {
                                $('#destino option').each(function() {
                                    $(this).remove().appendTo('#origen');
                                });
                            });
                            $('.submit').click(function() {
                                $('#destino option').prop('selected', 'selected');
                            });
                        });
                    });
                </script>
            </head> 
            <body>
                <div class="container stlconten">
                    <div class="span12" style="margin: auto"> 
                        <div style="margin: 3%">
                            <div class="well well-sm pagination-centered">
                                <select id="horario" style="width: 250px">
                                    <option value="0">En que horario?</option>
                                    <option value="Matutino">Matutino</option>
                                    <option value="Vespertino">Vespertino</option>
                                    <
                                </select> 

                                <div class="row">
                                    <select name="destino[]" id="destino" multiple="multiple" size="8" style="height: 30%; width: 30%">
                                        <?php
                                        $cn = new coneccion();
                                        $sql = "SELECT distinct concat_ws('-_- ', m.semestre, m.materia) as fusion, m.materia  FROM materias m,historial h WHERE idAcreditacion <=2 and h.calificacion > 70 and m.id NOT IN (SELECT idMateria FROM historial where usuario='$matricula' )LIMIT 0 , 10";
$datos = mysql_query($sql, $cn->Conectarse());
                                        
                                        if($sql != false){
    $registros= array();
      	 while( $renglon=mysql_fetch_array($datos, MYSQL_ASSOC)){
   	  	    $registros[] = $renglon;
   	     }
   	     mysql_free_result($sql);
      }
                                        

                                        
                                        
                                        
                                        $renglon = $registros[0];
                                         foreach ($registros as $renglon) {

            foreach ($renglon as $campo => $valor) {
//                if ($campo == "materia") {
//                    $materia = $valor;
//                }
                if ($campo == "fusion") {
                    $fusion = $valor;
                }
                
                if ($campo == "materia") {


                    if (utf8_encode($valor) == "Cálculo Diferencial") {
                        $materia = $valor;
                        $control = 1;
                    } else {
                        if ((utf8_encode($valor) == "Cálculo Integral") && $control != 1) {
                            $materia = $valor;
                            $control = 1;
                        } else {
                            if (utf8_encode($valor) == "Cálculo Vectorial" && $control != 1) {
                                $materia = $valor;
                                $control = 1;
                            }
                            if (utf8_encode($valor) == "Física" && $control != 1) {
                                $materia = $valor;
                                $control = 1;
                            }
                        }
                    }
                    if (utf8_encode($valor) == "Fundamentos de Investigación") {
                        $materia = $valor;
                        $control1 = 1;
                    } else {
                        if (utf8_encode($valor) == "Taller de Investigación I" && $control != 1) {
                            $materia = $valor;
                            $control1 = 1;
                        } else {

                            if (utf8_encode($valor) == "Taller de Investigación II" && $control != 1) {
                                $materia = $valor;
                                $control1 = 1;
                            }
                        }
                    }

                    if (utf8_encode($valor) == "Propiedad de los Materiales") {
                        $materia = $valor;
                        $control2 = 1;
                    } else {
                        if (utf8_encode($valor) == "Procesos de Fabricación" && $control2 != 1) {
                            $materia = $valor;
                            $control2 = 1;
                        }
                    }

                    if (utf8_encode($valor) == "Probabilidad y Estadística") {
                        $materia = $valor;
                        $control3 = 1;
                    } else {
                        if (utf8_encode($valor) == "Estadística Inferencial I" && $control3 != 1) {
                            $materia = $valor;
                            $control3 = 1;
                        } else {
                            if (utf8_encode($valor) == "Control Estadístico de la Calidad" && $control3 != 1) {
                                $materia = $valor;
                                $control3 = 1;
                            }
                        }
                    }

                    if (utf8_encode($valor) == "Estudio del Trabajo I") {
                        $materia = $valor;
                        $control4 = 1;
                    } else {
                        if (utf8_encode($valor) == "Estudio del Trabajo II" && $control4 != 1) {
                            $materia = $valor;
                            $control4 = 1;
                        } else {
                            if (utf8_encode($valor) == "Ergonomia" && $control4 != 1) {
                                $materia = $valor;
                                $control4 = 1;
                            }
                        }
                    }

                    if (utf8_encode($valor) == "Administración de las Operaciones II") {
                        $materia = $valor;
                        $control5 = 1;
                    } else {
                        if (utf8_encode($valor) == "Administración de las Operaciones I" && $control5 != 1) {
                            $materia = $valor;
                            $control5 = 1;
                        } else {
                            if (utf8_encode($valor) == "Planeación y Diseño de Instalaciones" && $control5 != 1) {
                                $materia = $valor;
                                $control5 = 1;
                            }
                        }
                    }

                    if (utf8_encode($valor) == "Álgebra Lineal" || utf8_encode($valor) == "Economia") {

                        $materia = $valor;
                        $control6 = 1;
                    } else {
                        if (utf8_encode($valor) == "Investigación de Operaciones I" && $control6 != 1) {
                            $materia = $valor;
                            $control6 = 1;
                        } else {
                            if (utf8_encode($valor) == "Investigación de Operaciones II" && $control6 != 1) {
                                $materia = $valor;
                                $control6 = 1;
                            }
                        }
                    }

                    if ((utf8_encode($valor) == "Investigación de Operaciones II")) {
                        $carga = 1;
                    }
                    if (utf8_encode($valor) == "Ergonomia") {
                        $materia = $valor;
                        $control7 = 1;
                    } else {
                        if (utf8_encode($valor) == "Planeación y Diseño de Instalaciones" && $carga == 1) {
                            $materia = $valor;
                            $control7 = 1;
                        }
                    }

                    if (utf8_encode($valor) == "Algoritmos y Lenguajes de Programación") {
                        $materia = $valor;
                        $control8 = 1;
                    } else {
                        if (utf8_encode($valor) == "Simulación" && $control8 != 1) {
                            $materia = $valor;
                            $control8 = 1;
                        } else {
                            if (utf8_encode($valor) == "Atomatización Industrial" && $control8 != 1) {
                                $materia = $valor;
                                $control8 = 1;
                            }
                        }
                    }

                    if (utf8_encode($valor) == "Gestión de Costos") {
                        $materia = $valor;
                        $control9 = 1;
                    } else {
                        if (utf8_encode($valor) == "Ingeniería Económica" || utf8_encode($valor) == "Mercadotecnia" && $control9 != 1) {
                            $materia = $valor;
                            $control9 = 1;
                        } else {
                            if (utf8_encode($valor) == "Planeación Financiera" || utf8_encode($valor) == "Planeación y Diseño de Instalaciones" && $control9 != 1) {
                                $materia = $valor;
                                $control9 = 1;
                            } else {
                                if (utf8_encode($valor) == "Formulación y Evaluación de Proyectos" && $control9 != 1) {
                                    $materia = $valor;
                                    $control9 = 1;
                                }
                            }
                        }
                    }
                } else {
                    if ($campo == "materia") {
                        $materia = $valor;
                    }
                }


                if (($materia && $fusion) != "") {
                     ?>
                                                    <option value="<?php echo utf8_encode($materia); ?>" disabled="true"><?php echo utf8_encode($fusion) ?></option>
                                                    <?php
                    $fusion = "";
                    $materia = "";
                    
                }



                $paso = false;
            }
        }
                                        
                                        
                                        
                                        
                                        
                                        ?>
                                    </select>
                                    <select name="origen[]" id="origen" multiple="multiple" size="8" style="height: 30%; width: 30%">
                                        <?php
                                        $cn = new coneccion();
                                        $sql = "SELECT concat_ws(' ', materias.semestre, materias.materia) as fusion, max(calificacion) as valor, max(idAcreditacion) as acredita,max(ingresoCursado) FROM materias, historial where historial.idMateria = materias.id and usuario = '$matricula' group by historial.idMateria";
                                        $datos2 = mysql_query($sql, $cn->Conectarse());
                                        While ($rs2 = mysql_fetch_array($datos2)) {
                                            if ($rs2["valor"] < 70) {
                                                $valor = 1;
                                                if ($rs2["acredita"] < 2 && $valor == 1) {
                                                    ?>
                                                    <option value="<?php echo utf8_encode($rs2["materia"]); ?>" disabled="true"><?php echo utf8_encode($rs2["fusion"]) ?></option>
                                                    <?php
                                                    $valor = 0;
                                                } else {
                                                    $valor = 0;
                                                }
                                            } else {
                                                $valor = 0;
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="button" class="quitar der btn btn-success" value="Agregar a la lista">
                                <input type="button" class="pasar izq btn btn-danger" value="Quitar de la lista">
                            </div>
                            <?php
                            echo $ciclo;
                            $cn = new coneccion();
                            $sql = " SELECT p.idMateria, count(p.idMateria) as prr, m.materia \n"
                                    . "FROM precarga p, materias m \n"
                                    . "where p.idMateria = m.id\n"
                                    . "group by p.idMateria \n"
                                    . " LIMIT 0, 30 ";
                            $datos = mysql_query($sql, $cn->Conectarse());
                            ?><table BORDER=1>
                                <th> materia </th><th> Alumnos Preinscritos</th>
                                <?php
                                While ($rs = mysql_fetch_array($datos)) {
                                    ?>
                                    <tr> <td><?php echo utf8_encode($rs["materia"]); ?></td> <td><?php echo utf8_encode($rs["prr"]); ?></td> 
                                        <?php
                                    }
                                    ?></tr>
                            </table>
                            <?php
                            $cn->cerrarBd();
                            ?>
                        </div>
                        <input id="botonazo" class="btn btn-primary" type="button" title="" value="Guardar materias" >
                    </div>
                </div>
            </div>
        </body>
        </html>

        <?php
        include './plantillaFooter.php';
    } else {
        echo "<script>alertify.alert('<b>Ya has cargado anteriormente', function() {
            location.href = 'index.php';  
                });</script>";
    }
}
?>