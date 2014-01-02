<?php
include './plantilla.php';
?>
<form action="guardarSeguimientoCurso.php" method="GET">
    <body>
        <div class="container">
            <div    class="span12"  style="margin: auto; background-color: white; margin-top: -20px">
                <br>
                <div  class="well well-small">
                    1. ¿Entregó la planeación de la asignatura al inicio del semestre?
                    <div class="radio">
                        <label>
                            <input type="radio" name="1"  value="5" required="true"/>
                            Si
                        </label>
                        <label>
                            <input type="radio" name="1"  value="1"required="true"/>
                            No
                        </label>
                    </div>
                    2. Al inicio del curso explicó el contenido de la asignatura  de manera clara y precisa.
                    <div class="radio">
                        <label>
                            <input type="radio" name="2"  value="5" required="true"/>
                            Si
                        </label>
                        <label>
                            <input type="radio" name="2"  value="1" required="true"/>
                            No
                        </label>
                    </div>
                    3. Estableció las normas y criterios de  evaluación.
                    <div class="radio">
                        <label>
                            <input type="radio" name="3"  value="5" required="true"/>
                            Si
                        </label>
                        <label>
                            <input type="radio" name="3"  value="1" required="true"/>
                            No
                        </label>
                    </div>
                    4. Demuestra dominio del contenido de la asignatura que imparte.
                    <div class="radio">
                        <label>
                            <input type="radio" name="4"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="4"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="4"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="4"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="4"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    5. Relaciona el contenido de la asignatura con el campo de trabajo del Ingeniero Industrial
                    <div class="radio">
                        <label>
                            <input type="radio" name="5"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="5"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="5"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="5"  value="3" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="5"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    6. Trata a los estudiantes con respeto y tolerancia.
                    <div class="radio">
                        <label>
                            <input type="radio" name="6"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="6"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="6"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="6"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="6"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    7. Fomenta el trabajo en equipo y el debate de ideas
                    <div class="radio">
                        <label>
                            <input type="radio" name="7"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="7"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="7"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="7"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="7"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    8. Utiliza recursos didácticos durante el desarrollo de la clase 
                    (material audiovisual, juegos de simulación, software de aplicaciones a la ingeniería industrial, etc.).
                    <div class="radio">
                        <label>
                            <input type="radio" name="8"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="8"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="8"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="8"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="8"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    9. Asiste  a clase.
                    <div class="radio">
                        <label>
                            <input type="radio" name="9"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="9"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="9"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="9"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="9"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    10. Es puntual al momento de entrar al salón.
                    <div class="radio">
                        <label>
                            <input type="radio" name="10"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="10"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="10"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="10"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="10"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    11. Utiliza de manera eficiente el tiempo programado en el aula.
                    <div class="radio">
                        <label>
                            <input type="radio" name="11"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="11"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="11"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="11"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="11"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    12. Cumple con los temas programados en la gestión del curso.
                    <div class="radio">
                        <label>
                            <input type="radio" name="12"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="12"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="12"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="12"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="12"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    13. Existe congruencia entre los contenidos presentados en clase y los que evalúa.
                    <div class="radio">
                        <label>
                            <input type="radio" name="13"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="13"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="13"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="13"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="13"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    14. El profesor logra despertar tu interés por la asignatura.
                    <div class="radio">
                        <label>
                            <input type="radio" name="14"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="14"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="14"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="14"  value="2" required="true"/>
                            Casi Nunca
                        </label>

                        <label>
                            <input type="radio" name="14"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    15. El profesor se muestra dispuesto para aclarar dudas dentro y fuera del salón de clase.
                    <div class="radio">
                        <label>
                            <input type="radio" name="15"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="15"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="15"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="15"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="15"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    16. El profesor se encuentra disponible para brindar asesorías fuera de clase.
                    <div class="radio">
                        <label>
                            <input type="radio" name="16"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="16"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="16"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            
                            <input type="radio" name="16"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="16"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    17. Después de las tareas y evaluaciones realiza sesiones de retroalimentación.
                    <div class="radio">
                        <label>
                            <input type="radio" name="17"  value="5" required="true"/>
                            Siempre
                        </label>
                        <label>
                            <input type="radio" name="17"  value="4" required="true"/>
                            Casi Siempre
                        </label>
                        <label>
                            <input type="radio" name="17"  value="3" required="true"/>
                            A Veces
                        </label>
                        <label>
                            <input type="radio" name="17"  value="2" required="true"/>
                            Casi Nunca
                        </label>
                        <label>
                            <input type="radio" name="17"  value="1" required="true"/>
                            Nunca
                        </label>
                    </div>
                    18. El profesor da a conocer los resultados de las evaluaciones parciales antes de subirlas al portal.
                    <div class="radio">
                        <label>
                            <input type="radio" name="18"  value="5" required="true"/>
                            Si
                        </label>
                        <label>
                            <input type="radio" name="18"  value="1" required="true"/>
                            No
                        </label>
                    </div>
                    19. Hasta el momento me siento satisfecho con sus métodos de enseñanza aprendizaje.
                    <div class="radio">
                        <label>
                            <input type="radio" name="19"  value="5" required="true"/>
                            Si
                        </label>
                        <label1>
                            <input type="radio" name="19"  value="1" required="true"/>
                            No
                            </label>
                    </div>
                    20. Me  inscribiría de nuevo con este profesor.
                    <div class="radio">
                        <label>
                            <input type="radio" name="20"  value="5" required="true"/>
                            Si
                        </label>
                        <label>
                            <input type="radio" name="20"  value="1" required="true"/>
                            No
                        </label>
                    </div>
                    21. Conozco el modelo de enseñanza basado en competencias.
                    <div class="radio">
                        <label>
                            <input type="radio" name="21"  value="5" required="true" />
                            Si
                        </label>
                        <label>
                            <input type="radio" name="21"  value="1" required="true"/>
                            No
                        </label>
                    </div>
                    22. Imparte su asignatura bajo el modelo de competencia.
                    <div class="radio">
                        <label>
                            <input type="radio" name="22"  value="5" required="true"/>
                            Si
                        </label>
                        <label>
                            <input type="radio" name="22"  value="1" required="true"/>
                            No
                        </label>

                    </div>
                    23. En las siguientes líneas, escribe las sugerencias para 
                    que el profesor mejore el proceso de enseñanza-aprendizaje:
                    <div>
                        <textarea class="span8" name="23" rows="3" required="true"></textarea>
                    </div>
                    24. En las siguientes líneas, 
                    escribe las sugerencias para que tú mejores tu proceso de enseñanza-aprendizaje:
                    <div>
                        <textarea  class="span8" name="24" rows="3" required="true"></textarea>
                    </div>
                    <div>
                        <h5><small>Recuerda que tus respuestas son confidenciales. Gracias por tu colaboración.</small></h5>
                    </div>
                    <input type="submit" value="Guardar Encuesta" class="btn btn-success"/>
                </div>
            </div>
        </div>
    </body>
</form>
<?php
include './plantillaFooter.php';
?>
