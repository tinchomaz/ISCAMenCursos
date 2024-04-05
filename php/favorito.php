<?php
require_once("../app/Config.php");
require_once("../FunctionApp.php");

if (Config::DISPLAY_ERROR) {
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 'Off');
}

$urlBaseIscamen = Config::getURLBaseApacheIscamen();
$dbconn = pg_connect("host=" . Config::SERVIDOR_DB . " port=" . Config::PUERTO_DB . " dbname=" . Config::BASE_DB . " user=" . Config::USUARIO_DB . " password=" . Config::CLAVE_DB . "") or die(json_encode(array('error' => 'No se ha podido conectar: ' . pg_last_error())));

session_start();

$userId = $_SESSION['userId'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCurso = isset($_POST['idCurso']) ? $_POST['idCurso'] : null;
    $cursoLikeState = isset($_POST['likeEstado']) ? $_POST['likeEstado'] : null;
    if ($cursoLikeState == 1) {
        $likeEstado = "S";
    } else {
        $likeEstado = "N";
    }

    // Consolidar mensajes en un array
    $response = array();

    // Consulta para verificar la existencia de datos
    $querySelect = "SELECT * FROM difusion.usuario_web_curso_modulo WHERE idcursocapacitacion = $1 AND idusuarioweb = $2";
    $resultSelect = pg_query_params($dbconn, $querySelect, array($idCurso, $userId));
    if (!$resultSelect) {
        $response['error'] = 'Error en la consulta SELECT: ' . pg_last_error();
    } else {
        if (pg_num_rows($resultSelect) > 0) {
            $existingData = pg_fetch_assoc($resultSelect);
            if ($existingData['likecurso'] != $cursoLikeState) {
                // Actualizar el estado del curso
                $queryUpdate = "UPDATE difusion.usuario_web_curso_modulo SET likecurso = $1, fechalike = CURRENT_TIMESTAMP WHERE idcursocapacitacion = $2 AND idusuarioweb = $3";
                
                // Añadir mensajes de depuración
                $response['update_query'] = $queryUpdate;
                $response['update_params'] = array($likeEstado, $idCurso, $userId);

                pg_query_params($dbconn, $queryUpdate, array($likeEstado, $idCurso, $userId));
                $response['success'] = 'Registro actualizado con : ' . $likeEstado . ' en: ' . $idCurso;
            } else {
                $response['success'] = 'El registro ya tiene el estado deseado';
            }
        } else {
            // Insertar nuevo registro
            $queryInsert = "INSERT INTO difusion.usuario_web_curso_modulo (id, fechalike, likecurso, idcursocapacitacion, idcursomodulo, idusuarioweb) VALUES (nextval('difusion.usuario_web_curso_modulo_id_seq'), CURRENT_TIMESTAMP, $1, $2, 1, $3)";
            
            // Añadir mensajes de depuración
            $response['insert_query'] = $queryInsert;
            $response['insert_params'] = array($likeEstado, $idCurso, $userId);

            $resultInsert = pg_query_params($dbconn, $queryInsert, array($likeEstado, $idCurso, $userId));

            // Verificar el éxito de la inserción
            if ($resultInsert) {
                $response['success'] = 'Nuevo registro insertado';
            } else {
                $response['error'] = 'Fallo en la inserción: ' . pg_last_error();
            }
        }
    }

    // Enviar respuesta JSON al final
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Importante: Salir para evitar salida adicional
}

//Esto envia al recibir la solicitud GET
// Verifica si el usuario está autenticado
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM difusion.usuario_web_curso_modulo WHERE idusuarioweb = $1";
    $result = pg_query_params($dbconn, $query, array($userId));
    $listadoLikes = array();

    while ($row = pg_fetch_assoc($result)) {
        $listadoLikes[] = $row;
    }

    echo json_encode($listadoLikes);
} else {
    echo json_encode(['error' => 'Usuario no autenticado']);
}
?>
