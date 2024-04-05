<?php
    // conexión base de datos
    require_once("../app/Config.php");
    require_once("../FunctionApp.php");
    if(Config::DISPLAY_ERROR){
        ini_set('display_errors','On');
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors','Off');
    }
    $urlBaseIscamen = Config::getURLBaseApacheIscamen();
    $dbconn = pg_connect("host=".Config::SERVIDOR_DB." port=".Config::PUERTO_DB." dbname=".Config::BASE_DB." user=".Config::USUARIO_DB." password=".Config::CLAVE_DB."") or die('No se ha podido conectar: ' . pg_last_error());
    //-------------------
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $displayName = $_POST['displayName'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];
        $photo = $_POST['photo'];
    
        $_SESSION['displayName'] = $displayName;
        $_SESSION['email'] = $email;
        $_SESSION['uid'] = $uid;
        $_SESSION['photo'] = $photo;
        
        $query = "SELECT id FROM difusion.usuario_web WHERE clave = $1";
        $result = pg_query_params($dbconn, $query, array($uid));
    
        if ($result === false) {
            die('La consulta falló: ' . pg_last_error());
        }
    
        $row = pg_fetch_row($result);
        $userId = ($row) ? (int)$row[0] : null;
    
        if ($userId) {
            $_SESSION['userId'] = $userId;
        } else {
            $query = "INSERT INTO difusion.usuario_web (id, clave, email, fechaalta, nombrecompleto) 
                VALUES (nextval('difusion.usuario_web_id_seq'), $1, $2, NOW(), $3)";
            $params = array($uid, $email, $displayName);
            $stmt = pg_query_params($dbconn, $query, $params) or die('La consulta falló: ' . pg_last_error());
        }
    }
    ?>
