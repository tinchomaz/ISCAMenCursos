<?php
session_start();

// conexión a la base de datos
require_once("../app/Config.php");
require_once("../FunctionApp.php");

if(Config::DISPLAY_ERROR){
    ini_set('display_errors','On');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors','Off');
}

// Obtén los datos del usuario desde la solicitud Ajax
$displayName = $_POST['displayName'];
$email = $_POST['email'];
$uid = $_POST['uid'];

// Establece la conexión a la base de datos
$dbconn = pg_connect("host=".Config::SERVIDOR_DB." port=".Config::PUERTO_DB." dbname=".Config::BASE_DB." user=".Config::USUARIO_DB." password=".Config::CLAVE_DB."") or die('No se ha podido conectar: ' . pg_last_error());

// Realiza la lógica de autenticación o registro aquí

// Modificación: Obtener el ID del usuario siempre
$query = "SELECT id FROM difusion.usuario_web WHERE clave = $1";
$result = pg_query_params($dbconn, $query, array($uid));

if ($result === false) {
    die('La consulta falló: ' . pg_last_error());
}

$row = pg_fetch_row($result);
$userId = ($row) ? (int)$row[0] : null;

if ($userId) {
    echo "Usuario registrado anteriormente";
    echo '<h1>Nombre: ' . $displayName . '</h1>';
    echo '<p>Email: ' . $email . '</p>';
    echo '<p>ID de Usuario: ' . $userId . '</p>';
    // Puedes almacenar el ID en una variable de sesión si es necesario
    $_SESSION['userId'] = $userId;
    echo '<a href="../index.php">Volver al inicio</a>';
} else {
    echo "Usuario registrado con éxito";
    // Modificación: Utilizar consulta preparada para la inserción
    $query = "INSERT INTO difusion.usuario_web (id, clave, email, fechaalta, nombrecompleto) 
    VALUES (nextval('difusion.usuario_web_id_seq'), $1, $2, NOW(), $3)";
    $params = array($uid, $email, $displayName);
    $stmt = pg_query_params($dbconn, $query, $params) or die('La consulta falló: ' . pg_last_error());
    echo '<a href="../index.php">Volver al inicio</a>';
}
?>