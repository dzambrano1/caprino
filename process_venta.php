<?php
require_once './pdo_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $response = array();
    
    if ($_POST['action'] === 'insert' && isset($_POST['tagid'], $_POST['precio'], $_POST['peso'], $_POST['fecha'])) {
        try {
            // Update caprino table with sale information
            $stmt = $conn->prepare("UPDATE caprino SET 
                precio_venta = ?, 
                peso_venta = ?, 
                fecha_venta = ?,
                estatus = 'Vendido'
                WHERE tagid = ?");
            
            $stmt->execute([
                $_POST['precio'],
                $_POST['peso'],
                $_POST['fecha'],
                $_POST['tagid']
            ]);
            
            // Check if update affected any rows
            if ($stmt->rowCount() > 0) {
                $response = array(
                    'success' => true,
                    'message' => 'Venta registrada correctamente',
                    'redirect' => 'caprino_register_venta.php'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'No se encontró el animal con el Tag ID especificado'
                );
            }
            
        } catch (PDOException $e) {
            $response = array(
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            );
        }
    } elseif ($_POST['action'] === 'delete' && isset($_POST['id'])) {
        try {
            // Clear sale information from caprino table
            $stmt = $conn->prepare("UPDATE caprino SET 
                precio_venta = NULL, 
                peso_venta = NULL, 
                fecha_venta = NULL,
                estatus = 'Activo'
                WHERE id = ?");
                
            $stmt->execute([$_POST['id']]);
            
            if ($stmt->rowCount() > 0) {
                $response = array(
                    'success' => true,
                    'message' => 'Registro de venta eliminado correctamente',
                    'redirect' => 'caprino_register_venta.php'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'No se encontró el registro a eliminar'
                );
            }
            
        } catch (PDOException $e) {
            $response = array(
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            );
        }
    } elseif ($_POST['action'] === 'update' && isset($_POST['tagid'], $_POST['precio'], $_POST['peso'], $_POST['fecha'])) {
        try {
            // Update sale information in caprino table
            $stmt = $conn->prepare("UPDATE caprino SET 
                precio_venta = ?, 
                peso_venta = ?, 
                fecha_venta = ?
                WHERE tagid = ?");
                
            $stmt->execute([
                $_POST['precio'],
                $_POST['peso'],
                $_POST['fecha'],
                $_POST['tagid']
            ]);
            
            if ($stmt->rowCount() > 0) {
                $response = array(
                    'success' => true,
                    'message' => 'Información de venta actualizada correctamente',
                    'redirect' => 'caprino_register_venta.php'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'No se encontró el animal con el Tag ID especificado'
                );
            }
            
        } catch (PDOException $e) {
            $response = array(
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            );
        }
    } else {
        $response = array(
            'success' => false,
            'message' => 'Acción no válida o datos no proporcionados'
        );
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// If we get here, something went wrong
header('Content-Type: application/json');
echo json_encode(array(
    'success' => false,
    'message' => 'Solicitud no válida'
));