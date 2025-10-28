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
    
    // Get the type parameter from the request
    $type = isset($_GET['type']) ? $_GET['type'] : 'basic';
    
    $result = [];
    
    switch ($type) {
        case 'monthly_expense':
            // Monthly total expenses
            $query = "SELECT 
                        DATE_FORMAT(ch_melaza_fecha, '%Y-%m') as month,
                        SUM(ch_melaza_racion * ch_melaza_costo) as total_expense
                      FROM ch_melaza 
                      WHERE ch_melaza_fecha IS NOT NULL
                      GROUP BY DATE_FORMAT(ch_melaza_fecha, '%Y-%m')
                      ORDER BY month ASC";
            break;
            
        case 'monthly_weight':
            // Monthly total weight (racion)
            $query = "SELECT 
                        DATE_FORMAT(ch_melaza_fecha, '%Y-%m') as month,
                        SUM(ch_melaza_racion) as total_weight
                      FROM ch_melaza 
                      WHERE ch_melaza_fecha IS NOT NULL
                      GROUP BY DATE_FORMAT(ch_melaza_fecha, '%Y-%m')
                      ORDER BY month ASC";
            break;
            
        case 'monthly_feed_weight':
            // Monthly feed weight (same as monthly_weight for melaza)
            $query = "SELECT 
                        DATE_FORMAT(ch_melaza_fecha, '%Y-%m') as month,
                        SUM(ch_melaza_racion) as total_feed_kg
                      FROM ch_melaza 
                      WHERE ch_melaza_fecha IS NOT NULL
                      GROUP BY DATE_FORMAT(ch_melaza_fecha, '%Y-%m')
                      ORDER BY month ASC";
            break;
            
        case 'animal_weight':
            // Monthly total animal weight from peso table
            $query = "SELECT 
                        DATE_FORMAT(ch_peso_fecha, '%Y-%m') as month,
                        SUM(ch_peso_animal) as total_weight
                      FROM ch_peso
                      WHERE ch_peso_fecha IS NOT NULL
                      GROUP BY DATE_FORMAT(ch_peso_fecha, '%Y-%m')
                      ORDER BY month ASC";
            break;
            
        default:
            // Basic melaza data (for line charts showing individual records)
            $query = "SELECT                 
                        ch_melaza_fecha as fecha, 
                        ch_melaza_racion as melaza,
                        ch_melaza_costo as costo,
                        ch_melaza_producto as producto,
                        v.nombre as animal_nombre,
                        ch_melaza_tagid as tagid
                      FROM ch_melaza
                      LEFT JOIN vacuno v ON ch_melaza_tagid = v.tagid 
                      ORDER BY ch_melaza_fecha ASC";
            break;
    }
    
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
    // Fetch all records as associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Output the result as JSON
    echo json_encode($result);
    
} catch (Exception $e) {
    // Return error as JSON
    echo json_encode(['error' => $e->getMessage()]);
}