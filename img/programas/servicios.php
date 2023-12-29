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
    </head>
    <body class="fixed-header">
   	<div class="page-box">
	  <div class="page-box" style="padding-top:0px">
       	<div class="page-box-content">
                <?php
                require_once ("menu_header.php");
				?>
		  <div id="tabs">
					  <ul>
					  	<li><a href="#tabs-1">Servicios</a></li>
					    <li><a href="#tabs-2">Calendario control cultural</a></li>
					    <li><a href="#tabs-3">Tratamientos de frutales</a></li>
						<li><a href="#tabs-4">Alertas</a></li>
						<li><a href="#tabs-5">Tr&aacute;mites</a></li>
					  </ul>
					  <div id="tabs-1">
						<h4 style="font-family:verdana; color:#256D45; margin-left:5%"><u>Servicios</u></h4>
						<p style="width:90%;margin:auto; text-align:justify;">
							Muchos de los servicios que presta el ISCAMEN pueden realizarse a trav&eacute;s de los formularios que se encuentran disponibles, asimismo encontrar&aacute; informaci&oacute;n sobre cualquier otro tr&aacute;mite que requiera realizarse de manera personal en cuyo caso deber&aacute; dirigirse a la delegaci&oacute;n m&aacute;s cercana a su domicilio.
						</p>
						<br>
						<p style="font-weight:bold;color:#256D45; width:90%;margin:auto; text-align:justify;">
							Recuerde que usted cuenta con una l&iacute;nea gratuita para realizar cualquier tipo de consulta:0-800-666-4722 (ISCAMEN)
						</p>
						<br>
				    	<div id="accordion" style="width:90%; margin:auto">
						  <h3 style="width:100%;height:auto">1. Prevenci&oacute;n de intoxicaciones</h3>
						  <div>
						    <p>
					    	<h4>Aplicaci&oacute;n de Agroqu&iacute;micos: "Hacer que los riesgos sean los m&iacute;nimos"</h4>
								<p align="justify">Quienes trabajan con agroqu&iacute;micos est&aacute;n expuestos a estas sustancias t&oacute;xicas por lo que deben tener en cuenta los momentos y las actividades en que deben protegerse adecuadamente para evitar ser afectados en su salud. En resumen  se podr&iacute;a decir que en las actividades de carga y descarga en el dep&oacute;sito, en la preparaci&oacute;n y aplicaci&oacute;n, en la limpieza de la maquinaria y  en el tratamiento de los envases es imprescindible tener cuidado. Adem&aacute;s es fundamental respetar el tiempo de reingreso a un predio luego de haber realizado tratamientos con agroqu&iacute;micos.</p>
								<p><strong>Cuidados esenciales</strong></p>
								<ul>
								<li>Al abrir un envase h&aacute;galo con cuidado para no sufrir salpicaduras o derrames sobre el cuerpo.</li>
								<li>Nunca perfore el envase. Si es necesario use herramientas adecuadas para remover las tapas.</li>
								<li>Utilice probetas, vasos graduados, balanzas, baldes, embudos y otros utensilios para la preparaci&oacute;n de mezclas. Estos utensilios deben ser usados exclusivamente para este fin.</li>
								<li>Nunca utilice utensilios dom&eacute;sticos.</li>
								<li>Use siempre guantes impermeables. Se recomienda el uso de protecci&oacute;n facial y delantal impermeable en la preparaci&oacute;n de mezclas</li>
								<li>Nunca agite las mezclas con las manos.</li>
								<li>Despu&eacute;s de preparar la mezcla, lavar todos los utensilios usados que sirvieron para la elaboraci&oacute;n</li>
								<li>Utilice siempre agua limpia. Si es necesario cu&eacute;lela para eliminar las impurezas que pueda contener y que, eventualmente puedan tapar los picos aplicadores.</li>
								<li>Nunca se deben aspirar productos o mezclas utilizando mangueras o cualquier otro utensilio.</li>
								<li>Maneje los polvos secos, mojables o solubles de manera tal de evitar el desprendimiento de part&iacute;culas.</li>
								<li>No prepare mezclas en la proximidad de residencias, escuelas, poblaciones o donde haya animales. Si lo realiza en un galp&oacute;n, verifique que haya una buena ventilaci&oacute;n.</li>
								<li>Aleje a los ni&ntilde;os y a personas ajenas a la tarea del lugar de preparaci&oacute;n de mezclas.</li>
								<li>Tome todas las medidas necesarias para evitar la contaminaci&oacute;n de pozos, fuentes o cualquier tipo de cursos de agua.</li>
								<li>Nunca utilice cursos de agua para abastecer directamente a los tanques de las pulverizadoras.</li>
								</ul>
								<p align="justify">Siga siempre las dosis y diluciones recomendadas. Dosis m&aacute;s elevadas no significan mejorar la eficacia del producto y, en algunos casos, puede acarrear problemas de fitotoxicidad y riesgos para la salud y el ambiente. Dosis m&aacute;s bajas  de las recomendadas son menos eficaces y hasta ineficientes</p>
						    </p>
						  </div>
						  <h3 style="width:100%;height:auto">2. Destrucci&oacute;n de productos agroqu&iacute;micos vencidos</h3>
						  <div>
						    <p>
						   	Tanto productores individuales como, empresas agropecuarias e instituciones pueden solicitar el servicio arancelado de transporte, acondicionamiento y almacenaje transitorio como agroqu&iacute;micos vencidos u obsoletos, cuyo destino final es la destrucci&oacute;n por un operador habilitado para la "corriente de desechos Y4", seg&uacute;n la normativa nacional.
						    </p>
						  </div>
						  <h3 style="width:100%;height:auto">3. L&iacute;mites m&aacute;ximos de Residuos para distintos cultivos y pa&iacute;ses.</h3>
						  <div>
						    <p align="justify">El contexto econ&oacute;mico ha determinado un fuerte crecimiento de la exportaci&oacute;n de frutas de la provincia. Sin embargo el tipo de cambio que favorece al sector agr&iacute;cola en este sentido, genera a su vez una serie de medidas paraarancelarias orientadas al aseguramiento de la sanidad y la calidad de los productos, lo que pone de relieve la importancia de la "Sanidad Vegetal" como un valor al cual est&aacute; ligada la apertura o el cierre de mercados.  Cuanto m&aacute;s exigentes son estos mercados, mayor importancia adquiere la garant&iacute;a de "Sanidad Vegetal" que pueda ofrecer el vendedor. Una de las limitaciones que existen actualmente al comercio mundial de frutas y hortalizas est&aacute; dada por los L&iacute;mites m&aacute;ximos permitidos por productos y por pa&iacute;ses.<br />
							Luego de realizada una aplicaci&oacute;n de agroqu&iacute;micos, el producto se va degradando naturalmente  hasta quedar en peque&ntilde;as cantidades cuya concentraci&oacute;n se mide  en partes por mill&oacute;n, dicho de otra forma ser&iacute;a la mil&eacute;sima parte de un gramo de agroqu&iacute;mico presente en un kilo de producto vegetal. En nuestro pa&iacute;s es el Servicio Nacional de Sanidad y Calidad Agroalimentaria (SENASA) el organismo que analiza los agroqu&iacute;micos, aprueba su uso para determinados vegetales y establece mediante estudios toxicol&oacute;gicos los L&iacute;mites M&aacute;ximos de Residuos.<br />
							Esas peque&ntilde;as cantidades permitidas y establecidas oficialmente est&aacute;n determinadas en normativas oficiales internacionales, nacionales y provinciales. Los l&iacute;mites m&aacute;ximos de residuos permitidos en la Argentina est&aacute;n establecidos en la Resoluci&oacute;n 934/2010 del SENASA.</p>
							<p><strong>Para completar esta informaci&oacute;n, usted puede consultar los siguientes listados actualizados:<br />
							</strong><a style="color:green" href="docs/prohibido_y_restringidos_actualizado_2016.pdf" target="_blank">Productos Prohibidos en Argentina</a><br />
							<a style="color:green" href="http://www.iscamen.com.ar/rojo/lmr.asp" target="_blank">L&iacute;mites M&aacute;ximos de Residuos para los Productos Permitidos en Argentina</a> (Actualizado a Julio 2014)  <a style="color:green" href="http://www.iscamen.com.ar/rojo/lmr.asp" target="_blank"><br />
							</a>L&iacute;mites M&aacute;ximos de Residuos de Agroqu&iacute;micos para Otros Pa&iacute;ses, solicit&aacute;ndolo v&iacute;a mail a <span style="text-decoration: underline;"><span style="color: #0000ff;"><a style="color:green" href="mailto:coord_agroq@iscamen.com.ar" target="_blank">coord_agroq@iscamen.com.ar</a></span></span> &oacute; telef&oacute;nicamente al 0 800 666 4722<br />
							<a style="color:green" href="http://ec.europa.eu/sanco_pesticides/public/index.cfm" target="_blank">L&iacute;mites M&aacute;ximos de Residuos de Agroqu&iacute;micos para Uni&oacute;n Europea</a></p>
						  </div>
						  <h3>4. Sistema de Registro Productos Banda Roja</h3>
						  <div>
						    <p>
						    <p align="justify">Las casas expendedoras de agroqu&iacute;micos deben cumplir con lo establecido en la Ley Provincial N&deg; 5665, referida al registro obligatorio de productos que responden a la categor&iacute;a toxicol&oacute;gica 1A y 1B -productos Banda Roja-. Esto deben cumplimentarlo a traves de esta misma p&aacute;gina con la clave otorgada oportunamente.</p>
						    </p>
						  </div>
						  <h3>5. Certificaci&oacute;n de Envases Triplemente Lavados</h3>
						  <div>
						    <p>
						    <p align="justify">ISCAMEN como organismo oficial para la gesti&oacute;n de los envases vac&iacute;os de agroqu&iacute;micos y seg&uacute;n como se establece en la Resoluci&oacute;n 217, a requerimiento de las empresas que est&eacute;n implementando Buenas Pr&aacute;cticas Agr&iacute;colas, se entrega certificado que acredita que los envases ingresados al sistema han sido sometidos al triple lavado.</p>
						    </p>
						  </div>
						  <h3>6. Entrega Gratuita de Bolsones</h3>
						  <div>
						    <p>
						    <p align="justify">Estos bolsones entregados gratuitamente son aquellos contenedores para colocar los envases que fueron triplemente lavados y depositados en las casas de agroqu&iacute;micos posteriormente. ISCAMEN los retira y los traslada al Centro de Compactado. Estos bolsones presentan una etiqueta donde deben colocarse los datos del productor, direcci&oacute;n, lugar de entrega y N&deg; de RENSPA.</p>
						    </p>
						  </div>
						  <h3>7. Principios activos permitidos para el arbolado p&uacute;blico</h3>
						  <div>
						    <p>
						    <p>Teniendo en cuenta la necesidad de realizar tratamientos fitosanitarios en el arbolado p&uacute;blico y ante la falta de normativa oficial a nivel nacional que determine los productos agroqu&iacute;micos que pueden ser utilizados, el ISCAMEN, a trav&eacute;s del Programa Agroqu&iacute;micos ha emitido la Resoluci&oacute;n 66-I-2014 que establece los principios activos autorizados.</p>
							<ul>
							<li><a style="color:green" href="docs/Resolucion-066-I-2014-.pdf">Resoluci&oacute;n 66-I-2014 </a></li>
							<li><a style="color:green" href="docs/Listado-de-Principios-Activos-autorizados.xlsx">Listado de productos autorizados por Resoluci&oacute;n</a></li>
							</ul>
						    </p>
						  </div>
						  <h3>8. Capacitaci&oacute;n</h3>
						  <div>
						    <p>
						    <p align="justify">La capacitaci&oacute;n en los diversos sectores educativos y productivos constituye un pilar fundamental en el desarrollo del programa; se ofrecen a las escuelas agr&iacute;colas charlas, cursos de capacitaci&oacute;n a empresas agropecuarias y a productores.</p>
						    </p>
						  </div>
						  <h3>9. Implementaci&oacute;n de Buenas Pr&aacute;cticas Agr&iacute;colas</h3>
						  <div>
						    <p>
						    <p align="justify">El programa Agencia de Calidad Agroalimentaria cuenta con vasta experiencia en este tema, con 15 certificaciones, 5 en v&iacute;as de certificar , 31 en implementaci&oacute;n , 65 diagnosticados en comienzo en  de implementaci&oacute;n y actualmente se han acoplado 4 asociaciones con varios productores mas. Cubriendo el sector hortofrut&iacute;cola  con prototipos a multiplicar en toda la provincia.<br />
							El programa ha dise&ntilde;ado el plan de implementaci&oacute;n "Comprometidos con las Buenas Pr&aacute;cticas Agr&iacute;colas" con el fin de que los productores puedan dar la confianza necesaria a los compradores de que sus productos son de calidad e inocuos, y que han sido producidos acorde con las exigencias establecidas por los principales mercados.<br />
							La producci&oacute;n limpia en el sector hortofrut&iacute;cola a trav&eacute;s de la implementaci&oacute;n de Buenas Pr&aacute;cticas Agr&iacute;colas beneficia :</p>
							<ul>
							<li>
							<div align="justify"> <strong>A los consumidores</strong>, porque dado el hecho de que gran parte del volumen de frutas que se comercializa en nuestro Mercado interno pasa por el mismo proceso que las de exportaci&oacute;n, este programa tiene un impacto significativo en la inocuidad de estos productos.</div>
							</li>
							<li>
							<div align="justify"><strong>A los productores</strong>, porque se les facilita el acceso a los principales mercados de destino, como son Estados Unidos y Europa, donde se han establecido progresivamente normativas y exigencias destinadas a aplicar programas de Buenas Pr&aacute;cticas Agr&iacute;colas en toda la cadena de los productos hortofrut&iacute;colas.</div>
							</li>
							<li>
							<div align="justify"><strong>A los trabajadores</strong>, porque se promueve la aplicaci&oacute;n de pr&aacute;cticas, que aseguren la prevenci&oacute;n necesaria para que todas las personas involucradas directa o indirectamente en alguna etapa del ciclo productivo, se desempe&ntilde;en en condiciones de seguridad y no pongan en riesgo su salud.</div>
							</li>
							</ul>
						    </p>
						  </div>
						  <h3>10. Cronograma de Capacitaci&oacute;n a Productores</h3>
						  <div>
						    <p>
						    <p align="justify">El ISCAMEN organiza todos los a&ntilde;os un cronograma de encuentros de capacitaci&oacute;n gratuitos para productores. Los mismos se realizan en todos los oasis productivos de la Provincia y son guiados por t&eacute;cnicos de este Instituto. Se incluyen todos los temas que aqu&iacute; se trabajan</p>
						    </p>
						  </div>
						  <h3>11. Visitas a la Bioplanta de Producci&oacute;n de Insectos Est&eacute;riles de Santa Rosa</h3>
						  <div>
						    <p>
						    <p align="justify">La Bioplanta de Producci&oacute;n de Insectos Est&eacute;riles, ubicada en el departamento de Santa Rosa, ofrece Visitas Guiadas para instituciones educativas y p&uacute;blico en general. Personal capacitado, acompa&ntilde;a los grupos en un recorrido de una hora de duraci&oacute;n aproximadamente. Visitada peri&oacute;dicamente por investigadores y t&eacute;cnicos de todo el mundo, se encuentra abierta para quienes lo soliciten.<br />
							La T&eacute;cnica del Insecto Est&eacute;ril, utilizada en Mendoza desde m&aacute;s de diez a&ntilde;os, en el control no contaminante de la Mosca del Mediterr&aacute;neo, despierta un inter&eacute;s genuino en personas de diversos intereses.<br />
							Las modernas instalaciones cuentan con un puente de visualizaci&oacute;n desde donde pueden observarse todas las instacias de cr&iacute;a involucradas en el proceso de producci&oacute;n.<br />
							Las visitas se realizan los d&iacute;as martes y jueves por la ma&ntilde;ana; y para realizarla, s&oacute;lo ser&aacute; necesario hacer la solicitud en el &aacute;rea de Difusi&oacute;n y Capacitaci&oacute;n, a trav&eacute;s de un correo electr&oacute;nico o al 0 800 666 4722.</p>
						    </p>
						  </div>
						  <h3>12. Formularios y Registros</h3>
						  <div>
						    <p>
						    <ul>
							<li><a style="color:green" href="docs/PLANILLA-DE-INSCRIPCIoN-2017-18.pdf" target="_blank">Formulario Inscripci&oacute;n/Reinscripci&oacute;n de Empresas de Agroqu&iacute;micos</a></li>
							<li><a style="color:green" href="docs/Requisitos-Inscripcion-RPEA-para-la-Web.pdf" target="_blank">Requisitos para la inscripci&oacute;n/reinscripci&oacute;n en el Registro Provincial de Empresas de Agroqu&iacute;micos</a></li>
							<li><a style="color:green" href="docs/LEY-PROVINCIAL-IMPOSITIVA.pdf" target="_blank">Tasas para la inscripci&oacute;n/reinscripci&oacute;n</a></li>
							<li><a style="color:green" href="docs/TransportistasAGROQ.pdf" target="_blank">Registro de Empresas Transportistas de Agroqu&iacute;micos</a></li>
							<li><a style="color:green" href="docs/Distribuidores%20-AlmacenadoresAGROQ.pdf" target="_blank">Registro de Distribuidores / Almacenadores de Productos Agroqu&iacute;micos</a></li>
							<li><a style="color:green" href="docs/LaboratoriosAGROQ.pdf" target="_blank">Registro de Laboratorios de Productos Agroqu&iacute;micos</a></li>
							<li><a style="color:green" href="docs/ExpendedoresAGROQ.pdf" target="_blank">Registro de Expendedores de Productos Agroqu&iacute;micos</a></li>
							<li><a style="color:green" href="docs/listado-de-galpones-de-ajo-habilitados.pdf" target="_blank">Registro de Galpones de Ajo Habilitados </a></li>
							<li><a style="color:green" href="docs/A-18-Formulario-de-inscripcion-15-16.pdf" target="_blank">Formulario de Inscripci&oacute;n para el Registro de galpones de ajo</a></li>
							<li><a style="color:green" href="docs/INSTRUCCIONES-2015-20161.pdf" target="_blank">Requisitos para la Inscripci&oacute;n en el Registro de Galpones de Ajo</a></li>
							</ul>
						    </p>
						  </div>
						</div>
					  </div>
					  <div id="tabs-2">
					  	<h4><u>Calendario control cultural</u></h4>
				 		<h4>REBAJE DEL MONTE</h4>
						<p><strong>MARZO-ABRIL-MAYO</strong></p>
						<p style="text-align: justify;">Las plantas de manzana o pera no deben tener m&aacute;s de 4.5 metros de altura. Las pulverizadoras disponibles en el mercado no son eficientes para cubrir la copa de los &aacute;rboles m&aacute;s altos. Por encima de esta altura debe pulverizarse con manguera.[/two-thirds]
						</p>
						<hr width="90%">
						
						<h4>PODA SANITARIA</h4>
						<p><strong>MARZO-ABRIL-MAYO-JUNIO-JULIO-AGOSTO-SETIEMBRE-OCTUBRE</strong></p>
						<p style="text-align: justify;">No debe haber m&aacute;s de 6 puntales por planta, uno a cada lado del bordo o fila y dos hacia cada interfilar o calle.&nbsp;Deben haber de 4 a 6 ramas por plano para asegurar la buena penetraci&oacute;n de los productos al realizar la pulverizaci&oacute;n de productos agroqu&iacute;micos.<br>
						Despu&eacute;s de la poda deben recolectarse los restos para impedir que sobrevivan las larvas. Si no se incorporan al suelo deben quemarse.[/two-thirds]
						</p>
						<hr width="90%">
						
						<h4>RASPADO DE TRONCOS Y QUEMADO DE RESIDUOS</h4>
						<p><strong>ABRIL-MAYO-JUNIO-JULIO</strong><br>
						Colocar un pl&aacute;stico en el suelo para recoger todos los restos del raspado<br>
						Raspar los troncos y ramas principales con un machete o cualquier elemento filoso<br>
						Retirar todos los restos y quemarlos.</p>
						<hr width="90%">
						
						<h4>CALIBRACI&Oacute;N DE LA PULVERIZADORA</h4>
						<p><strong>JUNIO-JULIO-AGOSTO-SETIEMBRE-OCTUBRE<br>
						</strong>El equipo pulverizador debe calibrarse por lo menos una vez por a&ntilde;o. La presi&oacute;n de trabajo deber&iacute;a ser de 250 a 300 PSI (libras/pul2) con todos los picos abiertos. El r&eacute;gimen de la toma de potencia se debe fijar en 540 vueltas por minuto (rpm).<br>
						Calcular el volumen de agroqu&iacute;mico a aplicar seg&uacute;n el tipo de conducci&oacute;n y dimensiones de cada monte.</p>
						<hr width="90%">
						<h4><strong>TRATAMIENTOS FITOSANITARIOS</strong></h4>
						<p style="text-align: justify;"><strong>SETIEMBRE-OCTUBRE-NOVIEMBRE-DICIEMBRE<br>
						</strong>Seleccionar productos insecticidas permitidos respetando la acci&oacute;n residual del mismo y sus tiempos de carencia. Prepararlos de acuerdo a las dosis indicadas en la etiqueta del producto a utilizar. Nunca deben utilizarse en mayor o menor dosis que la indicada</p>
						<p style="text-align: justify;">
						La primer pulverizaci&oacute;n deber&aacute; ser realizada dentro del periodo de tiempo indicado por el Sistema de Alertas del ISCAMEN, o de acuerdo a los Umbrales de capturas en trampas de feromonas en caso que el productor se gu&iacute;e por este m&eacute;todo.<br>
						Las siguientes pulverizaciones depender&aacute;n del tiempo de acci&oacute;n residual de los insecticidas utilizados o de acuerdo al n&uacute;mero de capturas de machos de carpocapsa en trampas de feromonas, en caso de que el productor se gu&iacute;e por este m&eacute;todo.<br>
						Se debe aplicar los 2/3 del volumen de producto al tercio superior del &aacute;rbol. Esto se logra por medio de la utilizaci&oacute;n de boquillas de mayor caudal erogado en la parte alta del arco de pulverizaci&oacute;n.<br>
						Para montes libres se debe utilizar la marcha m&aacute;s baja que permita el tractor, manteniendo el r&eacute;gimen normalizado de la toma de fuerza del tractor (540 vueltas/minuto)<br>
						Para montes compactos en ning&uacute;n caso se deben superar los 4.5 km/h.<br>
						Se deben suspender las aplicaciones cuando la velocidad del viento supera los 4 metros por segundo, cuando la temperatura supera los 30&deg;C o cuando la humedad relativa es menor a 35%. Son recomendables las aplicaciones nocturnas ya que en general es cuando se cumplen estas condiciones.<br>
						Repetir los tratamientos despu&eacute;s de una lluvia. Si es menor a 4mm repetir la pulverizaci&oacute;n en la parte superior del &aacute;rbol. Si es mayor de 4mm repetir la aplicaci&oacute;n completa.<br>
						Utilizar tarjetas de papel hidrosensible en distintos lugares y alturas de la copa del &aacute;rbol para verificar la buena cobertura con insecticida. Los papeles deben mostrar una total cobertura sin que se verifique chorreado. La cobertura total debe ser producto de una serie de impactos sobre la tarjeta sin que se produzca chorreado. De acuerdo a lo indicado por las tarjetas hidrosensibles, realizar los ajustes necesarios en la pulverizadora, orientando las boquillas hacia aquellos sectores en donde se noten deficiencias en la aplicaci&oacute;n.</p>
						<hr width="90%">
						
						<h4>REGISTRO EN EL CUADERNO DE CAMPO</h4>
						<p><strong>TODO EL A&Ntilde;O</strong></p>
						<p>Registrar los tratamientos y pr&aacute;cticas relacionadas al control en el Cuaderno de Campo.</p>
						<hr width="90%">
						
						<h4>RALEO DE FRUTOS</h4>
						<p style="text-align: justify;"><strong>NOVIEMBRE - DICIEMBRE</strong><br>
						Se deber&aacute; dejar un fruto por dardo en la parte superior e interna de las plantas y solamente dejar dos frutos en casos de poco cuaje y en el medio y parte externa de la planta donde es m&aacute;s eficiente la pulverizaci&oacute;n.<br>
						Se recomienda realizar el raleo qu&iacute;mico y repasarlo con el raleo manual de manera tal de que no toquen los frutos durante el verano.</p>
						<hr width="90%">
						
						<h4>COLOCACI&Oacute;N DE BANDAS TRAMPA DE CART&Oacute;N CORRUGADO</h4>
						<p style="text-align: justify;"><strong>NOVIEMBRE-DICIEMBRE-ENERO<br>
						</strong>Para reducir la carga de larvas invernantes,.de esta manera se ayuda a disminuir poblaciones de Carpocapsa ya que las larvas bajan del &aacute;rbol y se introducen en las canaletas del cart&oacute;n. Estos cartones deben retirarse desde fines de abril a junio y quemarse.</p>
						<hr width="90%">
						
						<h4>MUESTREO DE DA&Ntilde;O EN RALEO</h4>
						<p>&nbsp;<br>
						<strong>DICIEMBRE</strong></p>
						<p style="text-align: justify;">Realizar el muestreo de fruta en el momento del raleo para poder calcular el porcentaje de da&ntilde;o y realizar acciones correctivas.</p>
						<hr width="90%">
						
						<h4>MUESTREO DE DA&Ntilde;O EN COSECHA</h4>
						<p><strong>ENERO-FEBRERO-MARZO</strong></p>
						<p style="text-align: justify;">Realizar el muestreo de fruta en cosecha para determinar el porcentaje de da&ntilde;o a fin de la temporada y evaluar as&iacute; la efectividad</p>
						<hr width="90%">
						
						<h4>ELIMINACI&Oacute;N DE LA FRUTA DEL SUELO Y DE LA PLANTA</h4>
						<p><strong>FEBRERO-MARZO-ABRIL-MAYO</strong></p>
						<p>Retirar toda la fruta del suelo y de la planta una vez finalizada la cosecha. Asimismo es de consideraci&oacute;n retirar toda la fruta de aquellos frutales usados para cierre perimetrales;</p>
						<hr width="90%">
						
						<h4>RETIRO DE BINS,PUNTALES Y LE&Ntilde;A</h4>
						<p><strong>MARZO-ABRIL_MAYO</strong></p>
						<p>Retirar bins, puntales y le&ntilde;a de los montes frutales para evitar reinfestaci&oacute;n.</p>
						<hr width="90%">
					  </div>
					  <div id="tabs-3">
					  	<h4>Tratamientos de frutales</h4>
						<p>El ISCAMEN realiza el tratamiento gratuito de c&iacute;tricos domiciliarios en el marco del Programa de Erradicaci&oacute;n de la Mosca del Mediterr&aacute;neo,&nbsp; por lo que, los vecinos que posean c&iacute;tricos (naranjo, quinotos, pomelo, mandarino) en sus hogares, pueden solicitar que las Brigadas Fitosanitarias del ISCAMEN procedan a la cura de los frutales, como as&iacute; tambi&eacute;n a la recolecci&oacute;n y destrucci&oacute;n de los frutos da&ntilde;ados. <br>
						  Los c&iacute;tricos constituyen uno de los principales focos de infestaci&oacute;n de la plaga, ya que es all&iacute; donde la misma contin&uacute;a su ciclo biol&oacute;gico durante el invierno. <br>
						  Estos tratamientos gratuitos, son complementarios a la T&eacute;cnica del Insecto&nbsp;Est&eacute;ril (TIE)&nbsp;. </p>
						<p class="bordeDestacado">"Quienes posean &aacute;rboles frutales pueden solicitar este servicio gratuito en la delegaci&oacute;n de ISCAMEN&nbsp;m&aacute;s cercana, o bien llamando a la&nbsp;l&iacute;nea&nbsp;gratuita del&nbsp;Instituto&nbsp;0800 666 4742."</p>
					  </div>
					  <div id="tabs-4">
					  	<h4>Alertas</h4>
						<h4>Alertas para el Control de &nbsp;Carpocapsa y Grafolita y&nbsp;Lobesia </h4>
						<p align="justify">Para el control efectivo de Grafolita en frutales de carozo y membrillos y de Carpocapsa en frutales de&nbsp; pepita y nogales; es fundamental que la primera&nbsp; aplicaci&oacute;n de la temporada se realice en el momento oportuno. <br>
						  Este primer tratamiento, realizado en todas las fincas de una misma zona har&aacute; posible la disminuci&oacute;n de estas plagas en el campo. As&iacute;, los tratamientos posteriores ser&aacute;n m&aacute;s eficientes, con mayores beneficios a cosecha. </p>
						<p>&nbsp;Asimismo el Instituto emplea dicha&nbsp;metodolog&iacute;a&nbsp;para el control de la <a style="color:green" href="http://www.iscamen.com.ar/?page_id=12">polilla de la vid </a>,&nbsp;informando a los productores sobre los momentos oportunos para la aplicaci&oacute;n de agroqu&iacute;micos en los diferentes vuelos de la plaga.&nbsp; </p>
						<p class="bordeDestacado">ALERTA, ES EL AVISO QUE EMITE EL ISCAMEN PARA QUE TODOS LOS PRODUCTORES REALICEN&nbsp; LOS TRATAMIENTOS EN EL MOMENTO OPORTUNO. INDICA EL MOMENTO ADECUADO DE LA APLICACI&Oacute;N DEL INSECTICIDA.<p>
						<h4>&iquest;C&oacute;mo se debe proceder para tratamientos posteriores a los alertas? </h4>
						<p>Despu&eacute;s de la aplicaci&oacute;n correspondiente al primer alerta, ser&aacute;n necesarias APLICACIONES ADICIONALES que Usted debe decidir, en funci&oacute;n de los niveles de capturas de sus trampas o el poder residual del producto utilizado. </p>
						<h4>&iquest;C&oacute;mo se informar&aacute;n? </h4>
						<p>Se informar&aacute; por distintos medios masivos, diferenciando los alertas para control de Carpocapsa, Grafolita y polilla de la vid. Adem&aacute;s se alertar&aacute; por zonas, por lo cual usted deber&aacute; identificar cu&aacute;l es la informaci&oacute;n que le corresponde a su finca.&nbsp; </p>
						<h4>&iquest;Qu&eacute; precauciones debe tener? </h4>
						<p>Es imprescindible&nbsp; que se empleen agroqu&iacute;micos permitidos, que se tenga en cuenta el poder residual de los productos utilizados y que se respeten los tiempos de carencia. Es necesario prever los insumos correspondientes y tener una maquinaria correctamente calibrada en el momento del ALERTA. </p>
						<p>Para recibir los sms de las diferentes alertas que emite el Instituto, es necesario adherirse al sistema que pone a disposici&oacute;n el IDR. <a style="color:green" href="http://sms.idr.org.ar/">Click aqu&iacute; para adherirse </a></p>
					  </div>
		    <div id="tabs-5">
					  	<h4>Tr&aacute;mites</h4>
					  	<h4 style="font-family:verdana; color:#256D45; margin-left:5%">&nbsp;</h4>
					  	<p style="width:90%;margin:auto; text-align:justify;"> Muchos de los servicios que presta el ISCAMEN pueden realizarse a trav&eacute;s de los formularios que se encuentran disponibles, asimismo encontrar&aacute; informaci&oacute;n sobre cualquier otro tr&aacute;mite que requiera realizarse de manera personal en cuyo caso deber&aacute; dirigirse a la delegaci&oacute;n m&aacute;s cercana a su domicilio. </p>
					  	<br>
                        <p style="font-weight:bold;color:#256D45; width:90%;margin:auto; text-align:justify;"> Recuerde que usted cuenta con una l&iacute;nea gratuita para realizar cualquier tipo de consulta:0-800-666-4722 (ISCAMEN) </p>
                        <div id="accordion2" style="width:90%; margin:auto">
						  <h3>Inscripci&oacute;n de semilleros </h3>
						  <div>
						    <ul>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/solicitud.pdf">Solicitud de inscripci&oacute;n </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/solicitud2.pdf">Complemento de solicitud </a></li>
							  <li>Categor&iacute;as y aranceles </li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/actualizacioncategoria.pdf">Actualizaci&oacute;n de categor&iacute;as </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/formadepago.pdf">Formas de pago </a></li>
							</ul>
						  </div>
						  <div></div>
						  <h3>Inscripci&oacute;n cultivos sometidos a fiscalizaci&oacute;n </h3>
						  <div>
						    <ul>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/registrocultivo.pdf">Solicitud de inscripci&oacute;n </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/resol528.pdf">Aranceles </a></li>
							</ul>
						  </div>
						  <h3>Inscripci&oacute;n de semilleros para la exportaci&oacute;n e importaci&oacute;n </h3>
						  <div>
						    <ul>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/inst_expoSEMILLAS.pdf">Requisitos para la exportaci&oacute;n </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/exportacion.pdf">Solicitud para la exportaci&oacute;n </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/inst_impoSEMILLAS.pdf">Requisitos para la importaci&oacute;n </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/importacion.pdf">Solicitud para la importaci&oacute;n </a></li>
							</ul>
						  </div>
						  <h3>Papa</h3>
						  <div>
						    <ul>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/anexo5.pdf">Solicitud de inscripci&oacute;n de cultivos en condiciones controladas para su fiscalizaci&oacute;n </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/anexo6.pdf">Solicitud de inscripci&oacute;n de cultivos en campo </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/anexo7.pdf">Registro de cultivo </a></li>
							  <li><a style="color:green" href="http://www.inase.gov.ar/images/stories/Formularios/ccertificacionycontrol/anexo%20xii_res%20217_02_vnz.pdf">Declaraci&oacute;n del destino final de la producci&oacute;n </a></li>
							</ul>
						  </div>
						  <h3>Registro nacional de cultivares</h3>
						  <div>
						    <ul>
							  <li>Solicitud de inscripci&oacute;n </li>
							</ul>
						  </div>
						  <h3>Plantas Madres - control de Sharka</h3>
						  <div>
						    <ul>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/formulario_sharka.pdf">Formulario de Inscripci&oacute;n Plantas Madres para Control de Sharka </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/instructivo_inscripcion%20sharka.pdf">Instructivo de llenado Formulario de Inscripci&oacute;n Plantas Madres para Control de Sharka </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/semilla/Inscripcion%20lotes%20de%20portainertos%20sharka.pdf">Formulario de Inscripci&oacute;n Portainjertos para Control de Sharka </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/pdf/instructivo_inscripcion%20sharka.pdf">Instructivo de llenado Formulario de Inscripci&oacute;n Portainjertos para Control de Sharka. </a></li>
							</ul>
						  </div>
						  <h3>Registro Provincial de Empresas de Agroqu&iacute;micos </h3>
						  <div>
						    <ul>
							  <li><a style="color:green" href="docs/agroquimicos/">Requisitos para la inscripci&oacute;n&nbsp;de Casas Expendedoras de Agroqu&iacute;micos </a></li>
							  <li><a style="color:green" href="docs/agroquimicos/">Solicitud de inscripci&oacute;n en el Registro Provincial de Empresas </a></li>
							  <li><a style="color:green" href="docs/agroquimicos/">Aranceles</a></li>
						    </ul>
						  </div>
						    <h3>Adhesi&oacute;n al programa Agrolimpio, recolecci&oacute;n y reciclado de envases con un fin social </h3>
						    <div>
							<ul>
						      <li><a style="color:green" href="docs/agroquimicos/carta%20de%20achesion.doc">Carta de Adhesi&oacute;n Programa Agrolimpio </a></li>
				            </ul>
							</div>
						    <h3>Principios activos permitidos para el arbolado p&uacute;blico</h3>
						    <div>
                              <p align="justify">Teniendo en cuenta la necesidad de realizar tratamientos fitosanitarios en el arbolado p&uacute;blico y ante la falta de normativa oficial a nivel nacional que determine los productos agroqu&iacute;micos que pueden ser utilizados, el ISCAMEN, a trav&eacute;s del Programa Agroqu&iacute;micos ha emitido la Resoluci&oacute;n 66-I-2014 que establece los principios activos autorizados.
                              <ul>
                                <li><a style="color:green" href="docs/Resolucion-066-I-2014-.pdf">Resoluci&oacute;n 66-I-2014 </a></li>
                                <li><a style="color:green" href="docs/Listado-de-Principios-Activos-autorizados.xlsx">Listado de productos autorizados por Resoluci&oacute;n</a></li>
                              </ul>
					        </div>
						    <h3>SMR para ingreso a &Aacute;reas Libres de Mosca de los Frutos</h3>
					    </div>
						  <div>
						    SMR para ingreso a &Aacute;reas Libres de Mosca de los Frutos
						  </div>
						  <h3>Productos para Consumo en Fresco </h3>
						  <div>
						    <ul>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/SMR/FORMULARIO%20Nro%201%20Anexo%202.pdf">Inscripci&oacute;n del Productor </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/SMR/FORMULARIO%20Nro%202%20Anexo%202.pdf">Inscripci&oacute;n del Empaque </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/SMR/FORMULARIO%20Nro%203%20Anexo%202.pdf">Inscripci&oacute;n del Centro de Distribuci&oacute;n / Frigor&iacute;fico </a></li>
							</ul>
						  </div>
						  <h3>Productos para Industrializar</h3>
						  <div>
						    <ul>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/SMR/FORMULARIO_N_1_SMR__IND.ANEXO_III.pdf">Inscripci&oacute;n del Productor </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/SMR/FORMULARIO_N_2_SMR_IND._ANEXO_III.pdf">Inscripci&oacute;n de la Industria </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/SMR/FORMULARIO_N_3_SMR_IND_ANEXO_III.pdf">Inscripci&oacute;n del Centro de Acopio </a></li>
							</ul>
						  </div>
						  <h3>Uva con destino a Vinificaci&oacute;n (vino / mosto) </h3>
						  <div>
						    <ul>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/SMR/FORMULARIO_N_1_SMR_VINO.MOSTO.ANEXO_IV.pdf">Inscripci&oacute;n del Productor </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/SMR/FORMULARIO_N_2_SMR_VINO.MOSTO._ANEXO_IV.pdf">Inscripci&oacute;n de la Bodega </a></li>
							</ul>
						  </div>
						  <h3>Ingreso y Egreso de Productos vegetales </h3>
						  <div>
						    <ul>
							  <li>Instructivo de llenado de declaraciones </li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/wp-content/uploads/2012/09/11.pdf">Declaraci&oacute;n jurada 1 </a></li>
							  <li><a style="color:green" href="http://www.iscamen.com.ar/wp-content/uploads/2012/09/1.pdf">Declaraci&oacute;n jurada 2 </a></li>
							</ul>
						  </div>
						  <h3>Galpones de ajo  </h3>
		      <div>
      <ul>
						    <li><a style="color:green" href="docs/barreras/A-18-Formulario%20de%20inscripcion.pdf">Formulario de inscripci&oacute;n</a></li>
							<li><a style="color:green" href="docs/barreras/instrucciones%202018%202019%20-%20inscripcion.pdf">Instrucciones para primera inscripci&oacute;n</a></li>
							<li><a style="color:green" href="docs/barreras/instrucciones%202018%202019%20-%20renovacion.pdf">Instrucciones para la renovaci&oacute;n</a>  <br>
					          <?php
    require_once ("section_fotter.php");
    ?>
                            </li>
					      </ul>
			    </div>
		    </div>
				  </div>
			</div>
			  </div>
			</div>
	<link rel="stylesheet" href="js/jquery-ui/jquery-ui.min.css">
  	<link rel="stylesheet" href="js/jquery-ui/jquery-ui.theme.min.css">
  	<script src="js/jquery-ui/jquery-ui.min.js"></script>
	 <script>
	 	$( function() {
		    $( "#tabs" ).tabs();
		  } );
	    $( function() {
		    $( "#accordion" ).accordion({
		      heightStyle: "content",
			  active: false,
    		  collapsible: true  
		    });
		  } );
		$( function() {
		    $( "#accordion2" ).accordion({
		      heightStyle: "content",
			  active: false,
    		  collapsible: true  
		    });
		  } );  
	  </script>
    </body>
</html>
