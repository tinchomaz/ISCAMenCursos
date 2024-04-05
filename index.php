<!DOCTYPE html>
<html>

<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
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
            <div class="carousel">
                <div><img src="imagenes/fondoHome.png" alt="Imagen 1"></div>
                <div><img src="imagenes/fondoHome.png" alt="Imagen 2"></div>
                <!-- Agrega más imágenes según sea necesario -->
            </div>
        </div>
        <div class="homeMobile">
            <div class="homeMobileFondo" style="background-image: url('imagenes/homeCelular.png');">
            </div>
            <div class="homeMobileNav">
                <div class="navItem active"><a href="index.php">HOME</a></div>
                <div class="navItem"><a href="courses.php">CURSOS</a></div>
                <div class="navItem"><a href="contacto.html">CONTACTO</a></div>
            </div>
        </div>
        <!-- Popular -->
        <div class="popular cursosHome">
            <div class="tituloHome">
                Cursos <span>Populares</span>
            </div>
            <!-- CURSOS TRIPLE PARA ESCRITORIO -->
            <div class="course_boxes home">
                <!-- Ingreso de 3 cursos al home -->
                <?php
                $query = "SELECT 
				difusion.curso_capacitacion.id,
				difusion.curso_capacitacion.denominacion as denominacion,
				difusion.curso_capacitacion.imagencurso,
				difusion.curso_capacitacion.descripcion,
				difusion.categoria_curso.denominacion as categoria
			FROM difusion.curso_capacitacion
			JOIN difusion.categoria_curso ON categoria_curso.id = curso_capacitacion.idcategoriacurso
			JOIN (
				SELECT idcursocapacitacion, COUNT(*) as repeticiones
				FROM difusion.usuario_web_curso_modulo
				GROUP BY idcursocapacitacion
				ORDER BY repeticiones DESC
				LIMIT 3
			) consulta ON consulta.idcursocapacitacion = curso_capacitacion.id
			ORDER BY consulta.repeticiones DESC, curso_capacitacion.fechaalta DESC;";
                $stmt = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                    while($arr = pg_fetch_Array($stmt,null,PGSQL_ASSOC)){
                        $id = $arr["id"];
                        $denominacion = $arr["denominacion"];
                        $imagencurso = $arr["imagencurso"];
                        $descripcion = $arr["descripcion"];
						$categoria = $arr["categoria"];
                ?>
                <div class="course_box">
                    <div class="categoriaHome">
                        <a href="http://localhost/iscamen_academia/courses.php?cursos=<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </a>
                    </div>
                    <div class="cardHome">
                        <div class="cursoImagen">
                            <a href="curso.php?idcurso=<?php echo $id ?>">
                                <img class="card-img-top imgCursoHome" src=" <?php echo $imagencurso ?> " alt="">
                            </a>
                        </div>
                        <div class="cardBodyHome">
                            <div class="cardTitleHome">
                                <a href="curso.php?idcurso=<?php echo $id ?>"><?php echo $denominacion ?></a>
                            </div>
                            <div class="cardTextHome"><?php echo $descripcion ?></div>
                        </div>
                        <button class="btn botonCursosHome" onclick="paginaCurso(<?php echo $id ?>)">Iniciar
                            Curso</button>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- CURSOS TRIPLE PARA CELULAR -->
            <div class="cursosHomeCelular">
                <?php
					$query = "SELECT 
							curso_capacitacion.id,
							curso_capacitacion.denominacion as denominacion,
							imagencurso,
							descripcion,
							categoria_curso.denominacion as categoria
							FROM difusion.curso_capacitacion 
							JOIN difusion.categoria_curso ON categoria_curso.id = curso_capacitacion.idcategoriacurso
							order by curso_capacitacion.fechaalta desc limit 3;";
					$stmt = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
						while($arr = pg_fetch_Array($stmt,null,PGSQL_ASSOC)){
							$id = $arr["id"];
							$denominacion = $arr["denominacion"];
							$autor =  $arr["autorcurso"]; 
							$imagencurso = $arr["imagencurso"];
							$descripcion = $arr["descripcion"];
							$categoria = $arr["categoria"];
					?>
                <div class="col-lg-12 cardHomeCelular">
                    <div class="cardCurso principal">
                        <div class="cursoImagen col-6">
                            <a href="curso.php?idcurso=<?php echo $id ?>" class="linkHome"><img
                                    class="card-img-top imgCursoHome" src=" <?php echo $imagencurso ?> " alt="">
                            </a>
                        </div>
                        <div class="card-bodyHome col-6">
                            <div class="card-title">
                                <a href="curso.php?idcurso=<?php echo $id ?>"><?php echo $denominacion ?></a>
                            </div>
                            <div class="card-text"><?php echo $descripcion ?></div>
                            <button class="btn botonCursosHome" onclick="paginaCurso(<?php echo $id ?>)">Iniciar
                                Curso</button>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- Servicios -->
        <div class="rowServicios">
            <div class="serviciosImagenDiv">
                <div class="serviciosImgContainer">
                    <img src="imagenes/servicios.png" class="serviciosImg">
                    <img src="imagenes/serviciosMobile.png" class="serviciosImgMobile">
                </div>
            </div>
            <div class="servicios">
                <div class="serviciosTexto">
                    <div class="decoracionServicios">
                        <div class="subtitulo">
                            Nuestras temáticas
                        </div>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis dui ante,
                            laoreet fermentum quam efficitur non. Etiam ac posuere magna, ac eleifend enim. </span>
                    </div>
                    <div class="botonesHome">
                        <a href="http://www.iscamen.com.ar/difusion.php?idMenuPortal=13#tabs-2"
                            class="botonHome">Publicaciones</a>
                        <a href="http://www.iscamen.com.ar" class="botonHome institucion">Institución</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tematicas -->
        <div class="services page_section" id="info">
            <div class="">
                <div class="row">
                    <div class="col">
                        <div class="tituloHome">
                            Nuestras <span>Temáticas</span>
                        </div>
                    </div>
                </div>
                <div class="row services_row">

                    <div
                        class="col-lg-4 col-sm-6 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="imagenes/iconos/mosca.svg" class="imagenTematica">
                        </div>
                        <h3>MIP - Mosca </h3>
                        <p>¿Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus augue at neque
                            posuere egestas. Sed maximus? </p>
                    </div>

                    <div
                        class="col-lg-4 col-sm-6 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="imagenes/iconos/lobesia.svg" class="imagenTematica">
                        </div>
                        <h3>MIP- Lobesia</h3>
                        <p>¿Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus augue at neque
                            posuere egestas. Sed maximus? </p>
                    </div>

                    <div
                        class="col-lg-4 col-sm-6 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="imagenes/iconos/agroecologia.svg" class="imagenTematica">
                        </div>
                        <h3>Agroecología</h3>
                        <p>¿Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus augue at neque
                            posuere egestas. Sed maximus? </p>
                    </div>

                    <div
                        class="col-lg-4 col-sm-6 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="imagenes/iconos/agroquimicos.svg" class="imagenTematica">
                        </div>
                        <h3>Agroquímicos</h3>
                        <p>¿Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus augue at neque
                            posuere egestas. Sed maximus? </p>
                    </div>

                    <div
                        class="col-lg-4 col-sm-6 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="imagenes/iconos/carpocapsa.svg" class="imagenTematica">
                        </div>
                        <h3>Carpocapsa</h3>
                        <p>¿Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus augue at neque
                            posuere egestas. Sed maximus? </p>
                    </div>
                    <div
                        class="col-lg-4 col-sm-6 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="imagenes/iconos/manejo.svg" class="imagenTematica">
                        </div>
                        <h3>Manejo Integrado</h3>
                        <p>¿Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus augue at neque
                            posuere egestas. Sed maximus? </p>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer">
            <?php include 'php/footer.php' ?>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- slick-carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/custom.js"></script>
    <script>
    function paginaCurso(id) {
        // Redirige al usuario a la página deseada usando JavaScript
        window.location.href = 'curso.php?idcurso=' + id;
    }

    $(document).ready(function() {
        // Función para cambiar el cursor cuando el mouse entra al slider
        $('.carousel').on('mouseenter', function() {
            $('body').css('cursor', 'grab');
        });

        // Función para restablecer el cursor cuando el mouse sale del slider
        $('.carousel').on('mouseleave', function() {
            $('body').css('cursor', 'auto');
        });

        $('.carousel').slick({
            draggable: true,
            dots: true,
            arrows: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000
        });
    });
    </script>
</body>

</html>