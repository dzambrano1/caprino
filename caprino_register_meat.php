<?php
require_once './pdo_conexion.php';  

// Debug connection type
if (!($conn instanceof PDO)) {
    die("Error: Connection is not a PDO instance. Please check your connection setup.");
}
// Enable PDO error mode to get better error messages
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Caprino Register Carne</title>
<!-- Link to the Favicon -->
<link rel="icon" href="images/default_image.png" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!--Bootstrap 5 Css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


<!-- Include Chart.js and Chart.js DataLabels Plugin -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

<!-- SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

<!-- Place these in the <head> section in this exact order -->

<!-- jQuery Core (main library) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

<!-- DataTables JavaScript -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<!-- DataTables Buttons JS -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Add these in the <head> section, after your existing DataTables CSS/JS -->
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<!-- DataTables Buttons JS -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="./caprino.css">

<style>
/* Custom styles for enhanced chart appearance */
.bg-gradient-success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
}

.card {
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15) !important;
}

.card-header {
    border-bottom: none;
    border-radius: 16px 16px 0 0 !important;
}

.card-body {
    border-radius: 0 0 16px 16px;
}

.chart-controls .form-select {
    border: none;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    font-size: 0.875rem;
    font-weight: 500;
}

.chart-controls .form-select:focus {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    transform: translateY(-1px);
}

.chart-container {
    background: #fff;
    border-radius: 12px;
    padding: 1rem;
    box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.05);
}

.badge {
    font-weight: 600;
    letter-spacing: 0.5px;
}

.form-label {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Enhanced chart styling */
#weightChart, #weightValueChart {
    border-radius: 8px;
}

/* Loading state */
.chart-container.loading {
    opacity: 0.7;
    pointer-events: none;
}

.chart-container.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 40px;
    height: 40px;
    margin: -20px 0 0 -20px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #007bff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    z-index: 1000;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Chart hover effects */
.chart-container:hover {
    box-shadow: inset 0 2px 12px rgba(0, 0, 0, 0.08);
}

/* Enhanced form controls */
.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Professional spacing */

.chart-container {
    margin: 1rem 0;
}

/* Enhanced typography */
.card-header h5 {
    font-weight: 700;
    letter-spacing: 0.5px;
}

/* Smooth transitions for all interactive elements */
* {
    transition: all 0.2s ease;
}

/* Enhanced badge styling */
.badge {
    backdrop-filter: blur(10px);
    color: #007bff;
    border: 1px solid rgba(0, 123, 255, 0.2);
}

/* Status-specific badge styles */
.badge.status-vencido {
    background-color: red !important;
    color: white !important;
}

.badge.status-vigente {
    background-color: green !important;
    color: white !important;
}

.badge.status-no-registro {
    background-color: gray !important;
    color: white !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card {
        margin: 1rem 0;
    }
    
    .chart-controls .form-select {
        font-size: 0.8rem;
        padding: 0.375rem 0.75rem;
    }
    
    .card-header h5 {
        font-size: 1rem;
    }
    
    .badge {
        font-size: 0.75rem;
        padding: 0.5rem 1rem;
    }
}

/* Animation enhancements */
.chart-container {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Hover effects for interactive elements */
.form-select:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Professional color scheme */
.text-muted {
    color: #6c757d !important;
}

.fw-bold {
    font-weight: 600 !important;
}

/* Enhanced shadows */
.shadow-sm {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08) !important;
}

.shadow-lg {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12) !important;
}

/* Enhanced badge styling */
.badge {
    backdrop-filter: blur(10px);
    color: #007bff;
    border: 1px solid rgba(0, 123, 255, 0.2);
}

