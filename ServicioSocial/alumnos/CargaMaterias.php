<?php
//include '../DaoConnection/coneccion.php';
session_start();
include './plantilla.php';
include '../Dao/dao.php';
include './validacionseSessionAlumnos.php';
include '../clases/fechascicloescolar.php';
//include '../clases/verificacion.php';

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



                $('#bien').hide();
                $('#mal').hide();
                $('#malo').hide();
                $('#botonazo').click(function() {

                    var busqueda = $("#origen option").length;
                    var valor = $('#horario').val();
                    if (valor != 0) {

                        if (busqueda <= 6 && busqueda > 4) {
                            $('#origen option').prop('disabled', false);
                            $('#origen option').prop('selected', 'selected');
                            var datos = 'Asignatura=' + $('#origen').val() +
                                    '&valor=' + valor;
                            $.get('GuardarCarga.php', datos, function() {
                                $('#bien').show('slow');
                                $('#bien').hide('slow');
                            })
                        } else {
                            $('#mal').show('slow');
                            $('#mal').hide('slow');
                        }

                    }
                    else {
                        $('#malo').show('slow');
                        $('#malo').hide('slow');
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
                        <div id="bien" class="alert alert-success">
                            <strong>Se han Guardado las materias satisfactoriamente</strong>
                        </div>
                        <div id="mal" class="alert alert-error">
                            <strong> Deben ser 5 ・6 materias seleccionadas</strong>
                        </div>

                        <div id="malo" class="alert alert-error">
                            <strong> Debes seleccionar el turno </strong>
                        </div>
                        <div class="row">
                            <select name="destino[]" id="destino" multiple="multiple" size="8" style="height: 30%; width: 30%">
                             <?php
                                        $cn = new coneccion();
                                        $sql = "SELECT distinct concat_ws('-_- ', m.semestre, m.materia) as fusion, m.materia  FROM materias m,historial h WHERE idAcreditacion <=2 and h.calificacion > 70 and m.id NOT IN (SELECT idMateria FROM historial where usuario='$matricula' )LIMIT 0 , 20";
                                        $datos = mysql_query($sql, $cn->Conectarse());

                                        if ($sql != false) {
                                            $registros = array();
                                            while ($renglon = mysql_fetch_array($datos, MYSQL_ASSOC)) {
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

 if (utf8_encode($valor) === "Taller de ética" || utf8_encode($valor) === "Dibujo Industrial" || utf8_encode($valor) === "Electricidad y Electrónica Industrial" || utf8_encode($valor) === "Ingeniería de Sistemas" || utf8_encode($valor) === "Análisis de la Realidad Nacional" || utf8_encode($valor) === "Taller de Liderazgo" || utf8_encode($valor) === "Metrología y Normalización" || utf8_encode($valor) === "Higiene y Seguridad Industrial" || utf8_encode($valor) === "Administración de Proyectos" || utf8_encode($valor) === "Desarrollo Sustentable" || utf8_encode($valor) === "Administración del Mantenimiento" || utf8_encode($valor) === "Sistemas de Manufactura"|| utf8_encode($valor) === "Logística y Cadenas de Suministro"|| utf8_encode($valor) === "Gestión de los Sistemas de Calidad"|| utf8_encode($valor) === "Prospectiva Tecnológica"|| utf8_encode($valor) === "Almacenimiento"|| utf8_encode($valor) === "Relaciones Industriales"|| utf8_encode($valor) === "Aprovisionamiento"|| utf8_encode($valor) === "Logística de Fabricación"|| utf8_encode($valor) === "Diseño Industrial"|| utf8_encode($valor) === "Manufactura Esbelta" || utf8_encode($valor) === "Residencia Profesional" || utf8_encode($valor) === "Servicio Social" || utf8_encode($valor) === "Actividades Complementarias" || utf8_encode($valor) === "Seminario de Logística Internacional" || utf8_encode($valor) === "Transportación y Distribución" || utf8_encode($valor) === "Simulación de Sistemas Lógicos y Productivos" || utf8_encode($valor) === "Simulación y Optimización de Procesos de Manufactura" || utf8_encode($valor) === "Atomatización Industrial"|| utf8_encode($valor) === "Medicion y Mejoramiento de la Productividad"){
              $materia = $valor;
                                                        
                                                    } 
                                                    
                                                    
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
                                                    <option value="<?php echo utf8_encode($materia); ?>" ><?php echo utf8_encode($fusion) ?></option>
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
                                $sql = "SELECT concat_ws('-_- ', m.semestre, m.materia) as fusion, m.materia, m.semestre, m.id FROM historial h, materias m where h.usuario = '$matricula' and h.idAcreditacion <=2 and h.calificacion < 70 and m.id = h.idMateria ";

                                $datos2 = mysql_query($sql, $cn->Conectarse());
                                While ($rs2 = mysql_fetch_array($datos2)) {
                                    ?>
                                <option value="<?php echo utf8_encode($rs2["materia"]); ?>" disabled="true"><?php echo utf8_encode($rs2["fusion"]) ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <input type="button" class="quitar der btn btn-success" value="Agregar a la lista">
                        <input type="button" class="pasar izq btn btn-danger" value="Quitar de la lista">
                    </div>
                      <?php
           
            $cn = new coneccion();
           $sql = "SELECT m.materia, count(p.idMateria) as prr FROM precarga p JOIN historial h ON h.usuario = p.Matricula join materias m on p.idMateria = m.id WHERE p.Matricula = '$matricula' and p.idMateria NOT IN (SELECT h.idMateria FROM historial h where h.usuario='$matricula')GROUP by p.idMateria";
            $datos = mysql_query($sql, $cn->Conectarse());
            ?><table BORDER=1>
                <th> materia </th><th> Alumnos Preinscritos</th>
                <?php
            While ($rs = mysql_fetch_array($datos)) {
                ?>
                <tr> <td><?php echo utf8_encode($rs["materia"]);?></td> <td><?php echo utf8_encode($rs["prr"]);?></td> 
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