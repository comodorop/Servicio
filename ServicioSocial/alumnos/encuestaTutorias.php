<?php
session_start();
include './validacionseSessionAlumnos.php';
include '../Dao/DaoJoel.php';
$dao = new DaoJoel();
$validacion = new validacionseSessionAlumnos();
$validacion->verificacionDeLogueAlumnos();
$resp = $dao->dameMenu2($_SESSION['UsuarioAlumno']);
if ($resp == 1) {
    echo "
        <script>
        document.location.href='../alumnos/index.php';
        alert(\"Ya has contestado la encuesta Socioeconómica.\");
        </script>
         ";
} else {
    include './plantilla.php';
    ?>
    <!DOCTYPE html> 
    <html lang="es">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <script>
                $(function() {
                    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
                });
            </script>
            <style>
                table {
                    width: 50%;
                    font-size: 0.9em;
                }
                table caption {
                    color: #555;
                    font-style: italic;
                    margin-bottom: 8px;
                }
                table tr:last-child {
                    background:#456789; 
                    color:#fff;
                }
                th {
                    text-align: left;
                }
                td:last-child, th:last-child {
                    text-align:left;
                }
                td, th {
                    padding: 6px 12px;
                }
                tr:nth-child(odd), tr:nth-child(odd) {
                    background: #eee;
                }
                tr:nth-child(even) {
                    background: #ddd;
                }
                tr:first-child, tr:first-child {
                    background: #283a59;
                    color:white;
                }
                table td:empty {
                    background:white;
                }

                input#textboxo{
                    border:0;
                    -webkit-box-shadow:none;
                    box-shadow:none;
                    width:100%;
                    float:left;
                }
                .stlconten{
                    background-color: white;
                    margin-top: -20px
                }
            </style>
        </head>
        <body>
            <div class="container stlconten" > 
                <div class="span12" style="margin: auto">
                    <form name="cuestionario" action="guardarEncuesta.php" style="margin: 3% 3% 3% 3%">
                        <h3>Encuesta Socioeconómica</h3>
                        <div class="well well-sm">
                            <dl>
                                <dt>
                                <h6>1.- &iquest;Con quíen vives?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="LugarViviendo" value="Padre" id="RadioGroup1_0" onClick="opcion1.disabled = true">
                                    Padre<br>
                                    <input type="radio" name="LugarViviendo" value="Madre" id="RadioGroup1_1" onClick="opcion1.disabled = true">
                                    Madre<br> 
                                    <input type="radio" name="LugarViviendo" value="Ambos" id="RadioGroup1_2" onClick="opcion1.disabled = true">
                                    Ambos<br>
                                    <input type="radio" name="LugarViviendo" value="Otro" id="RadioGroup1_3" onClick="opcion1.disabled = false">
                                    Otro (especifica)<input  name="opcion1" type="text" disabled="disabled"><br>
                                </dd>
                                <dt>
                                <h6>2.- &iquest;Cuál es el estado civil de tus padres?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="EstCivilPadre" value="Casados" id="RadioGroup2_0" onClick="opcion2.disabled = true">
                                    Casados<br>
                                    <input type="radio" name="EstCivilPadre" value="Divorciados" id="RadioGroup2_1" onclick="opcion2.disabled = true">
                                    Divorciados<br>
                                    <input type="radio" name="EstCivilPadre" value="Union libre" id="RadioGroup2_2" onclick="opcion2.disabled = true">
                                    Unión Libre<br>
                                    <input type="radio" name="EstCivilPadre" value="Otro" id="RadioGroup2_3" onclick="opcion2.disabled = false">
                                    Otro (especifica)<input name="opcion2" type="text" disabled="disabled"><br>
                                </dd>

                                <dt>
                                <h6>3.- Que escolaridad tiene tu:</h6>
                                <h6>3.1.- Padre:</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="EscPadre" value="Primaria" id="RadioGroup3_0" onClick="opcion3.disabled = true">
                                    Primaria<br>
                                    <input type="radio" name="EscPadre" value="Secundaria" id="RadioGroup3_1" onclick="opcion3.disabled = true">
                                    Secundaria<br> 
                                    <input type="radio" name="EscPadre" value="Bachillerato" id="RadioGroup3_2" onclick="opcion3.disabled = true">
                                    Bachillerato<br>
                                    <input type="radio" name="EscPadre" value="Profesional" id="RadioGroup3_3" onclick="opcion3.disabled = true">
                                    Profesional<br> 
                                    <input type="radio" name="EscPadre" value="Otro" id="RadioGroup3_4" onclick="opcion3.disabled = false">
                                    Otro (especifica) 
                                    <input name="opcion3" type="text" disabled="disabled"><br>
                                </dd>
                                <dt>
                                <h6>3.2.- Madre:</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="EscMadre" value="Primaria" id="RadioGroup4_0" onClick="opcion3y2.disabled = true">
                                    Primaria<br>
                                    <input type="radio" name="EscMadre" value="Secundaria" id="RadioGroup4_1" onclick="opcion3y2.disabled = true">
                                    Secundaria<br>
                                    <input type="radio" name="EscMadre" value="Bachillerato" id="RadioGroup4_2" onclick="opcion3y2.disabled = true">
                                    Bachillerato<br>
                                    <input type="radio" name="EscMadre" value="Profesional" id="RadioGroup4_3" onclick="opcion3y2.disabled = true">
                                    Profesional<br> 
                                    <input type="radio" name="EscMadre" value="Otro" id="RadioGroup4_4" onclick="opcion3y2.disabled = false">
                                    Otro (especifica) 
                                    <input name="opcion3y2" type="text" disabled="disabled"><br>
                                </dd>
                                <dt>
                                <h6>4.- &iquest;Cuánto es el ingreso ecónomico familiar mensual aproximado de tu familia?</h6>
                                </dt>
                                <dd>
                                    <h6>$<input required min="0" type="number" name="IngresosMenFam"></h6>
                                </dd>
                                <dt>
                                <h6>5.- &iquest;Cuantos hermanos/as son en tu familia incluyéndote?</h6>
                                </dt>
                                <dd>
                                    <input required min="0" type="number" name="NumHermanos"><br>
                                    <!--                AGREGADO-->
                                </dd>
                                <dt>
                                <h6>6.- &iquest;Qué lugar ocupas entre tus hermanos?</h6>
                                </dt>
                                <dd>
                                    <h6><input required min="0" type="number" name="txtLugarOcupas"></h6>
                                    <!--                AGREGADO-->
                                </dd>
                                <dt>
                                <h6>7.- &iquest;Con quién platicas cuando tienes un problema personal?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="PerPlaticar" value="Padre" id="RadioGroup5_0" onClick="opcion6.disabled = true">
                                    Padre<br>
                                    <input type="radio" name="PerPlaticar" value="Madre" id="RadioGroup5_1" onclick="opcion6.disabled = true">
                                    Madre<br> 
                                    <input type="radio" name="PerPlaticar" value="Ambos" id="RadioGroup5_2" onclick="opcion6.disabled = true">
                                    Ambos<br>
                                    <input type="radio" name="PerPlaticar" value="Hermanos" id="RadioGroup5_3" onclick="opcion6.disabled = true">
                                    Hermanos<br> 
                                    <input type="radio" name="PerPlaticar" value="Otro" id="RadioGroup5_4" onclick="opcion6.disabled = false">
                                    Otro (Especifica)<input name="opcion6" type="text" disabled="disabled">  <br>
                                </dd>
                                <dt>
                                <h6>8.- Como te llevas con tu:</h6>
                                <h6>8.1.- Padre</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="RelacionPadre" value="Bien" id="RadioGroup6_0" onClick="opcion6.disabled = true">
                                    Bien<br>
                                    <input type="radio" name="RelacionPadre" value="Regular" id="RadioGroup6_1" onclick="opcion6.disabled = true">
                                    Regular<br>
                                    <input type="radio" name="RelacionPadre" value="Mal" id="RadioGroup6_2" onclick="opcion6.disabled = true">
                                    Mal<br>
                                    <input type="radio" name="RelacionPadre" value="No Convivo" id="RadioGroup6_3" onclick="opcion6.disabled = true">
                                    No convivo
                                    <br>
                                </dd>
                                <dt>
                                <h6>8.2.- Madre</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="RelacionMadre" value="Bien" id="RadioGroup7_0" onClick="opcion6y2.disabled = true">
                                    Bien<br>
                                    <input type="radio" name="RelacionMadre" value="Regular" id="RadioGroup7_1" onclick="opcion6y2.disabled = true">
                                    Regular<br>
                                    <input type="radio" name="RelacionMadre" value="Mal" id="RadioGroup7_2" onclick="opcion6y2.disabled = true">
                                    Mal<br>
                                    <input type="radio" name="RelacionMadre" value="No Convivo" id="RadioGroup7_3" onclick="opcion6y2.disabled = true">
                                    No convivo
                                    <br>
                                </dd>

                                <dt>
                                <h6>9.- &iquest;Quien sostiene econ&oacute;micamente tus estudios?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="FuenteIngreso" value="Padre" id="RadioGroup9_0" onClick="opcion7.disabled = true">
                                    Padre<br>
                                    <input type="radio" name="FuenteIngreso" value="Madre" id="RadioGroup9_1" onclick="opcion7.disabled = true">
                                    Madre<br> 
                                    <input type="radio" name="FuenteIngreso" value="Ambos" id="RadioGroup9_2" onclick="opcion7.disabled = true">
                                    Ambos<br>
                                    <input type="radio" name="FuenteIngreso" value="Hermanos/as" id="RadioGroup9_3" onclick="opcion7.disabled = true">
                                    Hermanos/as<br>
                                    <input type="radio" name="FuenteIngreso" value="Otro" id="RadioGroup9_4" onclick="opcion7.disabled = false">
                                    Otro (Especifica)<input name="opcion7" type="text" disabled="disabled"><br>
                                </dd>

                                <dt>
                                <h6>10.- Menciona las escuelas donde has estudiado el bachillerato, indicando los grados estudiados en caso de haber estudiado en más de una escuela.</h6>
                                </dt>
                                <dd>
                                    <table width="400" border="0" cellspacing="0" cellpadding="5">
                                        <tr>
                                            <th width="120" scope="col"><h6>Nombre de la escuela</h6></th>
                                        <th width="120" scope="col"><h6>Estado donde se ubica</h6></th>
                                        <th width="120" scope="col"><h6>Grado cursado</h6></th>
                                        </tr>
                                        <tr>
                                            <td><input id="textboxo" type="text" name="txtEscuela1" ></td>
                                            <td><input id="textboxo" type="text" name="txtEstado1" ></td>
                                            <td><input id="textboxo" type="text" name="txtGrado1" ></td>
                                        </tr>
                                        <tr>
                                            <td><input id="textboxo" type="text" name="txtEscuela2" ></td>
                                            <td><input id="textboxo" type="text" name="txtEstado2" ></td>
                                            <td><input id="textboxo" type="text" name="txtGrado2" ></td>
                                        </tr>
                                        <tr>
                                            <td><input id="textboxo" type="text" name="txtEscuela3" ></td>
                                            <td><input id="textboxo" type="text" name="txtEstado3" ></td>
                                            <td><input id="textboxo" type="text" name="txtGrado3" ></td>
                                        </tr>
                                    </table>
                                </dd>
                                <dt>
                                <!--                AGREGADO-->
                                <h6>11.- &iquest;Que especialidad llevaste en la preparatoria?</h6>
                                </dt>
                                <dd>
                                    <input required  type="text" name="txtEspecialidad"><br>
                                    <!--                AGREGADO-->
                                </dd>
                                <dt>
                                <!--                AGREGADO-->
                                <h6>12.- &iquest;Cual fue tu promedio final de la preparatoria?</h6>
                                </dt>
                                <dd>
                                    <input required min="0" type="number" name="txtPromedio"><br>
                                    <!--                AGREGADO-->
                                </dd>
                                <dt>
                                <h6>13.- &iquest;Que materias te gustan más?</h6>
                                <dt>
                                <dd>
                                    <input required  type="text" name="HabMaterias"><br>
                                </dd>

                                <dt>
                                <h6>14.- &iquest;Realizas otros estudios fuera de tecnol&oacute;gico?</h6>
                                </dt>
                                <dd>
                                    <input required  type="radio" name="EstudiosExtTec" value="Si" id="RadioGroup10_0" onClick="CualExtTec.disabled = false">
                                    Si (especifica)
                                    <!--Cuadro de texto-->
                                    <input name="CualExtTec" type="text" disabled="disabled"><br>  
                                    <input type="radio" name="EstudiosExtTec" value="No" id="RadioGroup10_1" onclick="CualExtTec.disabled = true">
                                    No
                                    <br>
                                </dd>
                                <dt>
                                <h6>15.- Marca las actividades que realices como pasatiempo:</h6> 
                                </dt>
                                <dd>
                                    <table width="500"  border="0" cellspacing="0" cellpadding="0">
                                        <tr>    
                                            <td><input type="checkbox" name="Pasatiempos" value="Cine" id="CheckboxGroup1_0">
                                                Cine</td>
                                            <td><input type="checkbox" name="Pasatiempos" value="Conciertos" id="CheckboxGroup1_1">
                                                Conciertos</td> 
                                            <td><input type="checkbox" name="Pasatiempos" value="Actividades Culturales" id="CheckboxGroup1_2">
                                                Actividades Culturales</td>
                                        </tr>
                                        <tr> 
                                            <td><input type="checkbox" name="Pasatiempos" value="Bibliotecas" id="CheckboxGroup1_3">
                                                Bibliotecas</td> 
                                            <td><input type="checkbox" name="Pasatiempos" value="Bailar" id="CheckboxGroup1_4">
                                                Bailar</td> 
                                            <td><input type="checkbox" name="Pasatiempos" value="Fiestas" id="CheckboxGroup1_5">
                                                Fiestas</td> 
                                        </tr>
                                        <tr> 
                                            <td><input type="checkbox" name="Pasatiempos" value="Video Juegos" id="CheckboxGroup1_6">
                                                Video Juegos</td> 
                                            <td><input type="checkbox" name="Pasatiempos" value="Compras" id="CheckboxGroup1_7">
                                                Compras</td> 
                                            <td><input type="checkbox" name="Pasatiempos" value="Deportes" id="CheckboxGroup1_8">
                                                Deportes</td>
                                        </tr>
                                    </table>
                                </dd>
                                <dt>
                                <h6>16.- &iquest;Trabajas actualmente?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="Trabajas" value="Si" id="RadioGroup11_0" onClick="DondeTrabajas.disabled = false, OcupacionTrab.disabled = false, PorqTrab.disabled = false" >
                                    Si<br>
                                    <input type="radio" name="Trabajas" value="No" id="RadioGroup11_1" onClick="DondeTrabajas.disabled = true, OcupacionTrab.disabled = true, PorqTrab.disabled = true" >
                                    No<br>
                                </dd>
                                <dt>
                                <h6>16.1.- &iquest;Dondé trabajas?</h6>
                                </dt>
                                <dd>
                                    <input name="DondeTrabajas" type="text" disabled="disabled"><br>
                                </dd>
                                <dt>
                                <h6>16.2.- &iquest;Ocupació;n en el trabajo?</h6>
                                </dt>
                                <dd>
                                    <input name="OcupacionTrab" type="text" disabled="disabled"><br>
                                </dd>
                                <dt>
                                <h6>16.3.- &iquest;Cuál es el motivo por el cual laboras?</h6>
                                </dt>
                                <dd>
                                    <input name="PorqTrab" type="text" disabled="disabled"><br>
                                </dd>
                                <dt>
                                <h6>17.- &iquest;Cu&aacute;l es la razon por la que ingresaste al tecnol&oacute;gico?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="IngresastRazTec" value="Porque esta es la escuela que desean mis padres" id="RadioGroup12_0" onClick="opcion13.disabled = true">
                                    Porque esta es la escuela que desean mis padres.<br>
                                    <input type="radio" name="IngresastRazTec" value="Porque no es cara la colegiatura" id="RadioGroup12_1" onclick="opcion13.disabled = true">
                                    Porque no es cara la colegiatura.<br>
                                    <input type="radio" name="IngresastRazTec" value="Porque la institución tiene prestigio" id="RadioGroup12_2" onclick="opcion13.disabled = true">
                                    Porque la instituci&oacute;n tiene prestigio<br>
                                    <input type="radio" name="IngresastRazTec" value="Porque tiene buenos egresados" id="RadioGroup12_3" onclick="opcion13.disabled = true">
                                    Porque tiene buenos egresados. <br>
                                    <input type="radio" name="IngresastRazTec" value="Porque no alcance cupo en otra escuela" id="RadioGroup12_4" onclick="opcion13.disabled = true">
                                    Porque no alcance cupo en otra escuela. <br>
                                    <input type="radio" name="IngresastRazTec" value="Otro" id="RadioGroup12_5" onclick="opcion13.disabled = false">
                                    Otro(Especifica) 
                                    <input name="opcion13" type="text" disabled="disabled"><br>
                                </dd>
                                <dt>
                                <h6>18.- &iquest;Cu&aacute;les son las razones por la que ingresaste a la carrera?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="IngresastRazCar" value="Porque espero ganar mucho dinero con ella" id="RadioGroup13_0" onclick="opcion14.disabled = true">
                                    Porque espero ganar mucho dinero con ella.<br> 
                                    <input type="radio" name="IngresastRazCar" value="Porque les la carrera que he elegido y me apasiona" id="RadioGroup13_1" onclick="opcion14.disabled = true">
                                    Porque les la carrera que he elegido y me apasiona.<br>
                                    <input type="radio" name="IngresastRazCar" value="Por su plan de estudios" id="RadioGroup13_2" onclick="opcion14.disabled = true">
                                    Por su plan de estudios. <br>
                                    <input type="radio" name="IngresastRazCar" value="Porque no hubo cupo en la carrera que me interesa" id="RadioGroup13_3" onclick="opcion14.disabled = true">
                                    Porque no hubo cupo en la carrera que me interesa. <br>
                                    <input type="radio" name="IngresastRazCar" value="Porque es la carrera que desean mis padres" id="RadioGroup13_4" onclick="opcion14.disabled = true">
                                    Porque es la carrera que desean mis padres.<br> 
                                    <input type="radio" name="IngresastRazCar" value="Porque es la &uacute;nica escuela que da esta carrera" id="RadioGroup13_5" onClick="opcion14.disabled = true">
                                    Porque es la &uacute;nica escuela que da esta carrera.<br>
                                    <input type="radio" name="IngresastRazCar" value="Otro" id="RadioGroup13_6" onclick="opcion14.disabled = false">
                                    Otro (Especifica) 
                                    <input name="opcion14" type="text" disabled="disabled"><br>
                                </dd>
                                <dt>
                                <h6>19.- &iquest;Padece alguna alergia?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="Alergias" value="Si" id="RadioGroup14_0" onClick="CualAlergia.disabled = false">
                                    Si
                                    &iquest;Cuál?<input name="CualAlergia" type="text" disabled="disabled"><br>
                                    <input type="radio" name="Alergias" value="No" id="RadioGroup14_1" onclick="CualAlergia.disabled = true">
                                    No
                                    <br>
                                </dd>
                                <dt>
                                <h6>20.- &iquest;Padece alguna enfermedad crónica?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="Cronica" value="Si" id="RadioGroup15_0" onClick="CronicaCual.disabled = false">
                                    Si
                                    &iquest;Cu&aacute;l?<input name="CronicaCual" type="text" disabled="disabled"><br>
                                    <input type="radio" name="Cronica" value="No" id="RadioGroup15_1" onclick="CronicaCual.disabled = true">
                                    No
                                    <br>
                                </dd>
                                <dt>
                                <!--                AGREGADO-->
                                <h6>21.- &iquest;Alguien en tu familia padece alguna enfermedad hereditaria?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="rbtHereditaria" value="Si" id="RadioGroup22_0" onClick="txtHereditariaQuien.disabled = false">
                                    Si
                                    Quien?<input name="txtHereditariaQuien" type="text" disabled="disabled"><br>
                                    <input type="radio" name="rbtHereditaria" value="No" id="RadioGroup22_1" onclick="txtHereditariaQuien.disabled = true">
                                    No
                                    <br>
                                </dd>
                                <dt>
                                <!--                AGREGADO-->
                                <h6>22.- &iquest;Has recibido atención psicológica?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="AtencionPsi" value="Si" id="RadioGroup16_0" onClick="CualAtencionPsi.disabled = false">
                                    Si
                                    (especifica de que tipo)<input name="CualAtencionPsi" type="text" disabled="disabled"><br>
                                    <input type="radio" name="AtencionPsi" value="No" id="RadioGroup16_1" onclick="CualAtencionPsi.disabled = true">
                                    No 
                                    <br>
                                </dd>
                                <dt>
                                <!--                AGREGADO-->
                                <h6>23.- &iquest;Padeces alguna enfermedad mental?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="rbtMental" value="Si" id="RadioGroup23_0" onClick="txtMentalCual.disabled = false">
                                    Si
                                    Especifica:<input name="txtMentalCual" type="text" disabled="disabled"><br>
                                    <input type="radio" name="rbtMental" value="No" id="RadioGroup23_1" onclick="txtMentalCual.disabled = true">
                                    No
                                    <br>
                                </dd>
                                <dt>
                                <!--                AGREGADO-->
                                <h6>24.- &iquest;D&oacute;nde recibes atenci&oacute;n medica?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="AtencionMedica" value="IMSS" id="RadioGroup17_0">
                                    IMSS<br>
                                    <input type="radio" name="AtencionMedica" value="ISSSTE" id="RadioGroup17_1">
                                    ISSSTE<br> 
                                    <input type="radio" name="AtencionMedica" value="H. Militar" id="RadioGroup17_2">
                                    H. Militar<br>
                                    <input type="radio" name="AtencionMedica" value="Particular" id="RadioGroup17_3">
                                    Particular<br>
                                </dd>
                                <dt>
                                <h6>25.- &iquest;Fumas?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="Fumador" value="Si" id="RadioGroup18_0">
                                    Si<br>
                                    <input type="radio" name="Fumador" value="No" id="RadioGroup18_1">
                                    No 
                                    <br>
                                </dd>
                                <dt>
                                <h6>26.- &iquest;Consumes bebidas embriagantes?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="BebidasAlc" value="Si" id="RadioGroup19_0">
                                    Si<br>
                                    <input type="radio" name="BebidasAlc" value="No" id="RadioGroup19_1">
                                    No 
                                    <br>
                                </dd>

                                <dt>
                                <h6>27.- &iquest;Has tenido problemas legales?</h6> 
                                </dt>
                                <dd>
                                    <input required type="radio" name="ProblemLegal" value="Si" id="RadioGroup20_0" onClick="Motivo.disabled = false">
                                    Si
                                    (especifica el motivo) <input name="Motivo" type="text" disabled="disabled"><br>
                                    <input type="radio" name="ProblemLegal" value="No" id="RadioGroup20_1" onclick="Motivo.disabled = true">
                                    No 
                                    <br>
                                </dd>
                                <dt>
                                <h6>28.- &iquest;Practicas algún deporte?</h6>
                                </dt>
                                <dd>
                                    <input required type="radio" name="Deporte" value="Si" id="RadioGroup21_0" onClick="CualDep.disabled = false, FrecuenciaDept.disabled = false">
                                    Si<br>
                                    <input type="radio" name="Deporte" value="No" id="RadioGroup21_1" onclick="CualDep.disabled = true, FrecuenciaDept.disabled = true">
                                    No <br>

                                </dd>
                                <dt>
                                <h6>28.1.- &iquest;Cu&aacute;l?</h6> 
                                </dt>
                                <dd>
                                    <input name="CualDep" type="text" disabled="disabled">
                                </dd>
                                <dt>
                                <h6>28.2.- &iquest;Con que frecuencia lo realizas?</h6>
                                </dt>
                                <dd>
                                    <input name="FrecuenciaDept" type="text" disabled="disabled">
                                </dd>
                            </dl>
                        </div>
                        <input class="btn btn-primary" type="submit" name="guardar" value="Guardar la Encuesta">
                    </form>
                </div>
            </div>
            <script src="../jqBootstrapValidation/jqBootstrapValidation.js"></script>
        </body>
    </html>
    <?php
    include './plantillaFooter.php';
    include '../irarriba/irarriba.php';
}
?>


