<?php
session_start();
include './plantillaEncabezado.php';
include './ConsultasOrganigrama.php';
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <!--<link rel="stylesheet" href="example/css/bootstrap.min.css"/>-->
        <link rel="stylesheet" href="example/css/jquery.jOrgChart.css"/>
        <link rel="stylesheet" href="example/css/custom.css"/>
        <link href="example/css/prettify.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="example/prettify.js"></script>
        <!-- jQuery includes -->
        <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
        <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>-->

        <script src="example/jquery.jOrgChart.js"></script>

        <script>
            jQuery(document).ready(function() {
                $("#org").jOrgChart({
                    chartElement: '#chart',
                    dragAndDrop: true
                });
            });
        </script>
    </head>
    <div>
        <center>
            <div style="margin: auto; background-color: white; margin-top: -20px">
                <?php
                $busqueda = $_GET["usuario"];
                $sqlPromedio = "select round(avg(calificacion),2)as promedio, curso
                                from historial
                                where usuario = '$busqueda'
                                group by ingresoCursado, curso";
                $rs = mysql_query($sqlPromedio, $cn->conectarse());
                $c = 1;
                echo"<br><br>"
                . "<div style='float:left; margin-left: 40px'>"
                . "<font size='4' face='Bookman Old Style'>";
                while ($datos = mysql_fetch_array($rs)) {
                  
                    if ($datos[1] == 02) {
                        $c--;
                        echo "V$c.- $datos[0] <br>";
                    } else {
                        echo "$c.-  $datos[0] <br>";
                    } 
                    $c++;
                }
                echo"</font>"
                . "</div>";
                ?>
                <body onload="prettyPrint();">
                    <div style="width: 800px">
                        <ul id="org" style="display:none">
                            <li id="idjOrgChart">
                                Reticula del Alumno:
                                <br>
                                <?php echo $busqueda; ?>
                                <ul>
                                    <?php
                                    for ($x = 0; $x < 6; $x++) {
                                        ?>
                                        <li >
                                            <div style=" height: 95px ; background-color:<?php
                                    for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                        if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
                                            echo $materiasColores[$y];
                                            break;
                                        }
                                    }
                                        ?>">
                                                 <?php
                                                     echo "<strong style='color: black'>" . $materias[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $creditos1[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $tiempos1[$x] . "</strong>";
//                                                echo"<br>";
//                                                echo "<strong style='color: black'>" . $infoMaterias[$x] . "</strong>";
                                                     echo"<br>";
                                                     for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                         if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                             echo "<strong style='color: black'>" . $repeticion[$y] . "</strong>";
                                                             break;
                                                         }
                                                     }
                                                     $x++
                                                     ?>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div style=" height: 95px ; background-color:<?php
                                                 for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                     if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
                                                         echo $materiasColores[$y];
                                                         break;
                                                     }
                                                 }
                                                     ?>">
                                                         <?php
                                                             echo "<strong style='color: black'>" . $materias[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $creditos1[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $tiempos1[$x] . "</strong>";
//                                                        echo"<br>";
//                                                        echo "<strong style='color: black'>" . $infoMaterias[$x] . "</strong>";
                                                             echo"<br>";
                                                             for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                                 if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                     echo "<strong style='color: black'>" . $repeticion[$y] . "</strong>";
                                                                     break;
                                                                 }
                                                             }
                                                             $x++;
                                                             ?>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div style=" height: 95px ; background-color:<?php
                                                         for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                             if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
                                                                 echo $materiasColores[$y];
                                                                 break;
                                                             }
                                                         }
                                                             ?>">
                                                                 <?php
                                                                     echo "<strong style='color: black'>" . $materias[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $creditos1[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $tiempos1[$x] . "</strong>";
//                                                                echo"<br>";
//                                                                echo "<strong style='color: black'>" . $infoMaterias[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                                         if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                             echo "<strong style='color: black'>" . $repeticion[$y] . "</strong>";
                                                                             break;
                                                                         }
                                                                     }
                                                                     $x++;
                                                                     ?>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div style=" height: 95px ; background-color:<?php
                                                                 for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                                     if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
                                                                         echo $materiasColores[$y];
                                                                         break;
                                                                     }
                                                                 }
                                                                     ?>">
                                                                         <?php
                                                                             echo "<strong style='color: black'>" . $materias[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $creditos1[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $tiempos1[$x] . "</strong>";
                                                                             echo"<br>";
//                                                                        echo "<strong style='color: black'>" . $infoMaterias[$x] . "</strong>";
//                                                                        echo"<br>";
                                                                             for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                                                 if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                     echo "<strong style='color: black'>" . $repeticion[$y] . "</strong>";
                                                                                     break;
                                                                                 }
                                                                             }
                                                                             $x++;
                                                                             ?>
                                                                    </div>
                                                                    <ul>
                                                                        <li>
                                                                            <div style=" height: 95px ; background-color:<?php
                                                                         for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                                             if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
                                                                                 echo $materiasColores[$y];
                                                                                 break;
                                                                             }
                                                                         }
                                                                             ?>">
                                                                                 <?php
                                                                                     echo "<strong style='color: black'>" . $materias[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $creditos1[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $tiempos1[$x] . "</strong>";
                                                                                     echo"<br>";
//                                                                                echo "<strong style='color: black'>" . $infoMaterias[$x] . "</strong>";
//                                                                                echo"<br>";
                                                                                     for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                                                         if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                             echo "<strong style='color: black'>" . $repeticion[$y] . "</strong>";
                                                                                             break;
                                                                                         }
                                                                                     }
                                                                                     $x++;
                                                                                     ?>
                                                                            </div>
                                                                            <ul>
                                                                                <li>
                                                                                    <div style=" height: 95px ; background-color:<?php
                                                                                 for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                                                     if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
                                                                                         echo $materiasColores[$y];
                                                                                         break;
                                                                                     }
                                                                                 }
                                                                                     ?>">
                                                                                         <?php
                                                                                             echo "<strong style='color: black'>" . $materias[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $creditos1[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $tiempos1[$x] . "</strong>";
                                                                                             echo"<br>";
//                                                                                        echo "<strong style='color: black'>" . $infoMaterias[$x] . "</strong>";
//                                                                                        echo"<br>";
                                                                                             for ($y = 0; $y < count($materiasLLevadas); $y++) {
                                                                                                 if (utf8_encode($materiasLLevadas[$y]) == $materias[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                                     echo "<strong style='color: black'>" . $repeticion[$y] . "</strong>";
                                                                                                     break;
                                                                                                 }
                                                                                             }
                                                                                             $x++;
                                                                                             ?>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>

                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul> 
                                            <?php
                                            break;
                                        }
                                        ?>
                                    </li>
                                    <?php
                                    for ($x = 0; $x < 7; $x++) {
                                        ?>
                                        <li >
                                            <div style=" height: 95px ; background-color:<?php
                                    for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                        if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
                                            echo $materiasColores2[$y];
                                            break;
                                        }
                                    }
                                        ?>">
                                                 <?php
                                                     echo "<strong style='color: black'>" . $materias2[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $creditos2[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $tiempos2[$x] . "</strong>";
                                                     echo"<br>";
//                                                echo "<strong style='color: black'>" . $infoMaterias2[$x] . "</strong>";
//                                                echo"<br>";
                                                     for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                         if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                             echo "<strong style='color: black'>" . $repeticion2[$y] . "</strong>";
                                                             break;
                                                         }
                                                     }
                                                     $x++
                                                     ?>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div style=" height: 95px ; background-color:<?php
                                                 for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                     if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
                                                         echo $materiasColores2[$y];
                                                         break;
                                                     }
                                                 }
                                                     ?>">
                                                         <?php
                                                             echo "<strong style='color: black'>" . $materias2[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $creditos2[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $tiempos2[$x] . "</strong>";
                                                             echo"<br>";
//                                                        echo "<strong style='color: black'>" . $infoMaterias2[$x] . "</strong>";
//                                                        echo"<br>";
                                                             for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                                 if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                     echo "<strong style='color: black'>" . $repeticion2[$y] . "</strong>";
                                                                     break;
                                                                 }
                                                             }
                                                             $x++;
                                                             ?>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div style=" height: 95px ; background-color:<?php
                                                         for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                             if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
                                                                 echo $materiasColores2[$y];
                                                                 break;
                                                             }
                                                         }
                                                             ?>">
                                                                 <?php
                                                                     echo "<strong style='color: black'>" . $materias2[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $creditos2[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $tiempos2[$x] . "</strong>";
                                                                     echo"<br>";
//                                                                echo "<strong style='color: black'>" . $infoMaterias2[$x] . "</strong>";
//                                                                echo"<br>";
                                                                     for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                                         if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                             echo "<strong style='color: black'>" . $repeticion2[$y] . "</strong>";
                                                                             break;
                                                                         }
                                                                     }
                                                                     $x++;
                                                                     ?>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div style=" height: 95px ; background-color:<?php
                                                                 for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                                     if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
                                                                         echo $materiasColores2[$y];
                                                                         break;
                                                                     }
                                                                 }
                                                                     ?>">
                                                                         <?php
                                                                             echo "<strong style='color: black'>" . $materias2[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $creditos2[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $tiempos2[$x] . "</strong>";
                                                                             echo"<br>";
//                                                                        echo "<strong style='color: black'>" . $infoMaterias2[$x] . "</strong>";
//                                                                        echo"<br>";
                                                                             for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                                                 if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                     echo "<strong style='color: black'>" . $repeticion2[$y] . "</strong>";
                                                                                     break;
                                                                                 }
                                                                             }
                                                                             $x++;
                                                                             ?>
                                                                    </div>
                                                                    <ul>
                                                                        <li>
                                                                            <div style=" height: 95px ; background-color:<?php
                                                                         for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                                             if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
                                                                                 echo $materiasColores2[$y];
                                                                                 break;
                                                                             }
                                                                         }
                                                                             ?>">
                                                                                 <?php
                                                                                     echo "<strong style='color: black'>" . $materias2[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $creditos2[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $tiempos2[$x] . "</strong>";
                                                                                     echo"<br>";
//                                                                                echo "<strong style='color: black'>" . $infoMaterias2[$x] . "</strong>";
//                                                                                echo"<br>";
                                                                                     for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                                                         if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                             echo "<strong style='color: black'>" . $repeticion2[$y] . "</strong>";
                                                                                             break;
                                                                                         }
                                                                                     }
                                                                                     $x++;
                                                                                     ?>
                                                                            </div>
                                                                            <ul>
                                                                                <li>
                                                                                    <div style=" height: 95px ; background-color:<?php
                                                                                 for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                                                     if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
                                                                                         echo $materiasColores2[$y];
                                                                                         break;
                                                                                     }
                                                                                 }
                                                                                     ?>">
                                                                                         <?php
                                                                                             echo "<strong style='color: black'>" . $materias2[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $creditos2[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $tiempos2[$x] . "</strong>";
                                                                                             echo"<br>";
//                                                                                        echo "<strong style='color: black'>" . $infoMaterias2[$x] . "</strong>";
//                                                                                        echo"<br>";
                                                                                             for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                                                                 if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                                     echo "<strong style='color: black'>" . $repeticion2[$y] . "</strong>";
                                                                                                     break;
                                                                                                 }
                                                                                             }
                                                                                             $x++;
                                                                                             ?>
                                                                                    </div>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <div style=" height: 95px ; background-color:<?php
                                                                                         for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                                                             if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
                                                                                                 echo $materiasColores2[$y];
                                                                                                 break;
                                                                                             }
                                                                                         }
                                                                                             ?>">
                                                                                                 <?php
                                                                                                     echo "<strong style='color: black'>" . $materias2[$x] . "</strong>";
                                                                                                     echo"<br>";
                                                                                                     echo"<strong style='color: black'>" . $creditos2[$x] . "</strong>";
                                                                                                     echo"<br>";
                                                                                                     echo"<strong style='color: black'>" . $tiempos2[$x] . "</strong>";
                                                                                                     echo"<br>";
