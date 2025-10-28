<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors to avoid breaking JSON
error_log("fetch_caprino_data.php: Starting script");

require_once './pdo_conexion.php';

// Start output buffering to prevent any unwanted output
ob_start();
header('Content-Type: application/json');

// Clear any previous output that might interfere with JSON
ob_clean();

error_log("fetch_caprino_data.php: Headers set and output buffer cleared");

// Check if we have the database connection
if (!isset($conn)) {
    error_log("fetch_caprino_data.php: ERROR - Database connection not found");
    echo json_encode(['error' => 'Database connection not available']);
    ob_end_flush();
    exit;
}

error_log("fetch_caprino_data.php: Database connection available");

// Validate tagid parameter
if (!isset($_GET['tagid']) || empty($_GET['tagid'])) {
    error_log("fetch_caprino_data.php: ERROR - TagID parameter missing or empty");
    echo json_encode(['error' => 'TagID is required']);
    ob_end_flush();
    exit;
}

$tagid = trim($_GET['tagid']);
error_log("fetch_caprino_data.php: Searching for tagid: " . $tagid);

// Use PDO for better security and prepared statements
try {
    // The connection is already established in pdo_conexion.php
    
    $stmt = $conn->prepare("SELECT id, tagid, nombre, genero, raza, etapa, grupo, estatus, 
                               fecha_nacimiento, fecha_compra, image, image2, image3, video 
                          FROM caprino 
                          WHERE tagid = :tagid");
    
    if (!$stmt) {
        error_log("fetch_caprino_data.php: ERROR - Failed to prepare statement");
        echo json_encode(['error' => 'Failed to prepare database query']);
        ob_end_flush();
        exit;
    }
    
    $stmt->bindParam(':tagid', $tagid);
    $success = $stmt->execute();
    
    if (!$success) {
        error_log("fetch_caprino_data.php: ERROR - Failed to execute statement");
        echo json_encode(['error' => 'Failed to execute database query']);
        ob_end_flush();
        exit;
    }
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    error_log("fetch_caprino_data.php: Query executed, result: " . ($result ? "found" : "not found"));
    
    if ($result) {
        // Clean up any null values that might cause issues
        foreach ($result as $key => $value) {
            if ($value === null) {
                $result[$key] = '';
            }
        }
        
        // Log the data being returned (without sensitive info)
        error_log("fetch_caprino_data.php: Returning data for animal: " . $result['nombre']);
        
        // Ensure clean JSON output
        $json_output = json_encode($result);
        if ($json_output === false) {
            error_log("fetch_caprino_data.php: ERROR - JSON encoding failed: " . json_last_error_msg());
            echo json_encode(['error' => 'Failed to encode data as JSON']);
        } else {
            error_log("fetch_caprino_data.php: JSON encoded successfully, length: " . strlen($json_output));
            echo $json_output;
        }
    } else {
        error_log("fetch_caprino_data.php: No record found for TagID: " . $tagid);
        echo json_encode(['error' => 'No record found for TagID: ' . $tagid]);
    }
} catch(PDOException $e) {
    error_log("fetch_caprino_data.php: PDO Exception: " . $e->getMessage());
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} catch(Exception $e) {
    error_log("fetch_caprino_data.php: General Exception: " . $e->getMessage());
    echo json_encode(['error' => 'General error: ' . $e->getMessage()]);
}

error_log("fetch_caprino_data.php: Script ending");

// End output buffering and flush
ob_end_flush();