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

    // SQL query to get purchase data from caprino table grouped by month
    // Y-axis: precio_compra (USD), X-axis: fecha_compra grouped by month
    $sql = "SELECT 
                DATE_FORMAT(fecha_compra, '%Y-%m') as month,
                COUNT(*) as purchase_count,
                SUM(precio_compra) as total_price,
                AVG(precio_compra) as avg_price,
                SUM(peso_compra) as total_weight,
                COUNT(*) as record_count,
                GROUP_CONCAT(DISTINCT tagid ORDER BY tagid SEPARATOR ', ') as tagids
            FROM caprino 
            WHERE fecha_compra IS NOT NULL 
            AND fecha_compra != '0000-00-00'
            AND precio_compra > 0
            GROUP BY DATE_FORMAT(fecha_compra, '%Y-%m')
            ORDER BY DATE_FORMAT(fecha_compra, '%Y-%m') ASC";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        throw new Exception("Query failed: " . mysqli_error($conn));
    }

    $data = array();
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = array(
                'month' => $row['month'],
                'purchase_count' => (int)$row['purchase_count'],
                'total_price' => number_format((float)$row['total_price'], 2, '.', ''),
                'avg_price' => number_format((float)$row['avg_price'], 2, '.', ''),
                'total_weight' => number_format((float)$row['total_weight'], 2, '.', ''),
                'record_count' => (int)$row['record_count'],
                'tagids' => $row['tagids'] ?? ''
            );
        }
    }

    // Close connection
    mysqli_close($conn);

    // Return JSON response
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

} catch (Exception $e) {
    // Log error for debugging
    error_log("Error in get_purchases_data.php: " . $e->getMessage());
    
    // Return error response
    http_response_code(500);
    echo json_encode(array(
        'error' => 'Error al obtener datos de compras',
        'message' => $e->getMessage()
    ), JSON_UNESCAPED_UNICODE);
}
?> 