//                                                                                                echo "<strong style='color: black'>" . $infoMaterias2[$x] . "</strong>";
//                                                                                                echo"<br>";
                                                                                                     for ($y = 0; $y < count($materiasLLevadas2); $y++) {
                                                                                                         if (utf8_encode($materiasLLevadas2[$y]) == $materias2[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                                             echo "<strong style='color: black'>" . $repeticion2[$y] . "</strong>";
                                                                                                             break;
                                                                                                         }
                                                                                                     }
                                                                                                     $x++;
                                                                                                     ?>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>

                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>

                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                        break;
                                    }
                                    ?>
                                    <!----------Apartir de aqui se pega------->
                                    <?php
                                    for ($x = 0; $x < 6; $x++) {
                                        ?>
                                        <li >
                                            <div style=" height: 95px ; background-color:<?php
                                    for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                        if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                            echo $materiasColores3[$y];
                                            break;
                                        }
                                    }
                                        ?>">
                                                 <?php
                                                     echo "<strong style='color: black'>" . $materias3[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $creditos3[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $tiempos3[$x] . "</strong>";
                                                     echo"<br>";
                                                     for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                         if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                             echo "<strong style='color: black'>" . $repeticion3[$y] . "</strong>";
                                                             break;
                                                         }
                                                     }
                                                     $x++
                                                     ?>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div style=" height: 95px ; background-color:<?php
                                                 for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                     if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                         echo $materiasColores3[$y];
                                                         break;
                                                     }
                                                 }
                                                     ?>">
                                                         <?php
                                                             echo "<strong style='color: black'>" . $materias3[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $creditos3[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $tiempos3[$x] . "</strong>";
                                                             echo"<br>";

                                                             for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                                 if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                                     echo "<strong style='color: black'>" . $repeticion3[$y] . "</strong>";
                                                                     break;
                                                                 }
                                                             }
                                                             $x++;
                                                             ?>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div style=" height: 95px ; background-color:<?php
                                                         for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                             if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                                 echo $materiasColores3[$y];
                                                                 break;
                                                             }
                                                         }
                                                             ?>">
                                                                 <?php
                                                                     echo "<strong style='color: black'>" . $materias3[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $creditos3[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $tiempos3[$x] . "</strong>";
                                                                     echo"<br>";

                                                                     for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                                         if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                                             echo "<strong style='color: black'>" . $repeticion3[$y] . "</strong>";
                                                                             break;
                                                                         }
                                                                     }
                                                                     $x++;
                                                                     ?>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div style=" height: 95px ; background-color:<?php
                                                                 for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                                     if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                                         echo $materiasColores3[$y];
                                                                         break;
                                                                     }
                                                                 }
                                                                     ?>">
                                                                         <?php
                                                                             echo "<strong style='color: black'>" . $materias3[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $creditos3[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $tiempos3[$x] . "</strong>";
                                                                             echo"<br>";

                                                                             for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                                                 if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                                                     echo "<strong style='color: black'>" . $repeticion3[$y] . "</strong>";
                                                                                     break;
                                                                                 }
                                                                             }
                                                                             $x++;
                                                                             ?>
                                                                    </div>
                                                                    <ul>
                                                                        <li>
                                                                            <div style=" height: 95px ; background-color:<?php
                                                                         for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                                             if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                                                 echo $materiasColores3[$y];
                                                                                 break;
                                                                             }
                                                                         }
                                                                             ?>">
                                                                                 <?php
                                                                                     echo "<strong style='color: black'>" . $materias3[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $creditos3[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $tiempos3[$x] . "</strong>";
                                                                                     echo"<br>";

                                                                                     for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                                                         if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                                                             echo "<strong style='color: black'>" . $repeticion3[$y] . "</strong>";
                                                                                             break;
                                                                                         }
                                                                                     }
                                                                                     $x++;
                                                                                     ?>
                                                                            </div>
                                                                            <ul>
                                                                                <li>
                                                                                    <div style=" height: 95px ; background-color:<?php
                                                                                 for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                                                     if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                                                         echo $materiasColores3[$y];
                                                                                         break;
                                                                                     }
                                                                                 }
                                                                                     ?>">
                                                                                         <?php
                                                                                             echo "<strong style='color: black'>" . $materias3[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $creditos3[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $tiempos3[$x] . "</strong>";
                                                                                             echo"<br>";

                                                                                             for ($y = 0; $y < count($materiasLLevadas3); $y++) {
                                                                                                 if (utf8_encode($materiasLLevadas3[$y]) == $materias3[$x]) {
                                                                                                     echo "<strong style='color: black'>" . $repeticion3[$y] . "</strong>";
                                                                                                     break;
                                                                                                 }
                                                                                             }
                                                                                             $x++;
                                                                                             ?>
                                                                                    </div>
                                                                                </li>

                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>

                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                        break;
                                    }
                                    ?>
                                    <!-----------------------------------------4Semestre--------------------------------->   
                                    <?php
                                    for ($x = 0; $x < 7; $x++) {
                                        ?>
                                        <li >
                                            <div style=" height: 95px ; background-color:<?php
                                    for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                        if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                            echo $materiasColores4[$y];
                                            break;
                                        }
                                    }
                                        ?>">
                                                 <?php
                                                     echo "<strong style='color: black'>" . $materias4[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $creditos4[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $tiempos4[$x] . "</strong>";
                                                     echo"<br>";
                                                     for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                         if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                             echo "<strong style='color: black'>" . $repeticion4[$y] . "</strong>";
                                                             break;
                                                         }
                                                     }
                                                     $x++
                                                     ?>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div style=" height: 95px ; background-color:<?php
                                                 for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                     if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                         echo $materiasColores4[$y];
                                                         break;
                                                     }
                                                 }
                                                     ?>">
                                                         <?php
                                                             echo "<strong style='color: black'>" . $materias4[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $creditos4[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $tiempos4[$x] . "</strong>";
                                                             echo"<br>";

                                                             for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                                 if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                     echo "<strong style='color: black'>" . $repeticion4[$y] . "</strong>";
                                                                     break;
                                                                 }
                                                             }
                                                             $x++;
                                                             ?>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div style=" height: 95px ; background-color:<?php
                                                         for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                             if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                 echo $materiasColores4[$y];
                                                                 break;
                                                             }
                                                         }
                                                             ?>">
                                                                 <?php
                                                                     echo "<strong style='color: black'>" . $materias4[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $creditos4[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $tiempos4[$x] . "</strong>";
                                                                     echo"<br>";

                                                                     for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                                         if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                             echo "<strong style='color: black'>" . $repeticion4[$y] . "</strong>";
                                                                             break;
                                                                         }
                                                                     }
                                                                     $x++;
                                                                     ?>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div style=" height: 95px ; background-color:<?php
                                                                 for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                                     if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                         echo $materiasColores4[$y];
                                                                         break;
                                                                     }
                                                                 }
                                                                     ?>">
                                                                         <?php
                                                                             echo "<strong style='color: black'>" . $materias4[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $creditos4[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $tiempos4[$x] . "</strong>";
                                                                             echo"<br>";

                                                                             for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                                                 if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                                     echo "<strong style='color: black'>" . $repeticion4[$y] . "</strong>";
                                                                                     break;
                                                                                 }
                                                                             }
                                                                             $x++;
                                                                             ?>
                                                                    </div>
                                                                    <ul>
                                                                        <li>
                                                                            <div style=" height: 95px ; background-color:<?php
                                                                         for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                                             if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                                 echo $materiasColores4[$y];
                                                                                 break;
                                                                             }
                                                                         }
                                                                             ?>">
                                                                                 <?php
                                                                                     echo "<strong style='color: black'>" . $materias4[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $creditos4[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $tiempos4[$x] . "</strong>";
                                                                                     echo"<br>";

                                                                                     for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                                                         if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                                             echo "<strong style='color: black'>" . $repeticion4[$y] . "</strong>";
                                                                                             break;
                                                                                         }
                                                                                     }
                                                                                     $x++;
                                                                                     ?>
                                                                            </div>
                                                                            <ul>
                                                                                <li>
                                                                                    <div style=" height: 95px ; background-color:<?php
                                                                                 for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                                                     if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                                         echo $materiasColores4[$y];
                                                                                         break;
                                                                                     }
                                                                                 }
                                                                                     ?>">
                                                                                         <?php
                                                                                             echo "<strong style='color: black'>" . $materias4[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $creditos4[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $tiempos4[$x] . "</strong>";
                                                                                             echo"<br>";

                                                                                             for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                                                                 if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                                                     echo "<strong style='color: black'>" . $repeticion4[$y] . "</strong>";
                                                                                                     break;
                                                                                                 }
                                                                                             }
                                                                                             $x++;
                                                                                             ?>
                                                                                    </div>

                                                                                    <ul>
                                                                                        <li>
                                                                                            <div style=" height: 95px ; background-color:<?php
                                                                                         for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                                                             if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                                                 echo $materiasColores4[$y];
                                                                                                 break;
                                                                                             }
                                                                                         }
                                                                                             ?>">
                                                                                                 <?php
                                                                                                     echo "<strong style='color: black'>" . $materias4[$x] . "</strong>";
                                                                                                     echo"<br>";
                                                                                                     echo"<strong style='color: black'>" . $creditos4[$x] . "</strong>";
                                                                                                     echo"<br>";
                                                                                                     echo"<strong style='color: black'>" . $tiempos4[$x] . "</strong>";
                                                                                                     echo"<br>";

                                                                                                     for ($y = 0; $y < count($materiasLLevadas4); $y++) {
                                                                                                         if (utf8_encode($materiasLLevadas4[$y]) == $materias4[$x]) {
                                                                                                             echo "<strong style='color: black'>" . $repeticion4[$y] . "</strong>";
                                                                                                             break;
                                                                                                         }
                                                                                                     }
                                                                                                     $x++;
                                                                                                     ?>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>

                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>

                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                        break;
                                    }
                                    ?>
                                    <!------------------------------------------------siguienteCodigo------------------------->
                                    <?php
                                    for ($x = 0; $x < 7; $x++) {
                                        ?>
                                        <li >
                                            <div style=" height: 95px ; background-color:<?php
                                    for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                        if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
                                            echo $materiasColores5[$y];
                                            break;
                                        }
                                    }
                                        ?>">
                                                 <?php
                                                     echo "<strong style='color: black'>" . $materias5[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $creditos5[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $tiempos5[$x] . "</strong>";
                                                     echo"<br>";
                                                     for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                         if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                             echo "<strong style='color: black'>" . $repeticion5[$y] . "</strong>";
                                                             break;
                                                         }
                                                     }
                                                     $x++
                                                     ?>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div style=" height: 95px ; background-color:<?php
                                                 for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                     if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
                                                         echo $materiasColores5[$y];
                                                         break;
                                                     }
                                                 }
                                                     ?>">
                                                         <?php
                                                             echo "<strong style='color: black'>" . $materias5[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $creditos5[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $tiempos5[$x] . "</strong>";
                                                             echo"<br>";

                                                             for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                                 if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                     echo "<strong style='color: black'>" . $repeticion5[$y] . "</strong>";
                                                                     break;
                                                                 }
                                                             }
                                                             $x++;
                                                             ?>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div style=" height: 95px ; background-color:<?php
                                                         for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                             if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
                                                                 echo $materiasColores5[$y];
                                                                 break;
                                                             }
                                                         }
                                                             ?>">
                                                                 <?php
                                                                     echo "<strong style='color: black'>" . $materias5[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $creditos5[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $tiempos5[$x] . "</strong>";
                                                                     echo"<br>";

                                                                     for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                                         if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                             echo "<strong style='color: black'>" . $repeticion5[$y] . "</strong>";
                                                                             break;
                                                                         }
                                                                     }
                                                                     $x++;
                                                                     ?>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div style=" height: 95px ; background-color:<?php
                                                                 for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                                     if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
                                                                         echo $materiasColores5[$y];
                                                                         break;
                                                                     }
                                                                 }
                                                                     ?>">
                                                                         <?php
                                                                             echo "<strong style='color: black'>" . $materias5[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $creditos5[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $tiempos5[$x] . "</strong>";
                                                                             echo"<br>";

                                                                             for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                                                 if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                     echo "<strong style='color: black'>" . $repeticion5[$y] . "</strong>";
                                                                                     break;
                                                                                 }
                                                                             }
                                                                             $x++;
                                                                             ?>
                                                                    </div>
                                                                    <ul>
                                                                        <li>
                                                                            <div style=" height: 95px ; background-color:<?php
                                                                         for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                                             if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
                                                                                 echo $materiasColores5[$y];
                                                                                 break;
                                                                             }
                                                                         }
                                                                             ?>">
                                                                                 <?php
                                                                                     echo "<strong style='color: black'>" . $materias5[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $creditos5[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $tiempos5[$x] . "</strong>";
                                                                                     echo"<br>";

                                                                                     for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                                                         if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                             echo "<strong style='color: black'>" . $repeticion5[$y] . "</strong>";
                                                                                             break;
                                                                                         }
                                                                                     }
                                                                                     $x++;
                                                                                     ?>
                                                                            </div>
                                                                            <ul>
                                                                                <li>
                                                                                    <div style=" height: 95px ; background-color:<?php
                                                                                 for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                                                     if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
                                                                                         echo $materiasColores5[$y];
                                                                                         break;
                                                                                     }
                                                                                 }
