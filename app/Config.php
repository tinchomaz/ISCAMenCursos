<?php
   
class Config {
	const DESPLIEGUE_PRODUCCION = "despliegue_produccion";
	const DESPLIEGUE_LOCAL = "despliegue_local";
	const IS_PRODUCCION = FALSE;//MUY IMPORTANTE
	const IS_TEST = FALSE;//TEST
	const DISPLAY_ERROR = FALSE;//MOSTRAR ERRORES
	const LENGUAJE_ESPANIOL = "ES";
	const LENGUAJE_INGLES = "EN";
	const LENGUAJE_PORTUGUES = "PT";
	
	const PUERTO_DB = "5432";
	const BASE_DB = "iscamen";
	const BASE_DB_OV = "oficina_virtual";
	
	//const SERVIDOR_DB = "192.168.0.108";
	//const URL_BASE_ISCAMEN = "http://192.168.0.108:8081/iscamen";
	//const URL_BASE_TOMCAT = "http://192.168.0.108/iscamen";
	
	//const SERVIDOR_DB = "168.194.207.98";
	//const SERVIDOR_DB = "localhost";
	//const URL_BASE_ISCAMEN = "http://168.194.207.98/iscamen";
	//const URL_BASE_TOMCAT = "http://168.194.207.98/iscamen";
	//const USUARIO_DB = "postgres";//"read_user";
	//const CLAVE_DB = "g!poLK5%7ERee20l9T";//s0l0l3ctur4";//lectura
	
	//const SERVIDOR_DB_168 = "168.194.207.98";
	//const SERVIDOR_DB_179 = "179.43.113.170";
	
	const SERVIDOR_DB_179 = "localhost";
	const SERVIDOR_DB_168 = "localhost";
	const SERVIDOR_DB = "localhost";
	const URL_BASE_ISCAMEN = "http://localhost/iscamen";
	const URL_BASE_TOMCAT = "http://localhost:8080/iscamen";
	const USUARIO_DB = "postgres";
	const CLAVE_DB = "123456";//local
	
	//const PATH_FILE_BARRERAS = "E:\\Tomcat\\webapps\\oficinavirtual\\archivosBarreras\\";
	const PATH_FILE_BARRERAS = "D:\\Proyectos\\ISCAMENServer\\archivosBarreras\\";
	
	public static function getURLBaseApacheIscamen() {
		if(Config::IS_PRODUCCION){
			return Config::URL_BASE_ISCAMEN."/";
		}else{
			return "http://localhost/iscamen_template/site/";
		}
	}
	
	public static function getURLBaseTomcatIscamen() {
		if(Config::IS_PRODUCCION){
			return Config::URL_BASE_TOMCAT;
		}else{
			return "http://localhost:8080/iscamen/";
		}
	}
}
?>