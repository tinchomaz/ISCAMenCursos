<?php
include 'php/header.php';

$query = "SELECT * FROM difusion.documentacion_modulo WHERE idcursomodulo = 1";
$stmt = pg_query($query) or die("La consulta de documentación falló: " . pg_last_error());

$documentacion = array();

while ($row = pg_fetch_assoc($stmt)) {
    $documentacion[] = array(
        'ruta' => $row['ruta'],
        'denominacion' => $row['denominacion']
    );
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar Archivos</title>
</head>
<body>

<button onclick="descargarArchivos()">Descargar Archivos</button>

<script>
function descargarArchivos() {
    <?php
    // Iterar sobre la documentación y generar los enlaces
    foreach ($documentacion as $documento) {
        echo "var enlace = document.createElement('a');";
        echo "enlace.href = '{$documento['ruta']}';";
        echo "enlace.download = '{$documento['denominacion']}';";
        echo "document.body.appendChild(enlace);";
        echo "enlace.click();";
        echo "document.body.removeChild(enlace);";
    }
    ?>
}
</script>

</body>
</html>