/* Professional chart enhancements */
.chart-container {
    position: relative;
    background: linear-gradient(145deg, #ffffff, #f8f9fa);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

/* Enhanced card shadows */
.card.shadow-lg {
    box-shadow: 
        0 20px 25px -5px rgba(0, 0, 0, 0.1),
        0 10px 10px -5px rgba(0, 0, 0, 0.04),
        0 0 0 1px rgba(0, 0, 0, 0.05) !important;
}

/* Professional form styling */
.form-select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
}

/* Enhanced typography for better readability */
.card-header h5 {
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

/* Professional color palette */
:root {
    --primary-gradient: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
    --success-gradient: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    --text-primary: #2c3e50;
    --text-secondary: #6c757d;
    --border-light: rgba(0, 0, 0, 0.05);
    --shadow-light: rgba(0, 0, 0, 0.08);
    --shadow-medium: rgba(0, 0, 0, 0.12);
    --shadow-heavy: rgba(0, 0, 0, 0.15);
}

/* Enhanced animations */
.chart-container {
    animation: slideInUp 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Professional hover states */
.card:hover .card-header {
    background: var(--primary-gradient) !important;
}

.card:hover .card-header.bg-gradient-success {
    background: var(--success-gradient) !important;
}

/* Enhanced focus states */
.form-select:focus {
    transform: translateY(-2px);
    box-shadow: 
        0 0 0 3px rgba(0, 123, 255, 0.1),
        0 8px 25px rgba(0, 0, 0, 0.15);
}

/* Professional spacing system */
.card-body {
    padding: 2.5rem;
}

.chart-controls {
    display: flex;
    gap: 1rem;
    align-items: center;
}

/* Enhanced responsive design */
@media (max-width: 992px) {
    .chart-controls {
        flex-direction: column;
        align-items: stretch;
    }
    
    .card-header .d-flex {
        flex-direction: column;
        gap: 1rem;
    }
}

/* Professional loading animation */
.chart-container.loading::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 12px;
    z-index: 999;
}
</style>
</head>
<body>
<!-- Icon Navigation Buttons -->

<div class="container nav-icons-container">
    <div class="icon-button-container">
        <button onclick="window.location.href='../inicio.php'" class="icon-button">
            <img src="./images/default_image.png" alt="Inicio" class="nav-icon">
        </button>
        <span class="button-label">INICIO</span>
    </div>
    
    <div class="icon-button-container">
        <button onclick="window.location.href='./inventario_caprino.php'" class="icon-button">
            <img src="./images/veterinario-ia.png" alt="Inicio" class="nav-icon">
        </button>
        <span class="button-label">VETERINARIO</span>
    </div>
    
    <div class="icon-button-container">
        <button onclick="window.location.href='./caprino_indices.php'" class="icon-button">
            <img src="./images/indices.png" alt="Inicio" class="nav-icon">
        </button>
        <span class="button-label">INDICES</span>
    </div>
   
    <div class="icon-button-container">
            <button onclick="window.location.href='./caprino_configuracion.php'" class="icon-button">
                <img src="./images/configuracion.png" alt="Inicio" class="nav-icon">
            </button>
            <span class="button-label">CONFIG</span>
        </div>

</div>


<!-- Add back button before the header container -->
<a href="./caprino_registros.php" class="back-btn">
    <i class="fas fa-arrow-left"></i>
</a>
<div class="container text-center">
  <h3  class="container mt-4 text-white" class="collapse" id="section-historial-produccion-caprino">
  REGISTROS DE PESO ANIMAL
  </h3>

  <!-- New Entry Modal -->
  <div class="modal fade" id="newPesoModal" tabindex="-1" aria-labelledby="newPesoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPesoModalLabel">
                    <i class="fas fa-plus-circle me-2"></i>Nuevo Registro Peso
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="newPesoForm">
                <div class="mb-4">                        
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-calendar"></i>
                                <label for="new_fecha" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="new_fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" required>
                            </span>                            
                        </div>
                    </div>
                    <div class="mb-4">                        
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-tag"></i>
                                <label for="new_tagid" class="form-label">Tag ID</label>
                                <input type="text" class="form-control" id="new_tagid" name="tagid" required>
                            </span>                            
                        </div>
                    </div>                    
                    <div class="mb-4">                        
                        <div class="input-group">
                            <span class="input-group-text">
                            <i class="fa-solid fa-weight"></i>
                                <label for="new_peso" class="form-label">Peso</label>
                                <input type="text" class="form-control" id="new_peso" name="peso" required>
                            </span>
                        </div>
                    </div>
                    <div class="mb-4">                        
                        <div class="input-group">
                            <span class="input-group-text">
                            <i class="fa-solid fa-dollar-sign"></i>
                                <label for="new_precio" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="new_precio" name="precio" required>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer btn-group">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancelar
                </button>
                <button type="button" class="btn btn-success" id="saveNewPeso">
                    <i class="fas fa-save me-1"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- DataTable for ch_peso records -->
  <div class="container table-section" style="display: block;">
      <div class="table-responsive">
          <table id="carneTable" class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">Acciones</th>
                      <th class="text-center">Fecha</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Tag ID</th>
                      <th class="text-center">Peso (kg)</th>
                      <th class="text-center">Precio ($/kg)</th>
                      <th class="text-center">Valor Total ($)</th>
                      <th class="text-center">Estatus</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  try {
                      // Query to get all Animals and ALL their peso records (if any)
                        $pesoQuery = "
                            SELECT
                                v.tagid AS caprino_tagid,
                                v.nombre AS animal_nombre,
                                p.id AS peso_id,         -- Will be NULL for animals with no peso records
                                p.ch_peso_fecha,
                                p.ch_peso_tagid,         -- Matches caprino_tagid if peso exists
                                p.ch_peso_animal,
                                p.ch_peso_precio,
                                -- Calculate total_value only if p.id is not null
                                CASE WHEN p.id IS NOT NULL THEN CAST((p.ch_peso_animal * p.ch_peso_precio) AS DECIMAL(10,2)) ELSE NULL END as total_value
                            FROM
                                caprino v
                            LEFT JOIN
                                ch_peso p ON v.tagid = p.ch_peso_tagid -- Join ALL matching peso records
                            ORDER BY
                                -- Prioritize animals with records (IS NOT NULL -> 0, IS NULL -> 1)
                                CASE WHEN p.id IS NOT NULL THEN 0 ELSE 1 END ASC,
                                -- Then order by animal tag ID to group them
                                v.tagid ASC,
                                -- Within each animal, order their peso records by date descending
                                p.ch_peso_fecha DESC";

                        $stmt = $conn->prepare($pesoQuery);
                        $stmt->execute();
                        $pesosData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      // If no data, display a message
                      if (empty($pesosData)) {
                          echo "<tr><td colspan='9' class='text-center'>No hay animales registrados</td></tr>"; // Updated message
                      } else {
                          // Get vigencia setting for peso records
                          $vigencia = 30; // Default value
                          try {
                              $configQuery = "SELECT c_vencimiento_pesaje_animal FROM c_vencimiento LIMIT 1";
                              $configStmt = $conn->prepare($configQuery);
                              $configStmt->execute();
                              
                              // Explicitly use PDO fetch method
                              $row = $configStmt->fetch(PDO::FETCH_ASSOC);
                              if ($row && isset($row['c_vencimiento_pesaje_animal'])) {
                                  $vigencia = intval($row['c_vencimiento_pesaje_animal']);
                              }
                          } catch (PDOException $e) {
                              error_log("Error fetching configuration: " . $e->getMessage());
                              // Continue with default value
                          }
                          
                          $currentDate = new DateTime();
                          
                          foreach ($pesosData as $row) {
                              $hasPeso = !empty($row['peso_id']); // Check if this row represents a peso record
                              $pesoFecha = $row['ch_peso_fecha'] ?? null;
                              
                              echo "<tr>";
                              
                              // Column 1: Actions
                              echo '<td class="text-center">';
                              echo '    <div class="btn-group" role="group">';
                              // Always show Add Button
                              echo '        <button class="btn btn-success btn-sm" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#newPesoModal" 
                                              data-tagid-prefill="'.htmlspecialchars($row['caprino_tagid'] ?? '').'" 
                                              title="Registrar Nuevo Peso">
                                              <i class="fas fa-plus"></i>
                                          </button>';
                              
                              if ($hasPeso) {
                                  // Edit Button (only if peso record exists for this row)
                                  echo '        <button class="btn btn-warning btn-sm edit-peso" 
                                                  data-id="'.htmlspecialchars($row['peso_id'] ?? '').'" 
                                                  data-tagid="'.htmlspecialchars($row['ch_peso_tagid'] ?? '').'" 
                                                  data-peso="'.htmlspecialchars($row['ch_peso_animal'] ?? '').'" 
                                                  data-precio="'.htmlspecialchars($row['ch_peso_precio'] ?? '').'" 
                                                  data-fecha="'.htmlspecialchars($pesoFecha ?? '').'" 
                                                  title="Editar Peso">
                                                  <i class="fas fa-edit"></i>
                                              </button>';
                                  // Delete Button (only if peso record exists for this row)
                                  echo '        <button class="btn btn-danger btn-sm delete-peso" 
                                                  data-id="'.htmlspecialchars($row['peso_id'] ?? '').'" 
                                                  data-tagid="'.htmlspecialchars($row['ch_peso_tagid'] ?? '').'" -- Pass tagid for context
                                                  title="Eliminar Peso">
                                                  <i class="fas fa-trash"></i>
                                              </button>';
                              }
                              echo '    </div>';
                              echo '</td>';
                              
                              // Column 2: Fecha
                              echo "<td>" . ($pesoFecha ? htmlspecialchars(date('d/m/Y', strtotime($pesoFecha))) : 'N/A') . "</td>";
                              // Column 3: Nombre Animal
                              echo "<td>" . htmlspecialchars($row['animal_nombre'] ?? 'N/A') . "</td>";
                              // Column 4: Tag ID Animal
                              echo "<td>" . htmlspecialchars($row['caprino_tagid'] ?? 'N/A') . "</td>"; // Use caprino_tagid for consistency
                              // Column 5: Peso (kg)
                              echo "<td>" . ($hasPeso ? htmlspecialchars($row['ch_peso_animal'] ?? '') : 'N/A') . "</td>";
                              // Column 6: Precio ($/kg)
                              echo "<td>" . ($hasPeso ? htmlspecialchars($row['ch_peso_precio'] ?? '') : 'N/A') . "</td>";
                              // Column 7: Valor Total ($)
                              echo "<td>" . ($hasPeso && isset($row['total_value']) ? htmlspecialchars($row['total_value']) : 'N/A') . "</td>";
                              
                              // Column 8: Estatus
                              if ($hasPeso && $pesoFecha) {
                                  try {
                                      $pesoDate = new DateTime($pesoFecha);
                                      $dueDate = clone $pesoDate;
                                      $dueDate->modify("+{$vigencia} days");
                                      
                                      if ($currentDate > $dueDate) {
                                          echo '<td class="text-center"><span class="badge status-vencido">VENCIDO</span></td>'; // Changed from VENCIDO
                                      } else {
                                          echo '<td class="text-center"><span class="badge status-vigente">VIGENTE</span></td>';
                                      }
                                  } catch (Exception $e) {
                                      error_log("Date error: " . $e->getMessage() . " for date: " . $pesoFecha);
                                      echo '<td class="text-center"><span class="badge bg-warning">ERROR FECHA</span></td>'; // Changed from ERROR
                                  }
                              } else {
                                  echo '<td class="text-center"><span class="badge status-no-registro">No Registro</span></td>'; // Status if no peso record
                              }
                              
                              echo "</tr>";
                          }
                      }
                  } catch (PDOException $e) {
                      error_log("Error in peso table: " . $e->getMessage());
                      echo "<tr><td colspan='8' class='text-center'>Error al cargar los datos: " . $e->getMessage() . "</td></tr>"; // Colspan is 8 now
                  }
                  ?>
              </tbody>
          </table>
      </div>
  </div>
</div>

<!-- Initialize DataTable for VH Peso -->
<script>
$(document).ready(function() {
    $('#carneTable').DataTable({
        // Set initial page length
        pageLength: 25,
        
        // Configure length menu options
        lengthMenu: [
            [25, 50, 100, -1],
            [25, 50, 100, "Todos"]
        ],
        
        // Order by fecha (date) column descending
        order: [[7, 'desc']],
        
        // Spanish language
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            lengthMenu: "Mostrar _MENU_ registros por página",
            zeroRecords: "No se encontraron resultados",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            search: "Buscar:",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        },
        
        // Enable responsive features
        responsive: true,
        
        // Configure DOM layout and buttons
        dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
             '<"row"<"col-sm-12 col-md-6"l>>' +
             '<"row"<"col-sm-12"tr>>' +
             '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        
        buttons: [
            {
                extend: 'collection',
                text: 'Exportar',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ],
        
        // Column specific settings
        columnDefs: [
            {
                targets: [0], // Actions column (new position)
                orderable: false,
                searchable: false
            },
            {
                targets: [4, 5, 6], // Peso, Precio, Valor Total columns (indices shifted)
                render: function(data, type, row) {
                    if (type === 'display') {
                        if (data === 'N/A') return data;
                        const number = parseFloat(data);
                        if (!isNaN(number)) {
                            return number.toLocaleString('es-ES', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        } else {
                            return data;
                        }
                    }
                    return data;
                }
            },
            {
                targets: [1], // Fecha column (index shifted)
                type: 'date-eu',
                render: function(data, type, row) {
                     if (type === 'display') {
                        if (data === 'N/A') return data; // Pass through 'N/A'
                        // Date is already formatted DD/MM/YYYY in PHP
                        return data; 
                    }
                    // For sorting/filtering, convert DD/MM/YYYY back to YYYY-MM-DD
                    if (type === 'sort' || type === 'filter') {
                         if (data === 'N/A') return null; 
                         const parts = data.split('/');
                         if (parts.length === 3) {
                            return parts[2] + '-' + parts[1] + '-' + parts[0];
                         }
                         return null; // Fallback
                    }
                    return data;
                }
            },
            {
                targets: [7], // Status column (index shifted)
                orderable: true,
                searchable: true
            }
            // Removed old Actions column def (index 8)
        ]
    });
});
</script>

<!-- JavaScript for Modal Pre-fill -->
<script>
$(document).ready(function() {
    var newPesoModalEl = document.getElementById('newPesoModal');
    if (newPesoModalEl) {
        var tagIdInput = newPesoModalEl.querySelector('#new_tagid');
        newPesoModalEl.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var tagIdToPrefill = button ? button.getAttribute('data-tagid-prefill') : null;
            
            if (tagIdInput && tagIdToPrefill) {
                tagIdInput.value = tagIdToPrefill;
            } else if (tagIdInput) {
                tagIdInput.value = ''; // Clear if no prefill info (e.g., modal opened via different button)
            }
            // Optionally reset other fields
            // newPesoModalEl.querySelector('#new_peso').value = '';
            // newPesoModalEl.querySelector('#new_precio').value = '';
            // newPesoModalEl.querySelector('#new_fecha').value = '<?php echo date('Y-m-d'); ?>';
        });
    }
});
</script>

<!-- JavaScript for Edit and Delete buttons -->
<script>
$(document).ready(function() {
    // Handle new entry form submission
    $('#saveNewPeso').click(function() {
        // Validate the form
        var form = document.getElementById('newPesoForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        
        // Get form data
        var formData = {
            tagid: $('#new_tagid').val(),
            peso: $('#new_peso').val(),
            precio: $('#new_precio').val(),
            fecha: $('#new_fecha').val()
        };
        
        // Show confirmation dialog using SweetAlert2
        Swal.fire({
            title: '¿Confirmar registro?',
            text: `¿Desea registrar el peso de ${formData.peso} kg para el animal con Tag ID ${formData.tagid}?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Sí, registrar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading state
                Swal.fire({
                    title: 'Guardando...',
                    text: 'Por favor espere mientras se procesa la información',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Send AJAX request to insert the record
                $.ajax({
                    url: 'process_weight.php',
                    type: 'POST',
                    data: {
                        action: 'insert',
                        tagid: formData.tagid,
                        peso: formData.peso,
                        precio: formData.precio,
                        fecha: formData.fecha
                    },
                    success: function(response) {
                        // Close the modal
                        var modal = bootstrap.Modal.getInstance(document.getElementById('newPesoModal'));
                        modal.hide();
                        
                        // Show success message
                        Swal.fire({
                            title: '¡Registro exitoso!',
                            text: 'El registro de peso ha sido guardado correctamente',
                            icon: 'success',
                            confirmButtonColor: '#28a745'
                        }).then(() => {
                            // Reload the page to show updated data
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        // Show error message
                        let errorMsg = 'Error al procesar la solicitud';
                        
                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.message) {
                                errorMsg = response.message;
                            }
                        } catch (e) {
                            // Use default error message
                        }
                        
                        Swal.fire({
                            title: 'Error',
                            text: errorMsg,
                            icon: 'error',
                            confirmButtonColor: '#dc3545'
                        });
                    }
                });
            }
        });
    });

    // Handle edit button click
    $('.edit-peso').click(function() {
        var id = $(this).data('id');
        var tagid = $(this).data('tagid');
        var peso = $(this).data('peso');
        var precio = $(this).data('precio');
        var fecha = $(this).data('fecha');
        
        var modalHtml = `
        <div class="modal fade" id="editPesoModal" tabindex="-1" aria-labelledby="editPesoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPesoModalLabel">
                            <i class="fas fa-weight me-2"></i>Editar Pesaje
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editPesoForm">
                            <input type="hidden" id="edit_id" value="${id}">                            
                            <div class="mb-4">                                
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                        <label for="edit_fecha" class="form-label">Fecha</label>
                                        <input type="date" class="form-control" id="edit_fecha" value="${fecha}" required>
                                    </span>                                    
                                </div>
                            </div>
                            <div class="mb-4">                                
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-tag"></i>
                                    <label for="edit_tagid" class="form-label">Tag ID</label>
                                    <input type="text" class="form-control" id="edit_tagid" value="${tagid}" readonly>
                                    </span>                                    
                                </div>
                            </div>
                            <div class="mb-4">                                
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-weight"></i>
                                        <label for="edit_peso" class="form-label">Peso</label>
                                        <input type="text" class="form-control" id="edit_peso" value="${peso}" required>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mb-4">                                
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                        <label for="edit_precio" class="form-label">Precio ($/kg)</label>
                                        <input type="number" step="0.01" class="form-control" id="edit_precio" value="${precio}" required>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer btn-group">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Cancelar
                        </button>
                        <button type="button" class="btn btn-success" id="saveEditPeso">
                            <i class="fas fa-save me-1"></i>Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>`;
        
        // Remove any existing modal
        $('#editPesoModal').remove();
        
        // Add the modal to the page
        $('body').append(modalHtml);
        
        // Show the modal
        var editModal = new bootstrap.Modal(document.getElementById('editPesoModal'));
        editModal.show();
        
        // Handle save button click
        $('#saveEditPeso').click(function() {
            var formData = {
                id: $('#edit_id').val(),
                tagid: $('#edit_tagid').val(),
                peso: $('#edit_peso').val(),
                precio: $('#edit_precio').val(),
                fecha: $('#edit_fecha').val()
            };
            
            // Show confirmation dialog
            Swal.fire({
                title: '¿Guardar cambios?',
                text: `¿Desea actualizar el registro de peso para el animal con Tag ID ${formData.tagid}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Sí, actualizar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Actualizando...',
                        text: 'Por favor espere mientras se procesa la información',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Send AJAX request to update the record
                    $.ajax({
                        url: 'process_weight.php',
                        type: 'POST',
                        data: {
                            action: 'update',
                            id: formData.id,
                            tagid: formData.tagid,
                            peso: formData.peso,
                            precio: formData.precio,
                            fecha: formData.fecha
                        },
                        success: function(response) {
                            // Close the modal
                            editModal.hide();
                            
                            // Show success message
                            Swal.fire({
                                title: '¡Actualización exitosa!',
                                text: 'El registro ha sido actualizado correctamente',
                                icon: 'success',
                                confirmButtonColor: '#28a745'
                            }).then(() => {
                                // Reload the page to show updated data
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Show error message
                            let errorMsg = 'Error al procesar la solicitud';
                            
                            try {
                                const response = JSON.parse(xhr.responseText);
                                if (response.message) {
                                    errorMsg = response.message;
                                }
                            } catch (e) {
                                // Use default error message
                            }
                            
                            Swal.fire({
                                title: 'Error',
                                text: errorMsg,
                                icon: 'error',
                                confirmButtonColor: '#dc3545'
                            });
                        }
                    });
                }
            });
        });
    });
    
    // Handle delete button click
    $('.delete-peso').click(function() {
        var id = $(this).data('id');
        var tagid = $(this).data('tagid');
        
        // Confirm before deleting using SweetAlert2
        Swal.fire({
            title: '¿Eliminar registro?',
            text: `¿Está seguro de que desea eliminar el registro para el animal con Tag ID ${tagid}? Esta acción no se puede deshacer.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading state
                Swal.fire({
                    title: 'Eliminando...',
                    text: 'Por favor espere mientras se procesa la solicitud',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Send AJAX request to delete the record
                $.ajax({
                    url: 'process_weight.php',
                    type: 'POST',
                    data: {
                        action: 'delete',
                        id: id
                    },
                    success: function(response) {
                        // Show success message
                        Swal.fire({
                            title: '¡Eliminado!',
                            text: 'El registro ha sido eliminado correctamente',
                            icon: 'success',
                            confirmButtonColor: '#28a745'
                        }).then(() => {
                            // Reload the page to show updated data
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        // Show error message
                        let errorMsg = 'Error al procesar la solicitud';
                        
                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.message) {
                                errorMsg = response.message;
                            }
                        } catch (e) {
                            // Use default error message
                        }
                        
                        Swal.fire({
                            title: 'Error',
                            text: errorMsg,
                            icon: 'error',
                            confirmButtonColor: '#dc3545'
                        });
                    }
                });
            }
        });
    });
});
</script>

<!-- Weight Line Chart Section -->
<div class="container mt-5 mb-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-success text-white py-3">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0">
                    <i class="fas fa-chart-line me-2"></i>
                    Evolución de Peso
                </h5>
                <div class="chart-controls">
                    <select id="animalFilter" class="form-select form-select-sm bg-white text-dark border-0 shadow-sm">
                        <option value="all">Todos los animales</option>
                        <!-- Animal options will be populated dynamically -->
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="dataRangeFilter" class="form-label text-muted small fw-bold">Rango de Datos</label>
                    <select id="dataRangeFilter" class="form-select border-0 shadow-sm">
                        <option value="20">Últimos 20 registros</option>
                        <option value="50">Últimos 50 registros</option>
                        <option value="100">Últimos 100 registros</option>
                        <option value="all">Todos los registros</option>
                    </select>
                </div>
            </div>
            <div class="chart-container" style="position: relative; height:50vh; width:100%">
                <canvas id="weightChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script for Weight Line Chart -->
<script>
$(document).ready(function() {
    let allWeightData = [];
    let weightChart = null;
    
    // Fetch weight data and create the chart
    $.ajax({
        url: 'get_weight_data.php',
        type: 'GET',
        dataType: 'json',
        beforeSend: function() {
            // Show loading state
            const chartContainer = $('#weightChart').closest('.chart-container');
            chartContainer.addClass('loading');
        },
        success: function(data) {
            if (data.error) {
                console.error('Server error:', data.error);
                return;
            }
            
            allWeightData = data;
            populateAnimalFilter(data);
            
            // Remove loading state and create chart with animation
            const chartContainer = $('#weightChart').closest('.chart-container');
            chartContainer.removeClass('loading');
            
            setTimeout(() => {
                createWeightChart(data);
            }, 200);
            
            // Add event listeners for filters
            $('#animalFilter, #dataRangeFilter').on('change', function() {
                // Add loading state
                const chartContainer = $('#weightChart').closest('.chart-container');
                chartContainer.addClass('loading');
                
                // Smooth transition
                setTimeout(() => {
                    updateChart();
                    chartContainer.removeClass('loading');
                }, 150);
            });
        },
        error: function(xhr, status, error) {
            console.error('Error fetching weight data:', error);
            // Remove loading state on error
            const chartContainer = $('#weightChart').closest('.chart-container');
            chartContainer.removeClass('loading');
        }
    });
    
    // --- Linear Regression Function ---
    function linearRegression(x, y) {
        const n = x.length;
        if (n < 2) {
            // Not enough data points for regression
            return { slope: 0, intercept: 0 };
        }

        let sumX = 0;
        let sumY = 0;
        let sumXY = 0;
        let sumXX = 0;
        // Removed sumYY calculation as it's only needed for R-squared

        for (let i = 0; i < n; i++) {
            sumX += x[i];
            sumY += y[i];
            sumXY += x[i] * y[i];
            sumXX += x[i] * x[i];
        }

        const denominator = (n * sumXX - sumX * sumX);
        if (denominator === 0) {
            // Avoid division by zero (vertical line or single x-value)
            return { slope: 0, intercept: sumY / n }; // Return average Y as intercept
        }

        const slope = (n * sumXY - sumX * sumY) / denominator;
        const intercept = (sumY - slope * sumX) / n;

        // R-squared calculation (optional, can add later if needed)
        // let ssr = 0;
        // let sst = 0;
        // const meanY = sumY / n;
        // for (let i = 0; i < n; i++) {
        //     const predictedY = slope * x[i] + intercept;
        //     ssr += (predictedY - meanY) ** 2;
        //     sst += (y[i] - meanY) ** 2;
        // }
        // const r2 = (sst === 0) ? 1 : ssr / sst; // Handle case where all Y are the same

        return { slope: slope, intercept: intercept }; // Simplified return
    }
    // ---------------------------------
    
    function populateAnimalFilter(data) {
        // Get unique animals from the data
        const animals = [];
        const uniqueTagIds = new Set();
        
        data.forEach(item => {
            if (item.tagid && !uniqueTagIds.has(item.tagid)) {
                uniqueTagIds.add(item.tagid);
                animals.push({
                    tagid: item.tagid,
                    nombre: item.animal_nombre || 'Sin nombre'
                });
            }
        });
        
        // Sort animals by name
        animals.sort((a, b) => a.nombre.localeCompare(b.nombre));
        
        // Add options to the dropdown
        const animalFilter = $('#animalFilter');
        animals.forEach(animal => {
            animalFilter.append(`<option value="${animal.tagid}">${animal.nombre} (${animal.tagid})</option>`);
        });
    }
    
    function updateChart() {
        const selectedAnimal = $('#animalFilter').val();
        const selectedRange = $('#dataRangeFilter').val();
        
        let filteredData = [...allWeightData];
        
        // Filter by animal if not "all"
        if (selectedAnimal !== 'all') {
            filteredData = filteredData.filter(item => item.tagid === selectedAnimal);
        }
        
        // Sort data by date
        filteredData.sort((a, b) => new Date(a.fecha) - new Date(b.fecha));
        
        // Apply range filter
        if (selectedRange !== 'all' && filteredData.length > parseInt(selectedRange)) {
            filteredData = filteredData.slice(filteredData.length - parseInt(selectedRange));
        }
        
        // Update chart with filtered data
        updateChartData(filteredData);
    }
    
    function updateChartData(data) {
        if (weightChart) {
            weightChart.destroy();
        }
        createWeightChart(data);
    }
    
    function createWeightChart(data) {
        var ctx = document.getElementById('weightChart').getContext('2d');
        
        // Group data by month and calculate average weight per month
        const monthlyData = {};
        
        data.forEach(function(item) {
            const date = new Date(item.timestamp_fecha * 1000);
            const monthKey = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0');
            
            if (!monthlyData[monthKey]) {
                monthlyData[monthKey] = {
                    weights: [],
                    animalName: item.animal_nombre,
                    tagid: item.tagid
                };
            }
            
            const peso = parseFloat(item.peso) || 0;
            if (peso > 0) {
                monthlyData[monthKey].weights.push(peso);
            }
        });
        
        // Convert to arrays and calculate averages
        const monthlyEntries = Object.entries(monthlyData)
            .map(([monthKey, data]) => ({
                month: monthKey,
                averageWeight: data.weights.length > 0 
                    ? data.weights.reduce((sum, weight) => sum + weight, 0) / data.weights.length 
                    : 0,
                animalName: data.animalName,
                tagid: data.tagid,
                recordCount: data.weights.length
            }))
            .sort((a, b) => a.month.localeCompare(b.month));
        
        // Format the data for the main chart labels and values
        var labels = monthlyEntries.map(function(item) {
            // Format month as "MMM YYYY" (e.g., "Ene 2024")
            const [year, month] = item.month.split('-');
            const date = new Date(year, month - 1, 1);
            return date.toLocaleDateString('es-ES', { month: 'short', year: 'numeric' });
        });
        
        var weights = monthlyEntries.map(function(item) {
            return item.averageWeight;
        });

        // --- Trendline Calculation ---
        var xValues = monthlyEntries.map((item, index) => index); // Use sequential numbers for months
        var yValues = weights; // Numeric weights for y
        
        const regression = linearRegression(xValues, yValues);
        const trendlineYValues = xValues.map(x => regression.slope * x + regression.intercept);
        
        // --- Calculate Average Monthly Slope ---
        // Since xValues are now month indices (0, 1, 2, ...), slope is already in kg per month
        const monthlySlopeKg = regression.slope;
        // ------------------------------------
        
        // Destroy existing chart instance if it exists
        if (weightChart) {
            weightChart.destroy();
        }
        
        weightChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                { // Original Weight Data
                    label: 'Peso (kg)',
                    data: weights,
                    backgroundColor: function(context) {
                        const chart = context.chart;
                        const {ctx, chartArea} = chart;
                        if (!chartArea) {
                            return 'rgba(40, 167, 69, 0.2)';
                        }
                        const gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
                        gradient.addColorStop(0, 'rgba(40, 167, 69, 0.1)');
                        gradient.addColorStop(0.5, 'rgba(40, 167, 69, 0.3)');
                        gradient.addColorStop(1, 'rgba(40, 167, 69, 0.6)');
                        return gradient;
                    },
                    borderColor: 'rgba(40, 167, 69, 1)',
                    borderWidth: 4,
                    pointBackgroundColor: 'rgba(40, 167, 69, 1)',
                    pointBorderColor: '#fff',
                    pointRadius: 6,
                    pointHoverRadius: 10,
                    pointBorderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointStyle: 'circle',
                    pointHoverBackgroundColor: 'rgba(40, 167, 69, 0.8)',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 4
                },
                { // Trendline Data
                    label: 'Tendencia Lineal',
                    data: trendlineYValues,
                    borderColor: 'rgba(255, 99, 132, 0.9)',
                    borderWidth: 3,
                    borderDash: [8, 4],
                    type: 'line',
                    pointRadius: 0,
                    pointBackgroundColor: 'rgba(255, 99, 132, 0.8)',
                    pointBorderColor: '#fff',
                    pointHoverRadius: 8,
                    fill: false,
                    tension: 0,
                    pointHoverBackgroundColor: 'rgba(255, 99, 132, 1)',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 3
                }
            ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart',
                    onProgress: function(animation) {
                        const chart = animation.chart;
                        const ctx = chart.ctx;
                        const chartArea = chart.chartArea;
                        
                        if (!chartArea) return;
                        
                        // Add subtle glow effect during animation
                        ctx.shadowColor = 'rgba(40, 167, 69, 0.3)';
                        ctx.shadowBlur = 20;
                        ctx.shadowOffsetX = 0;
                        ctx.shadowOffsetY = 0;
                    },
                    onComplete: function(animation) {
                        const chart = animation.chart;
                        const ctx = chart.ctx;
                        ctx.shadowBlur = 0;
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            lineWidth: 1,
                            drawBorder: false
                        },
                        title: {
                            display: true,
                            text: 'Peso (kg)',
                            font: {
                                size: 16,
                                weight: 'bold',
                                family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                            },
                            color: '#2c3e50',
                            padding: {
                                top: 10,
                                bottom: 10
                            }
                        },
                        ticks: {
                            color: '#34495e',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 8,
                            callback: function(value) {
                                return value.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + ' kg';
                            }
                        },
                        border: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            width: 1
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            lineWidth: 1,
                            drawBorder: false
                        },
                        title: {
                            display: true,
                            text: 'Período',
                            font: {
                                size: 16,
                                weight: 'bold',
                                family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                            },
                            color: '#2c3e50',
                            padding: {
                                top: 10,
                                bottom: 10
                            }
                        },
                        ticks: {
                            color: '#34495e',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 8,
                            maxRotation: 45,
                            minRotation: 0
                        },
                        border: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            width: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'center',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 20,
                            font: {
                                size: 14,
                                weight: '600',
                                family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                            },
                            color: '#2c3e50',
                            generateLabels: function(chart) {
                                const datasets = chart.data.datasets;
                                return datasets.map((dataset, index) => ({
                                    text: dataset.label,
                                    fillStyle: dataset.borderColor,
                                    strokeStyle: dataset.borderColor,
                                    lineWidth: 3,
                                    pointStyle: index === 1 ? 'dash' : 'circle',
                                    hidden: !chart.isDatasetVisible(index),
                                    index: index
                                }));
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: {
                            size: 16,
                            weight: 'bold',
                            family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                        },
                        bodyFont: {
                            size: 14,
                            family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                        },
                        padding: 16,
                        cornerRadius: 12,
                        displayColors: true,
                        borderColor: 'rgba(255, 255, 255, 0.2)',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                var index = context.dataIndex;
                                var datasetIndex = context.datasetIndex;
                                var monthlyPoint = monthlyEntries[index];
                                var value = context.parsed.y;

                                let tooltipText = [];

                                if (datasetIndex === 0) {
                                    tooltipText.push('📊 Peso Promedio: ' + value.toLocaleString('es-ES', {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    }) + ' kg');
                                    if (monthlyPoint) {
                                        tooltipText.push('📝 Registros: ' + monthlyPoint.recordCount);
                                        if (monthlyPoint.animalName && $('#animalFilter').val() !== 'all') {
                                            tooltipText.unshift('🐄 Animal: ' + monthlyPoint.animalName);
                                        }
                                    }
                                } else if (datasetIndex === 1) {
                                    tooltipText.push('📈 Tendencia: ' + value.toLocaleString('es-ES', {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    }) + ' kg');
                                }

                                return tooltipText;
                            },
                            title: function(tooltipItems) {
                                return '📅 ' + tooltipItems[0].label;
                            },
                            afterBody: function(tooltipItems) {
                                const index = tooltipItems[0].dataIndex;
                                const monthlyPoint = monthlyEntries[index];
                                if (monthlyPoint && monthlyPoint.recordCount > 1) {
                                    return [
                                        '',
                                        '━━━━━━━━━━━━━━━━━━━━',
                                        `📊 Variabilidad: ${monthlyPoint.recordCount} mediciones este mes`
                                    ];
                                }
                                return '';
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: function() {
                            const selectedAnimal = $('#animalFilter').val();
                            let baseTitle = '📈 Evolución de Peso Mensual (Promedio)';
                            if (selectedAnimal !== 'all') {
                                const animalName = $('#animalFilter option:selected').text();
                                baseTitle = '📈 Evolución de Peso Mensual - ' + animalName;
                            }
                            
                            if (regression.slope !== 0 && monthlyEntries.length > 1) { 
                                const formattedSlope = monthlySlopeKg.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2,
                                    signDisplay: 'always'
                                });
                                return baseTitle + ` | 📊 Variación Mensual Prom.: ${formattedSlope} kg`;
                            }
                            
                            return baseTitle;
                        },
                        font: {
                            size: 18,
                            weight: 'bold',
                            family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                        },
                        color: '#2c3e50',
                        padding: {
                            top: 20,
                            bottom: 20
                        },
                        align: 'center'
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 10,
                        hoverBorderWidth: 4
                    },
                    line: {
                        borderWidth: 4
                    }
                }
            }
        });
    }
});
</script>

<div class="container mt-5 mb-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white py-3">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0">
                    <i class="fas fa-dollar-sign me-2"></i>
                    Evolución Precio Animales en Pie ($)
                </h5>
                <div class="chart-controls">
                    <div class="badge bg-white text-primary px-3 py-2 shadow-sm">
                        <i class="fas fa-chart-area me-1"></i>
                        Valor Mensual
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-4">
            <div id="weightValueChartMessage" class="text-center text-muted small mb-3"></div>
            <div class="chart-container" style="position: relative; height:50vh; width:100%">
                <canvas id="weightValueChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script for Monthly Weight Value Chart -->
<script>
$(document).ready(function() {
    let weightValueChart = null;
    const weightValueUrl = 'get_monthly_weight_value_data.php'; // Our updated endpoint

    // Re-use the linear regression function from the previous chart
    function linearRegression(x, y) {
        const n = x.length;
        if (n < 2) return { slope: 0, intercept: 0 };
        let sumX = 0, sumY = 0, sumXY = 0, sumXX = 0;
        for (let i = 0; i < n; i++) {
            sumX += x[i]; sumY += y[i]; sumXY += x[i] * y[i]; sumXX += x[i] * x[i];
        }
        const denominator = (n * sumXX - sumX * sumX);
        if (denominator === 0) return { slope: 0, intercept: sumY / n };
        const slope = (n * sumXY - sumX * sumY) / denominator;
        const intercept = (sumY - slope * sumX) / n;
        return { slope: slope, intercept: intercept };
    }

    // Fetch monthly weight value data
    $.ajax({
        url: weightValueUrl,
        type: 'GET',
        dataType: 'json',
        beforeSend: function() {
            // Show loading state
            const chartContainer = $('#weightValueChart').closest('.chart-container');
            chartContainer.addClass('loading');
        },
        success: function(data) {
            if (!Array.isArray(data) || data.error) {
                console.error('Server error fetching monthly weight value:', data);
                 $('#weightValueChartMessage').text('Error al cargar datos de valor de peso.');
                // Remove loading state on error
                const chartContainer = $('#weightValueChart').closest('.chart-container');
                chartContainer.removeClass('loading');
                return;
            }
            if (data.length === 0) {
                 console.warn('No monthly weight value data received.');
                 $('#weightValueChartMessage').text('No hay datos disponibles para mostrar el valor de peso mensual.');
                // Remove loading state on no data
                const chartContainer = $('#weightValueChart').closest('.chart-container');
                chartContainer.removeClass('loading');
                return;
            }
            
            // Remove loading state and create chart with animation
            const chartContainer = $('#weightValueChart').closest('.chart-container');
            chartContainer.removeClass('loading');
            
            setTimeout(() => {
                createWeightValueChart(data);
            }, 200);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching monthly weight value data:', error);
            $('#weightValueChartMessage').text('Error al cargar datos para el gráfico de valor de peso.');
            // Remove loading state on error
            const chartContainer = $('#weightValueChart').closest('.chart-container');
            chartContainer.removeClass('loading');
        }
    });

    function createWeightValueChart(data) {
        var ctx = document.getElementById('weightValueChart').getContext('2d');

        // Format data for chart
        var labels = data.map(item => item.month); // YYYY-MM labels
        var values = data.map(item => parseFloat(item.total_weight_value) || 0);

        // --- Trendline Calculation ---
        var xValues = data.map(item => item.month_timestamp); // Use month timestamp
        var yValues = values;
        
        const regression = linearRegression(xValues, yValues);
        const trendlineYValues = xValues.map(x => regression.slope * x + regression.intercept);
        
        // Calculate Average Monthly Slope in $
        const secondsPerDay = 24 * 60 * 60;
        const approxDaysPerMonth = 365.25 / 12;
        const secondsPerMonth = secondsPerDay * approxDaysPerMonth;
        const monthlySlopeValue = regression.slope * secondsPerMonth; // Slope in $/month
        // ---------------------------

        // Destroy existing chart instance if it exists
        if (weightValueChart) {
            weightValueChart.destroy();
        }

        weightValueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                { // Original Monthly Value Data
                    label: 'Precio Animales en Pie ($)',
                    data: values,
                    backgroundColor: function(context) {
                        const chart = context.chart;
                        const {ctx, chartArea} = chart;
                        if (!chartArea) {
                            return 'rgba(0, 123, 255, 0.2)';
                        }
                        const gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
                        gradient.addColorStop(0, 'rgba(0, 123, 255, 0.1)');
                        gradient.addColorStop(0.5, 'rgba(0, 123, 255, 0.4)');
                        gradient.addColorStop(1, 'rgba(0, 123, 255, 0.7)');
                        return gradient;
                    },
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 4,
                    pointBackgroundColor: 'rgba(0, 123, 255, 1)',
                    pointBorderColor: '#fff',
                    pointRadius: 6,
                    pointHoverRadius: 10,
                    pointBorderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointStyle: 'circle',
                    pointHoverBackgroundColor: 'rgba(0, 123, 255, 0.8)',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 4
                },
                { // Trendline Data
                    label: 'Tendencia Lineal ($)',
                    data: trendlineYValues,
                    borderColor: 'rgba(220, 53, 69, 0.9)',
                    borderWidth: 3,
                    borderDash: [8, 4],
                    type: 'line',
                    pointRadius: 0,
                    pointBackgroundColor: 'rgba(220, 53, 69, 0.8)',
                    pointBorderColor: '#fff',
                    pointHoverRadius: 8,
                    fill: false,
                    tension: 0,
                    pointHoverBackgroundColor: 'rgba(220, 53, 69, 1)',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 3
                }
            ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart',
                    onProgress: function(animation) {
                        const chart = animation.chart;
                        const ctx = chart.ctx;
                        const chartArea = chart.chartArea;
                        
                        if (!chartArea) return;
                        
                        // Add subtle glow effect during animation
                        ctx.shadowColor = 'rgba(0, 123, 255, 0.3)';
                        ctx.shadowBlur = 20;
                        ctx.shadowOffsetX = 0;
                        ctx.shadowOffsetY = 0;
                    },
                    onComplete: function(animation) {
                        const chart = animation.chart;
                        const ctx = chart.ctx;
                        ctx.shadowBlur = 0;
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            lineWidth: 1,
                            drawBorder: false
                        },
                        title: {
                            display: true,
                            text: 'Precio en Pie ($)',
                            font: {
                                size: 16,
                                weight: 'bold',
                                family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                            },
                            color: '#2c3e50',
                            padding: {
                                top: 10,
                                bottom: 10
                            }
                        },
                        ticks: {
                            color: '#34495e',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 8,
                            callback: function(value) {
                                return '$ ' + value.toLocaleString('es-ES', { 
                                    minimumFractionDigits: 2, 
                                    maximumFractionDigits: 2 
                                });
                            }
                        },
                        border: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            width: 1
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            lineWidth: 1,
                            drawBorder: false
                        },
                        title: {
                            display: true,
                            text: 'Período',
                            font: {
                                size: 16,
                                weight: 'bold',
                                family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                            },
                            color: '#2c3e50',
                            padding: {
                                top: 10,
                                bottom: 10
                            }
                        },
                        ticks: {
                            color: '#34495e',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 8,
                            maxRotation: 45,
                            minRotation: 0
                        },
                        border: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            width: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'center',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 20,
                            font: {
                                size: 14,
                                weight: '600',
                                family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                            },
                            color: '#2c3e50',
                            generateLabels: function(chart) {
                                const datasets = chart.data.datasets;
                                return datasets.map((dataset, index) => ({
                                    text: dataset.label,
                                    fillStyle: dataset.borderColor,
                                    strokeStyle: dataset.borderColor,
                                    lineWidth: 3,
                                    pointStyle: index === 1 ? 'dash' : 'circle',
                                    hidden: !chart.isDatasetVisible(index),
                                    index: index
                                }));
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: {
                            size: 16,
                            weight: 'bold',
                            family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                        },
                        bodyFont: {
                            size: 14,
                            family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                        },
                        padding: 16,
                        cornerRadius: 12,
                        displayColors: true,
                        borderColor: 'rgba(255, 255, 255, 0.2)',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                var datasetIndex = context.datasetIndex;
                                var value = context.parsed.y;
                                if (datasetIndex === 0) {
                                    return '💰 Valor: $ ' + value.toLocaleString('es-ES', { 
                                        minimumFractionDigits: 2, 
                                        maximumFractionDigits: 2 
                                    });
                                } else if (datasetIndex === 1) {
                                    return '📈 Tendencia: $ ' + value.toLocaleString('es-ES', { 
                                        minimumFractionDigits: 2, 
                                        maximumFractionDigits: 2 
                                    });
                                }
                                return '';
                            },
                            title: function(tooltipItems) {
                                return '📅 ' + tooltipItems[0].label;
                            },
                            afterBody: function(tooltipItems) {
                                const monthIndex = tooltipItems[0].dataIndex;
                                const monthLabel = tooltipItems[0].label;
                                
                                return [
                                    '',
                                    '━━━━━━━━━━━━━━━━━━━━',
                                    `📊 Período: ${monthLabel}`,
                                    `💰 Valor Mensual: $${values[monthIndex].toLocaleString('es-ES', { 
                                        minimumFractionDigits: 2, 
                                        maximumFractionDigits: 2 
                                    })}`
                                ];
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: function() {
                            let baseTitle = '💰 Evolución Precio Animales en Pie';
                            if (regression.slope !== 0 && data.length > 1) {
                                const formattedSlope = monthlySlopeValue.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2,
                                    signDisplay: 'always' 
                                });
                                return baseTitle + ` | 📊 Variación Mensual Prom.: $ ${formattedSlope}`;
                            }
                            return baseTitle;
                        },
                        font: {
                            size: 18,
                            weight: 'bold',
                            family: 'Segoe UI, Tahoma, Geneva, Verdana, sans-serif'
                        },
                        color: '#2c3e50',
                        padding: {
                            top: 20,
                            bottom: 20
                        },
                        align: 'center'
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 10,
                        hoverBorderWidth: 4
                    },
                    line: {
                        borderWidth: 4
                    }
                }
            }
        });
    }
});
</script>