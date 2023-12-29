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
$dbconn = pg_connect("host=" . Config::SERVIDOR_DB . " port=" . Config::PUERTO_DB . " dbname=" . Config::BASE_DB . " user=" . Config::USUARIO_DB . " password=" . Config::CLAVE_DB . "") or die('No se ha podido conectar: ' . pg_last_error());
session_start();

$userId = $_SESSION['userId'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén el ID del módulo y las respuestas enviadas
    $idModulo = isset($_POST['idModulo']) ? $_POST['idModulo'] : null;
    $respuestas = isset($_POST['respuestas']) ? $_POST['respuestas'] : [];

    // Almacena la información sobre la aprobación de cada respuesta
    $resultados = [];

    // Itera sobre las respuestas
    foreach ($respuestas as $respuesta) {
        // Obtén los datos de la respuesta
        $respuestaId = $respuesta['idmodulorespuesta'];
        $estado = $respuesta['estado'];
        // Realiza la consulta para verificar si la respuesta ya existe en la base de datos
        // Asegúrate de utilizar sentencias preparadas para evitar inyecciones SQL
        $query = "SELECT * FROM difusion.usuario_web_curso WHERE idmodulorespuesta = $1 AND idusuarioweb = $2";
        // Ejecuta la consulta preparada
        $result = pg_query_params($dbconn, $query, array($respuestaId, $userId));
        // Realiza la consulta para obtener los datos actuales del registro
        $querySelect = "SELECT * FROM difusion.usuario_web_curso WHERE idmodulorespuesta = $1 AND idusuarioweb = $2";
        $resultSelect = pg_query_params($dbconn, $querySelect, array($respuestaId, $userId));

        // Verifica si la respuesta existe
        if (pg_num_rows($result) > 0) {
            $existingData = pg_fetch_assoc($resultSelect);
            if ($existingData['estado'] != $estado) {
                // Solo actualiza si hay cambios en el estado
                $resultados[] = ['idmodulorespuesta' => $respuestaId, 'estado' => 'modificado'];
                $queryUpdate = "UPDATE difusion.usuario_web_curso SET estado = $1, fechacambioestado = NOW() WHERE idmodulorespuesta = $2 AND idusuarioweb = $3";
                pg_query_params($dbconn, $queryUpdate, array($estado, $respuestaId, $userId));
            } else {
                // No hay cambios en los datos, no es necesario actualizar
                $resultados[] = ['idmodulorespuesta' => $respuestaId, 'estado' => 'sin cambios'];
            }
        } else {
            $resultados[] = ['idmodulorespuesta' => $respuestaId, 'estado' => 'agregado'];
            $queryInsert = "INSERT INTO difusion.usuario_web_curso (id,estado, fechacambioestado, idmodulorespuesta, idusuarioweb) VALUES (nextval('difusion.usuario_web_curso_id_seq'),$1, NOW(), $2, $3)";
            pg_query_params($dbconn, $queryInsert, array($estado, $respuestaId, $userId));
        }
    }

    // Devuelve la información como respuesta en formato JSON
    echo json_encode($resultados);
}

// Verifica si el usuario está autenticado
if (isset($_SESSION['userId'])) {
    // Realiza la consulta a la base de datos para obtener la información del usuario actual
    $query = "SELECT id, estado, fechacambioestado, idmodulorespuesta, idusuarioweb FROM difusion.usuario_web_curso WHERE idusuarioweb = $1";
    $result = pg_query_params($dbconn, $query, array($userId));

    // Almacena todas las iteraciones en un array
    $informacionUsuario = array();

    while ($row = pg_fetch_assoc($result)) {
        $informacionUsuario[] = $row;
    }

    // Devuelve la información como respuesta en formato JSON
    echo json_encode($informacionUsuario);
} else {
    // El usuario no está autenticado, puedes devolver un mensaje de error o lo que desees
    echo json_encode(['error' => 'Usuario no autenticado']);
}
?>
