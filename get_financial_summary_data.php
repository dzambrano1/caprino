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

    // Initialize totals
    $totalIncome = 0;
    $totalExpenses = 0;
    $milkIncome = 0;
    $salesIncome = 0;
    
    // Get Milk Income from dedicated endpoint for consistency
    $milkDataUrl = 'http://localhost/vacuno/get_milk_revenue_data.php';
    $milkData = @file_get_contents($milkDataUrl);
    if ($milkData !== false) {
        $milkDataArray = json_decode($milkData, true);
        if (is_array($milkDataArray)) {
            foreach ($milkDataArray as $monthData) {
                $milkIncome += (float)($monthData['total_revenue'] ?? 0);
            }
        }
    }
    $totalIncome += $milkIncome;
    
    // Get Sales Income from dedicated endpoint for consistency
    $salesDataUrl = 'http://localhost/vacuno/get_sales_data.php';
    $salesData = @file_get_contents($salesDataUrl);
    if ($salesData !== false) {
        $salesDataArray = json_decode($salesData, true);
        if (is_array($salesDataArray)) {
            foreach ($salesDataArray as $monthData) {
                $salesIncome += (float)($monthData['total_revenue'] ?? 0);
            }
        }
    }
    $totalIncome += $salesIncome;
    
    // Calculate Expenses - Feed supplements (with quantity)
    $feedExpenses = [
        'concentrado' => ['table' => 'ch_concentrado', 'price_field' => 'ch_concentrado_costo', 'qty_field' => 'ch_concentrado_racion'],
        'melaza' => ['table' => 'ch_melaza', 'price_field' => 'ch_melaza_costo', 'qty_field' => 'ch_melaza_racion'],
        'sal' => ['table' => 'ch_sal', 'price_field' => 'ch_sal_costo', 'qty_field' => 'ch_sal_racion']
    ];
    
    foreach ($feedExpenses as $category => $config) {
        $sql = "SELECT SUM({$config['price_field']} * {$config['qty_field']}) as total FROM {$config['table']} WHERE {$config['price_field']} > 0";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalExpenses += (float)($row['total'] ?? 0);
        }
    }
    
    // Calculate Expenses - Vaccines and treatments (single price)
    $healthExpenses = [
        'ch_clostridiosis' => 'ch_clostridiosis_costo',
        'ch_brucelosis' => 'ch_brucelosis_costo', 
        'ch_tetanos' => 'ch_tetanos_costo',
        'ch_garrapatas' => 'ch_garrapatas_costo',
        'ch_parasitos' => 'ch_parasitos_costo',
        'ch_rabia' => 'ch_rabia_costo'
    ];
    
    foreach ($healthExpenses as $table => $priceField) {
        $sql = "SELECT SUM($priceField) as total FROM $table WHERE $priceField > 0";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalExpenses += (float)($row['total'] ?? 0);
        }
    }
    
    // Calculate Gross Profit
    $grossProfit = $totalIncome - $totalExpenses;
    
    // Prepare data for chart
    $data = [
        [
            'category' => 'Ingresos',
            'amount' => $totalIncome,
            'formatted_amount' => number_format($totalIncome, 2, '.', ''),
            'details' => [
                'milk_income' => number_format($milkIncome ?? 0, 2, '.', ''),
                'sales_income' => number_format($salesIncome ?? 0, 2, '.', '')
            ]
        ],
        [
            'category' => 'Gastos',
            'amount' => $totalExpenses,
            'formatted_amount' => number_format($totalExpenses, 2, '.', ''),
            'details' => []
        ],
        [
            'category' => 'Utilidad Bruta',
            'amount' => $grossProfit,
            'formatted_amount' => number_format($grossProfit, 2, '.', ''),
            'details' => []
        ]
    ];

    // Close connection
    mysqli_close($conn);

    // Return JSON response
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

} catch (Exception $e) {
    // Log error for debugging
    error_log("Error in get_financial_summary_data.php: " . $e->getMessage());
    
    // Return error response
    http_response_code(500);
    echo json_encode(array(
        'error' => 'Error al obtener datos de resumen financiero',
        'message' => $e->getMessage()
    ), JSON_UNESCAPED_UNICODE);
}