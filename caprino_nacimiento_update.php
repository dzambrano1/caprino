<?php
require_once './pdo_conexion.php';
// Disable error reporting in output
error_reporting(0);
ini_set('display_errors', 0);

header('Content-Type: application/json');

try {
    
    $conn = new mysqli($hostname, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $tagid = $_POST['tagid'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $etapa = $_POST['etapa'] ?? '';
    $raza = $_POST['raza'] ?? '';
    $grupo = $_POST['grupo'] ?? '';
    $estatus = $_POST['estatus'] ?? '';
    $peso_nacimiento = $_POST['peso'] ?? '';

    // Validate required fields
    if (empty($tagid) || empty($nombre) || empty($fecha_nacimiento)) {
        throw new Exception("Campos requeridos faltantes");
    }

    // Process image uploads
    $update_fields = [];
    $params = [];
    $types = "";
    
    // Handle main image upload if present
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';

        // Create directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Generate unique filename
        $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $newFileName = uniqid() . '_' . time() . '.' . $fileExtension;
        
        // Full path for file storage
        $targetPath = $uploadDir . $newFileName;

        // Validate file type
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileExtension, $allowedTypes)) {
            throw new Exception("Tipo de archivo no permitido");
        }
        
        // Move uploaded file
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            throw new Exception("Error al subir la imagen");
        }
        
        // Store the path in the update fields
        $update_fields[] = "image = ?";
        $params[] = $targetPath;
        $types .= "s";
    }
    
    // Handle image2 upload if present
    if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';

        // Create directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Generate unique filename
        $fileExtension = strtolower(pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION));
        $newFileName = uniqid() . '_' . time() . '.' . $fileExtension;
        
        // Full path for file storage
        $targetPath = $uploadDir . $newFileName;

        // Validate file type
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileExtension, $allowedTypes)) {
            throw new Exception("Tipo de archivo no permitido para imagen 2");
        }
        
        // Move uploaded file
        if (!move_uploaded_file($_FILES['image2']['tmp_name'], $targetPath)) {
            throw new Exception("Error al subir la imagen 2");
        }
        
        // Store the path in the update fields
        $update_fields[] = "image2 = ?";
        $params[] = $targetPath;
        $types .= "s";
    }
    
    // Handle image3 upload if present
    if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';

        // Create directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Generate unique filename
        $fileExtension = strtolower(pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION));
        $newFileName = uniqid() . '_' . time() . '.' . $fileExtension;
        
        // Full path for file storage
        $targetPath = $uploadDir . $newFileName;

        // Validate file type
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileExtension, $allowedTypes)) {
            throw new Exception("Tipo de archivo no permitido para imagen 3");
        }
        
        // Move uploaded file
        if (!move_uploaded_file($_FILES['image3']['tmp_name'], $targetPath)) {
            throw new Exception("Error al subir la imagen 3");
        }
        
        // Store the path in the update fields
        $update_fields[] = "image3 = ?";
        $params[] = $targetPath;
        $types .= "s";
    }
    
    // Handle video upload if present
    if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/videos/';

        // Create directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Generate unique filename
        $fileExtension = strtolower(pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION));
        $newFileName = uniqid() . '_' . time() . '.' . $fileExtension;
        
        // Full path for file storage
        $targetPath = $uploadDir . $newFileName;

        // Validate file type
        $allowedTypes = ['mp4', 'webm', 'ogg', 'mov'];
        if (!in_array($fileExtension, $allowedTypes)) {
            throw new Exception("Tipo de archivo de video no permitido");
        }
        
        // Move uploaded file
        if (!move_uploaded_file($_FILES['video']['tmp_name'], $targetPath)) {
            throw new Exception("Error al subir el video");
        }
        
        // Store the path in the update fields
        $update_fields[] = "video = ?";
        $params[] = $targetPath;
        $types .= "s";
    }

    // Add other fields to update
    $update_fields[] = "nombre = ?";
    $update_fields[] = "fecha_nacimiento = ?";
    $update_fields[] = "genero = ?";
    $update_fields[] = "etapa = ?";
    $update_fields[] = "raza = ?";
    $update_fields[] = "grupo = ?";
    $update_fields[] = "estatus = ?";
    $update_fields[] = "peso_nacimiento = ?";
    
    // Add the values for these fields
    $params[] = $nombre;
    $params[] = $fecha_nacimiento;
    $params[] = $genero;
    $params[] = $etapa;
    $params[] = $raza;
    $params[] = $grupo;
    $params[] = $estatus;
    $params[] = $peso_nacimiento;
    
    // Add the types for these fields
    $types .= "ssssssss";
    
    // Add tagid at the end for the WHERE clause
    $params[] = $tagid;
    $types .= "s";

    // Create the SQL query
    $sql = "UPDATE caprino SET " . implode(", ", $update_fields) . " WHERE tagid = ?";
    
    // Prepare and execute the update
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error en la preparación de la consulta: " . $conn->error);
    }
    
    // Bind parameters dynamically
    $stmt->bind_param($types, ...$params);
    
    if (!$stmt->execute()) {
        throw new Exception("Error al actualizar el registro: " . $stmt->error);
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
    
    // Return success response
    echo json_encode([
        "success" => true,
        "message" => "Animal actualizado exitosamente"
    ]);

} catch (Exception $e) {
    // Log error to file instead of output
    error_log("Error in caprino_update.php: " . $e->getMessage());
    
    // Return error response
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
?>
