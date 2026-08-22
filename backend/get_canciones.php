<?php
// Incluir la conexión
require_once 'conexion.php';

// Configurar cabeceras para JSON y CORS
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

try {
    // Consulta SQL para obtener todas las canciones
    $sql = "SELECT * FROM canciones ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    
    // Obtener todos los resultados
    $canciones = $stmt->fetchAll();
    
    // Devolver JSON exitoso
    echo json_encode([
        "success" => true,
        "data" => $canciones,
        "total" => count($canciones)
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error" => "Error al obtener canciones: " . $e->getMessage()
    ]);
}
?>