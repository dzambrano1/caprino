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
    
    // Query to get garrapatas data ordered by date
    $query = "SELECT         
                ch_garrapatas_fecha as fecha, 
                ch_garrapatas_dosis as dosis,
                ch_garrapatas_costo as costo,
                ch_garrapatas_producto as vacuna,
                v.nombre as animal_nombre,
                ch_garrapatas_tagid as tagid
              FROM ch_garrapatas
              LEFT JOIN vacuno v ON ch_garrapatas_tagid = v.tagid 
              ORDER BY ch_garrapatas_fecha ASC";
    
    // Fetch all records as associative array
    $result = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    
    // Output the result as JSON
    echo json_encode($result);
    
} catch (Exception $e) {
    // Return error as JSON
    echo json_encode(['error' => $e->getMessage()]);
} 