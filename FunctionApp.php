<?php

class FunctionApp{
	
	public static function SpanishDate($FechaStamp)
	{
	   $ano = date('Y',$FechaStamp);
	   $mes = date('n',$FechaStamp);
	   $dia = date('d',$FechaStamp);
	   $diasemana = date('w',$FechaStamp);
	   $diassemanaN= array("Domingo","Lunes","Martes","Miércoles",
	                  "Jueves","Viernes","Sábado");
	   $mesesN=array(1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",7=>"Julio",
	             8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre");
	   //return $diassemanaN[$diasemana].", $dia de ". $mesesN[$mes] .", $ano";
	   return $dia ." de ". $mesesN[$mes] .", $ano";
	}  
	
	public static function SpanishDateString($FechaString)
	{
		
		//$fechaArray = substr($FechaString, 0, 10);
		$fechaArray = explode(" ", $FechaString);
		$fechaArray = explode("-", $fechaArray[0]);
	   	$ano =  (int) $fechaArray[0];
	   	$mes =  (int) $fechaArray[1];
	   	$dia =  (int) $fechaArray[2];
	   	$diassemanaN= array("Domingo","Lunes","Martes","Miércoles",
	                  "Jueves","Viernes","Sábado");
	   	$mesesN=array(1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",7=>"Julio",
	             8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre");
	   	return $dia ." de ". $mesesN[$mes] .", $ano";
	}  
	
	 public static function replaceTildesHtml($cadena, $todoMayusculas) 
    { 	echo $cadena;
		if($todoMayusculas){
			return str_replace(array("á","é","í","ó","ú","ñ","Á","É","Í","Ó","Ú","Ñ"),
                                         array("&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&Ntilde;",
                                                    "&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&Ntilde;"), $cadena);     
		}else{
			return str_replace(array("á","é","í","ó","ú","ñ","Á","É","Í","Ó","Ú","Ñ"),
                                         array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;",
                                                    "&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&Ntilde;"), $cadena);     
		}
		
    }
	
	public static function separarCadenaPorEspacio($cadena){
		
		$palabras = explode(" ", $cadena);
		return $palabras;
		
	}
	
	public static function sanear_array_string($palabras)
	{
		$cadena = "";
		foreach($palabras as $palabra){
			$palabraAux = FunctionApp::sanear_string($palabra);
			$cadena .= $palabraAux . " ";
		}
		return $cadena;
	}
	
	 public static function sanear_string($string)
	{
	 	$string = trim($string);
	    $string = str_replace(
	        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
	        array('&aacute;', '&aacute;', '&aacute;', '&aacute;', '&aacute;', '&Aacute;', '&Aacute;', '&Aacute;', '&Aacute;'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
	        array('&eacute;', '&eacute;', '&eacute;', '&eacute;', '&Eacute;', '&Eacute;', '&Eacute;', '&Eacute;'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
	        array('&iacute;', '&iacute;', '&iacute;', '&iacute;', '&Iacute;', '&Iacute;', '&Iacute;', '&Iacute;'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
	        array('&oacute;', '&oacute;', '&oacute;', '&oacute;', '&Oacute;', '&Oacute;', '&Oacute;', '&Oacute;'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
	        array('&uacute;', '&uacute;', '&uacute;', '&uacute;', '&Uacute;', '&Uacute;', '&Uacute;', '&Uacute;'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ñ', 'Ñ', 'ç', 'Ç'),
	        array('&ntilde;', '&Ntilde;', 'c', 'C',),
	        $string
	    );
	 
	    return $string;
	}
	
	
		
	public static function url_exists( $url = NULL ) {
	 
	    if( empty( $url ) ){
	        return false;
	    }
	 
	    $options['http'] = array(
	        'method' => "HEAD",
	        'ignore_errors' => 1,
			'timeout' => 3,
	        'max_redirects' => 0
	    );
	    $body = @file_get_contents( $url, NULL, stream_context_create( $options ) );
	    
	    // Ver http://php.net/manual/es/reserved.variables.httpresponseheader.php
	    if( isset( $http_response_header ) ) {
	        sscanf( $http_response_header[0], 'HTTP/%*d.%*d %d', $httpcode );
	 
	        //Aceptar solo respuesta 200 (Ok), 301 (redirección permanente) o 302 (redirección temporal)
	        $accepted_response = array( 200, 301, 302 );
	        if( in_array( $httpcode, $accepted_response ) ) {
	            return true;
	        } else {
	            return false;
	        }
	     } else {
	         return false;
	     }
	}
		
		
}



?>