//                                                                                    
                                                                                     ?>">
                                                                                         <?php
                                                                                             echo "<strong style='color: black'>" . $materias5[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $creditos5[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $tiempos5[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                                                                 if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                                     echo "<strong style='color: black'>" . $repeticion5[$y] . "</strong>";
                                                                                                     break;
                                                                                                 }
                                                                                             }
                                                                                             $x++;
                                                                                             ?>
                                                                                    </div>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <div style=" height: 95px ; background-color:<?php
                                                                                         for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                                                             if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
                                                                                                 echo $materiasColores5[$y];
                                                                                                 break;
                                                                                             }
                                                                                         }
                                                                                             ?>">
                                                                                                 <?php
                                                                                                     echo "<strong style='color: black'>" . $materias5[$x] . "</strong>";
                                                                                                     echo"<br>";
                                                                                                     echo"<strong style='color: black'>" . $creditos5[$x] . "</strong>";
                                                                                                     echo"<br>";
                                                                                                     echo"<strong style='color: black'>" . $tiempos5[$x] . "</strong>";
                                                                                                     echo"<br>";
                                                                                                     for ($y = 0; $y < count($materiasLLevadas5); $y++) {
                                                                                                         if (utf8_encode($materiasLLevadas5[$y]) == $materias5[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                                             echo "<strong style='color: black'>" . $repeticion5[$y] . "</strong>";
                                                                                                             break;
                                                                                                         }
                                                                                                     }
                                                                                                     $x++;
                                                                                                     ?>
                                                                                            </div> 
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>

                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>

                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                        break;
                                    }
                                    ?>
                                    <!-------------------siguieteCodigo--------------->

                                    <?php
                                    for ($x = 0; $x < 6; $x++) {
                                        ?>
                                        <li >
                                            <div style=" height: 95px ; background-color:<?php
                                    for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                        if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
                                            echo $materiasColores6[$y];
                                            break;
                                        }
                                    }
                                        ?>">
                                                 <?php
                                                     echo "<strong style='color: black'>" . $materias6[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $creditos6[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $tiempos6[$x] . "</strong>";

                                                     echo"<br>";

                                                     for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                         if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                             echo "<strong style='color: black'>" . $repeticion6[$y] . "</strong>";
                                                             break;
                                                         }
                                                     }
                                                     $x++
                                                     ?>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div style=" height: 95px ; background-color:<?php
                                                 for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                     if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
                                                         echo $materiasColores6[$y];
                                                         break;
                                                     }
                                                 }
                                                     ?>">
                                                         <?php
                                                             echo "<strong style='color: black'>" . $materias6[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $creditos6[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $tiempos6[$x] . "</strong>";
                                                             echo"<br>";

                                                             for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                                 if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                     echo "<strong style='color: black'>" . $repeticion6[$y] . "</strong>";
                                                                     break;
                                                                 }
                                                             }
                                                             $x++;
                                                             ?>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div style=" height: 95px ; background-color:<?php
                                                         for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                             if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
                                                                 echo $materiasColores6[$y];
                                                                 break;
                                                             }
                                                         }
                                                             ?>">
                                                                 <?php
                                                                     echo "<strong style='color: black'>" . $materias6[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $creditos6[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $tiempos6[$x] . "</strong>";
                                                                     echo"<br>";

                                                                     for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                                         if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                             echo "<strong style='color: black'>" . $repeticion6[$y] . "</strong>";
                                                                             break;
                                                                         }
                                                                     }
                                                                     $x++;
                                                                     ?>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div style=" height: 95px ; background-color:<?php
                                                                 for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                                     if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
                                                                         echo $materiasColores6[$y];
                                                                         break;
                                                                     }
                                                                 }
                                                                     ?>">
                                                                         <?php
                                                                             echo "<strong style='color: black'>" . $materias6[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $creditos6[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $tiempos6[$x] . "</strong>";
                                                                             echo"<br>";

                                                                             for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                                                 if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                     echo "<strong style='color: black'>" . $repeticion6[$y] . "</strong>";
                                                                                     break;
                                                                                 }
                                                                             }
                                                                             $x++;
                                                                             ?>
                                                                    </div>
                                                                    <ul>
                                                                        <li>
                                                                            <div style=" height: 95px ; background-color:<?php
                                                                         for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                                             if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
                                                                                 echo $materiasColores6[$y];
                                                                                 break;
                                                                             }
                                                                         }
                                                                             ?>">
                                                                                 <?php
                                                                                     echo "<strong style='color: black'>" . $materias6[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $creditos6[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $tiempos6[$x] . "</strong>";
                                                                                     echo"<br>";

                                                                                     for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                                                         if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                             echo "<strong style='color: black'>" . $repeticion6[$y] . "</strong>";
                                                                                             break;
                                                                                         }
                                                                                     }
                                                                                     $x++;
                                                                                     ?>
                                                                            </div>
                                                                            <ul>
                                                                                <li>
                                                                                    <div style=" height: 95px ; background-color:<?php
                                                                                 for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                                                     if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
                                                                                         echo $materiasColores6[$y];
                                                                                         break;
                                                                                     }
                                                                                 }
                                                                                     ?>">
                                                                                         <?php
                                                                                             echo "<strong style='color: black'>" . $materias6[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $creditos6[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $tiempos6[$x] . "</strong>";
                                                                                             echo"<br>";

                                                                                             for ($y = 0; $y < count($materiasLLevadas6); $y++) {
                                                                                                 if (utf8_encode($materiasLLevadas6[$y]) == $materias6[$x]) {
//                                                                                            echo $materiasColores5[$y];
                                                                                                     echo "<strong style='color: black'>" . $repeticion6[$y] . "</strong>";
                                                                                                     break;
                                                                                                 }
                                                                                             }
                                                                                             $x++;
                                                                                             ?>
                                                                                    </div>
                                                                                </li>

                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>

                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                        break;
                                    }
                                    ?>
                                    <!----------------siguientecodigo-->
                                    <?php
                                    for ($x = 0; $x < 8; $x++) {
                                        ?>
                                        <li >
                                            <div style=" height: 95px ; background-color:<?php
                                    for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                        if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                            echo $materiasColores7[$y];
                                            break;
                                        }
                                    }
                                        ?>">
                                                 <?php
                                                     echo "<strong style='color: black'>" . $materias7[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $creditos7[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $tiempos7[$x] . "</strong>";
                                                     echo"<br>";
                                                     for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                         if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                             echo "<strong style='color: black'>" . $repeticion7[$y] . "</strong>";
                                                             break;
                                                         }
                                                     }
                                                     $x++
                                                     ?>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div style=" height: 95px ; background-color:<?php
                                                 for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                     if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                         echo $materiasColores7[$y];
                                                         break;
                                                     }
                                                 }
                                                     ?>">
                                                         <?php
                                                             echo "<strong style='color: black'>" . $materias7[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $creditos7[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $tiempos7[$x] . "</strong>";
                                                             echo"<br>";

                                                             for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                 if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                     echo "<strong style='color: black'>" . $repeticion7[$y] . "</strong>";
                                                                     break;
                                                                 }
                                                             }
                                                             $x++;
                                                             ?>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div style=" height: 95px ; background-color:<?php
                                                         for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                             if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                 echo $materiasColores7[$y];
                                                                 break;
                                                             }
                                                         }
                                                             ?>">
                                                                 <?php
                                                                     echo "<strong style='color: black'>" . $materias7[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $creditos7[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $tiempos7[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<br>";
                                                                     for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                         if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                             echo "<strong style='color: black'>" . $repeticion7[$y] . "</strong>";
                                                                             break;
                                                                         }
                                                                     }
                                                                     $x++;
                                                                     ?>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div style=" height: 95px ; background-color:<?php
                                                                 for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                     if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                         echo $materiasColores7[$y];
                                                                         break;
                                                                     }
                                                                 }
                                                                     ?>">
                                                                         <?php
                                                                             echo "<strong style='color: black'>" . $materias7[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $creditos7[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $tiempos7[$x] . "</strong>";
                                                                             echo"<br>";

                                                                             for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                                 if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                                     echo "<strong style='color: black'>" . $repeticion7[$y] . "</strong>";
                                                                                     break;
                                                                                 }
                                                                             }
                                                                             $x++;
                                                                             ?>
                                                                    </div>
                                                                    <ul>
                                                                        <li>
                                                                            <div style=" height: 95px ; background-color:<?php
                                                                         for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                             if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                                 echo $materiasColores7[$y];
                                                                                 break;
                                                                             }
                                                                         }
                                                                             ?>">
                                                                                 <?php
                                                                                     echo "<strong style='color: black'>" . $materias7[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $creditos7[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $tiempos7[$x] . "</strong>";
                                                                                     echo"<br>";

                                                                                     for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                                         if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                                             echo "<strong style='color: black'>" . $repeticion7[$y] . "</strong>";
                                                                                             break;
                                                                                         }
                                                                                     }
                                                                                     $x++;
                                                                                     ?>
                                                                            </div>
                                                                            <ul>
                                                                                <li>
                                                                                    <div style=" height: 95px ; background-color:<?php
                                                                                 for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                                     if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                                         echo $materiasColores7[$y];
                                                                                         break;
                                                                                     }
                                                                                 }
                                                                                     ?>">
                                                                                         <?php
                                                                                             echo "<strong style='color: black'>" . $materias7[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $creditos7[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $tiempos7[$x] . "</strong>";
                                                                                             echo"<br>";

                                                                                             for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                                                 if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                                                     echo "<strong style='color: black'>" . $repeticion7[$y] . "</strong>";
                                                                                                     break;
                                                                                                 }
                                                                                             }
                                                                                             $x++;
                                                                                             ?>
                                                                                    </div>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <div style=" height: 95px ; background-color:<?php
                                                                                         for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                                             if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                                                 echo $materiasColores7[$y];
                                                                                                 break;
                                                                                             }
                                                                                         }
                                                                                             ?>">
                                                                                                 <?php
                                                                                                     echo "<strong style='color: black'>" . $materias7[$x] . "</strong>";
                                                                                                     echo"<br>";
                                                                                                     echo"<strong style='color: black'>" . $creditos7[$x] . "</strong>";
                                                                                                     echo"<br>";
                                                                                                     echo"<strong style='color: black'>" . $tiempos7[$x] . "</strong>";
                                                                                                     echo"<br>";

                                                                                                     for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                                                         if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                                                             echo "<strong style='color: black'>" . $repeticion7[$y] . "</strong>";
                                                                                                             break;
                                                                                                         }
                                                                                                     }
                                                                                                     $x++;
                                                                                                     ?>
                                                                                            </div>
                                                                                            <ul>
                                                                                                <li>
                                                                                                    <div style=" height: 95px ; background-color:<?php
                                                                                                 for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                                                     if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                                                         echo $materiasColores7[$y];
                                                                                                         break;
                                                                                                     }
                                                                                                 }
                                                                                                     ?>">
                                                                                                         <?php
                                                                                                             echo "<strong style='color: black'>" . $materias7[$x] . "</strong>";
                                                                                                             echo"<br>";
                                                                                                             echo"<strong style='color: black'>" . $creditos7[$x] . "</strong>";
                                                                                                             echo"<br>";
                                                                                                             echo"<strong style='color: black'>" . $tiempos7[$x] . "</strong>";
                                                                                                             echo"<br>";
                                                                                                             for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                                                                 if (utf8_encode($materiasLLevadas7[$y]) == $materias7[$x]) {
                                                                                                                     echo "<strong style='color: black'>" . $repeticion7[$y] . "</strong>";
                                                                                                                     break;
                                                                                                                 }
                                                                                                             }
                                                                                                             $x++;
                                                                                                             ?>
                                                                                                    </div>  
                                                                                                </li>
                                                                                            </ul>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>

                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>

                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                        break;
                                    }
                                    ?>
                                    <!-------------------siguienteCodigo------------------>
                                    <?php
                                    for ($x = 0; $x < 6; $x++) {
                                        ?>
                                        <li >
                                            <div style=" height: 95px ; background-color:<?php
                                    for ($y = 0; $y < count($materiasLLevadas8); $y++) {
                                        if (utf8_encode($materiasLLevadas8[$y]) == $materias8[$x]) {
                                            echo $materiasColores8[$y];
                                            break;
                                        }
                                    }
                                        ?>">
                                                 <?php
                                                     echo "<strong style='color: black'>" . $materias8[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $creditos8[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $tiempos8[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo "<strong style='color: black'>" . $repeticion8[$x] . "</strong>";
                                                     $x++
                                                     ?>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div style=" height: 95px ; background-color:<?php
                                                 for ($y = 0; $y < count($materiasLLevadas8); $y++) {
                                                     if (utf8_encode($materiasLLevadas8[$y]) == $materias8[$x]) {
                                                         echo $materiasColores8[$y];
                                                         break;
                                                     }
                                                 }
                                                     ?>">
                                                         <?php
                                                             echo "<strong style='color: black'>" . $materias8[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $creditos8[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $tiempos8[$x] . "</strong>";
                                                             echo"<br>";

                                                             for ($y = 0; $y < count($materiasLLevadas8); $y++) {
                                                                 if (utf8_encode($materiasLLevadas8[$y]) == $materias8[$x]) {
                                                                     echo "<strong style='color: black'>" . $repeticion8[$y] . "</strong>";
                                                                     break;
                                                                 }
                                                             }
                                                             $x++;
                                                             ?>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div style=" height: 95px ; background-color:<?php
                                                         for ($y = 0; $y < count($materiasLLevadas8); $y++) {
                                                             if (utf8_encode($materiasLLevadas8[$y]) == $materias8[$x]) {
                                                                 echo $materiasColores8[$y];
                                                                 break;
                                                             }
                                                         }
                                                             ?>">
                                                                 <?php
                                                                     echo "<strong style='color: black'>" . $materias8[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $creditos8[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $tiempos8[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     for ($y = 0; $y < count($materiasLLevadas8); $y++) {
                                                                         if (utf8_encode($materiasLLevadas8[$y]) == $materias8[$x]) {
                                                                             echo "<strong style='color: black'>" . $repeticion8[$y] . "</strong>";
                                                                             break;
                                                                         }
                                                                     }
                                                                     $x++;
                                                                     ?>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div style=" height: 95px ; background-color:<?php
                                                                 for ($y = 0; $y < count($materiasLLevadas8); $y++) {
                                                                     if (utf8_encode($materiasLLevadas8[$y]) == $materias8[$x]) {
                                                                         echo $materiasColores8[$y];
                                                                         break;
                                                                     }
                                                                 }
                                                                     ?>">
                                                                         <?php
                                                                             echo "<strong style='color: black'>" . $materias8[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $creditos8[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $tiempos8[$x] . "</strong>";
                                                                             echo"<br>";

                                                                             for ($y = 0; $y < count($materiasLLevadas8); $y++) {
                                                                                 if (utf8_encode($materiasLLevadas8[$y]) == $materias8[$x]) {
                                                                                     echo "<strong style='color: black'>" . $repeticion8[$y] . "</strong>";
                                                                                     break;
                                                                                 }
                                                                             }
                                                                             $x++;
                                                                             ?>
                                                                    </div>
                                                                    <ul>
                                                                        <li>
                                                                            <div style=" height: 95px ; background-color:<?php
                                                                         for ($y = 0; $y < count($materiasLLevadas8); $y++) {
                                                                             if (utf8_encode($materiasLLevadas8[$y]) == $materias8[$x]) {
                                                                                 echo $materiasColores8[$y];
                                                                                 break;
                                                                             }
                                                                         }
                                                                             ?>">
                                                                                 <?php
                                                                                     echo "<strong style='color: black'>" . $materias8[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $creditos8[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $tiempos8[$x] . "</strong>";
                                                                                     echo"<br>";

                                                                                     for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                                         if (utf8_encode($materiasLLevadas7[$y]) == $materias8[$x]) {
                                                                                             echo "<strong style='color: black'>" . $repeticion8[$y] . "</strong>";
                                                                                             break;
                                                                                         }
                                                                                     }
                                                                                     $x++;
                                                                                     ?>
                                                                            </div>
                                                                            <ul>
                                                                                <li>
                                                                                    <div style=" height: 95px ; background-color:<?php
                                                                                 for ($y = 0; $y < count($materiasLLevadas8); $y++) {
                                                                                     if (utf8_encode($materiasLLevadas8[$y]) == $materias8[$x]) {
                                                                                         echo $materiasColores8[$y];
                                                                                         break;
                                                                                     }
                                                                                 }
                                                                                     ?>">
                                                                                         <?php
                                                                                             echo "<strong style='color: black'>" . $materias8[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $creditos8[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $tiempos8[$x] . "</strong>";
                                                                                             echo"<br>";

                                                                                             for ($y = 0; $y < count($materiasLLevadas8); $y++) {
                                                                                                 if (utf8_encode($materiasLLevadas8[$y]) == $materias8[$x]) {
                                                                                                     echo "<strong style='color: black'>" . $repeticion8[$y] . "</strong>";
                                                                                                     break;
                                                                                                 }
                                                                                             }
                                                                                             $x++;
                                                                                             ?>
                                                                                    </div>
                                                                                </li>

                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>

                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                        break;
                                    }
                                    ?>
                                    <!--9Semestre hay que colocar-->
                                    <!----------------siguientecodigo-->
                                    <?php
                                    for ($x = 0; $x < 6; $x++) {
                                        ?>
                                        <li >
                                            <div style=" height: 95px ; background-color:<?php
                                    for ($y = 0; $y < count($materiasLLevadas9); $y++) {
                                        if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                            echo $materiasColores9[$y];
                                            break;
                                        }
                                    }
                                        ?>">
                                                 <?php
                                                     echo "<strong style='color: black'>" . $materias9[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $creditos9[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo"<strong style='color: black'>" . $tiempos9[$x] . "</strong>";
                                                     echo"<br>";
                                                     echo "<strong style='color: black'>" . $repeticion9[$x] . "</strong>";
                                                     $x++
                                                     ?>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div style=" height: 95px ; background-color:<?php
                                                 for ($y = 0; $y < count($materiasLLevadas9); $y++) {
                                                     if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                                         echo $materiasColores9[$y];
                                                         break;
                                                     }
                                                 }
                                                     ?>">
                                                         <?php
                                                             echo "<strong style='color: black'>" . $materias9[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $creditos9[$x] . "</strong>";
                                                             echo"<br>";
                                                             echo"<strong style='color: black'>" . $tiempos9[$x] . "</strong>";
                                                             echo"<br>";

                                                             for ($y = 0; $y < count($materiasLLevadas7); $y++) {
                                                                 if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                                                     echo "<strong style='color: black'>" . $repeticion9[$y] . "</strong>";
                                                                     break;
                                                                 }
                                                             }
                                                             $x++;
                                                             ?>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div style=" height: 95px ; background-color:<?php
                                                         for ($y = 0; $y < count($materiasLLevadas9); $y++) {
                                                             if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                                                 echo $materiasColores9[$y];
                                                                 break;
                                                             }
                                                         }
                                                             ?>">
                                                                 <?php
                                                                     echo "<strong style='color: black'>" . $materias9[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $creditos9[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     echo"<strong style='color: black'>" . $tiempos9[$x] . "</strong>";
                                                                     echo"<br>";
                                                                     for ($y = 0; $y < count($materiasLLevadas9); $y++) {
                                                                         if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                                                             echo "<strong style='color: black'>" . $repeticion9[$y] . "</strong>";
                                                                             break;
                                                                         }
                                                                     }
                                                                     $x++;
                                                                     ?>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div style=" height: 95px ; background-color:<?php
                                                                 for ($y = 0; $y < count($materiasLLevadas9); $y++) {
                                                                     if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                                                         echo $materiasColores9[$y];
                                                                         break;
                                                                     }
                                                                 }
                                                                     ?>">
                                                                         <?php
                                                                             echo "<strong style='color: black'>" . $materias9[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $creditos9[$x] . "</strong>";
                                                                             echo"<br>";
                                                                             echo"<strong style='color: black'>" . $tiempos9[$x] . "</strong>";
                                                                             echo"<br>";

                                                                             for ($y = 0; $y < count($materiasLLevadas9); $y++) {
                                                                                 if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                                                                     echo "<strong style='color: black'>" . $repeticion9[$y] . "</strong>";
                                                                                     break;
                                                                                 }
                                                                             }
                                                                             $x++;
                                                                             ?>
                                                                    </div>
                                                                    <ul>
                                                                        <li>
                                                                            <div style=" height: 95px ; background-color:<?php
                                                                         for ($y = 0; $y < count($materiasLLevadas9); $y++) {
                                                                             if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                                                                 echo $materiasColores9[$y];
                                                                                 break;
                                                                             }
                                                                         }
                                                                             ?>">
                                                                                 <?php
                                                                                     echo "<strong style='color: black'>" . $materias9[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $creditos9[$x] . "</strong>";
                                                                                     echo"<br>";
                                                                                     echo"<strong style='color: black'>" . $tiempos9[$x] . "</strong>";
                                                                                     echo"<br>";

                                                                                     for ($y = 0; $y < count($materiasLLevadas9); $y++) {
                                                                                         if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                                                                             echo "<strong style='color: black'>" . $repeticion9[$y] . "</strong>";
                                                                                             break;
                                                                                         }
                                                                                     }
                                                                                     $x++;
                                                                                     ?>
                                                                            </div>
                                                                            <ul>
                                                                                <li>
                                                                                    <div style=" height: 95px ; background-color:<?php
                                                                                 for ($y = 0; $y < count($materiasLLevadas9); $y++) {
                                                                                     if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                                                                         echo $materiasColores9[$y];
                                                                                         break;
                                                                                     }
                                                                                 }
                                                                                     ?>">
                                                                                         <?php
                                                                                             echo "<strong style='color: black'>" . $materias9[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $creditos9[$x] . "</strong>";
                                                                                             echo"<br>";
                                                                                             echo"<strong style='color: black'>" . $tiempos9[$x] . "</strong>";
                                                                                             echo"<br>";

                                                                                             for ($y = 0; $y < count($materiasLLevadas9); $y++) {
                                                                                                 if (utf8_encode($materiasLLevadas9[$y]) == $materias9[$x]) {
                                                                                                     echo "<strong style='color: black'>" . $repeticion9[$y] . "</strong>";
                                                                                                     break;
                                                                                                 }
                                                                                             }
                                                                                             $x++;
                                                                                             ?>
                                                                                    </div>
                                                                                </li>

                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>

                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                        break;
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                        </li>
                        </ul>
                        </li>
                        </ul> 
                    </div>
                    <div id="chart" class="orgChart"></div>

                    <script>
            jQuery(document).ready(function() {

                /* Custom jQuery for the example */
                $("#show-list").click(function(e) {
                    e.preventDefault();

                    $('#list-html').toggle('fast', function() {
                        if ($(this).is(':visible')) {
                            $('#show-list').text('Hide underlying list.');
                            $(".topbar").fadeTo('fast', 0.9);
                        } else {
                            $('#show-list').text('Show underlying list.');
                            $(".topbar").fadeTo('fast', 1);
                        }
                    });
                });

                $('#list-html').text($('#org').html());

                $("#org").bind("DOMSubtreeModified", function() {
                    $('#list-html').text('');

                    $('#list-html').text($('#org').html());

                    prettyPrint();
                });
            });
                    </script>

                </body>

            </div>
            <?php include './plantillaFooter.php'; ?>
        </center>
    </div>
</html>