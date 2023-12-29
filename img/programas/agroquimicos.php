<!doctype html>
<html>
    <head>
    	
    	<?php
		require_once("app/Config.php");
		require_once ("section_head.php");
		
		if(Config::DISPLAY_ERROR){
			ini_set('display_errors','On');
			error_reporting(E_ALL);
		}
		?>
		<link rel="stylesheet" type="text/css" href="css/estilofuente.css">
		<style>
			.TextWrapDerecha{
			    float: right;
				margin: 25px;
				width:600px;
			}
			.TextWrapIzquierda{
			    float: left;
				margin: 25px;
				width:600px;
			}
		</style>
		<style>
			article, aside, figure, footer, header, hgroup, 
			menu, nav, section { display: block; margin-left: 10px;margin-right:10px }
			
			.wrap {
			  overflow: hidden;
			  width: relative;
			  margin: 0 auto;
			}
			
			.tint {
			  position: relative;
			  float: left;
			  margin-right: 20px;
			  margin-bottom: 20px;
			  cursor: pointer;
			  box-shadow: rgba(0,0,0,.2) 3px 5px 5px;
			}
			
			.tint:before {
			  content: "";
			  display: block;
			  position: absolute;
			  top: 0;
			  bottom: 0;
			  left: 0;
			  right: 0;
			  background: rgba(0, 0, 0, 0.5);
			  transition: all .3s linear;
			}
			
			.tint:hover:before { background: none; }
			
			.t2:before { background: rgba(0, 0, 0, 0.5); }
			.t3:before { background: rgba(0, 0, 0, 0.5); }
			.t4:before { background: rgba(0, 0, 0, 0.5); }
		</style>
		
		<style>
		@import url(https://fonts.googleapis.com/css?family=Glegoo);
			blockquote {
			  position: relative;
			  margin-left: 80px auto;
  			  margin-right: 80px auto;
			  font-size: 36px;
			  line-height: 56px;
			  padding-left: 40px;
			  border-left: 2px solid black;
			  font-family: 'Glegoo', serif;
			}
			
			blockquote span {
			  display: block;
			  text-align: right;
			  font-size: 24px;
			  line-height: 40px;
			  margin-top: 10px;
			  text-transform: uppercase;
			}
			
			blockquote.tweet-this:hover p {
				opacity: 0.5;
				transition: opacity 0.2s ease;
			}
		
			blockquote.tweet-this .tweet-quote {
			  position: absolute;
			  top: 50%;
			  left: 50%;
			  width: 74px;
			  height: 26px;
			  margin-top: -13px;
			  margin-left: -36px;
			  transition: all 0.2s ease;
			}
        </style>
		
		<style>
		* {
		  font-family: Roboto;
		}
		
		span {  
		  font-size: 18px;
		}
		
		div.message {
		  position: relative;
		  padding: 10px;
		  padding-left: 35px;
		  margin: 30px 10px;
		  box-shadow:0 2px 5px rgba(0,0,0,.3);
		  background: #BBB;
		  color: #FFF;
		  font-size: 16px;
		  
		  -webkit-transition: all .5s ease;
			 -moz-transition: all .5s ease;
			  -ms-transition: all .5s ease;
			   -o-transition: all .5s ease;
				  transition: all .5s ease;
		}
		div.message:hover{
		  box-shadow: 0 15px 20px rgba(10,0,10,.3);
		  -webkit-filter: brightness(110%);
		}
		
		div.message:before{
		  content: '';
		  font-family: FontAwesome;
		  position: absolute;
		  display: block;
		  top: -21px;
		  left: 50%;
		  margin:0 -21px;
		  font-size: 20px;
		  line-height: 24px;
		  text-align: center;
		  width: 40px;
		  padding:10px;
		  background: inherit;
		  box-shadow:0 5px 10px rgba(0,0,0,.25);
		  color: rgba(255,255,255,.75);
		  border-radius:20%;
		  border: 2px solid transparent;
		  z-index: 2;
		}
		
		div.message.information:before{content:'\f129';}
		div.message.information{background: #5A6;}
		</style>
		
		<style>
		#wrap {
			margin: 20px auto;
			text-align: center;
		}
		
		.btn-slide, .btn-slide2 {
			position: relative;
			display: inline-block;
			height: 53px;
			width: 300px;
			line-height: 50px;
			padding: 1px;
			border-radius: 50px;
			background: #fdfdfd;
			border: 2px solid #1f8724;
			margin: 5px;
			transition: .5s;
		}
		
		.btn-slide2 {
			border: 2px solid #1f8724;
		}
		
		.btn-slide:hover {
			background-color: #1f8724;
		}
		
		.btn-slide2:hover {
			background-color: #1f8724;
		}
		
		.btn-slide:hover span.circle, .btn-slide2:hover span.circle2 {
			left: 100%;
			margin-left: -45px;
			background-color: #fdfdfd;
			color: #0099cc;
		}
		
		.btn-slide2:hover span.circle2 {
			color: #1f8724;
		}
		
		.btn-slide:hover span.title, .btn-slide2:hover span.title2 {
			left: 30px;
			opacity: 0;
		}
		
		.btn-slide:hover span.title-hover, .btn-slide2:hover span.title-hover2 {
			opacity: 1;
			left: 30px;
		}
		
		.btn-slide span.circle, .btn-slide2 span.circle2 {
			display: block;
			background-color: #0099cc;
			color: #fff;
			position: absolute;
			float: left;
			margin: 5px;
			line-height: 42px;
			height: 40px;
			width: 40px;
			top: 0;
			left: 0;
			transition: .5s;
			border-radius: 50%;
		}
		
		.btn-slide2 span.circle2 {
			background-color: #1f8724;
		}
		
		.btn-slide span.title,
		  .btn-slide span.title-hover, .btn-slide2 span.title2,
		  .btn-slide2 span.title-hover2 {
			position: absolute;
			left: 90px;
			text-align: center;
			margin: 0 auto;
			font-size: 16px;
			font-weight: bold;
			color: #30abd5;
			transition: .5s;
		}
		
		.btn-slide2 span.title2,
		  .btn-slide2 span.title-hover2 {
			color: #1f8724;
			left: 70px;
		  }
		
		.btn-slide span.title-hover, .btn-slide2 span.title-hover2 {
			left: 80px;
			opacity: 0;
		}
		
		.btn-slide span.title-hover, .btn-slide2 span.title-hover2 {
			color: #fff;
		}
        </style>
				
    </head>
    <body class="fixed-header">
    	<div class="page-box">
    		 <div class="page-box" style="padding-top:0px">
            	<div class="page-box-content">
<?php
                require_once ("menu_header.php");
				?>
		<link rel="stylesheet" type="text/css" href="css/estilofuente.css">
	
    </head>
    <body class="fixed-header">
    	<div class="page-box">
    		 <div class="page-box" style="padding-top:0px">
            	<div class="page-box-content">
                <?php
                require_once ("menu_header.php");
				?>
				<br>
				<div id="tabs">
				  <ul style="background-image:url(img/programas/agroquimicos.gif); background-repeat:no-repeat; background-size: cover;">
				  	<!--div style="color:#FFF; font-size:45px; text-align:right; font-family:Robot;"><i>Programa Agroqu&iacute;micos</i> &nbsp;&nbsp;&nbsp;</div-->
				  	<li><a href="#tabs-1">AGROQU&Iacute;MICOS</a></li>
				    <li><a href="#tabs-2">AN&Aacute;LISIS DE<br>RESIDUOS</a></li>
				    <li><a href="#tabs-3">AGROLIMPIO</a></li>
				    <li><a href="#tabs-4">MERCADO DE <br>AGROQU&Iacute;MICOS</a></li>
				  </ul>
				  <div id="tabs-1">
				  	
				  	<p>&nbsp;</p>
				  	<p align="justify">El hombre siempre trat&oacute; de proteger sus cultivos de los ataques de plagas y enfermedades que afectan los rendimientos y la calidad de los productos vegetales. Para lograr este objetivo utiliz&oacute; sustancias qu&iacute;micas naturales o artificiales, a las que hoy se denomina agroqu&iacute;micos pero que, seg&uacute;n la regi&oacute;n, el &aacute;mbito y los tiempos, se las llam&oacute; de diferentes maneras: fitosanitarios, fitoterap&eacute;uticos, agrot&oacute;xicos, fitof&aacute;rmacos, plaguicidas y pesticidas.</p>
					<p align="justify"> Estas sustancias qu&iacute;micas pueden ser un riesgo para la salud del aplicador, su familia, el consumidor y el ambiente. El riesgo puede ser definido como la probabilidad de que algo no deseado ocurra o la caracter&iacute;stica propia de una sustancia que potencialmente puede producir un da&ntilde;o o un efecto adverso o negativo para la salud. Esta posibilidad est&aacute; en relaci&oacute;n directa con la toxicidad de la sustancia y el nivel (magnitud y tiempo)&nbsp;de exposici&oacute;n a la misma. </p>
					<p align="justify"> Los agroqu&iacute;micos no son una realidad reciente, y es sabido por todos los involucrados en el sector productivo que a&uacute;n el menos t&oacute;xico de estos productos entra&ntilde;a un peligro, por lo que productores y t&eacute;cnicos&nbsp;son responsables del correcto uso y manipulaci&oacute;n de los mismos. </p>
					<p align="justify"><strong> Lograr que los alimentos sean saludables e inocuos (es decir, que no causen da&ntilde;os) es responsabilidad directa de quienes los producen, elaboran, distribuyen, comercializan y emplean; como as&iacute; tambi&eacute;n de los organismos de control que deben ejercer las acciones necesarias para reducir o minimizar los riesgos reales y potenciales para la salud. </strong></p>
					<p align="justify"> Los agroqu&iacute;micos constituyen un tema de m&uacute;ltiples facetas; su impacto trasciende a los sectores jur&iacute;dicos, ambientales y a los relacionados con la seguridad e higiene del trabajador agr&iacute;cola que hacen a su protecci&oacute;n. El ideal al que se debe aspirar es a un respeto de las normativas vigentes, fuertes pol&iacute;ticas de&nbsp; capacitaci&oacute;n &nbsp;y buen uso de las herramientas tecnol&oacute;gicas. La tendencia actual es procurar reducir los riesgos adoptando enfoques preventivos mediante una fuerte asistencia t&eacute;cnica a los sectores de la producci&oacute;n, y una constante pol&iacute;tica de control para lo que se requieren recursos t&eacute;cnicos y econ&oacute;micos adecuados. </p>
					<h4>OBJETIVOS</h4>
					<ul>
					  <li>
					    <div align="justify">Garantizar la calidad de los agroqu&iacute;micos adquiridos por los productores para ser utilizados en el proceso productivo, as&iacute; como tambi&eacute;n la inocuidad toxicol&oacute;gica de los productos de origen vegetal para consumo en fresco. </div>
					  </li>
					  <li>
					    <div align="justify">En el marco de la <a href="http://www.iscamen.com.ar/wp-content/uploads/2012/08/MENDOZA-Ley-5665.pdf">Ley Provincial N&ordm; 5665 </a>, promover la correcta y racional utilizaci&oacute;n de los agroqu&iacute;micos mediante la fiscalizaci&oacute;n y transferencia educativa en los sectores involucrados. </div>
					  </li>
				    </ul>
					<p><strong>C&Oacute;MO LO HACEMOS<br>
					</strong>Mediante una serie de controles que abarcan todo el proceso productivo, incluyendo transporte, acopio, comercializaci&oacute;n y aplicaci&oacute;n de agroqu&iacute;micos. Verificando que el producto responda a los est&aacute;ndares de calidad establecidos. </p>
					<p><strong>A QUI&Eacute;N EST&Aacute; DIRIGIDO<br>
					</strong>Laboratorios y comercios de productos agroqu&iacute;micos. Productores agr&iacute;colas y consumidores en general.</p>
				  </div>	
				  <div id="tabs-2">
					<h4>&nbsp;</h4>
					<h4>DETERMINACI&Oacute;N DE RESIDUOS EN FRUTAS Y VERDURAS </h4>
					<p align="justify">En relaci&oacute;n a los agroqu&iacute;micos, Mendoza dispone de un marco legal regulatorio desde el a&ntilde;o 1991 que es la Ley provincial de  agroqu&iacute;micos&nbsp; <a href="http://www.iscamen.com.ar/wp-content/uploads/2012/09/MENDOZA-Ley-5665.pdf"> N&ordm; 5665 </a> y su decreto reglamentario 1469/93. Estas normas tienen entre otros objetivos los de proteger la salud de la poblaci&oacute;n, prevenir y disminuir los riesgos de intoxicaciones y evitar la contaminaci&oacute;n de alimentos y del ambiente. Por otro lado, esta acci&oacute;n apunta indirectamente a medir el comportamiento de aplicadores y conocer la calidad de los alimentos que consume la poblaci&oacute;n.</p>
					<p align="justify"> En virtud de este marco legal, el ISCAMEN, a trav&eacute;s del Programa Agroqu&iacute;micos, toma muestras vegetales en hipermercados, supermercados, centros de distribuci&oacute;n y empaques, para determinar la presencia de residuos de agroqu&iacute;micos. Las muestras vegetales son analizadas en laboratorios habilitados para tal fin. </p>
					<p align="justify" class="Estilo1">MUESTREO DE VEGETALES </p>
					<div id="wrap">
							<a href="docs/agroquimicos/Especies Muestreadas 2007-2017.xlsx" class="btn-slide2">
							<span class="circle2"><i class="fa fa-download"></i></span>
						 <span class="title2">TIPOS DE MUESTRAS 07/16</span>
							<span class="title-hover2">DESCARGAR</span>		</a>
								<a href="docs/agroquimicos/Muestras 2007-17.xlsx" class="btn-slide2">
							<span class="circle2"><i class="fa fa-download"></i></span>
						 <span class="title2">DATOS 2007/16</span>
							<span class="title-hover2">DESCARGAR</span>		</a>
						<a href="docs/agroquimicos/Muestras 2017 (Grafico).xlsx" class="btn-slide2">
							<span class="circle2"><i class="fa fa-download"></i></span>
						 <span class="title2">DATOS 2017</span>
							<span class="title-hover2">DESCARGAR</span>		</a>	
					</div>
					<p><strong>L&Iacute;MITES M&Aacute;XIMOS DE CULTIVOS PARA DISTINTOS CULTIVOS Y PA&Iacute;SES</strong></p>
					<p align="justify">El contexto econ&oacute;mico ha determinado un fuerte crecimiento de la exportaci&oacute;n de frutas de la provincia. Sin embargo, el tipo de cambio que favorece al sector agr&iacute;cola en este sentido genera, a su vez, una serie de medidas parancelarias orientadas al aseguramiento de la sanidad y la calidad de los productos, lo que pone de relieve la importancia de la "Sanidad Vegetal" &nbsp;como un valor al cual est&aacute; ligada la apertura o el cierre de mercados.&nbsp; Cuanto m&aacute;s exigentes son estos mercados, mayor importancia adquiere la garant&iacute;a de "Sanidad Vegetal" que pueda ofrecer el vendedor. Una de las limitaciones que existen actualmente al comercio mundial de frutas y hortalizas est&aacute; dada por los L&iacute;mites m&aacute;ximos permitidos por productos y por pa&iacute;ses. </p>
					<p align="justify"> Luego de realizada una aplicaci&oacute;n de agroqu&iacute;micos, el producto se va degradando naturalmente&nbsp; hasta quedar en peque&ntilde;as cantidades cuya concentraci&oacute;n se mide&nbsp; en partes por mill&oacute;n; dicho de otra forma, ser&iacute;a la mil&eacute;sima parte de un gramo de agroqu&iacute;mico presente en un kilo de producto vegetal. En nuestro pa&iacute;s es el Servicio Nacional de Sanidad y Calidad Agroalimentaria (SENASA) el organismo que analiza los agroqu&iacute;micos, aprueba su uso para determinados vegetales y establece mediante estudios toxicol&oacute;gicos los L&iacute;mites M&aacute;ximos de Residuos. </p>
					<p align="justify"> Esas peque&ntilde;as cantidades permitidas y establecidas oficialmente est&aacute;n determinadas en normativas oficiales internacionales, nacionales y provinciales. Los l&iacute;mites m&aacute;ximos de residuos permitidos en la Argentina est&aacute;n establecidos en la Resoluci&oacute;n 934/10 de la SAGPYA, publicada en de diciembre de 2010. </p>
					 <div>
						<link href='https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,400,100,300,600,700' rel='stylesheet' type='text/css'>
						<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
					<div class="information message">
					  <h2> DATOS ADICIONAL <br><span>  "Para completar esta informaci&oacute;n, usted puede consultar los siguientes listados actualizados:<span> </h2> <HR>
						<p>_ Productos Prohibidos en Argentina <a href="http://www.iscamen.com.ar/rojo/prohibidos.asp"> LINK</a> <br>
					  _ L&iacute;mites M&aacute;ximos de Residuos para los Productos Permitidos en Argentina <a href="http://www.iscamen.com.ar/rojo/lmr.asp">LINK</a> <br> 
					  _ L&iacute;mites M&aacute;ximos de Residuos de Agroqu&iacute;micos para Uni&oacute;n Europea <a href="http://ec.europa.eu/sanco_pesticides/public/index.cfm">LINK</a> <br>
					  _ L&iacute;mites M&aacute;ximos de Residuos de Agroqu&iacute;micos para Otros Pa&iacute;ses, solicit&aacute;ndolo v&iacute;a mail a <a href="mailto:coord_agroq@iscamen.com.ar">coord_agroq@iscamen.com.ar </a>&oacute; telef&oacute;nicamente al 0 800 666 4722  </p>
					   </div>
					 </div> 
					<p>&nbsp;</p>
				  </div>
				  <div id="tabs-3">
				  	<h4>&nbsp;</h4>
					<h4>GESTI&Oacute;N PARA LA RECOLECCI&Oacute;N, COMPACTADO Y DISPOSICI&Oacute;N FINAL DE ENVASES VAC&Iacute;OS DE AGROQU&Iacute;MICOS </h4>
					<p align="justify">Resolver&nbsp;el problema de los envases vac&iacute;os de agroqu&iacute;micos constituye un desaf&iacute;o de dif&iacute;cil soluci&oacute;n. Si bien el volumen anual de envases despachados al mercado local de productos fitosanitarios es importante (alrededor de 160 toneladas), los problemas mayores son los derivados de la contaminaci&oacute;n que estos envases provocan&nbsp;y la dispersi&oacute;n geogr&aacute;fica de los mismos. </p>
					<p align="justify"> Debe&nbsp;considerarse el potencial impacto sobre la salud de las personas y el ambiente que podr&iacute;a derivar de un inadecuado manejo de recipientes que han alojado productos t&oacute;xicos. La preocupaci&oacute;n por el destino final que debe darse a estos envases llev&oacute; en su momento a que organismos sanitarios de la Naci&oacute;n,&nbsp; las provincias, y fabricantes y vendedores de agroqu&iacute;micos, articularan su accionar. </p>
					<p align="justify"> En el &aacute;mbito&nbsp; local, las acciones son coordinadas por el Instituto de Sanidad y Calidad Agropecuaria Mendoza que ha formalizado convenios con organizaciones civiles, empresarias y municipales para llevar adelante el programa de recolecci&oacute;n de envases vac&iacute;os de agroqu&iacute;micos, sometidos a triple lavado, y resolver luego sobre su disposici&oacute;n final - Agrolimpio. </p>
					<p><strong>TRANSFORMAR UN RESIDUO EN UN BIEN COMERCIAL PARA UN BIEN SOCIAL </strong></p>
					<p align="justify">Dado las ar&iacute;stas mencionadas, el ISCAMEN junto al sector privado, en el caso la C&aacute;mara Empresaria de Agroqu&iacute;micos y Afines de Mendoza (Ceamen), Baresi SRL la C&aacute;mara de Sanidad Agropecuaria y Fertilizantes "Casafe", firmaron un convenio por el cual a trav&eacute;s del programa Agrolimpio garantizar que el producto de la recuperaci&oacute;n y transformaci&oacute;n de un residuo agr&iacute;cola como son los envases vac&iacute;os de agroqu&iacute;micos descontaminados, sea aplicado a un fin social; parte de las ganancias de la reutlizaci&oacute;n del material se destina a entidades de bien p&uacute;blico, como Fundaci&oacute;n Conin y la Fundaci&oacute;n del Hospital Pedi&aacute;trico Dr. Humberto Notti</p>
					<p align="justify">Las partes acordaron destinar el material pl&aacute;stico recuperado a la fabricaci&oacute;n de elementos que no contengan alimentos para uso humano y/o animal. La firma mendocina Baresi aportar&aacute; a las fundaciones Con&iacute;n y del Hospital Humberto Notti el equivalente en pesos del material pl&aacute;stico entregado por el ISCAMEN luego de la recolecci&oacute;n de los envases vac&iacute;os sometidos a triple lavado. El monto en cuesti&oacute;n representar&aacute; entre el 18% y el 20% del valor de mercado del polietileno virgen seg&uacute;n los &uacute;ltimos datos sobre el precio del Polietileno de Alta Densidad (PEAD) tipo soplado. </p>
					<p align="justify">&nbsp;</p>
					 <div class="wrap">
					<figure class="tint">
					  <img src="img/agroquimicos/MA3_3243.JPG" alt="" width="350" height="260" />
					</figure>
					
					<figure class="tint t2">
					  <img src="img/agroquimicos/MA3_3196.JPG" alt="" width="350" height="260" />
					</figure>
					
					<figure class="tint t3">
					  <img src= "img/agroquimicos/IMG-20160811-WA0009.jpg" alt="" width="350" height="260" />
					</figure>		
				  </div>
					<p><strong>NORMATIVA</strong></p>
					<p align="justify">En consenso con la autoridad ambiental, el ISCAMEN dict&oacute; la ley mediante la cual se establecen prohibiciones para reutilizar los envases, enterrarlos, quemarlos o&nbsp;comercializarlos; adem&aacute;s de obligaciones por parte de los productores en el sentido de someter los envases vac&iacute;os a la t&eacute;cnica del triple lavado, inutilizarlos y llevarlos a los centros de acopio. </p>
					<p align="justify"> Esta normativa es in&eacute;dita en el pa&iacute;s, porque contempla la re-categorizaci&oacute;n de los envases como no peligrosos, siempre y cuando sean sometidos al triple lavado y esa condici&oacute;n sea supervisada por ISCAMEN. Aquellos envases con restos de agroqu&iacute;micos tienen un trato diferencial y son considerados residuos peligrosos. </p>
					<p><strong>PROCEDIMIENTO</strong></p>
					<p align="justify">El productor debe aplicar la t&eacute;cnica del triple lavado e inutilizar cada envase perfor&aacute;ndolo y aplast&aacute;ndolo. Luego debe colocarlos en los bolsones retirados previamente de las casas de venta de agroqu&iacute;micos, que participan del programa merced a un acuerdo celebrado entre el ISCAMEN y la C&aacute;mara Empresaria de Agroqu&iacute;micos de Mendoza. </p>
					<p align="justify"> La norma establece, por otra parte, que los productores pueden ofrecer acreditar mediante certificado oficial el tratamiento que hicieron a sus envases y, de ese modo, cumplir con lo exigido por los diferentes sistemas de calidad alimentaria. Todos los productores con actividad en la provincia de Mendoza pueden y deben participar del programa; s&oacute;lo tienen que comunicarse con el ISCAMEN para formalizar su adhesi&oacute;n.					  </p>
					<p align="justify"> Estos envases debidamente limpios e inutilizados, pueden ser procesados y convertidos en pellets, con lo que es posible realizar postes y tablas. Este material moldeado a altas temperaturas puede trabajarse tal como si fuese madera; un ejemplo de ello es el cartel ubicado al ingreso de la Planta de Producci&oacute;n de Insectos Est&eacute;riles del departamento de Santa Rosa.</a>					</p>
					<p align="justify"><strong>TRIPLE LAVADO DE LOS ENVASES </strong></p>
					<p align="justify">Cuando se termina el contenido de agroqu&iacute;micos en cualquier tipo de envase (pl&aacute;sticos, met&aacute;licos y/o vidrio) quedan restos del mismo que deben ser eliminados para evitar riesgos al hombre, los animales y el medio ambiente. </p>
					<p align="justify"> Entre otras ventajas, la t&eacute;cnica del TRIPLE LAVADO permite aprovechar hasta la &uacute;ltima gota del producto y por lo tanto el productor ahorra dinero. </p>
					<p align="justify">Los envases vac&iacute;os deben ser totalmente escurridos en el momento de agotar su contenido; para ello se debe mantener en posici&oacute;n de descarga durante no menos de 30 segundos, esto se evidencia por un goteo espaciado. </p>
					<p align="justify"> Luego se debe llenar una cuarta parte del envase vac&iacute;o con agua, se ajusta el tap&oacute;n y se agita en&eacute;rgicamente. El agua proveniente de esta limpieza se&nbsp;&nbsp; agregar&aacute; al tanque de la pulverizadora para ser utilizado en la tarea fitosanitaria prevista. <br>
					  Esta operaci&oacute;n debe repetirse por lo menos dos veces m&aacute;s. </p>
					<p align="justify">Se debe utilizar siempre agua proveniente de ca&ntilde;er&iacute;as o canillas, nunca se sumergir&aacute;n los envases en acequias, cursos de agua o lagunas para su lavado ya que estas fuentes quedar&iacute;an contaminadas. </p>
					<p align="justify"> Una vez finalizada la tarea de aplicaci&oacute;n, se debe inutilizar el envase perfor&aacute;ndolo en el fondo con un elemento punzante y colocarlo en la bolsa que le fue provista en la casa de venta de agroqu&iacute;micos. </p>
					<p align="justify"> Esta bolsa se colocar&aacute; en un dep&oacute;sito transitorio el cual deber&aacute; estar ubicado en un sector aislado del campo, muy bien delimitado e identificado, cubierto, bien ventilado y al resguardo de factores clim&aacute;ticos. </p>
					<p align="center" style="background-color:#DEF3CA">
						<b>"Cuando se llena una bolsa, &eacute;sta debe ser trasladada a cualquier casa de venta de agroqu&iacute;micos donde se los acopia. Posteriormente, el ISCAMEN procede a la compactaci&oacute;n de los envases en la Planta del Departamento de San Mart&iacute;n."</b>
					</p>
				
				  </div>
				  <div id="tabs-4">
				  	<h4>&nbsp;</h4>
					<p align="justify">&nbsp;</p>
					<p align="justify">Los agroqu&iacute;micos son un tema de alta sensibilidad social y econ&oacute;mica en el Mercado de Agroqu&iacute;micos, por lo que hoy en d&iacute;a se reclama un fuerte &eacute;nfasis en el cumplimiento de las acciones que impliquen mayor seguridad. En este sentido, desde ISCAMEN se realizan acciones de control directo, adem&aacute;s de haber completado la capacitaci&oacute;n de su personal&nbsp;para obtener la licencia de conducir para transporte de cargas peligrosas, y haber realizado los tr&aacute;mites pertinentes ante la autoridad vial para registrar y equipar un veh&iacute;culo especial &nbsp;para realizar las tareas inherentes a la fiscalizaci&oacute;n. <img src="img/agroquimicos/MA3_3221.JPG" width="400" height="280" class="TextWrapIzquierda"></p>
					<p align="justify"><strong>REGISTRO PROVINCIAL DE EMPRESAS DE AGROQU&Iacute;MICOS </strong></p>
					<p align="justify">Las 114 empresas vendedoras de agroqu&iacute;micos que constituyen el Registro Provincial de <a href="http://www.iscamen.com.ar/index.php?option=com_content&view=article&id=35&Itemid=6">Empresas de Agroqu&iacute;micos </a> son sujeto de fiscalizaci&oacute;n y est&aacute;n presentes en el &aacute;mbito provincial y son quienes comercializan las 5.800 toneladas de agroqu&iacute;micos utilizados en Mendoza; de &eacute;stas, el 60% responde a productos inorg&aacute;nicos y el 40% a productos de s&iacute;ntesis. </p>
					<p><strong>SISTEMA DE REGISTRO PRODUCTOS DE BANDA ROJA </strong></p>
					<p align="justify">Las casas expendedoras de agroqu&iacute;micos deben cumplir con lo establecido en la&nbsp; <a href="http://www.iscamen.com.ar/index.php?option=com_content&view=article&id=57&Itemid=9">Ley Provincial N&ordm; 5665 </a>, referida al registro obligatorio de productos que responden a la categor&iacute;a toxicol&oacute;gica 1A y 1B -productos Banda Roja-. Esto deben cumplimentarlo a trav&eacute;s de esta misma p&aacute;gina ingresando&nbsp; <a href="http://www.iscamen.com.ar/rojo">aqu&iacute; </a>&nbsp;con la clave otorgada oportunamente. </p>
					<p align="justify"><strong>FRACCIONAMIENTO</strong></p>
					<p align="justify">Uno de los puntos en que se trabaja fuertemente es en la eliminaci&oacute;n paulatina del fraccionamiento. Para ello se ha convocado a los laboratorios y a las c&aacute;maras que agrupan este sector con la intenci&oacute;n de promover el cumplimiento de lo establecido en el C&oacute;digo Internacional de Conducta (FAO) que dice: "...poner a disposici&oacute;n una gama de tama&ntilde;os y equipos de envases que se ajusten a las necesidades de los peque&ntilde;os agricultores..." con el fin de reducir los riesgos para la salud y evitar la presencia de productos adulterados. </p>
					<p>&nbsp;</p>
				  </div>
				</div>
			</div>
		</div>
      </div>
	
    <?php
    require_once ("section_fotter.php");
    ?>
	<link rel="stylesheet" href="js/jquery-ui/jquery-ui.css">
  	<link rel="stylesheet" href="js/jquery-ui/jquery-ui.theme.css">
  	<script src="js/jquery-ui/jquery-ui.min.js"></script>
	 <script>
	      $( function() {
		    $( "#tabs" ).tabs();
		  } );
	  </script>
	   <script>
	  !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
		$('blockquote.tweet-this').hover(function() {
		  var blockQuoteText = $(this).text();
		  var currentUrl = window.location;
		
		  $(this).append('<div class="tweet-quote"><a href="https://twitter.com/share" data-text="' +blockQuoteText+ '"class="twitter-share-button" data-via="prensaiscamen" data-url=" data-size="large" data-count="vertical">Tweet</a></div>');
		 		
		  $('.tweet-quote').hide().fadeIn(200);
		
		  twttr.widgets.load();
		
		  }, function() {
			$('.tweet-quote').remove();
		});
	  </script>
    </body>
</html>
