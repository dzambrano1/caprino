<?php
header('Content-Type: application/json');

// Include database connection details
require_once "./pdo_conexion.php"; // Adjust path if necessary

// Use mysqli for connection as in the previous examples
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    echo json_encode(['error' => 'Database connection failed: ' . mysqli_connect_error()]);
    exit();
}

mysqli_set_charset($conn, "utf8");

$data = [];

try {
    // Array of vaccine tables and their corresponding column names
    $vaccines = [
        'Clostridiosis' => ['table' => 'ch_clostridiosis', 'dosis' => 'ch_clostridiosis_dosis', 'costo' => 'ch_clostridiosis_costo'],
        'Rabia' => ['table' => 'ch_rabia', 'dosis' => 'ch_rabia_dosis', 'costo' => 'ch_rabia_costo'],
        'Brucelosis' => ['table' => 'ch_brucelosis', 'dosis' => 'ch_brucelosis_dosis', 'costo' => 'ch_brucelosis_costo'],
        'Tetanos' => ['table' => 'ch_tetanos', 'dosis' => 'ch_tetanos_dosis', 'costo' => 'ch_tetanos_costo'],
        'Garrapatas' => ['table' => 'ch_garrapatas', 'dosis' => 'ch_garrapatas_dosis', 'costo' => 'ch_garrapatas_costo'],
        'Parasitos' => ['table' => 'ch_parasitos', 'dosis' => 'ch_parasitos_dosis', 'costo' => 'ch_parasitos_costo']
    ];

    foreach ($vaccines as $vaccineName => $vaccineInfo) {
        $table = $vaccineInfo['table'];
        $dosisColumn = $vaccineInfo['dosis'];
        $costoColumn = $vaccineInfo['costo'];

        // Query to get total cost for this vaccine type
        $sql = "
            SELECT 
                SUM({$dosisColumn} * {$costoColumn}) AS total_cost
            FROM {$table} 
            WHERE {$dosisColumn} > 0 AND {$costoColumn} > 0
        ";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalCost = $row['total_cost'] ? (float)$row['total_cost'] : 0;
            
            $data[] = [
                'vaccine_name' => $vaccineName,
                'total_cost' => $totalCost
            ];
            
            mysqli_free_result($result);
        } else {
            error_log("Error querying {$table}: " . mysqli_error($conn));
            // Continue with other vaccines even if one fails
            $data[] = [
                'vaccine_name' => $vaccineName,
                'total_cost' => 0
            ];
        }
    }

    echo json_encode($data);

} catch (Exception $e) {
    // Log error if needed
    error_log("Error fetching vaccine costs data: " . $e->getMessage());
    echo json_encode(['error' => 'Error processing request: ' . $e->getMessage()]);
} finally {
    // Close connection
    if (isset($conn)) {
        mysqli_close($conn);
    }
}