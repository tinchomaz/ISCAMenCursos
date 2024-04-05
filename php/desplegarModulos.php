<?php
$ultimoModulo = 0;
$numeroModulo = 1;
$desplegarIntroduccion = true;
/* Query video-documentos */
$query = "SELECT
    curso_capacitacion.autorcurso as autor,
    curso_capacitacion.autorimagen as autorImagen,
    curso_capacitacion.contenidohtml as contenidointroduccion,
    curso_modulo.id as idmodulo,
    curso_modulo.denominacion as titulo,
    curso_modulo.descripcion as descripcion,
    curso_modulo.imagencurso as imagen,
    video_url.urlvideo as video
    FROM difusion.curso_capacitacion
    /*UNION DE CURSO CON MODULO*/
    JOIN difusion.curso_capacitacion_modulos ON difusion.curso_capacitacion.id = difusion.curso_capacitacion_modulos.idcursocapacitacion
    JOIN difusion.curso_modulo ON difusion.curso_capacitacion_modulos.idmodulo = difusion.curso_modulo.id
    /*---*/
    /*UNION DE MODULO CON VIDEO MODULO */
    LEFT JOIN difusion.curso_modulo_videos ON difusion.curso_modulo.id = difusion.curso_modulo_videos.idcursomodulo
    LEFT JOIN difusion.video_url ON difusion.curso_modulo_videos.idvideo = difusion.video_url.id
    /*---*/
    WHERE difusion.curso_capacitacion.id = $idcurso;";
$stmt = pg_query($query) or die ("La consulta fallo: " . pg_last_error());
$ultimoModulo = pg_num_rows($stmt);
while($arr = pg_fetch_Array($stmt,NULL,PGSQL_ASSOC)){
    $contenidoIntroduccion = $arr['contenidointroduccion'];
    $autor = $arr['autor'];
    $autorImagen = $arr['autorimagen'];
    $titulo = $arr["titulo"];
    $descripcion = $arr["descripcion"];
    $imagenvideo = $arr["imagen"];
    $video = $arr["video"];
    $idModulo = $arr["idmodulo"];
    $documentacion = obtenerDocumentacion($idModulo);
    /* modifica el link del video de YouTube para que sea reproducible en el iframe */
    $urlvideo = str_replace("watch?v=","embed/",$video);
    if($desplegarIntroduccion){
        $contenidohtml = '
        <div class=introduccion>
            <div class="introduccionAutor">
                <div class="autorImagen">
                    <img src='.$autorImagen.'>
                    Dictado por: <br>
                    <span>'.$autor.'</span>
                </div>
                <div class="duracion Mobile">
                    <img src="imagenes/iconos/modulos.svg">
                    Duración: '.$ultimoModulo.' módulos
                </div>
            </div>
            <div class="introduccionTexto">
                <span>'.$contenidoIntroduccion.'</span>
                <div class="duracion">
                    <img src="imagenes/iconos/modulos.svg">
                    Duración: '.$ultimoModulo.' módulos
                </div>
            </div>
        </div>';
        if(!isset($_SESSION['userId'])){
            $contenidohtml .="
                <div class='moduloBloqueado' id='idBloqueado".$numeroModulo."'> 
                    <img src='imagenes/moduloBloqueado.svg' class='iconoModuloBloqueado'>
                    <div class='texto'>
                        Para ver el curso debes Iniciar Sesion
                    </div>
                </div>";
        }
        $desplegarIntroduccion = false;
    }
    if(isset($_SESSION['userId'])){
        $contenidohtml .= '
        <div class="container modulo" id="modulo-'.$numeroModulo.'">
            <div class="row">
                <div class="col-md-12 moduloCursoDiv">
                    <div class="moduloCurso">
                        Módulo '.$numeroModulo.'
                    </div>
                </div>
                <div class="col-md-6 video-container">
                    <div class="video-thumbnail">
                        <img src="imagenes/play.png" class="botonPlay" id="video-thumbnail-' . $numeroModulo . '" onclick="mostrarVideoOverlay(' . $numeroModulo . ')">
                        <img src="'.$imagenvideo.'" alt="Video Thumbnail" class="imagenVideo" id="video-thumbnail-' . $numeroModulo . '" onclick="mostrarVideoOverlay(' . $numeroModulo . ')">
                    </div>
                </div>
                <div class="col-md-6  textos">
                    <div class="tituloModulo mb-3">'
                    .$titulo.
                    '</div>
                    <div class="descripcion">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum maxime omnis asperiores natus laboriosam hic unde animi fugiat nam, facere quos illum! Consequuntur numquam labore inventore atque consequatur sunt. Harum?
                    </div>
                    <div class="video-overlay" id="video-overlay-'.$numeroModulo.'">
                        <iframe width="1310" height="480" src="'.$urlvideo.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>';
                    if ($documentacion) {
                        $contenidohtml .= '<div class="d-flex align-bottom">';      
                        foreach ($documentacion as $doc) {
                            $contenidohtml .= '<a href="' . $doc['ruta'] . '" target="_blank" class="hiddenLink"></a>';
                        }
                        $contenidohtml .= '<button onclick="descargarTodo('.$numeroModulo.')" class="btn descarga"><img src="imagenes/iconos/descarga.svg" class="iconosCursos">Descargar Archivos</button>
                                        </div>';
                    }
                    $contenidohtml .= '</div>
            </div>';
        agregarPregunta($idModulo,$numeroModulo);
        // Si no hay más registros, entonces es el último módulo
        if($numeroModulo != $ultimoModulo){
            $contenidohtml .= "<div class='moduloBloqueado' id='idBloqueado".$numeroModulo."'> 
                                <img src='imagenes/moduloBloqueado.svg' class='iconoModuloBloqueado'>
                                <div class='texto'>
                                    Para ver el siguiente Módulo debes responder el cuestionario
                                </div>
                           </div>";
        $numeroModulo++;
        }
        $contenidohtml .= "</div>";
    }
}
//despliega todos los modulos cuando se terminan de cargar
echo $contenidohtml;

