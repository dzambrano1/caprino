<?php
// ChatPDF Diagnostic Script for GoDaddy Deployment
// Upload this file to your GoDaddy server and run it to diagnose issues

header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
    <title>ChatPDF Diagnostic Tool</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .test { margin: 10px 0; padding: 10px; border: 1px solid #ddd; }
        .pass { background-color: #d4edda; border-color: #c3e6cb; }
        .fail { background-color: #f8d7da; border-color: #f5c6cb; }
        .info { background-color: #d1ecf1; border-color: #bee5eb; }
        pre { background: #f8f9fa; padding: 10px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>ChatPDF Diagnostic Tool</h1>
    <p>This tool will help diagnose why ChatPDF upload fails on GoDaddy.</p>

    <?php
    echo "<div class='test info'>";
    echo "<h3>Server Information</h3>";
    echo "<strong>Server:</strong> " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "<strong>PHP Version:</strong> " . PHP_VERSION . "<br>";
    echo "<strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
    echo "<strong>Current Directory:</strong> " . __DIR__ . "<br>";
    echo "<strong>Request URI:</strong> " . $_SERVER['REQUEST_URI'] . "<br>";
    
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['REQUEST_URI']);
    $baseUrl = $protocol . '://' . $host . $path;
    echo "<strong>Base URL:</strong> " . $baseUrl . "<br>";
    echo "<strong>ChatPDF Proxy URL:</strong> " . $baseUrl . '/chatpdf_proxy.php' . "<br>";
    echo "</div>";

    // Test 1: Check if chatpdf_proxy.php exists
    echo "<div class='test " . (file_exists('chatpdf_proxy.php') ? 'pass' : 'fail') . "'>";
    echo "<h3>Test 1: ChatPDF Proxy File</h3>";
    if (file_exists('chatpdf_proxy.php')) {
        echo "✅ chatpdf_proxy.php exists<br>";
        echo "File size: " . filesize('chatpdf_proxy.php') . " bytes<br>";
        echo "Readable: " . (is_readable('chatpdf_proxy.php') ? 'Yes' : 'No') . "<br>";
    } else {
        echo "❌ chatpdf_proxy.php NOT found<br>";
    }
    echo "</div>";

    // Test 2: Check cURL availability
    echo "<div class='test " . (function_exists('curl_init') ? 'pass' : 'fail') . "'>";
    echo "<h3>Test 2: cURL Support</h3>";
    if (function_exists('curl_init')) {
        echo "✅ cURL is available<br>";
        $curl_version = curl_version();
        echo "cURL Version: " . $curl_version['version'] . "<br>";
        echo "SSL Version: " . $curl_version['ssl_version'] . "<br>";
    } else {
        echo "❌ cURL is NOT available<br>";
    }
    echo "</div>";

    // Test 3: Test chatpdf_proxy.php accessibility
    if (file_exists('chatpdf_proxy.php')) {
        $proxyUrl = $baseUrl . '/chatpdf_proxy.php';
        
        echo "<div class='test info'>";
        echo "<h3>Test 3: ChatPDF Proxy Accessibility</h3>";
        echo "Testing URL: " . $proxyUrl . "<br>";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $proxyUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'ChatPDF-Diagnostic/1.0');
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
        
        if ($error) {
            echo "❌ cURL Error: " . $error . "<br>";
        } else {
            echo "HTTP Code: " . $httpCode . "<br>";
            echo "Response Length: " . strlen($response) . " bytes<br>";
            echo "First 200 chars: " . htmlspecialchars(substr($response, 0, 200)) . "<br>";
        }
        echo "</div>";
    }

    // Test 4: Check file upload capability
    echo "<div class='test info'>";
    echo "<h3>Test 4: File Upload Settings</h3>";
    echo "file_uploads: " . (ini_get('file_uploads') ? 'Enabled' : 'Disabled') . "<br>";
    echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>";
    echo "post_max_size: " . ini_get('post_max_size') . "<br>";
    echo "max_execution_time: " . ini_get('max_execution_time') . "<br>";
    echo "memory_limit: " . ini_get('memory_limit') . "<br>";
    echo "</div>";

    // Test 5: Check reports directory
    echo "<div class='test " . (is_dir('reports') && is_writable('reports') ? 'pass' : 'fail') . "'>";
    echo "<h3>Test 5: Reports Directory</h3>";
    if (is_dir('reports')) {
        echo "✅ Reports directory exists<br>";
        echo "Writable: " . (is_writable('reports') ? 'Yes' : 'No') . "<br>";
        $files = glob('reports/*.pdf');
        echo "PDF files found: " . count($files) . "<br>";
        if (count($files) > 0) {
            echo "Latest PDF: " . basename(end($files)) . "<br>";
        }
    } else {
        echo "❌ Reports directory NOT found<br>";
    }
    echo "</div>";

    // Test 6: Test external API connectivity
    echo "<div class='test info'>";
    echo "<h3>Test 6: External API Connectivity</h3>";
    echo "Testing connection to ChatPDF API...<br>";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.chatpdf.com/v1/sources/add-file');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'ChatPDF-Diagnostic/1.0');
    curl_setopt($ch, CURLOPT_NOBODY, true); // HEAD request only
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        echo "❌ Cannot reach ChatPDF API: " . $error . "<br>";
    } else {
        echo "✅ ChatPDF API reachable (HTTP " . $httpCode . ")<br>";
    }
    echo "</div>";

    // Test 7: Check error logs
    echo "<div class='test info'>";
    echo "<h3>Test 7: Recent Error Logs</h3>";
    $errorLog = ini_get('error_log');
    if ($errorLog && file_exists($errorLog)) {
        echo "Error log location: " . $errorLog . "<br>";
        $logs = file_get_contents($errorLog);
        $chatpdfLogs = array_filter(explode("\n", $logs), function($line) {
            return strpos($line, 'ChatPDF') !== false;
        });
        $recentLogs = array_slice($chatpdfLogs, -10);
        if (!empty($recentLogs)) {
            echo "Recent ChatPDF logs:<br>";
            echo "<pre>" . htmlspecialchars(implode("\n", $recentLogs)) . "</pre>";
        } else {
            echo "No ChatPDF-related logs found.<br>";
        }
    } else {
        echo "Error log not accessible or not configured.<br>";
    }
    echo "</div>";
    ?>

    <div class='test info'>
        <h3>Instructions</h3>
        <p><strong>If you see failures above:</strong></p>
        <ul>
            <li>Make sure chatpdf_proxy.php is uploaded to the same directory</li>
            <li>Check file permissions (755 for directories, 644 for files)</li>
            <li>Verify your GoDaddy hosting plan supports cURL and external API calls</li>
            <li>Contact GoDaddy support if external API calls are blocked</li>
        </ul>
        
        <p><strong>Next steps:</strong></p>
        <ol>
            <li>Run this diagnostic and note any failures</li>
            <li>Try the ChatPDF upload feature and check the browser console for errors</li>
            <li>Check your GoDaddy cPanel error logs for detailed error messages</li>
        </ol>
    </div>

</body>
</html>
