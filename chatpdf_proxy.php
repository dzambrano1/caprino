<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// API Configuration
$API_KEY = 'sec_AdQUXMlHjjhyrwud6dGCP9DFtUt8ZS7T';
$CHATPDF_API_URL = 'https://api.chatpdf.com/v1';

// Debug logging function
function logDebug($message, $data = null) {
    $logFile = __DIR__ . '/chatpdf_debug.log';
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] $message\n";
    if ($data) {
        $logMessage .= print_r($data, true) . "\n";
    }
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Error handling function
function sendError($message, $code = 400, $apiResponse = null) {
    http_response_code($code);
    $error = ['error' => $message];
    if ($apiResponse) {
        $error['api_response'] = $apiResponse;
        logDebug("API Error Response", $apiResponse);
    }
    echo json_encode($error);
    exit;
}

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendError('Method not allowed', 405);
}

// Get the action from the URL parameter
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action === 'upload') {
    // Handle file upload
    if (!isset($_FILES['file'])) {
        sendError('No file uploaded');
    }

    $file = $_FILES['file'];
    logDebug("Uploading file", ['name' => $file['name'], 'type' => $file['type'], 'size' => $file['size']]);
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        sendError('File upload failed: ' . print_r($file['error'], true));
    }

    // Validate file type and size
    $fileType = mime_content_type($file['tmp_name']);
    $acceptableMimeTypes = [
        'application/pdf',
        'application/x-pdf',
        'application/acrobat',
        'application/vnd.pdf',
        'text/pdf',
        'text/x-pdf'
    ];

    // If mime_content_type fails, try to validate by file extension
    if (!in_array($fileType, $acceptableMimeTypes)) {
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if ($extension !== 'pdf') {
            sendError('Only PDF files are allowed. Detected type: ' . $fileType . ', Extension: ' . $extension);
        }
        $fileType = 'application/pdf';
    }

    // Check file size (20MB limit for ChatPDF)
    if ($file['size'] > 20 * 1024 * 1024) {
        sendError('File size exceeds 20MB limit');
    }

    // Log file details
    logDebug("File details", [
        'name' => $file['name'],
        'type' => $file['type'],
        'detected_type' => $fileType,
        'size' => $file['size'],
        'tmp_name' => $file['tmp_name']
    ]);

    // Read file content
    $fileContent = file_get_contents($file['tmp_name']);
    if ($fileContent === false) {
        sendError('Failed to read file content');
    }

    // Prepare the file for upload using multipart/form-data
    $boundary = uniqid();
    $delimiter = '-------------' . $boundary;
    $postData = '--' . $delimiter . "\r\n" .
        'Content-Disposition: form-data; name="file"; filename="' . $file['name'] . '"' . "\r\n" .
        'Content-Type: application/pdf' . "\r\n\r\n" .
        $fileContent . "\r\n" .
        '--' . $delimiter . "--\r\n";

    // Initialize cURL
    $curl = curl_init($CHATPDF_API_URL . '/sources/add-file');
    
    // Set cURL options
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_HTTPHEADER => [
            'x-api-key: ' . $API_KEY,
            'Content-Type: multipart/form-data; boundary=' . $delimiter,
            'Accept: application/json'
        ]
    ]);

    // Enable verbose debug output
    $verbose = fopen('php://temp', 'w+');
    curl_setopt($curl, CURLOPT_VERBOSE, true);
    curl_setopt($curl, CURLOPT_STDERR, $verbose);

    // Execute the request
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    // Log verbose output
    rewind($verbose);
    $verboseLog = stream_get_contents($verbose);
    fclose($verbose);
    logDebug("CURL Verbose Log", $verboseLog);

    if (curl_errno($curl)) {
        sendError('Curl error: ' . curl_error($curl));
    }

    curl_close($curl);

    // Parse response
    $responseData = json_decode($response, true);
    logDebug("API Response", $responseData);

    if ($httpCode !== 200) {
        $errorMessage = isset($responseData['error']) ? $responseData['error'] : 'Unknown API error';
        sendError('ChatPDF API error: ' . $errorMessage, $httpCode, [
            'response' => $responseData,
            'curl_info' => curl_getinfo($curl)
        ]);
    }

    echo json_encode($responseData);

} elseif ($action === 'chat') {
    // Handle chat messages
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input || !isset($input['sourceId']) || !isset($input['messages'])) {
        sendError('Invalid request data');
    }

    logDebug("Chat Request", $input);

    $curl = curl_init($CHATPDF_API_URL . '/chats/message');
    
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_VERBOSE => true,
        CURLOPT_HEADER => true,
        CURLOPT_HTTPHEADER => [
            'x-api-key: ' . $API_KEY,
            'Content-Type: application/json',
            'Accept: application/json'
        ],
        CURLOPT_POSTFIELDS => json_encode($input)
    ]);

    // Create a temporary file to store CURL debug info
    $verboseOutput = fopen('php://temp', 'w+');
    curl_setopt($curl, CURLOPT_STDERR, $verboseOutput);

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
    // Get headers and body
    $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);
    
    logDebug("API Response Headers", $headers);
    logDebug("API Response Body", $body);

    if (curl_errno($curl)) {
        rewind($verboseOutput);
        $verboseLog = stream_get_contents($verboseOutput);
        logDebug("CURL Debug Log", $verboseLog);
        sendError('Curl error: ' . curl_error($curl));
    }
    
    fclose($verboseOutput);
    curl_close($curl);

    // Decode response to check for API error messages
    $responseData = json_decode($body, true);
    
    if ($httpCode !== 200) {
        $errorMessage = isset($responseData['error']) ? $responseData['error'] : 'Unknown API error';
        $debugInfo = [
            'http_code' => $httpCode,
            'response_data' => $responseData,
            'headers' => $headers
        ];
        sendError('ChatPDF API error: ' . $errorMessage, $httpCode, $debugInfo);
    }

    echo $body;

} else {
    sendError('Invalid action');
} 