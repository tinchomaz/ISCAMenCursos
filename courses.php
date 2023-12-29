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
        <?php

            include 'php/desplegarCursos.php';
            // Parámetros para la paginación
            $itemsPorPagina = 7;
            $paginaActual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;

            $buscador = $_GET['cursos'];

            // Consulta SQL de los cursos
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
                GROUP BY curso_capacitacion.id,curso_capacitacion.denominacion,autorcurso,imagen,
                        curso_capacitacion.descripcion,fecha,palabrasclave,categoria
                ORDER BY curso_capacitacion.fechaalta DESC";

            $stmt = pg_query($query) or die('La consulta falló: ' . pg_last_error());

            $totalCursosQuery = "SELECT COUNT(*) AS total FROM difusion.curso_capacitacion;";
            $totalCursosResult = pg_query($totalCursosQuery);
            $totalCursos = pg_fetch_assoc($totalCursosResult)['total'];
            $totalPaginas = ceil($totalCursos / $itemsPorPagina);
        ?>
        <!-- Home -->
    <div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background" style="background-image:url(imagenes/fondoHomeCursos.png)"></div>
		</div>
		<div class="tituloEncabezado">
			<div class="encabezado">
				Cursos
			</div>
			<div class="decoracion">
					&nbsp;
			</div>
			<div class="decoracion">
					&nbsp;
			</div>
		</div>
	</div>
	<div class="homeMobile">
		<div class="homeMobileFondo" style="background-image: url('imagenes/homeCelular.png');">
		</div>
		<div class="homeMobileNav">
			<div class="navItem"><a href="index.php">HOME</a></div>
    		<div class="navItem active"><a href="courses.php">CURSOS</a></div>
    		<div class="navItem"><a href="contacto.html">CONTACTO</a></div>
		</div>
		<div class="tituloEncabezado">
			<div class="encabezado">
				Cursos
			</div>
			<div class="decoracion">
					&nbsp;
			</div>
			<div class="decoracion">
					&nbsp;
			</div>
		</div>
	</div>
        <!-- CURSOS -->
        <div class="popular page_section">
            <div class="">
                <!-- Buscador -->
                <div class="container custom-center">
                    <div class="row custom-margin">
                        <div class="col-md-6 buscador">
                            <div class="section_title text-center">
                                <form action="courses.php" method="GET" class="search-form" id="search-form">
                                <input type="text" name="cursos" placeholder="Buscar Curso" id="Buscador" value="<?php echo $buscador ?>" class="buscador form-control">
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 comboCursoDiv">
                            <select id="" name="" class="comboCursos">
                                <option value="todos">Ultimos Cursos</option>
                                <option value="fav">Favoritos</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- codigo del buscador -->
    <script>
                    // Función para agregar eventos a palabrasClave
                    function agregarEventosClic() {
                        const palabrasClaveElements = document.querySelectorAll(".palabrasClave");
                        palabrasClaveElements.forEach(palabrasClaveElement => {
                            palabrasClaveElement.addEventListener("click", function () {
                                const input = document.getElementById("Buscador");
                                const palabrasClave = palabrasClaveElement.textContent.trim();
                                input.value = palabrasClave;
                                // Llama a la función de filtrado después de modificar el input
                                filtrarCursos();
                            });
                        });
                    }
                    window.addEventListener("DOMContentLoaded", agregarEventosClic);
                    // Filtrar cursos según el input
                    function filtrarCursos() {
                        const input = document.getElementById("Buscador");
                        const searchTerm = input.value.toLowerCase();
                        const cards = document.querySelectorAll(".rowCurso");
                        cards.forEach(card => {
                            const courseName = card.textContent.toLowerCase();
                            if (courseName.includes(searchTerm)) {
                                card.style.display = "block";
                            }
                             else {
                                card.style.display = "none";
                            }
                        });
                    }
                    const input = document.getElementById("Buscador");
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
                    //ejecutamos una vez filtrarCursos() por si esta realizandoce una busqueda
                    window.onload = function () {
                        const input = document.getElementById("Buscador");
                        const searchTerm = input.value.trim();
                        if (searchTerm !== "") {
                            filtrarCursos();
                        }
                    };
                    function favUnfav(button) {
        const id = button.getAttribute("data-id");
        const favorito = button.getAttribute("data-favorito");

        // Cambia el estado de favorito/no favorito
        if (favorito === "false") {
            button.setAttribute("data-favorito", "true");
            button.querySelector("img.fav").src = "imagenes/fav.svg"; // Cambia a la imagen "fav"
        } else {
            button.setAttribute("data-favorito", "false");
            button.querySelector("img.fav").src = "imagenes/unfav.svg"; // Cambia a la imagen "unfav"
        }

        // Luego, puedes hacer algo con el estado actual, por ejemplo, enviar una solicitud al servidor para registrar la acción.
        }
    </script>
                <!-- Desplegar cursos -->
                <div class="row course_boxes ">
                    <?php
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
                                <a class="page-link" href="courses.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
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

</body>

</html>
