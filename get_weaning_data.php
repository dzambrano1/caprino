<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Include database connection
require_once './pdo_conexion.php';

try {
    // Create connection using mysqli
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }

    // Set charset to UTF-8
    mysqli_set_charset($conn, "utf8");

    // SQL query to get weaning data grouped by month
    $sql = "SELECT 
                DATE_FORMAT(ch_destete_fecha, '%Y-%m') as month,
                COUNT(*) as weaning_count,
                AVG(ch_destete_peso) as avg_weight,
                SUM(ch_destete_peso) as total_weight,
                GROUP_CONCAT(ch_destete_tagid ORDER BY ch_destete_tagid SEPARATOR ', ') as tagids,
                COUNT(*) as record_count
            FROM ch_destete 
            WHERE ch_destete_fecha IS NOT NULL 
            AND ch_destete_peso > 0
            GROUP BY DATE_FORMAT(ch_destete_fecha, '%Y-%m')
            ORDER BY DATE_FORMAT(ch_destete_fecha, '%Y-%m') ASC";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        throw new Exception("Query failed: " . mysqli_error($conn));
    }

    $data = array();
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = array(
                'month' => $row['month'],
                'weaning_count' => (int)$row['weaning_count'],
                'avg_weight' => number_format((float)$row['avg_weight'], 2, '.', ''),
                'total_weight' => number_format((float)$row['total_weight'], 2, '.', ''),
                'tagids' => $row['tagids'] ? $row['tagids'] : '',
                'record_count' => (int)$row['record_count']
            );
        }
    }

    // Close connection
    mysqli_close($conn);

    // Return JSON response
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

} catch (Exception $e) {
    // Log error for debugging
    error_log("Error in get_weaning_data.php: " . $e->getMessage());
    
    // Return error response
    http_response_code(500);
    echo json_encode(array(
        'error' => 'Error al obtener datos de destetes',
        'message' => $e->getMessage()
    ), JSON_UNESCAPED_UNICODE);
}
?> 