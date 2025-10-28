<?php
// PDF viewer with inline display
// This file displays PDFs inline in the browser

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
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
    die('Error: File not found - ' . htmlspecialchars($filename));
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

// Log the view for security/audit purposes
error_log("PDF View: " . $filename . " - IP: " . $_SERVER['REMOTE_ADDR']);

// Set appropriate headers for PDF inline display
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Length: ' . $fileSize);
header('Cache-Control: public, max-age=3600'); // Cache for 1 hour
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');

// Prevent any output before file content
if (ob_get_level()) {
    ob_end_clean();
}

// Read and output the file
readfile($filePath);
exit;
?>
