<?php
// Include database connection
require_once './pdo_conexion.php';

// Set content type to JSON
header('Content-Type: application/json');

try {
    // Verify connection is PDO
    if (!($conn instanceof PDO)) {
        throw new Exception("Error: La conexión no es una instancia de PDO");
    }
    
    // Enable PDO error mode
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query to get tetanos data ordered by date
    $query = "SELECT         
                ch_tetanos_fecha as fecha, 
                ch_tetanos_dosis as dosis,
                ch_tetanos_costo as costo,
                ch_tetanos_producto as vacuna,
                v.nombre as animal_nombre,
                ch_tetanos_tagid as tagid
              FROM ch_tetanos
              LEFT JOIN caprino v ON ch_tetanos_tagid = v.tagid 
              ORDER BY ch_tetanos_fecha ASC";
    
    // Fetch all records as associative array
    $result = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    
    // Output the result as JSON
    echo json_encode($result);
    
} catch (Exception $e) {
    // Return error as JSON
    echo json_encode(['error' => $e->getMessage()]);
}