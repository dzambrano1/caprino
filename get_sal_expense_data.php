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

    // SQL query to get individual sal records with actual start and end dates for proper cross-month distribution
    $sql = "SELECT 
                ch_sal_racion,
                ch_sal_costo,
                ch_sal_fecha_inicio,
                ch_sal_fecha_fin
            FROM ch_sal 
            WHERE ch_sal_fecha_inicio IS NOT NULL 
            AND ch_sal_fecha_fin IS NOT NULL
            AND ch_sal_racion > 0 
            AND ch_sal_costo > 0
            ORDER BY ch_sal_fecha_inicio ASC";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        throw new Exception("Query failed: " . mysqli_error($conn));
    }

    // Array to store monthly aggregated data
    $monthlyData = array();
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Get start and end dates from database
            $startDate = new DateTime($row['ch_sal_fecha_inicio']);
            $endDate = new DateTime($row['ch_sal_fecha_fin']);
            
            // Calculate total days in the period (inclusive)
            $totalDays = $startDate->diff($endDate)->days + 1;
            
            // Calculate total expense using formula: racion × costo × days
            $totalExpense = (float)$row['ch_sal_racion'] * (float)$row['ch_sal_costo'] * $totalDays;
            
            // Calculate daily cost for distribution across months
            $dailyCost = $totalExpense / $totalDays;
            
            // Distribute the daily cost across each day in the validity period
            $currentDate = clone $startDate;
            while ($currentDate <= $endDate) {
                $monthKey = $currentDate->format('Y-m');
                
                // Initialize month data if not exists
                if (!isset($monthlyData[$monthKey])) {
                    $monthlyData[$monthKey] = array(
                        'total_expense' => 0,
                        'total_quantity' => 0,
                        'total_cost_sum' => 0,
                        'record_count' => 0,
                        'days_count' => 0
                    );
                }
                
                // Add daily cost to the month total
                $monthlyData[$monthKey]['total_expense'] += $dailyCost;
                $monthlyData[$monthKey]['total_quantity'] += (float)$row['ch_sal_racion'];
                $monthlyData[$monthKey]['total_cost_sum'] += (float)$row['ch_sal_costo'];
                $monthlyData[$monthKey]['days_count'] += 1;
                
                // Move to next day
                $currentDate->add(new DateInterval('P1D'));
            }
            
            // Count unique records (avoid counting the same record multiple times)
            $recordStartMonth = $startDate->format('Y-m');
            if (isset($monthlyData[$recordStartMonth])) {
                $monthlyData[$recordStartMonth]['record_count'] += 1;
            }
        }
    }

    // Convert to final format
    $data = array();
    ksort($monthlyData); // Sort by month
    
    foreach ($monthlyData as $month => $monthData) {
        $avgPrice = $monthData['days_count'] > 0 ? $monthData['total_cost_sum'] / $monthData['days_count'] : 0;
        
        $data[] = array(
            'month' => $month,
            'total_expense' => number_format($monthData['total_expense'], 2, '.', ''),
            'total_quantity' => number_format($monthData['total_quantity'], 2, '.', ''),
            'avg_price' => number_format($avgPrice, 2, '.', ''),
            'record_count' => $monthData['record_count'],
            'days_count' => $monthData['days_count']
        );
    }

    // Close connection
    mysqli_close($conn);

    // Return JSON response
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

} catch (Exception $e) {
    // Log error for debugging
    error_log("Error in get_sal_expense_data.php: " . $e->getMessage());
    
    // Return error response
    http_response_code(500);
    echo json_encode(array(
        'error' => 'Error al obtener datos de gastos en sal',
        'message' => $e->getMessage()
    ), JSON_UNESCAPED_UNICODE);
}
?> 