function obtenerDocumentacion($idModulo) {
    $query = "SELECT * FROM difusion.documentacion_modulo WHERE idcursomodulo = $idModulo";
    $stmt = pg_query($query) or die("La consulta de documentación falló: " . pg_last_error());
    
    $documentacion = array();

    while ($row = pg_fetch_assoc($stmt)) {
        $documentacion[] = array(
            'ruta' => $row['ruta'],
            'denominacion' => $row['denominacion']
        );
    }

    return $documentacion;
}
function agregarPregunta($idModulo,$numeroModulo) {
    global $contenidohtml;
    $query = "SELECT 
        modulo_pregunta.pregunta as pregunta,
        modulo_respuesta.id as idrespuesta,
        modulo_respuesta.respuesta as respuesta,
        modulo_respuesta.correcta as correcta
        FROM difusion.modulo_pregunta
        INNER JOIN difusion.modulo_respuesta ON difusion.modulo_respuesta.idmodulopregunta = difusion.modulo_pregunta.id
        WHERE difusion.modulo_pregunta.idmodulocurso = $idModulo;";
    $stmt = pg_query($query) or die ("La consulta falló: " . pg_last_error());
    $contenidoTemporal = "";            
    $pregunta = '';
    $respuestas = array();

    while ($arr = pg_fetch_array($stmt, NULL, PGSQL_ASSOC)) {
        $pregunta = $arr["pregunta"];
		/*genera un array que contiene la respuesta y si es correcta */
        $respuestas[] = array(
            'respuesta' => $arr["respuesta"],
            'correcta' => $arr["correcta"],
            'idrespuesta' => $arr["idrespuesta"]
        );
    }
	//si existe la pregunta asignada al modulo genera el cuestionario
    if (!empty($pregunta)){
        $contenidoTemporal .= ' <div class="tituloModulo cuestionarioTitulo mt-5" id="cuestionario-'.$idModulo.'">
                                Cuestionario
                                </div>';
        $contenidoTemporal .= "<div class='cuestionario'>";
        $contenidoTemporal .= "<div class='pregunta'>";
        $contenidoTemporal .= $pregunta;
        $contenidoTemporal .= "</div>";
        $contenidoTemporal .= "<ul class='opciones'>";
		/*genera las respuestas al cuestionario*/
        foreach ($respuestas as $respuestaData) {
            $respuesta = $respuestaData['respuesta'];
            $correcta = $respuestaData['correcta'];
            $idRespuesta = $respuestaData['idrespuesta'];
            $contenidoTemporal .="<li>
                                <label>
                                <div><input type='checkbox' name='pregunta$numeroModulo' value='$respuesta' data-correcta='$correcta' class='opcion' data-respuestaid='$idRespuesta'></div>
                                <span>$respuesta</span>
                                </label>
                                </li>";
        }
        $contenidoTemporal .= "</ul>
                            </div>
                            <button type='submit' class='btn botonModulo' onclick='enviarRespuestas($numeroModulo)'>Enviar respuestas</button>";
        $contenidohtml .= $contenidoTemporal;
    }else{
        $contenidoTemporal = "<div class='moduloSinPregunta'>
                            <button type='submit' class='btn botonModulo' onclick='enviarRespuestas($numeroModulo)'>Modulo Terminado</button>
                            </div>";
        $contenidohtml .= $contenidoTemporal;
    }
}			
?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ocultar todos los módulos
        const todosLosModulos = document.querySelectorAll(".modulo");
        todosLosModulos.forEach((modulo) => {
        modulo.style.display = "none";
        });
        /*---*/
        // Mostrar el primer modulo
        const moduloInicio = document.getElementById("modulo-1");
        if (moduloInicio) {
        moduloInicio.style.display = "block";
        /*---*/
        }
    })
    function enviarRespuestas(idModulo){
        var respuestasMarcadas = [];

        // Obtener todos los checkboxes con el nombre 'pregunta{idModulo}'
        var checkboxes = document.querySelectorAll('input[name=pregunta' + idModulo + ']');

        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                // Obtener la información necesaria de cada checkbox
                var respuestaId = checkbox.getAttribute('data-respuestaid');
                var respuestaMarcada = {
                    idmodulorespuesta: respuestaId,
                    estado: 'S'  // Puedes ajustar esto según tu lógica
                };
                respuestasMarcadas.push(respuestaMarcada);
            }else{
                // Obtener la información necesaria de cada checkbox
                var respuestaId = checkbox.getAttribute('data-respuestaid');
                var respuestaMarcada = {
                    idmodulorespuesta: respuestaId,
                    estado: 'N'  // Puedes ajustar esto según tu lógica
                };
                respuestasMarcadas.push(respuestaMarcada);
            }
        });

        // Realizar la solicitud AJAX para enviar las respuestas al archivo PHP
        $.ajax({
            type: "POST",
            url: "php/actualizarCurso.php",
            data: { idModulo: idModulo, respuestas: respuestasMarcadas },
            success: function (response) {
                console.log("Respuesta del servidor:", response);
            },
            error: function (error) {
                console.error("Error en la solicitud:", error);
            }
        });
        verificarRespuestas(idModulo);
    }
    //Funcion para verificar las respuestas marcadas
    function verificarRespuestas(idModulo) {
        // Obtener todos los elementos de checkbox con el nombre 'pregunta{idModulo}'
        var checkboxes = document.querySelectorAll('input[name=pregunta' + idModulo + ']');
        var todasRespuestasCorrectas = true;
        var moduloActual = document.getElementById("modulo-"+ idModulo);
        var moduloSiguiente = idModulo+1;
        var moduloSiguiente = document.getElementById("modulo-"+ moduloSiguiente);
        var moduloAnterior = idModulo-1;
        var moduloAnterior = document.getElementById("modulo-"+ moduloAnterior);
        var bloqueadoImagen = document.getElementById("idBloqueado"+idModulo);
        var bloqueados = document.getElementsByClassName("moduloBloqueado");
        var botonEnviarActual = moduloActual.querySelector('.botonModulo');
        // Verificar si el módulo anterior tiene las respuestas correctas marcadas
        if (moduloAnterior) {
            var checkboxesAnterior = moduloAnterior.querySelectorAll('input[name=pregunta' + (idModulo - 1) + ']');
            checkboxesAnterior.forEach(function (checkbox) {
                var correcta = checkbox.getAttribute('data-correcta');
                if ((correcta === 'S' && !checkbox.checked) || (correcta !== 'S' && checkbox.checked)) {
                    todasRespuestasCorrectas = false;
                    return false;
                }
            });
        }
        if(checkboxes.length > 0){
            // Verificar si todas las respuestas marcadas son correctas
            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    var correcta = checkbox.getAttribute('data-correcta');
                    if (correcta !== 'S') {
                        todasRespuestasCorrectas = false;
                        return false;
                    }
                }else{
                    var correcta = checkbox.getAttribute('data-correcta');
                    if(correcta == 'S'){
                        todasRespuestasCorrectas = false;
                        return false;
                    }
                }
            });
            if(todasRespuestasCorrectas) {
                if(moduloSiguiente){
                    moduloSiguiente.style.display = "block";
                    bloqueadoImagen.style.display = "none";
                    // Agrega la imagen a las respuestas correctas
                    checkboxes.forEach(function (checkbox) {
                        var correcta = checkbox.getAttribute('data-correcta');
                        var respuestaId = checkbox.getAttribute('data-respuestaid');
                        botonEnviarActual.style.display = "none";
                        if (correcta === 'S') {
                            var liElement = checkbox.closest('li');
                            var imagen = document.createElement('img');
                            imagen.src = 'imagenes/iconos/correcta.svg'; // Ajusta la ruta de la imagen correcta
                            imagen.className = 'imagenRespuesta';
                            liElement.appendChild(imagen);
                        }else{
                            var liElement = checkbox.closest('li');
                            var imagen = document.createElement('img');
                            imagen.src = 'imagenes/iconos/incorrecta.svg'; // Ajusta la ruta de la imagen correcta
                            imagen.className = 'imagenRespuesta';
                            liElement.appendChild(imagen);
                        }
                    });
                // Ocultar todos los div "moduloBloqueado" si es el último módulo
                }else{
                    botonEnviarActual.style.display = "none";
                    checkboxes.forEach(function (checkbox) {
                        var correcta = checkbox.getAttribute('data-correcta');
                        var respuestaId = checkbox.getAttribute('data-respuestaid');
                        botonEnviarActual.style.display = "none";
                        if (correcta === 'S') {
                            var liElement = checkbox.closest('li');
                            var imagen = document.createElement('img');
                            imagen.src = 'imagenes/iconos/correcta.svg'; // Ajusta la ruta de la imagen correcta
                            imagen.className = 'imagenRespuesta';
                            liElement.appendChild(imagen);
                        }else{
                            var liElement = checkbox.closest('li');
                            var imagen = document.createElement('img');
                            imagen.src = 'imagenes/iconos/incorrecta.svg'; // Ajusta la ruta de la imagen correcta
                            imagen.className = 'imagenRespuesta';
                            liElement.appendChild(imagen);
                        }
                    });
                }
            } else {
                alert('Incorrecto');
            }
        //Si el modulo no tiene preguntas
        }else{
            if(moduloSiguiente && moduloActual.style.display === "block"){
                    moduloSiguiente.style.display = "block";
                    bloqueadoImagen.style.display = "none";
                    botonEnviarActual.style.display = "none";
                }
                else{
                    bloqueadoImagen.style.display = "none";
                    botonEnviarActual.style.display = "none";
            }
        }
        return true;
    }
    /* Actualizando las respuestas ya elegidas anteriormente */
    $(document).ready(function () {
        // Realizar una solicitud AJAX para obtener información del usuario al cargar la página
        $.ajax({
            type: "GET",
            url: "php/actualizarCurso.php",
            success: function (response) {
                // Parsea la respuesta JSON (asumiendo que la respuesta es un objeto JSON)
                var data = JSON.parse(response);
                console.log("Respuesta parseada:", data);

                // Marcar los checkboxes según la información recibida
                if (Object.keys(data).length > 0) {
                    // 'data' tiene al menos un dato, ejecutar marcarCheckboxes
                    marcarCheckboxes(data);
                }
            },
            error: function (error) {
                console.error("Error en la solicitud:", error);
            }
        });
    });
    // Función para marcar los checkboxes desde la base de datos
    function marcarCheckboxes(data) {
        data.forEach(function(informacion) {
            respuestaId = informacion.idmodulorespuesta;
            marcada = informacion.estado;
            var checkbox = document.querySelector('[data-respuestaid="' + respuestaId + '"]');
            if (checkbox && marcada == "S") {
                checkbox.checked = true;
            }
        });
        var modulos = document.getElementsByClassName('container modulo');
        var arregloModulos = Array.from(modulos);
        var largoModulos = arregloModulos.length;

        for (let index = 1; index < largoModulos+1; index++) {
            verificarRespuestas(index);
        }
    }
    function descargarTodo(numeroModulo) {
        // Obtener todos los elementos de enlace con la clase 'hiddenLink' dentro del módulo actual
        var enlaces = document.querySelectorAll('#modulo-' + numeroModulo + ' .hiddenLink');
        // Crear un elemento de ancla temporal para simular clics
        var anchor = document.createElement('a');
        anchor.style.display = 'none';
        document.body.appendChild(anchor);
        // Iterar sobre los enlaces y simular clics para iniciar las descargas
        enlaces.forEach(function (enlace) {
            anchor.href = enlace.href;
            anchor.download = enlace.download;
            anchor.click();
        });

        // Eliminar el elemento de ancla temporal
        document.body.removeChild(anchor);
    }
</script>
