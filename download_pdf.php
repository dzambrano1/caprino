<?php
// Secure PDF download handler
// This file handles PDF downloads with proper security checks

// Start session for security
session_start();

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Check if file parameter is provided
if (!isset($_GET['file']) || empty($_GET['file'])) {
    http_response_code(400);
    die('Error: No file specified');
}

$filename = $_GET['file'];

// Validate filename format (should be like: AnimalName_TagID_Date_Time.pdf)
if (!preg_match('/^[a-zA-Z0-9_\-\s]+\.pdf$/', $filename)) {
    http_response_code(400);
    die('Error: Invalid filename format');
}

// Security: Prevent directory traversal attacks
$filename = basename($filename);
if (strpos($filename, '..') !== false || strpos($filename, '/') !== false || strpos($filename, '\\') !== false) {
    http_response_code(400);
    die('Error: Invalid filename');
}

// Define the reports directory
$reportsDir = __DIR__ . '/reports/';
$filePath = $reportsDir . $filename;

// Check if file exists
if (!file_exists($filePath)) {
    http_response_code(404);
    die('Error: File not found');
}

// Check if it's actually a PDF file
$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($fileInfo, $filePath);
finfo_close($fileInfo);

if ($mimeType !== 'application/pdf') {
    http_response_code(400);
    die('Error: Invalid file type');
}

// Get file size
$fileSize = filesize($filePath);
if ($fileSize === false) {
    http_response_code(500);
    die('Error: Cannot determine file size');
}

// Log the download for security/audit purposes
error_log("PDF Download: " . $filename . " - IP: " . $_SERVER['REMOTE_ADDR'] . " - User Agent: " . $_SERVER['HTTP_USER_AGENT']);

// Set appropriate headers for PDF download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . $fileSize);
header('Cache-Control: private, must-revalidate');
header('Pragma: private');
header('Expires: 0');

// Prevent any output before file content
if (ob_get_level()) {
    ob_end_clean();
}

// Read and output the file in chunks to handle large files efficiently
$handle = fopen($filePath, 'rb');
if ($handle === false) {
    http_response_code(500);
    die('Error: Cannot open file');
}

// Output file in 8KB chunks
while (!feof($handle)) {
    $chunk = fread($handle, 8192);
    if ($chunk === false) {
        break;
    }
    echo $chunk;
    
    // Flush output to browser
    if (ob_get_level()) {
        ob_flush();
    }
    flush();
}

fclose($handle);
exit;
?>
