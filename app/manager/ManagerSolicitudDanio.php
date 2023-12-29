<?php
if(Config::DISPLAY_ERROR){
	ini_set('display_errors','On');
	error_reporting(E_ALL);
}else{
	ini_set('display_errors','Off');
}

class ManagerSolicitudDanio {
    
    public function buscarRenspa($rutRenspa){ 
	
		$htmlResponse = '';
		try {
       		$dbconn = pg_connect("host=".Config::SERVIDOR_DB_179." port=".Config::PUERTO_DB." dbname=".Config::BASE_DB_OV." user=".Config::USUARIO_DB." password=".Config::CLAVE_DB."") or die('No se ha podido conectar: ' . pg_last_error());
            $query = "SELECT * FROM nucleo.rut WHERE renspa = '".$rutRenspa."'";
            $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());	
            $count = 0;
            $existe = false;
			
            while ($arr = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            	$existe = true;	
				$htmlResponse .= '<input type="hidden" value="'.$arr["id"].'" id="idrut" name="idrut" />
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
							    <td>Propiedad:</td>
								<td>'.$arr["propiedaddenominacion"].'</td>
								<td>Renspa/Rut</td>
								<td>'.$arr["renspa"].'</td>
						   	</tr>
							<tr>
								<td>Titular</td>
								<td>'.$arr["nombre"]. ' ' . $arr["apellido"] . '</td>
								<td>CUIT</td>
								<td>'.$arr["cuit"].'</td>
							</tr>
							<tr>
								<td>Ubicaci&oacute;n</td>
								<td>'.$arr["ubicacion"]. '</td>
								<td>Localidad</td>
								<td>'.$arr["distrito"]. ' ' . $arr["localidad"] . '</td>
							</tr>
						</table>';
            }
			
			if(!$existe){
				$htmlResponse .= '<b style="color:red">El rut ingresado no se encuentra registrado en ISCAMEN. Verifique el RUT/Resnpa ingresado, si es correcto complete el siguiente formulario:<b>';
				$htmlResponse .= '<br><br>';
				$htmlResponse .= '<input type="hidden" value="0" id="idrut" name="idrut" />
						<table style="color:black" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td>Renspa/Rut:</td>
								<td><input type="text" id="rutRenspa" name="rutRenspa" value="'.$rutRenspa.'" readonly /></td>
							    <td>Nombre Propiedad:*</td>
								<td><input type="text" id="nombrePropiedad" name="nombrePropiedad" /></td>
						   	</tr>
							<tr>
								<td>Apellido y Nombre del Titular:*</td>
								<td><input type="text" id="nombreTitular" name="nombreTitular" /></td>
								<td>CUIT Titular:*</td>
								<td><input type="text" id="cuitTitular" name="cuitTitular" /></td>
							</tr>
							<tr>
								<td>Calle y Numero de la Propiedad:*</td>
								<td><input type="text" id="calleNroPropiedad" name="calleNroPropiedad" /></td>
								<td>Localidad Propiedad:*</td>
								<td><input type="text" id="localidadPropiedad" name="localidadPropiedad" /></td>
							</tr>
							<tr>
								<td>Departamento Propiedad:*</td>
								<td><input type="text" id="dptoPropiedad" name="dptoPropiedad" /></td>
								<td></td>
								<td></td>
							</tr>
						</table>';
				
			}
		
	    }catch(phpmailerException $e) {
            echo $e->errorMessage();
        }	
     	return $htmlResponse;
	
	}    
	
	public function guardarPedidoCertificacion($request){ 
	
		$htmlResponse = '';
		try {
			$idrut = $request['idrut']; 
			$tipoDanio = "CATA"; 
			$fechaSiniestro = $request['fechaSiniestro']; 
			$caracterSolicitante = $request['caracterSolicitante']; 
			$apellidoSolicitante = $request['apellidoSolicitante']; 
			$nombreSolicitante = $request['nombreSolicitante']; 
			$dniCuit = $request['dniCuit']; 
			$linderoNorte = $request['linderoNorte']; 
			$linderoSur = $request['linderoSur']; 
			$linderoEste = $request['linderoEste']; 
			$linderoOeste = $request['linderoOeste']; 
			$personaTasacion = $request['personaTasacion']; 
			$telefonoTasacion = $request['telefonoTasacion']; 
			$referenciaAcceso = $request['referenciaAcceso']; 
			$cultivosAfectados = $request['cultivosAfectados']; 
			$metodosTratamiento = $request['metodosTratamiento']; 
			$zonasAfectadas = $request['zonasAfectadas'];
       		
			$dbconn = pg_connect("host=".Config::SERVIDOR_DB_179." port=".Config::PUERTO_DB." dbname=".Config::BASE_DB_OV." user=".Config::USUARIO_DB." password=".Config::CLAVE_DB."") or die('No se ha podido conectar: ' . pg_last_error());
            
			$query = "INSERT INTO web.certificacion_danio_cata(id, idrut, tipoDanio, fechaSiniestro, caracterSolicitante, apellidoSolicitante, nombreSolicitante, dniCuit, linderoNorte, linderoSur, linderoEste, linderoOeste, personaTasacion, telefonoTasacion, referenciaAcceso, cultivosAfectados, metodosTratamiento, zonasAfectadas) VALUES (";
			$query .= "nextval('web.certificacion_danio_cata_id_seq'), "."'".$idrut."', '".$tipoDanio."', '".$fechaSiniestro."', '".$caracterSolicitante."', '".$apellidoSolicitante."', '".$nombreSolicitante."', '".$dniCuit."', '".$linderoNorte."', '".$linderoSur."', '".$linderoEste."', '".$linderoOeste."', '".$personaTasacion."', '".$telefonoTasacion."', '".$referenciaAcceso."', '".$cultivosAfectados."', '".$metodosTratamiento."', '".$zonasAfectadas."'";
			$query .= ")";
            
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());	
            
			$htmlResponse = $result;
			
	    }catch(phpmailerException $e) {
            echo $e->errorMessage();
        }	
     	return $htmlResponse;
	
	}
	
	public function guardarRutMasPedidoCertificacion($request){
		
		$htmlResponse = '';
		try {
			$tipoDanio = "CATA"; 
			$fechaSiniestro = $request['fechaSiniestro']; 
			$caracterSolicitante = $request['caracterSolicitante']; 
			$apellidoSolicitante = $request['apellidoSolicitante']; 
			$nombreSolicitante = $request['nombreSolicitante']; 
			$dniCuit = $request['dniCuit']; 
			$linderoNorte = $request['linderoNorte']; 
			$linderoSur = $request['linderoSur']; 
			$linderoEste = $request['linderoEste']; 
			$linderoOeste = $request['linderoOeste']; 
			$personaTasacion = $request['personaTasacion']; 
			$telefonoTasacion = $request['telefonoTasacion']; 
			$referenciaAcceso = $request['referenciaAcceso']; 
			$cultivosAfectados = $request['cultivosAfectados']; 
			$metodosTratamiento = $request['metodosTratamiento']; 
			$zonasAfectadas = $request['zonasAfectadas'];
			$rutRenspa = $request['rutRenspa']; 
			$nombrePropiedad = $request['nombrePropiedad']; 
			$nombreTitular = $request['nombreTitular']; 
			$cuitTitular = $request['cuitTitular']; 
			$calleNroPropiedad = $request['calleNroPropiedad']; 
			$localidadPropiedad = $request['localidadPropiedad']; 
			$dptoPropiedad = $request['dptoPropiedad']; 
			
			$dbconn = pg_connect("host=".Config::SERVIDOR_DB_179." port=".Config::PUERTO_DB." dbname=".Config::BASE_DB_OV." user=".Config::USUARIO_DB." password=".Config::CLAVE_DB."") or die('No se ha podido conectar: ' . pg_last_error());
            
			$query = "INSERT INTO web.certificacion_danio_cata(id, tipoDanio, fechaSiniestro, caracterSolicitante, apellidoSolicitante, nombreSolicitante, dniCuit, linderoNorte, linderoSur, linderoEste, linderoOeste, personaTasacion, telefonoTasacion, referenciaAcceso, cultivosAfectados, metodosTratamiento, zonasAfectadas, rutRenspa, nombrePropiedad, nombreTitular, cuitTitular, calleNroPropiedad, localidadPropiedad, dptoPropiedad) VALUES (";
			$query .= "nextval('web.certificacion_danio_cata_id_seq'), '".$tipoDanio."', '".$fechaSiniestro."', '".$caracterSolicitante."', '".$apellidoSolicitante."', '".$nombreSolicitante."', '".$dniCuit."', '".$linderoNorte."', '".$linderoSur."', '".$linderoEste."', '".$linderoOeste."', '".$personaTasacion."', '".$telefonoTasacion."', '".$referenciaAcceso."', '".$cultivosAfectados."', '".$metodosTratamiento."', '".$zonasAfectadas."'";
			$query .= ", '".$rutRenspa."', '".$nombrePropiedad."', '".$nombreTitular."', '".$cuitTitular."', '".$calleNroPropiedad."', '".$localidadPropiedad."', '".$dptoPropiedad."'";
			$query .= ")";
			
			//echo "messageError ENTRAAAAAAAAAAAAAA" . $query;
			//die;
            
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());	
            
			$htmlResponse = $result;
			
	    }catch(phpmailerException $e) {
            echo $e->errorMessage();
        }	
     	return $htmlResponse;
		
	}          
	
}
?>
