<?php
require_once './pdo_conexion.php'; // Adjust path if necessary

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set response header to JSON
header('Content-Type: application/json');

// Debug received data
function debugData($data) {
    error_log("DEBUG DATA: " . print_r($data, true));
}

// Log all POST data for debugging
error_log("POST data: " . print_r($_POST, true));

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no válido. Se esperaba POST.']);
    exit;
}

// Get action from POST
$action = isset($_POST['action']) ? trim($_POST['action']) : '';

try {
    // Ensure connection is a PDO instance
    if (!($conn instanceof PDO)) {
        throw new Exception("Database connection error");
    }

    switch ($action) {
        case 'insert':
            // Validate required fields
            $requiredFields = ['concentrado', 'etapa', 'costo', 'vigencia'];
            $missingFields = [];

            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
                    $missingFields[] = $field;
                }
            }

            if (!empty($missingFields)) {
                throw new Exception('Faltan los siguientes campos requeridos: ' . implode(', ', $missingFields));
            }

            // Sanitize and prepare data
            $concentrado = trim($_POST['concentrado']);
            $etapa = trim($_POST['etapa']);
            $costo = filter_var(trim($_POST['costo']), FILTER_VALIDATE_FLOAT);
            $vigencia = filter_var(trim($_POST['vigencia']), FILTER_VALIDATE_INT);

            // Additional validation for numeric fields
            if ($costo === false || $costo < 0) {
                throw new Exception('El valor de costo no es válido o es negativo.');
            }
            if ($vigencia === false || $vigencia < 0) {
                throw new Exception('El valor de vigencia no es válido o es negativo.');
            }

            // Debug values
            error_log("Insert values: concentrado=$concentrado, etapa=$etapa, costo=$costo, vigencia=$vigencia");

            // Insert new record - FIXED parameter names in SQL
            $sql = "INSERT INTO cc_concentrado (cc_concentrado_nombre, cc_concentrado_etapa, cc_concentrado_costo, cc_concentrado_vigencia) 
                   VALUES (:concentrado, :etapa, :costo, :vigencia)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':concentrado', $concentrado, PDO::PARAM_STR);
            $stmt->bindValue(':etapa', $etapa, PDO::PARAM_STR);
            $stmt->bindValue(':costo', $costo, PDO::PARAM_STR);
            $stmt->bindValue(':vigencia', $vigencia, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Alimento concentrado agregado exitosamente.']);
            } else {
                throw new Exception("Error al insertar el registro: " . implode(", ", $stmt->errorInfo()));
            }
            break;

        case 'update':
            // Validate required fields
            if (!isset($_POST['id']) || !isset($_POST['concentrado']) || !isset($_POST['etapa']) || !isset($_POST['costo']) || !isset($_POST['vigencia'])) {
                $missing = [];
                if (!isset($_POST['id'])) $missing[] = 'id';
                if (!isset($_POST['concentrado'])) $missing[] = 'concentrado';
                if (!isset($_POST['etapa'])) $missing[] = 'etapa';
                if (!isset($_POST['costo'])) $missing[] = 'costo';
                if (!isset($_POST['vigencia'])) $missing[] = 'vigencia';
                
                throw new Exception("Campos requeridos faltantes: " . implode(', ', $missing));
            }

            // Sanitize and validate inputs
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            $concentrado = trim($_POST['concentrado']);
            $etapa = trim($_POST['etapa']);
            $costo = filter_var(trim($_POST['costo']), FILTER_VALIDATE_FLOAT);
            $vigencia = filter_var(trim($_POST['vigencia']), FILTER_VALIDATE_INT);

            if ($id === false || $costo === false || $vigencia === false) {
                throw new Exception("Los valores ingresados no son válidos");
            }
            
            // Debug values
            error_log("Update values: id=$id, concentrado=$concentrado, etapa=$etapa, costo=$costo, vigencia=$vigencia");

            // Update existing record in cc_concentrado
            $sql = "UPDATE cc_concentrado 
                    SET cc_concentrado_nombre = :concentrado, 
                        cc_concentrado_etapa = :etapa,
                        cc_concentrado_costo = :costo, 
                        cc_concentrado_vigencia = :vigencia 
                    WHERE id = :id";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':concentrado', $concentrado, PDO::PARAM_STR);
            $stmt->bindValue(':etapa', $etapa, PDO::PARAM_STR);
            $stmt->bindValue(':costo', $costo, PDO::PARAM_STR);
            $stmt->bindValue(':vigencia', $vigencia, PDO::PARAM_INT);
            
            if (!$stmt->execute()) {
                throw new Exception("Error al actualizar el registro en cc_concentrado: " . implode(", ", $stmt->errorInfo()));
            }
            
            // Update related records in ch_concentrado table
            $sql_vh = "UPDATE ch_concentrado 
                       SET ch_concentrado_etapa = :etapa 
                       WHERE ch_concentrado_producto = :concentrado";
            
            $stmt_vh = $conn->prepare($sql_vh);
            $stmt_vh->bindValue(':etapa', $etapa, PDO::PARAM_STR);
            $stmt_vh->bindValue(':concentrado', $concentrado, PDO::PARAM_STR);
            
            if (!$stmt_vh->execute()) {
                error_log("Warning: Could not update ch_concentrado records: " . implode(", ", $stmt_vh->errorInfo()));
            }
            
            // Update related records in caprino table for animals using this concentrado
            $sql_caprino = "UPDATE caprino 
                           SET etapa = :etapa 
                           WHERE tagid IN (
                               SELECT DISTINCT ch_concentrado_tagid 
                               FROM ch_concentrado 
                               WHERE ch_concentrado_producto = :concentrado
                           )";
            
            $stmt_caprino = $conn->prepare($sql_caprino);
            $stmt_caprino->bindValue(':etapa', $etapa, PDO::PARAM_STR);
            $stmt_caprino->bindValue(':concentrado', $concentrado, PDO::PARAM_STR);
            
            if (!$stmt_caprino->execute()) {
                error_log("Warning: Could not update caprino records: " . implode(", ", $stmt_caprino->errorInfo()));
            }
            
            echo json_encode(['success' => true, 'message' => 'Registro actualizado exitosamente en todas las tablas relacionadas']);
            break;

        case 'delete':
            // Validate required ID field
            if (!isset($_POST['id'])) {
                throw new Exception("ID es requerido para eliminar");
            }

            // Sanitize and validate ID
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            
            if ($id === false) {
                throw new Exception("ID inválido");
            }

            // Delete record
            $sql = "DELETE FROM cc_concentrado WHERE id = :id";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Registro eliminado exitosamente']);
            } else {
                throw new Exception("Error al eliminar el registro: " . implode(", ", $stmt->errorInfo()));
            }
            break;

        default:
            throw new Exception("Acción no válida o no especificada: '$action'");
    }
} catch (PDOException $e) {
    // Log the error for debugging
    error_log("Database error: " . $e->getMessage());
    
    // Return error message
    echo json_encode(['success' => false, 'message' => 'Error de base de datos: ' . $e->getMessage()]);
} catch (Exception $e) {
    // Log the error for debugging
    error_log("Application error: " . $e->getMessage());
    
    // Return error message
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}