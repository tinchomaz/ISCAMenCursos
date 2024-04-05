<?php
require_once("app/Config.php");
require_once("FunctionApp.php");
if(Config::DISPLAY_ERROR){
	ini_set('display_errors','On');
	error_reporting(E_ALL);
}else{
	ini_set('display_errors','Off');
}
$urlBaseIscamen = Config::getURLBaseApacheIscamen();
$dbconn = pg_connect("host=".Config::SERVIDOR_DB." port=".Config::PUERTO_DB." dbname=".Config::BASE_DB." user=".Config::USUARIO_DB." password=".Config::CLAVE_DB."") or die('No se ha podido conectar: ' . pg_last_error());
//-------------------
session_start();
if(isset($_REQUEST["idcurso"])){
		$idcurso = $_REQUEST["idcurso"];
		/* Query contenidohtml*/
		$query = "SELECT contenidohtml,denominacion FROM difusion.curso_capacitacion
				WHERE difusion.curso_capacitacion.id = $idcurso";
		$res = pg_query($dbconn, $query);
		if($res){
			// Obtener el valor de la variable y asignarlo a una variable en PHP
			$row = pg_fetch_assoc($res);
			$contenidohtml = $row['contenidohtml'];
			$denominacion = $row['denominacion'];
		}else{
			echo "Error en la consulta: " . pg_last_error($dbconn);
		}}else{
			echo "ERROR";
			exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $denominacion ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
<link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/Main.css">
<script>
	/*abrir overlay de los videos*/
    function mostrarVideoOverlay(counter) {
		var videoOverlay = document.getElementById('video-overlay-' + counter);
		if (videoOverlay) {
			videoOverlay.style.display = 'flex';
		}
		document.addEventListener('click', function (event) {
			if (event.target === videoOverlay) {
				videoOverlay.style.display = 'none';
				const iframe = videoOverlay.querySelector("iframe");
				iframe.src = iframe.src;
			}
		});
    }
</script>

</head>
<body>
<div class="super_container">
	<!-- Header -->
	<header class="">
		<?php include 'php/header.php' ?>
	</header>
	<!-- Home -->
	<div class="home">
		<img src="imagenes/homeCurso.png" alt="">
		<div class="encabezadoCurso">
			<?php echo $denominacion ?>
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
				<?php echo $denominacion ?>
			</div>
		</div>
	</div>
	<!-- Modulos -->
		<?php
		include 'php/desplegarModulos.php';
		?>
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