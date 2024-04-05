<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cursos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/Main.css">
</head>

<body>
    <div class="super_container">

        <!-- Header -->
        <header class="">
            <?php include 'php/header.php' ?>
        </header>
                <!-- Home -->
        <div class="home">
			<img src="imagenes/fondoHomeCursos.png" alt="">
		</div>
        <div class="homeMobile">
            <div class="homeMobileFondo" style="background-image: url('imagenes/homeCelular.png');">
            </div>
            <div class="homeMobileNav">
                <div class="navItem"><a href="index.php">HOME</a></div>
                <div class="navItem active"><a href="courses.php">CURSOS</a></div>
                <div class="navItem"><a href="contacto.html">CONTACTO</a></div>
            </div>
        </div>
        
        <?php

        include 'php/desplegarCursos.php';
        $userId = $_SESSION['userId'];
        // Parámetros para la paginación
        $itemsPorPagina = 7;
        $paginaActual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
        $buscador = isset($_GET['cursos']) ? $_GET['cursos'] : null;
        $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'todos';
        // ComboBox
        switch ($filtro) {
            case 'alfabetico':
                $orderBy = 'ORDER BY titulo ASC'; // Ordenar alfabéticamente por título
                break;
            case 'categoria':
                $orderBy = 'ORDER BY categoria ASC, titulo ASC, fecha DESC'; // Ordenar alfabéticamente por categoría
                break;
            case 'todos':
            default:
                $orderBy = 'ORDER BY fecha DESC'; // Ordenar por fecha de alta de forma descendente (por defecto)
                break;
        }
        if($filtro === 'fav' && $userId){
                $query = "SELECT 
                    curso_capacitacion.id as id, 
                    curso_capacitacion.denominacion as titulo,
                    autorcurso,
                    curso_capacitacion.imagencurso as imagen,
                    curso_capacitacion.descripcion as descripcion,
                    curso_capacitacion.fechaalta as fecha,
                    curso_capacitacion.palabrasclave as palabrasClave,
                    categoria_curso.denominacion as categoria,
                    COUNT(curso_modulo.id) AS cantidad_modulos
                    FROM difusion.curso_capacitacion
                    LEFT JOIN difusion.curso_capacitacion_modulos ON curso_capacitacion.id = curso_capacitacion_modulos.idcursocapacitacion
                    LEFT JOIN difusion.curso_modulo ON curso_capacitacion_modulos.idmodulo = curso_modulo.id
                    LEFT JOIN difusion.categoria_curso ON curso_capacitacion.idcategoriacurso = categoria_curso.codigo::bigint
                    WHERE 
                    curso_capacitacion.id IN (
                        SELECT idcursocapacitacion 
                        FROM difusion.usuario_web_curso_modulo 
                        WHERE idusuarioweb = '$userId' AND likecurso = 'S'
                    )
                    GROUP BY curso_capacitacion.id,curso_capacitacion.denominacion,autorcurso,imagen,
                            curso_capacitacion.descripcion,fecha,palabrasclave,categoria
                    ORDER BY categoria ASC, titulo ASC, fecha DESC";
        }else{
            $query = "SELECT 
            curso_capacitacion.id as id, 
            curso_capacitacion.denominacion as titulo,
            curso_capacitacion.autorcurso,
            curso_capacitacion.imagencurso as imagen,
            curso_capacitacion.descripcion as descripcion,
            curso_capacitacion.fechaalta as fecha,
            curso_capacitacion.palabrasclave as palabrasClave,
            categoria_curso.denominacion as categoria,
            COUNT(curso_modulo.id) AS cantidad_modulos
            FROM difusion.curso_capacitacion
            LEFT JOIN difusion.curso_capacitacion_modulos ON curso_capacitacion.id = curso_capacitacion_modulos.idcursocapacitacion
            LEFT JOIN difusion.curso_modulo ON curso_capacitacion_modulos.idmodulo = curso_modulo.id
            LEFT JOIN difusion.categoria_curso ON curso_capacitacion.idcategoriacurso = categoria_curso.codigo::bigint
            GROUP BY curso_capacitacion.id,curso_capacitacion.denominacion,autorcurso,imagen,
                    curso_capacitacion.descripcion,fecha,palabrasclave,categoria
            $orderBy";
        }
        $stmt = pg_query($query) or die('La consulta falló: ' . pg_last_error());

        $totalCursosQuery = "SELECT COUNT(*) AS total FROM difusion.curso_capacitacion;";
        $totalCursosResult = pg_query($totalCursosQuery);
        $totalCursos = pg_fetch_assoc($totalCursosResult)['total'];
        $totalPaginas = ceil($totalCursos / $itemsPorPagina);
        ?>
        <!-- CURSOS -->
        <div class="popular page_section">
            <div class="">
                <!-- Buscador -->
                <div class="container custom-center">
                    <div class="row custom-margin">
                        <div class="col-md-6 buscador">
                            <div class="section_title text-center">
                                <form action="courses.php" method="GET" class="search-form" id="search-form">
                                    <input type="text" name="cursos" placeholder="Buscar Curso" id="buscador" value="<?php echo $buscador ?>" class="buscador form-control">
                                    <img id="eliminar-busqueda-imagen" src="imagenes/iconos/eliminar.svg" alt="" class="eliminarBuscador">
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 comboCursoDiv">
                            <select id="comboCursos" name="filtro" class="comboCursos">
                                <option value="todos" <?php echo ($filtro === 'todos') ? 'selected' : ''; ?>>Todos</option>
                                <option value="fav" <?php echo ($filtro === 'fav') ? 'selected' : ''; ?>>Favoritos</option>
                                <option value="alfabetico" <?php echo ($filtro === 'alfabetico') ? 'selected' : ''; ?>>A-Z</option>
                                <option value="categoria" <?php echo ($filtro === 'categoria') ? 'selected' : ''; ?>>Categoria</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Desplegar cursos -->
                <div class="row course_boxes ">
                    <?php
                    $totalCursosQuery = "SELECT COUNT(*) AS total FROM (" . $query . ") AS cursos;";
                    $totalCursosResult = pg_query($totalCursosQuery);
                    $totalCursos = pg_fetch_assoc($totalCursosResult)['total'];
                    $totalPaginas = ceil($totalCursos / $itemsPorPagina);

                    // Ajusta el rango de cursos que se mostrarán en la página actual
                    $primerCurso = ($paginaActual - 1) * $itemsPorPagina;
                    $ultimoCurso = $primerCurso + $itemsPorPagina - 1;
                    $cursoActual = 0;

                    while ($arr = pg_fetch_Array($stmt, null, PGSQL_ASSOC)) {
                        if ($cursoActual >= $primerCurso && $cursoActual <= $ultimoCurso) {
                            // Muestra el curso si esta dentro de la pagina correspondiente
                            $id = $arr["id"];
                            $cantidadModulos = $arr["cantidad_modulos"];
                            $categoria = $arr["categoria"];
                            $titulo = $arr["titulo"];
                            $autor =  $arr["autorcurso"];
                            $imagencurso = $arr["imagen"];
                            $descripcion = $arr["descripcion"];
                            $palabrasClave = $arr["palabrasclave"];
                            desplegarCurso(true, $id, $categoria, $titulo, $autor, $imagencurso, $descripcion, $cantidadModulos, $palabrasClave);
                        } else {
                            $id = $arr["id"];
                            $cantidadModulos = $arr["cantidad_modulos"];
                            $categoria = $arr["categoria"];
                            $titulo = $arr["titulo"];
                            $autor =  $arr["autorcurso"];
                            $imagencurso = $arr["imagen"];
                            $descripcion = $arr["descripcion"];
                            $palabrasClave = $arr["palabrasclave"];
                            // Aplica display: none; para ocultar el curso si es de otra página
                            desplegarCurso(false, $id, $categoria, $titulo, $autor, $imagencurso, $descripcion, $cantidadModulos, $palabrasClave);
                        }
                        $cursoActual++;
                    }
                    ?>
                </div>
                <!-- Paginación -->
                <div class="row numeroPagina">
                    <div class="col numeroPagina">
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                            <li class=" <?php echo ($i === $paginaActual) ? 'active' : ''; ?>">
                                <a class="page-link" href="courses.php?pagina=<?php echo $i; ?>&cursos=<?php echo $buscador; ?>&filtro=<?php echo $filtro; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer">
            <?php include 'php/footer.php' ?>
        </footer>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/courses_custom.js"></script>
    <script>
        // Filtrar cursos según el input
        function filtrarCursos() {
            const input = document.getElementById("buscador");
            const searchTerm = input.value.toLowerCase();
            const palabrasClave = searchTerm.split(' ');
            const paginacion = document.querySelector(".numeroPagina");
            const cards = document.querySelectorAll(".rowCurso");
            
            if (searchTerm.trim() == "" || searchTerm === null){
                paginacion.style.display = "block";  // Muestra la paginación si el input está vacío
            } else {
                paginacion.style.display = "none";  // Oculta la paginación si hay texto en el input
            }
            
            cards.forEach(card => {
                const courseText = card.textContent.toLowerCase();
                let mostrarCurso = true;  // Inicializamos como verdadero
                palabrasClave.forEach(palabra => {
                    // Verifica si alguna palabra clave no está presente en el texto del curso
                    if (!courseText.includes(palabra)) {
                        mostrarCurso = false;  // Cambiamos a falso si alguna palabra clave no está presente
                    }
                });
                if (mostrarCurso) {
                    card.style.display = "block";  // Muestra el curso si todas las palabras clave están presentes
                } else {
                    card.style.display = "none";  // Oculta el curso si falta alguna palabra clave
                }
            });
        }
        //Filtrar cursos por el ComboBOX
        document.addEventListener('DOMContentLoaded', function() {
            const comboCursos = document.getElementById('comboCursos');
            comboCursos.addEventListener('change', function() {
                const opcion = comboCursos.value;
                window.location.href = `courses.php?filtro=${opcion}&pagina=1`;
            });
        });
        // Función para agregar eventos a palabrasClave
        document.addEventListener("DOMContentLoaded", function () {
            const palabrasClaveElements = document.querySelectorAll(".palabrasClave");
            palabrasClaveElements.forEach(palabrasClaveElement => {
                palabrasClaveElement.addEventListener("click", function () {
                    const input = document.getElementById("buscador");
                    const palabraClave = palabrasClaveElement.textContent.trim().toLowerCase();
                    
                    // Obtenemos las palabras clave actuales del input
                    const palabrasActuales = input.value.trim().toLowerCase().split(' ');

                    // Agregamos la nueva palabra clave solo si no está presente
                    if (!palabrasActuales.includes(palabraClave)) {
                        palabrasActuales.push(palabraClave);
                        // Actualizamos el valor del input con todas las palabras clave
                        input.value = palabrasActuales.join(' ');
                        // Llama a la función de filtrado después de modificar el input
                        filtrarCursos();
                    }
                });
            });
        });
        //agregar categoria al buscador al clickear
        document.addEventListener("DOMContentLoaded", function () {
            const categorias = document.querySelectorAll(".categoria");
            categorias.forEach(categoriaElement => {
                categoriaElement.addEventListener("click", function () {
                    const input = document.getElementById("buscador");
                    const categoriaSeleccionada = categoriaElement.textContent.trim().toLowerCase();
                    input.value = '';
                    input.value = categoriaSeleccionada;
                    filtrarCursos();
                });
            });
        });
        //agregar logica al buscador
        const input = document.getElementById("buscador");
            input.addEventListener("input", filtrarCursos);
            // Ocultar los cursos que no pertenecen a la pagina actual
            input.addEventListener("input", function () {
                const searchTerm = input.value.trim().toLowerCase();
                if (searchTerm === "") {
                    const cards = document.querySelectorAll(".ocultos");
                    cards.forEach(card => {
                        card.style.display = "none";
                    });
                }
        });
        function favUnfav(button) {
            var userId = <?php echo json_encode($userId); ?>;
            if(userId){
                const idCurso = button.getAttribute("data-id");
                const favorito = button.getAttribute("data-favorito");
                // Cambia el estado de favorito/no favorito
                if (favorito === "false") {
                    button.setAttribute("data-favorito", "true");
                    button.querySelector("img.fav").src = "imagenes/iconos/fav.svg"; // Cambia a la imagen "fav"
                } else {
                    button.setAttribute("data-favorito", "false");
                    button.querySelector("img.fav").src = "imagenes/iconos/unfav.svg"; // Cambia a la imagen "unfav"
                }
                // Solicitud Ajax para guardar el like
                $.ajax({
                    type: "POST",
                    url: "php/favorito.php",
                    data: {
                        idCurso: idCurso,
                        likeEstado: favorito === "false" ? 1 : 0
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }
        }
        //Favoritos de la base de datos
        document.addEventListener('DOMContentLoaded', function() {
            // Llamada AJAX para obtener la información de los cursos
            $.ajax({
                type: "GET",
                url: "php/favorito.php",
                dataType: "json",
                success: function (data) {
                    console.log('Datos recibidos:', data);
                    data.forEach(curso => {
                    const cursoId = curso.idcursocapacitacion;
                    const esFavorito = curso.likecurso;
                    const botonFav = document.querySelector(`button[data-id="${cursoId}"]`);
                if (botonFav) {
                    const iconoFav = botonFav.querySelector("img.fav");
                    if (esFavorito == "S") {
                        iconoFav.src = "imagenes/iconos/fav.svg"; // Cambia a la imagen "fav"
                        botonFav.setAttribute("data-favorito", "true");
                    } else {
                        iconoFav.src = "imagenes/iconos/unfav.svg"; // Cambia a la imagen "unfav"
                        botonFav.setAttribute("data-favorito", "false");
                    }}else{
                        console.log("nope");
                    }
                    });
                },
                error: function (error) {
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
        });
        //Ejecutar cuando se realiza una busqueda
        document.addEventListener('DOMContentLoaded', function() {
            const cursosParam = "<?php echo isset($_GET['cursos']) ? $_GET['cursos'] : ''; ?>";

            if (cursosParam) {
                const buscadorInput = document.getElementById("buscador");

                if (buscadorInput) {
                    buscadorInput.value = cursosParam;
                    filtrarCursos(); // Llama a la función de filtrado
                }
            }
        });
        //evento para limpiar el buscador con imagen
        document.addEventListener('DOMContentLoaded', function() {
            const eliminarImagen = document.querySelector("#eliminar-busqueda-imagen");
            if (eliminarImagen) {
                eliminarImagen.addEventListener("click", function() {
                    const inputBuscador = document.getElementById("buscador");
                    if (inputBuscador) {
                        inputBuscador.value = ""; // Establece el valor del input en una cadena vacía
                        // Restaurar visualización de los cursos originales
                        const cards = document.querySelectorAll(".rowCurso");
                        cards.forEach(card => {
                            card.style.display = "block";
                        });
                        // Ocultar los cursos que no pertenecen a la página actual
                        const searchTerm = inputBuscador.value.trim().toLowerCase();
                        if (searchTerm === "") {
                            const cards = document.querySelectorAll(".ocultos");
                            cards.forEach(card => {
                                card.style.display = "none";
                            });
                        }
                    }
                });
            }
        });

    </script>
</body>

</html>
