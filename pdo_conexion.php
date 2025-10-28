<?php

// Detect environment based on server name
$is_production = (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] !== 'localhost');

if ($is_production) {
    // Production database credentials
    $servername = "localhost"; // Update this with your production database host
    $username = "root"; // Update this with your production database username
    $password = ""; // Update this with your production database password
    $dbname = "caprino"; // Update this with your production database name
} else {
    // Local development database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    $dbname = "caprino";
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES utf8");
} catch(PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    
    // Set JSON header first
    header('Content-Type: application/json');
    http_response_code(500);
    
    // For debugging - provide detailed error in development
    $errorDetails = $is_production ? 'Production database error' : $e->getMessage();
    
    echo json_encode([
        'success' => false,
        'error' => 'Database connection failed',
        'details' => $errorDetails,
        'debug_info' => !$is_production ? [
            'host' => $servername,
            'database' => $dbname,
            'user' => $username
        ] : null
    ]);
    exit;
}