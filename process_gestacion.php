<?php
require_once './pdo_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $response = array();
    
    if ($_POST['action'] === 'insert' && isset($_POST['tagid'], $_POST['numero'], $_POST['fecha'])) {
        try {
            // Validate that the new date is at least 150 days apart from the most recent gestacion date for the same tagid
            $validationStmt = $conn->prepare("
                SELECT ch_gestacion_fecha 
                FROM ch_gestacion 
                WHERE ch_gestacion_tagid = ? 
                ORDER BY ch_gestacion_fecha DESC 
                LIMIT 1
            ");
            $validationStmt->execute([$_POST['tagid']]);
            $latestGestacion = $validationStmt->fetch(PDO::FETCH_ASSOC);
            
            if ($latestGestacion) {
                $latestDate = new DateTime($latestGestacion['ch_gestacion_fecha']);
                $newDate = new DateTime($_POST['fecha']);
                $interval = $latestDate->diff($newDate);
                $daysDifference = $interval->days;
                
                // Check if the new date is at least 150 days apart
                if ($daysDifference < 150) {
                    $response = array(
                        'success' => false,
                        'message' => "No se puede registrar una nueva gestación. Debe haber al menos 150 días entre gestaciones. La última gestación fue el " . $latestGestacion['ch_gestacion_fecha'] . " (hace " . $daysDifference . " días)."
                    );
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit;
                }
            }
            
            // If validation passes, proceed with the insert
            $stmt = $conn->prepare("INSERT INTO ch_gestacion (ch_gestacion_tagid, ch_gestacion_numero, ch_gestacion_fecha) VALUES (?, ?, ?)");
            $stmt->execute([
                $_POST['tagid'],
                $_POST['numero'],
                $_POST['fecha']
            ]);
            
            $response = array(
                'success' => true,
                'message' => 'Registro agregado correctamente',
                'redirect' => 'caprino_register_gestacion.php'
            );
            
        } catch (PDOException $e) {
            $response = array(
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            );
        }
    } elseif ($_POST['action'] === 'delete' && isset($_POST['id'])) {
        try {
            $stmt = $conn->prepare("DELETE FROM ch_gestacion WHERE id = ?");
            $stmt->execute([$_POST['id']]);
            
            if ($stmt->rowCount() > 0) {
                $response = array(
                    'success' => true,
                    'message' => 'Registro eliminado correctamente',
                    'redirect' => 'caprino_register_gestacion.php'
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
    } elseif ($_POST['action'] === 'update' && isset($_POST['id'], $_POST['numero'], $_POST['fecha'])) {
        try {
            // Validate that the updated date is at least 150 days apart from other gestacion dates for the same tagid
            // First, get the tagid for the current record
            $tagidStmt = $conn->prepare("SELECT ch_gestacion_tagid FROM ch_gestacion WHERE id = ?");
            $tagidStmt->execute([$_POST['id']]);
            $currentRecord = $tagidStmt->fetch(PDO::FETCH_ASSOC);
            
            if ($currentRecord) {
                $validationStmt = $conn->prepare("
                    SELECT ch_gestacion_fecha 
                    FROM ch_gestacion 
                    WHERE ch_gestacion_tagid = ? AND id != ?
                    ORDER BY ch_gestacion_fecha DESC 
                    LIMIT 1
                ");
                $validationStmt->execute([$currentRecord['ch_gestacion_tagid'], $_POST['id']]);
                $otherGestacion = $validationStmt->fetch(PDO::FETCH_ASSOC);
                
                if ($otherGestacion) {
                    $otherDate = new DateTime($otherGestacion['ch_gestacion_fecha']);
                    $newDate = new DateTime($_POST['fecha']);
                    $interval = $otherDate->diff($newDate);
                    $daysDifference = $interval->days;
                    
                    // Check if the updated date is at least 150 days apart
                    if ($daysDifference < 150) {
                        $response = array(
                            'success' => false,
                            'message' => "No se puede actualizar la gestación. Debe haber al menos 150 días entre gestaciones. Otra gestación fue registrada el " . $otherGestacion['ch_gestacion_fecha'] . " (hace " . $daysDifference . " días)."
                        );
                        header('Content-Type: application/json');
                        echo json_encode($response);
                        exit;
                    }
                }
            }
            
            // If validation passes, proceed with the update
            $stmt = $conn->prepare("UPDATE ch_gestacion SET ch_gestacion_numero = ?, ch_gestacion_fecha = ? WHERE id = ?");
            $stmt->execute([
                $_POST['numero'],
                $_POST['fecha'],
                $_POST['id']
            ]);
            
            $response = array(
                'success' => true,
                'message' => 'Registro actualizado correctamente',
                'redirect' => 'caprino_register_gestacion.php'
            );
            
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
?>