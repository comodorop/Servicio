<?php

include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$tutor = $_GET["tutor"];
$sql = "SELECT * FROM cuestionariotutorias c
inner join maestros m on c.idTutor = m. id
where idTutor = $tutor";
$datos = mysql_query($sql, $cn->Conectarse());
$respuesta1a = 0;
$respuesta1b = 0;
$respuesta1c = 0;
$respuesta1d = 0;
$respuesta1e = 0;
$respuesta2a = 0;
$respuesta2b = 0;
$respuesta2c = 0;
$respuesta2d = 0;
$respuesta2e = 0;
$respuesta3a = 0;
$respuesta3b = 0;
$respuesta3c = 0;
$respuesta3d = 0;
$respuesta3e = 0;
$respuesta4a = 0;
$respuesta4b = 0;
$respuesta4c = 0;
$respuesta4d = 0;
$respuesta4e = 0;
$respuesta5a = 0;
$respuesta5b = 0;
$respuesta5c = 0;
$respuesta5d = 0;
$respuesta5e = 0;
$respuesta6a = 0;
$respuesta6b = 0;
$respuesta6c = 0;
$respuesta6d = 0;
$respuesta6e = 0;
$respuesta7a = 0;
$respuesta7b = 0;
$respuesta7c = 0;
$respuesta7d = 0;
$respuesta7e = 0;
$respuesta8a = 0;
$respuesta8b = 0;
$respuesta8c = 0;
$respuesta8d = 0;
$respuesta8e = 0;
$respuesta9a = 0;
$respuesta9b = 0;
$respuesta9c = 0;
$respuesta9d = 0;
$respuesta9e = 0;
$respuesta10a = 0;
$respuesta10b = 0;
$respuesta10c = 0;
$respuesta10d = 0;
$respuesta10e = 0;
$respuesta11a = 0;
$respuesta11b = 0;
$respuesta11c = 0;
$respuesta11d = 0;
$respuesta11e = 0;
$respuesta12a = 0;
$respuesta12b = 0;
$respuesta12c = 0;
$respuesta12d = 0;
$respuesta12e = 0;
$respuesta13a = 0;
$respuesta13b = 0;
$respuesta13c = 0;
$respuesta13d = 0;
$respuesta13e = 0;
$respuesta14a = 0;
$respuesta14b = 0;
$respuesta14c = 0;
$respuesta14d = 0;
$respuesta14e = 0;
$respuesta15a = 0;
$respuesta15b = 0;
$respuesta15c = 0;
$respuesta15d = 0;
$respuesta15e = 0;
$respuesta16a = 0;
$respuesta16b = 0;
$respuesta16c = 0;
$respuesta16d = 0;
$respuesta16e = 0;
$respuesta17a = 0;
$respuesta17b = 0;
$respuesta17c = 0;
$respuesta17d = 0;
$respuesta17e = 0;
$respuesta18a = 0;
$respuesta18b = 0;
$respuesta18c = 0;
$respuesta18d = 0;
$respuesta18e = 0;
$respuesta19a = 0;
$respuesta19b = 0;
$respuesta19c = 0;
$respuesta19d = 0;
$respuesta19e = 0;
$respuesta20a = 0;
$respuesta20b = 0;
$respuesta20c = 0;
$respuesta20d = 0;
$respuesta20e = 0;
$funciona = mysql_affected_rows();
if ($funciona > 0) {
    While ($rs = mysql_fetch_array($datos)) {

        foreach ($rs as $campo => $valor) {
            if ($campo == "pregunta1") {
                if ($valor == "1") {
                    $respuesta1a++;
                }
                if ($valor == "2") {
                    $respuesta1b++;
                }
                if ($valor == "3") {
                    $respuesta1c++;
                }
                if ($valor == "4") {
                    $respuesta1d++;
                }
                if ($valor == "5") {
                    $respuesta1e++;
                }
            }

            if ($campo == "pregunta2") {
                if ($valor == "1") {
                    $respuesta2a++;
                }
                if ($valor == "2") {
                    $respuesta2b++;
                }
                if ($valor == "3") {
                    $respuesta2c++;
                }
                if ($valor == "4") {
                    $respuesta2d++;
                }
                if ($valor == "5") {
                    $respuesta2e++;
                }
            }
            if ($campo == "pregunta3") {
                if ($valor == "1") {
                    $respuesta3a++;
                }
                if ($valor == "2") {
                    $respuesta3b++;
                }
                if ($valor == "3") {
                    $respuesta3c++;
                }
                if ($valor == "4") {
                    $respuesta3d++;
                }
                if ($valor == "5") {
                    $respuesta3e++;
                }
            }
            if ($campo == "pregunta4") {
                if ($valor == "1") {
                    $respuesta4a++;
                }
                if ($valor == "2") {
                    $respuesta4b++;
                }
                if ($valor == "3") {
                    $respuesta4c++;
                }
                if ($valor == "4") {
                    $respuesta4d++;
                }
                if ($valor == "5") {
                    $respuesta4e++;
                }
            }
            if ($campo == "pregunta5") {
                if ($valor == "1") {
                    $respuesta5a++;
                }
                if ($valor == "2") {
                    $respuesta5b++;
                }
                if ($valor == "3") {
                    $respuesta5c++;
                }
                if ($valor == "4") {
                    $respuesta5d++;
                }
                if ($valor == "5") {
                    $respuesta5e++;
                }
            }
            if ($campo == "pregunta6") {
                if ($valor == "1") {
                    $respuesta6a++;
                }
                if ($valor == "2") {
                    $respuesta6b++;
                }
                if ($valor == "3") {
                    $respuesta6c++;
                }
                if ($valor == "4") {
                    $respuesta6d++;
                }
                if ($valor == "5") {
                    $respuesta6e++;
                }
            }
            if ($campo == "pregunta7") {
                if ($valor == "1") {
                    $respuesta7a++;
                }
                if ($valor == "2") {
                    $respuesta7b++;
                }
                if ($valor == "3") {
                    $respuesta7c++;
                }
                if ($valor == "4") {
                    $respuesta7d++;
                }
                if ($valor == "5") {
                    $respuesta7e++;
                }
            }
            if ($campo == "pregunta8") {
                if ($valor == "1") {
                    $respuesta8a++;
                }
                if ($valor == "2") {
                    $respuesta8b++;
                }
                if ($valor == "3") {
                    $respuesta8c++;
                }
                if ($valor == "4") {
                    $respuesta8d++;
                }
                if ($valor == "5") {
                    $respuesta8e++;
                }
            }
            if ($campo == "pregunta9") {
                if ($valor == "1") {
                    $respuesta9a++;
                }
                if ($valor == "2") {
                    $respuesta9b++;
                }
                if ($valor == "3") {
                    $respuesta9c++;
                }
                if ($valor == "4") {
                    $respuesta9d++;
                }
                if ($valor == "5") {
                    $respuesta9e++;
                }
            }
            if ($campo == "pregunta10") {
                if ($valor == "1") {
                    $respuesta10a++;
                }
                if ($valor == "2") {
                    $respuesta10b++;
                }
                if ($valor == "3") {
                    $respuesta10c++;
                }
                if ($valor == "4") {
                    $respuesta10d++;
                }
                if ($valor == "5") {
                    $respuesta10e++;
                }
            }
            if ($campo == "pregunta11") {
                if ($valor == "1") {
                    $respuesta11a++;
                }
                if ($valor == "2") {
                    $respuesta11b++;
                }
                if ($valor == "3") {
                    $respuesta11c++;
                }
                if ($valor == "4") {
                    $respuesta11d++;
                }
                if ($valor == "5") {
                    $respuesta11e++;
                }
            }
            if ($campo == "pregunta12") {
                if ($valor == "1") {
                    $respuesta12a++;
                }
                if ($valor == "2") {
                    $respuesta12b++;
                }
                if ($valor == "3") {
                    $respuesta12c++;
                }
                if ($valor == "4") {
                    $respuesta12d++;
                }
                if ($valor == "5") {
                    $respuesta12e++;
                }
            }
            if ($campo == "pregunta13") {
                if ($valor == "1") {
                    $respuesta13a++;
                }
                if ($valor == "2") {
                    $respuesta13b++;
                }
                if ($valor == "3") {
                    $respuesta13c++;
                }
                if ($valor == "4") {
                    $respuesta13d++;
                }
                if ($valor == "5") {
                    $respuesta13e++;
                }
            }
            if ($campo == "pregunta14") {
                if ($valor == "1") {
                    $respuesta14a++;
                }
                if ($valor == "2") {
                    $respuesta14b++;
                }
                if ($valor == "3") {
                    $respuesta14c++;
                }
                if ($valor == "4") {
                    $respuesta14d++;
                }
                if ($valor == "5") {
                    $respuesta14e++;
                }
            }
            if ($campo == "pregunta15") {
                if ($valor == "1") {
                    $respuesta15a++;
                }
                if ($valor == "2") {
                    $respuesta15b++;
                }
                if ($valor == "3") {
                    $respuesta15c++;
                }
                if ($valor == "4") {
                    $respuesta15d++;
                }
                if ($valor == "5") {
                    $respuesta15e++;
                }
            }
            if ($campo == "pregunta16") {
                if ($valor == "1") {
                    $respuesta16a++;
                }
                if ($valor == "2") {
                    $respuesta16b++;
                }
                if ($valor == "3") {
                    $respuesta16c++;
                }
                if ($valor == "4") {
                    $respuesta16d++;
                }
                if ($valor == "5") {
                    $respuesta16e++;
                }
            }
            if ($campo == "pregunta17") {
                if ($valor == "1") {
                    $respuesta17a++;
                }
                if ($valor == "2") {
                    $respuesta17b++;
                }
                if ($valor == "3") {
                    $respuesta17c++;
                }
                if ($valor == "4") {
                    $respuesta17d++;
                }
                if ($valor == "5") {
                    $respuesta17e++;
                }
            }
            if ($campo == "pregunta18") {
                if ($valor == "1") {
                    $respuesta18a++;
                }
                if ($valor == "2") {
                    $respuesta18b++;
                }
                if ($valor == "3") {
                    $respuesta18c++;
                }
                if ($valor == "4") {
                    $respuesta18d++;
                }
                if ($valor == "5") {
                    $respuesta18e++;
                }
            }
            if ($campo == "pregunta19") {
                if ($valor == "1") {
                    $respuesta19a++;
                }
                if ($valor == "2") {
                    $respuesta19b++;
                }
                if ($valor == "3") {
                    $respuesta19c++;
                }
                if ($valor == "4") {
                    $respuesta19d++;
                }
                if ($valor == "5") {
                    $respuesta19e++;
                }
            }
            if ($campo == "pregunta20") {
                if ($valor == "1") {
                    $respuesta20a++;
                }
                if ($valor == "2") {
                    $respuesta20b++;
                }
                if ($valor == "3") {
                    $respuesta20c++;
                }
                if ($valor == "4") {
                    $respuesta20d++;
                }
                if ($valor == "5") {
                    $respuesta20e++;
                }
            }
        }
    }
    $respuesta1 = (($respuesta1a * 5 + $respuesta1b * 4 + $respuesta1c * 3 + $respuesta1d * 2 + $respuesta1e * 1) / 5);
    $respuesta2 = (($respuesta2a * 5 + $respuesta2b * 4 + $respuesta2c * 3 + $respuesta2d * 2 + $respuesta2e * 1) / 5);
    $respuesta3 = (($respuesta3a * 5 + $respuesta3b * 4 + $respuesta3c * 3 + $respuesta3d * 2 + $respuesta3e * 1) / 5);
    $respuesta4 = (($respuesta4a * 5 + $respuesta4b * 4 + $respuesta4c * 3 + $respuesta4d * 2 + $respuesta4e * 1) / 5);
    $respuesta5 = (($respuesta5a * 5 + $respuesta5b * 4 + $respuesta5c * 3 + $respuesta5d * 2 + $respuesta5e * 1) / 5);
    $respuesta6 = (($respuesta6a * 5 + $respuesta6b * 4 + $respuesta6c * 3 + $respuesta6d * 2 + $respuesta6e * 1) / 5);
    $respuesta7 = (($respuesta7a * 5 + $respuesta7b * 4 + $respuesta7c * 3 + $respuesta7d * 2 + $respuesta7e * 1) / 5);
    $respuesta8 = (($respuesta8a * 5 + $respuesta8b * 4 + $respuesta8c * 3 + $respuesta8d * 2 + $respuesta8e * 1) / 5);
    $respuesta9 = (($respuesta9a * 5 + $respuesta9b * 4 + $respuesta9c * 3 + $respuesta9d * 2 + $respuesta9e * 1) / 5);
    $respuesta10 = (($respuesta10a * 5 + $respuesta10b * 4 + $respuesta10c * 3 + $respuesta10d * 2 + $respuesta10e * 1) / 5);
    $respuesta11 = (($respuesta11a * 5 + $respuesta11b * 4 + $respuesta11c * 3 + $respuesta11d * 2 + $respuesta11e * 1) / 5);
    $respuesta12 = (($respuesta12a * 5 + $respuesta12b * 4 + $respuesta12c * 3 + $respuesta12d * 2 + $respuesta12e * 1) / 5);
    $respuesta13 = (($respuesta13a * 5 + $respuesta13b * 4 + $respuesta13c * 3 + $respuesta13d * 2 + $respuesta13e * 1) / 5);
    $respuesta14 = (($respuesta14a * 5 + $respuesta14b * 4 + $respuesta14c * 3 + $respuesta14d * 2 + $respuesta14e * 1) / 5);
    $respuesta15 = (($respuesta15a * 5 + $respuesta15b * 4 + $respuesta15c * 3 + $respuesta15d * 2 + $respuesta15e * 1) / 5);
    $respuesta16 = (($respuesta16a * 5 + $respuesta16b * 4 + $respuesta16c * 3 + $respuesta16d * 2 + $respuesta16e * 1) / 5);
    $respuesta17 = (($respuesta17a * 5 + $respuesta17b * 4 + $respuesta17c * 3 + $respuesta17d * 2 + $respuesta17e * 1) / 5);
    $respuesta18 = (($respuesta18a * 5 + $respuesta18b * 4 + $respuesta18c * 3 + $respuesta18d * 2 + $respuesta18e * 1) / 5);
    $respuesta19 = (($respuesta19a * 5 + $respuesta19b * 4 + $respuesta19c * 3 + $respuesta19d * 2 + $respuesta19e * 1) / 5);
    $respuesta20 = (($respuesta20a * 5 + $respuesta20b * 4 + $respuesta20c * 3 + $respuesta20d * 2 + $respuesta20e * 1) / 5);

    
    
    $resp1= (($respuesta1a + $respuesta2a + $respuesta3a + $respuesta4a + $respuesta5a + $respuesta6a + $respuesta7a + $respuesta8a + $respuesta9a + $respuesta10a + $respuesta11a + $respuesta12a + $respuesta13a + $respuesta14a + $respuesta15a + $respuesta16a + $respuesta17a + $respuesta18a + $respuesta19a + $respuesta20a) /20);
    $resp2= (($respuesta1b + $respuesta2b + $respuesta3b + $respuesta4b + $respuesta5b + $respuesta6b + $respuesta7b + $respuesta8b + $respuesta9b + $respuesta10b + $respuesta11b + $respuesta12b + $respuesta13b + $respuesta14b + $respuesta15b + $respuesta16b + $respuesta17b + $respuesta18b + $respuesta19b + $respuesta20b) /20);
$resp3= (($respuesta1c + $respuesta2c + $respuesta3c + $respuesta4c + $respuesta5c + $respuesta6c + $respuesta7c + $respuesta8c + $respuesta9c + $respuesta10c + $respuesta11c + $respuesta12c + $respuesta13c + $respuesta14c + $respuesta15c + $respuesta16c + $respuesta17c + $respuesta18c + $respuesta19c + $respuesta20c) /20);
$resp4= (($respuesta1d + $respuesta2d + $respuesta3d + $respuesta4d + $respuesta5d + $respuesta6d + $respuesta7d + $respuesta8d + $respuesta9d + $respuesta10d + $respuesta11d + $respuesta12d + $respuesta13d + $respuesta14d + $respuesta15d + $respuesta16d + $respuesta17d + $respuesta18d + $respuesta19d + $respuesta20d) /20);
$resp5= (($respuesta1e + $respuesta2e + $respuesta3e + $respuesta4e + $respuesta5e + $respuesta6e + $respuesta7e + $respuesta8e + $respuesta9e + $respuesta10e + $respuesta11e + $respuesta12e + $respuesta13e + $respuesta14e + $respuesta15e + $respuesta16e + $respuesta17e + $respuesta18e + $respuesta19e + $respuesta20e) /20);

    echo "  <table  class= 'table table-hover'>
                      <th></th><td>a</td><td>b</td><td>c</td><td>d</td><td>e</td><td>Promedio</td>
                        <tr><th>Muestra el tutor buena disposición para atender a los alumnos</th><td>$respuesta1a</td><td>$respuesta1b</td><td>$respuesta1c</td><td>$respuesta1d</td><td>$respuesta1e</td><td>$respuesta1</td></tr>
<tr><th>La cordialidad y capacidad del tutor logra crear un clima de confianza para que el alumno pueda exponer sus problemas</th><td>$respuesta2a</td><td>$respuesta2b</td><td>$respuesta2c</td><td>$respuesta2d</td><td>$respuesta2e</td><td>$respuesta2</td></tr>
    <tr><th>Trata el tutor con respeto y atenciíon a los alumnos</th><td>$respuesta3a</td><td>$respuesta3b</td><td>$respuesta3c</td><td>$respuesta3d</td><td>$respuesta3e</td><td>$respuesta3</td></tr>
        <tr><th>Muestra el tutor interes en los problemas academicos y personales que afectan el rendimiento de los alumnos</th><td>$respuesta4a</td><td>$respuesta4b</td><td>$respuesta4c</td><td>$respuesta4d</td><td>$respuesta4e</td><td>$respuesta4</td></tr>
            <tr><th>Muestra el tutor capacidad para escuchar los problemas de los alumnos</th><td>$respuesta5a</td><td>$respuesta5b</td><td>$respuesta5c</td><td>$respuesta5d</td><td>$respuesta5e</td><td>$respuesta5</td></tr>
                <tr><th>Muestra el tutor disposición a mantener una comunicación permanente con el alumno</th><td>$respuesta6a</td><td>$respuesta6b</td><td>$respuesta6c</td><td>$respuesta6d</td><td>$respuesta6e</td><td>$respuesta6</td></tr>
                    <tr><th>Tiene el tutor capacidad para resolver dudas académicas del alumno</th><td>$respuesta7a</td><td>$respuesta7b</td><td>$respuesta7c</td><td>$respuesta7d</td><td>$respuesta7e</td><td>$respuesta7</td></tr>
                        <tr><th>Tiene el tutor capacidad para orientar al alumno en metodología y ténicas de estudio</th><td>$respuesta8a</td><td>$respuesta8b</td><td>$respuesta8c</td><td>$respuesta8d</td><td>$respuesta8e</td><td>$respuesta8</td></tr>
                            <tr><th>Tiene el tutor capacidad para diagnosticar las dificultades y realizar las acciones pertinentes para resolverlas</th><td>$respuesta9a</td><td>$respuesta9b</td><td>$respuesta9c</td><td>$respuesta9d</td><td>$respuesta9e</td><td>$respuesta9</td></tr>
                                <tr><th>Tiene el tutor capacidad para estimular el estudio independiente</th><td>$respuesta10a</td><td>$respuesta10b</td><td>$respuesta10c</td><td>$respuesta10d</td><td>$respuesta10e</td><td>$respuesta10</td></tr>
                                    <tr><th>Posee el tutor formación profesional en su especialidad</th><td>$respuesta11a</td><td>$respuesta11b</td><td>$respuesta11c</td><td>$respuesta11d</td><td>$respuesta11e</td><td>$respuesta11</td></tr>
                                        <tr><th>Posee el tutor dominio de méodos pedagógicos para la atención individualizada o grupal</th><td>$respuesta12a</td><td>$respuesta12b</td><td>$respuesta12c</td><td>$respuesta12d</td><td>$respuesta12e</td><td>$respuesta12</td></tr>
                                            <tr><th>Es fácil localizar al tutor que tiene asignado</th><td>$respuesta13a</td><td>$respuesta13b</td><td>$respuesta13c</td><td>$respuesta13d</td><td>$respuesta13e</td><td>$respuesta13</td></tr>
                                                <tr><th>El tutor conoce suficientemente bien la normatividad institucional para aconsejarle las opciones adecuadas a sus problemas escolares</th><td>$respuesta14a</td><td>$respuesta14b</td><td>$respuesta14c</td><td>$respuesta14d</td><td>$respuesta14e</td><td>$respuesta14</td></tr>
                                                    <tr><th>La orientación recibida de parte del tutor le ha permitido realizar una selección adecuada de cursos y créditos</th><td>$respuesta15a</td><td>$respuesta15b</td><td>$respuesta15c</td><td>$respuesta15d</td><td>$respuesta15e</td><td>$respuesta15</td></tr>
                                                        <tr><th>El tutor lo canaliza a las instancias adecuadas cuando tiene algún problema que rebasa su área de acción. Solamente responda esta pregunta si lo ha requerido</th><td>$respuesta16a</td><td>$respuesta16b</td><td>$respuesta16c</td><td>$respuesta16d</td><td>$respuesta16e</td><td>$respuesta16</td></tr>
                                                            <tr><th>Su participación en el programa de tutoría ha mejorado su desempeño académico</th><td>$respuesta17a</td><td>$respuesta17b</td><td>$respuesta17c</td><td>$respuesta17d</td><td>$respuesta17e</td><td>$respuesta17</td></tr>
                                                                <tr><th>Su integración al Tecnológico ha mejorado con el programa de tutoría</th><td>$respuesta18a</td><td>$respuesta18b</td><td>$respuesta18c</td><td>$respuesta18d</td><td>$respuesta18e</td><td>$respuesta18</td></tr>
                                                                   <tr><th>Es satisfactorio el programa de tutoría</th><td>$respuesta19a</td><td>$respuesta19b</td><td>$respuesta19c</td><td>$respuesta19d</td><td>$respuesta19e</td><td>$respuesta19</td></tr>
                                                                       <tr><th>El tutor que le fue asignado es adecuado</th><td>$respuesta20a</td><td>$respuesta20b</td><td>$respuesta20c</td><td>$respuesta20d</td><td>$respuesta20e</td><td>$respuesta20</td></tr>
<tr><th>Promedio:</th><td>$resp1</td><td>$resp2</td><td>$resp3</td><td>$resp4</td><td>$resp5</td></tr>
</table>";
} else {
    echo"<script> alertify.alert('<b>No hay resultados de la encuesta tutorias del ciclo escolar actual</b> ', function() {
                    location.href = 'index.php';  
                }); </script>";
}
?>
