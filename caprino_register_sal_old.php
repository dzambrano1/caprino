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
<title>Caprino - Registro de Sal</title>
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
/* Professional Chart Styling */
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-gradient-info {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
}

.bg-gradient-warning {
    background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
}

.bg-gradient-purple {
    background: linear-gradient(135deg, #6f42c1 0%, #5a2d91 100%);
}

.chart-container {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
}

.chart-container:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.card {
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: none;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.card-header {
    border-bottom: none;
    border-radius: 16px 16px 0 0 !important;
    padding: 1.5rem;
}

.card-header h5 {
    font-weight: 600;
    font-size: 1.1rem;
    margin: 0;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 2rem;
    border-radius: 0 0 16px 16px;
}

/* Enhanced chart styling */
canvas {
    border-radius: 8px;
    transition: all 0.3s ease;
}

/* Loading animation */
.chart-container.loading::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
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
    border-top: 4px solid #3498db;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    z-index: 11;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .chart-container {
        margin: 1rem 0;
    }
    
    .card-header {
        padding: 1rem;
    }
    
    .card-body {
        padding: 1.5rem;
    }
}

/* Smooth transitions */
* {
    transition: all 0.2s ease;
}

/* Enhanced shadows */
.shadow {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07), 0 1px 3px rgba(0, 0, 0, 0.06);
}

.shadow-lg {
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
}
</style>
</head>
<body>
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
        <button onclick="window.location.href='./caprino_indices.php'" class="icon-button">
            <img src="./images/indices.png" alt="Inicio" class="nav-icon">
        </button>
        <span class="button-label">INDICES</span>
    </div>
    
    <div class="icon-button-container">
        <button onclick="window.location.href='./inventario_caprino.php'" class="icon-button">
            <img src="./images/veterinario-ia.png" alt="Inicio" class="nav-icon">
        </button>
        <span class="button-label">VETERINARIO</span>
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
  <h3  class="container mt-4 text-white" class="collapse" id="sal">
  REGISTROS DE SAL
  </h3>
    
  <!-- New Sal Entry Modal -->
  
  <div class="modal fade" id="newSalModal" tabindex="-1" aria-labelledby="newSalModalLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSalModalLabel">
                    <i class="fas fa-plus-circle me-2"></i>Nuevo Registro Sal
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="newSalForm">
                    <input type="hidden" name="id" id="new_id" value="">
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
                                <i class="fa-solid fa-syringe"></i>
                                <label for="new_etapa" class="form-label">Etapa</label>
                                <select class="form-select" id="new_etapa" name="etapa" required>
                                    <option value="">Seleccionar</option>
                                    <?php
                                    try {
                                        $sql_etapas = "SELECT DISTINCT cc_etapas_nombre FROM cc_etapas ORDER BY cc_etapas_nombre ASC";
                                        $stmt_etapas = $conn->prepare($sql_etapas);
                                        $stmt_etapas->execute();
                                        $etapas = $stmt_etapas->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($etapas as $etapa_row) {
                                            echo '<option value="' . htmlspecialchars($etapa_row['cc_etapas_nombre']) . '">' . htmlspecialchars($etapa_row['cc_etapas_nombre']) . '</option>';
                                        }
                                    } catch (PDOException $e) {
                                        error_log("Error fetching etapas: " . $e->getMessage());
                                        echo '<option value="">Error al cargar etapas</option>';
                                    }
                                    ?>
                                </select>
                            </span>                            
                        </div>
                    </div>
                    <div class="mb-4">                        
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-syringe"></i>
                                <label for="new_producto" class="form-label">Sal</label>
                                <select class="form-select" id="new_producto" name="producto" required>
                                    <option value="">Productos</option>
                                    <?php
                                    try {
                                        $sql_alimentos = "SELECT DISTINCT cc_sal_nombre FROM cc_sal ORDER BY cc_sal_nombre ASC";
                                        $stmt_alimentos = $conn->prepare($sql_alimentos);
                                        $stmt_alimentos->execute();
                                        $alimentos = $stmt_alimentos->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($alimentos as $alimento_row) {
                                            echo '<option value="' . htmlspecialchars($alimento_row['cc_sal_nombre']) . '">' . htmlspecialchars($alimento_row['cc_sal_nombre']) . '</option>';
                                        }
                                    } catch (PDOException $e) {
                                        error_log("Error fetching sals: " . $e->getMessage());
                                        echo '<option value="">Error al cargar sals</option>';
                                    }
                                    ?>
                                </select>
                            </span>                            
                        </div>
                    </div>
                    <div class="mb-4">                        
                        <div class="input-group">
                            <span class="input-group-text">
                            <i class="fa-solid fa-weight"></i>
                                <label for="new_racion" class="form-label">Racion</label>
                                <input type="text" class="form-control" id="new_racion" name="racion" required>
                            </span>                                
                        </div>
                    </div>                    
                    <div class="mb-4">                        
                        <div class="input-group">
                            <span class="input-group-text">
                            <i class="fa-solid fa-dollar-sign"></i>
                                <label for="new_costo" class="form-label">Costo</label>
                                <input type="text" class="form-control" id="new_costo" name="costo" required>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer btn-group">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancelar
                </button>
                <button type="button" class="btn btn-success" id="saveNewSal">
                    <i class="fas fa-save me-1"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>
  
  <!-- DataTable for ch_sal records -->
  
  <div class="container table-section" style="display: block;">
      <div class="table-responsive">  
          <table id="salTable" class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">Acciones</th>
                      <th class="text-center">Fecha</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Tag ID</th>
                      <th class="text-center">Etapa</th>
                      <th class="text-center">Producto</th>
                      <th class="text-center">Racion (kg)</th>
                      <th class="text-center">Costo ($/kg)</th>
                      <th class="text-center">Valor Total ($)</th>
                      <th class="text-center">Estatus</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  try {
                      // Query to get all Animals and ALL their sal records (if any)
                        $salQuery = "
                            SELECT
                                b.tagid AS caprino_tagid,
                                b.nombre AS animal_nombre,
                                c.id AS sal_id,         -- Will be NULL for animals with no sal records
                                c.ch_sal_fecha,
                                c.ch_sal_tagid,         -- Matches caprino_tagid if sal exists
                                c.ch_sal_etapa,
                                c.ch_sal_producto,
                                c.ch_sal_racion,
                                c.ch_sal_costo,
                                -- Calculate total_value only if c.id is not null
                                CASE WHEN c.id IS NOT NULL THEN CAST((c.ch_sal_racion * c.ch_sal_costo) AS DECIMAL(10,2)) ELSE NULL END as total_value
                            FROM
                                caprino b
                            LEFT JOIN
                                ch_sal c ON b.tagid = c.ch_sal_tagid -- Join ALL matching sal records
                            ORDER BY
                                -- Prioritize animals with records (IS NOT NULL -> 0, IS NULL -> 1)
                                CASE WHEN c.id IS NOT NULL THEN 0 ELSE 1 END ASC,
                                -- Then order by animal tag ID to group them
                                b.tagid ASC,
                                -- Within each animal, order their sal records by date descending
                                c.ch_sal_fecha DESC";

                        $stmt = $conn->prepare($salQuery);
                        $stmt->execute();
                        $salData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      // If no data, display a message
                      if (empty($salData)) {
                          echo "<tr><td colspan='10' class='text-center'>No hay animales registrados</td></tr>"; // Message adjusted
                      } else {
                          // Get vigencia setting for sal records
                          $vigencia = 30; // Default value
                          try {
                              $configQuery = "SELECT e_vencimiento_sal FROM e_vencimiento LIMIT 1";
                              $configStmt = $conn->prepare($configQuery);
                              $configStmt->execute();
                              
                              // Explicitly use PDO fetch method
                              $row = $configStmt->fetch(PDO::FETCH_ASSOC);
                              if ($row && isset($row['e_vencimiento_sal'])) {
                                  $vigencia = intval($row['e_vencimiento_sal']);
                              }
                          } catch (PDOException $e) {
                              error_log("Error fetching configuration: " . $e->getMessage());
                              // Continue with default value
                          }
                          
                          $currentDate = new DateTime();
                          
                          foreach ($salData as $row) {
                              $hasSal = !empty($row['sal_id']);
                              $salFecha = $row['ch_sal_fecha'] ?? null;

                              echo "<tr>";

                              // Column 1: Actions
                              echo '<td class="text-center">';
                              echo '    <div class="btn-group" role="group">';
                              // Always show Add Button
                              echo '        <button class="btn btn-success btn-sm" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#newSalModal" 
                                              data-tagid-prefill="'.htmlspecialchars($row['caprino_tagid'] ?? '').'" 
                                              title="Registrar Nuevo Sal">
                                              <i class="fas fa-plus"></i>
                                          </button>';
                              
                              if ($hasSal) {
                                  // Edit Button (only if sal exists)
                                  echo '        <button class="btn btn-warning btn-sm edit-sal" 
                                                  data-id="'.htmlspecialchars($row['sal_id'] ?? '').'" 
                                                  data-tagid="'.htmlspecialchars($row['caprino_tagid'] ?? '').'" 
                                                  data-etapa="'.htmlspecialchars($row['ch_sal_etapa'] ?? '').'" 
                                                  data-producto="'.htmlspecialchars($row['ch_sal_producto'] ?? '').'" 
                                                  data-racion="'.htmlspecialchars($row['ch_sal_racion'] ?? '').'" 
                                                  data-costo="'.htmlspecialchars($row['ch_sal_costo'] ?? '').'" 
                                                  data-fecha="'.htmlspecialchars($salFecha ?? '').'" 
                                                  title="Editar Registro">
                                                  <i class="fas fa-edit"></i>
                                              </button>';
                                  // Delete Button (only if sal exists)
                                  echo '        <button class="btn btn-danger btn-sm delete-sal" 
                                                  data-id="'.htmlspecialchars($row['sal_id'] ?? '').'" 
                                                  data-tagid="'.htmlspecialchars($row['caprino_tagid'] ?? '').'" 
                                                  title="Eliminar Registro">
                                                  <i class="fas fa-trash"></i>
                                              </button>';
                              }
                              echo '    </div>';
                              echo '</td>';

                              // Column 2: Fecha Sal (or N/A)
                              echo "<td>" . ($salFecha ? htmlspecialchars(date('d/m/Y', strtotime($salFecha))) : 'N/A') . "</td>";
                              // Column 3: Nombre Animal
                              echo "<td>" . htmlspecialchars($row['animal_nombre'] ?? 'N/A') . "</td>";
                              // Column 4: Tag ID Animal
                              echo "<td>" . htmlspecialchars($row['caprino_tagid'] ?? 'N/A') . "</td>";
                              // Column 5: Etapa (or N/A)
                              echo "<td>" . ($hasSal ? htmlspecialchars($row['ch_sal_etapa'] ?? '') : 'N/A') . "</td>";
                              // Column 6: Producto (or N/A)
                              echo "<td>" . ($hasSal ? htmlspecialchars($row['ch_sal_producto'] ?? '') : 'N/A') . "</td>";
                              // Column 7: Racion (or N/A)
                              echo "<td>" . ($hasSal ? htmlspecialchars($row['ch_sal_racion'] ?? '') : 'N/A') . "</td>";
                              // Column 8: Costo (or N/A)
                              echo "<td>" . ($hasSal ? htmlspecialchars($row['ch_sal_costo'] ?? '') : 'N/A') . "</td>";
                              // Column 9: Valor Total (or N/A)
                              echo "<td>" . ($hasSal && isset($row['total_value']) ? htmlspecialchars($row['total_value']) : 'N/A') . "</td>";
                              
                              // Column 10: Estatus (or N/A)
                              if ($hasSal && $salFecha) {
                                  try {
                                      $salDate = new DateTime($salFecha);
                                      $dueDate = clone $salDate;
                                      $dueDate->modify("+{$vigencia} days");
                                      
                                      if ($currentDate > $dueDate) {
                                          echo '<td class="text-center"><span class="badge bg-danger">VENCIDO</span></td>';
                                      } else {
                                          echo '<td class="text-center"><span class="badge bg-success">VIGENTE</span></td>';
                                      }
                                  } catch (Exception $e) {
                                      error_log("Date error: " . $e->getMessage() . " for date: " . $salFecha);
                                      echo '<td class="text-center"><span class="badge bg-warning">ERROR FECHA</span></td>';
                                  }
                              } else {
                                  echo '<td class="text-center"><span class="badge bg-secondary">Sin Registro</span></td>'; // Status if no concentrado
                              }
                              
                              echo "</tr>";
                          }
                      }
                  } catch (PDOException $e) {
                      error_log("Error in sal table: " . $e->getMessage());
                      echo "<tr><td colspan='10' class='text-center'>Error al cargar los datos: " . $e->getMessage() . "</td></tr>"; // Adjusted colspan to 10
                  }
                  ?>
              </tbody>
          </table>
      </div>
  </div>
</div>

<!-- Initialize DataTable for VH Sal -->
<script>
$(document).ready(function() {
    $('#salTable').DataTable({
        // Set initial page length
        pageLength: 25,
        
        // Configure length menu options
        lengthMenu: [
            [25, 50, 100, -1],
            [25, 50, 100, "Todos"]
        ],
        
        // Order by fecha (date) column descending
        order: [[1, 'desc']],
        
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
                targets: [0], // Actions column
                orderable: false,
                searchable: false
            },
            {
                targets: [6, 7, 8], // Racion, Costo, Valor Total columns
                render: function(data, type, row) {
                    if (type === 'display') {
                        if (data === 'N/A') return data; // Pass through 'N/A'
                        const number = parseFloat(data);
                        if (!isNaN(number)) {
                            return number.toLocaleString('es-ES', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        } else {
                            return data; // Return original if parsing failed but wasn't N/A
                        }
                    }
                    return data;
                }
            },
            {
                targets: [1], // Fecha column
                type: 'date-eu', // Help DataTables sort European date format
                render: function(data, type, row) {
                    if (type === 'display') {
                        if (data === 'N/A') return data; // Pass through 'N/A'
                        // Date is already formatted DD/MM/YYYY in PHP
                        return data; 
                    }
                    // For sorting/filtering, return the original YYYY-MM-DD if possible, or null
                    if (type === 'sort' || type === 'filter') {
                         // We need the original YYYY-MM-DD date here for correct sorting.
                         // Let's assume the raw data is the 2nd element in the row array `row[1]`
                         // Note: This depends on DataTables internal structure and might need adjustment
                         // A better approach is to fetch YYYY-MM-DD in PHP and pass it via a hidden column or data attribute
                         // For now, let's try getting it from the raw row data for the corresponding display column
                         // If the display data `data` is 'N/A', sorting value should be null or minimal
                         if (data === 'N/A') return null; 
                         // Attempt to convert DD/MM/YYYY back to YYYY-MM-DD for sorting
                         const parts = data.split('/');
                         if (parts.length === 3) {
                            return parts[2] + '-' + parts[1] + '-' + parts[0];
                         }
                         return null; // Fallback if conversion fails
                    }
                    return data;
                }
            },
            {
                targets: [9], // Status column
                orderable: true,
                searchable: true
            }
        ]
    });
});
</script>

<!-- JavaScript for Edit and Delete buttons -->
<script>
$(document).ready(function() {
    var newSalModalEl = document.getElementById('newSalModal');
    var tagIdInput = document.getElementById('new_tagid');

    // --- Pre-fill Tag ID when New Sal Modal opens --- 
    if (newSalModalEl && tagIdInput) {
        newSalModalEl.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget; 
            
            if (button) { // Check if modal was triggered by a button
                // Extract info from data-* attributes
                var tagid = button.getAttribute('data-tagid-prefill');
                
                // Update the modal's input field
                if (tagid) {
                    tagIdInput.value = tagid;
                } else {
                     tagIdInput.value = ''; // Clear if no tagid passed
                }
            } else {
                tagIdInput.value = ''; // Clear if opened programmatically without a relatedTarget
            }
        });

        // Optional: Clear the input when the modal is hidden to avoid stale data
        newSalModalEl.addEventListener('hidden.bs.modal', function (event) {
            tagIdInput.value = ''; 
            // Optionally reset form validation state
            $('#newSalForm').removeClass('was-validated'); 
            document.getElementById('newSalForm').reset(); // Reset other fields too
        });
    }
    // --- End Pre-fill Logic ---
    
    // Handle new entry form submission
    $('#saveNewSal').click(function() {
        // Validate the form
        var form = document.getElementById('newSalForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        
        // Get form data
        var formData = {
            tagid: $('#new_tagid').val(),
            racion: $('#new_racion').val(),
            etapa: $('#new_etapa').val(),
            producto: $('#new_producto').val(),
            costo: $('#new_costo').val(),
            fecha: $('#new_fecha').val()
        };
        
        // Show confirmation dialog using SweetAlert2
        Swal.fire({
            title: '¿Confirmar registro?',
            text: `¿Desea registrar el registro de sal ${formData.racion} kg para el animal con Tag ID ${formData.tagid}?`,
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
                    url: 'process_sal.php',
                    type: 'POST',
                    data: {
                        action: 'insert',
                        tagid: formData.tagid,
                        racion: formData.racion,
                        etapa: formData.etapa,
                        producto: formData.producto,
                        costo: formData.costo,
                        fecha: formData.fecha
                    },
                    success: function(response) {
                        // Close the modal
                        var modal = bootstrap.Modal.getInstance(document.getElementById('newSalModal'));
                        modal.hide();
                        
                        // Show success message
                        Swal.fire({
                            title: '¡Registro exitoso!',
                            text: 'El registro de sal ha sido guardado correctamente',
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
    $('.edit-sal').click(function() {
        var id = $(this).data('id');
        var tagid = $(this).data('tagid');
        var etapa = $(this).data('etapa');
        var producto = $(this).data('producto');
        var racion = $(this).data('racion');
        var costo = $(this).data('costo');
        var fecha = $(this).data('fecha');
        
        // Edit Sal Modal dialog for editing

        var modalHtml = `
        <div class="modal fade" id="editSalModal" tabindex="-1" aria-labelledby="editSalModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSalModalLabel">
                            <i class="fas fa-weight me-2"></i>Editar Sal
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editSalForm">
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
                                <i class="fa-solid fa-syringe"></i>
                                <label for="edit_producto" class="form-label">Sal</label>
                                <input type="text" class="form-control" id="edit_producto" name="producto" value="${producto}" readonly required>
                                <button type="button" class="btn btn-outline-secondary" id="selectProductoBtn" title="Seleccionar de configuración">
                                    <i class="fas fa-list"></i>
                                </button>
                            </span>                            
                        </div>
                    </div>
                    <div class="mb-4">                        
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-syringe"></i>
                                        <label for="edit_etapa" class="form-label">Etapa</label>
                                        <input type="text" class="form-control" id="edit_etapa" name="etapa" value="${etapa}" readonly required>
                                        <button type="button" class="btn btn-outline-secondary" id="selectEtapaBtn" title="Seleccionar de configuración">
                                            <i class="fas fa-list"></i>
                                        </button>
                                    </span>                            
                                </div>
                            </div>                            
                            <div class="mb-4">                                
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-weight"></i>
                                        <label for="edit_racion" class="form-label">Racion (kg)</label>
                                        <input type="number" step="0.01" class="form-control" id="edit_racion" value="${racion}" required>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-4">                                
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                        <label for="edit_costo" class="form-label">Costo ($/kg)</label>
                                        <input type="number" step="0.01" class="form-control" id="edit_costo" value="${costo}" required>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer btn-group">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Cancelar
                        </button>
                        <button type="button" class="btn btn-success" id="saveEditSal">
                            <i class="fas fa-save me-1"></i>Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>`;
        
        // Product selection modal
        var productSelectionModal = `
        <div class="modal fade" id="productSelectionModal" tabindex="-1" aria-labelledby="productSelectionModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productSelectionModalLabel">
                            <i class="fas fa-list me-2"></i>Seleccionar Producto de Sal
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="productSearch" class="form-label">Buscar producto:</label>
                            <input type="text" class="form-control" id="productSearch" placeholder="Escriba para buscar...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Productos disponibles:</label>
                            <div class="list-group" id="productList" style="max-height: 300px; overflow-y: auto;">
                                <?php
                                try {
                                    $sql_alimentos = "SELECT DISTINCT cc_sal_nombre FROM cc_sal ORDER BY cc_sal_nombre ASC";
                                    $stmt_alimentos = $conn->prepare($sql_alimentos);
                                    $stmt_alimentos->execute();
                                    $alimentos = $stmt_alimentos->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($alimentos as $alimento_row) {
                                        echo '<button type="button" class="list-group-item list-group-item-action product-option" data-value="' . htmlspecialchars($alimento_row['cc_sal_nombre']) . '">' . htmlspecialchars($alimento_row['cc_sal_nombre']) . '</button>';
                                    }
                                } catch (PDOException $e) {
                                    error_log("Error fetching sals: " . $e->getMessage());
                                    echo '<div class="list-group-item text-danger">Error al cargar productos</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>`;
        
        // Etapa selection modal
        var etapaSelectionModal = `
        <div class="modal fade" id="etapaSelectionModal" tabindex="-1" aria-labelledby="etapaSelectionModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="etapaSelectionModalLabel">
                            <i class="fas fa-list me-2"></i>Seleccionar Etapa
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="etapaSearch" class="form-label">Buscar etapa:</label>
                            <input type="text" class="form-control" id="etapaSearch" placeholder="Escriba para buscar...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Etapas disponibles:</label>
                            <div class="list-group" id="etapaList" style="max-height: 300px; overflow-y: auto;">
                                <?php
                                try {
                                    $sql_etapas = "SELECT DISTINCT cc_etapas_nombre FROM cc_etapas ORDER BY cc_etapas_nombre ASC";
                                    $stmt_etapas = $conn->prepare($sql_etapas);
                                    $stmt_etapas->execute();
                                    $etapas = $stmt_etapas->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($etapas as $etapa_row) {
                                        echo '<button type="button" class="list-group-item list-group-item-action etapa-option" data-value="' . htmlspecialchars($etapa_row['cc_etapas_nombre']) . '">' . htmlspecialchars($etapa_row['cc_etapas_nombre']) . '</button>';
                                    }
                                } catch (PDOException $e) {
                                    error_log("Error fetching etapas: " . $e->getMessage());
                                    echo '<div class="list-group-item text-danger">Error al cargar etapas</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>`;
        
        // Remove any existing modals
        $('#editSalModal').remove();
        $('#productSelectionModal').remove();
        $('#etapaSelectionModal').remove();
        
        // Add the modals to the page
        $('body').append(modalHtml);
        $('body').append(productSelectionModal);
        $('body').append(etapaSelectionModal);
        
        // Show the edit modal
        var editModal = new bootstrap.Modal(document.getElementById('editSalModal'));
        
        // Set up product selection functionality
        $('#selectProductoBtn').click(function() {
            var productSelectionModal = new bootstrap.Modal(document.getElementById('productSelectionModal'));
            productSelectionModal.show();
        });
        
        // Product search functionality
        $('#productSearch').on('input', function() {
            var searchTerm = $(this).val().toLowerCase();
            $('.product-option').each(function() {
                var productName = $(this).text().toLowerCase();
                if (productName.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        
        // Product selection
        $(document).on('click', '.product-option', function() {
            var selectedProduct = $(this).data('value');
            $('#edit_producto').val(selectedProduct);
            $('#productSelectionModal').modal('hide');
        });
        
        // Set up etapa selection functionality
        $('#selectEtapaBtn').click(function() {
            var etapaSelectionModal = new bootstrap.Modal(document.getElementById('etapaSelectionModal'));
            etapaSelectionModal.show();
        });
        
        // Etapa search functionality
        $('#etapaSearch').on('input', function() {
            var searchTerm = $(this).val().toLowerCase();
            $('.etapa-option').each(function() {
                var etapaName = $(this).text().toLowerCase();
                if (etapaName.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        
        // Etapa selection
        $(document).on('click', '.etapa-option', function() {
            var selectedEtapa = $(this).data('value');
            $('#edit_etapa').val(selectedEtapa);
            $('#etapaSelectionModal').modal('hide');
        });
        
        editModal.show();
        
        // Set values after modal is fully rendered
        $('#edit_producto').val(producto);
        $('#edit_etapa').val(etapa);
        
        // Handle save button click
        $('#saveEditSal').click(function() {
            var formData = {
                id: $('#edit_id').val(),
                tagid: $('#edit_tagid').val(),
                racion: $('#edit_racion').val(),
                etapa: $('#edit_etapa').val(),
                producto: $('#edit_producto').val(),
                costo: $('#edit_costo').val(),
                fecha: $('#edit_fecha').val()
            };
            
            // Show confirmation dialog
            Swal.fire({
                title: '¿Guardar cambios?',
                text: `¿Desea actualizar el registro de sal para el animal con Tag ID ${formData.tagid}?`,
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
                        url: 'process_sal.php',
                        type: 'POST',
                        data: {
                            action: 'update',
                            id: formData.id,
                            tagid: formData.tagid,
                            racion: formData.racion,
                            etapa: formData.etapa,
                            producto: formData.producto,
                            costo: formData.costo,
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
    $('.delete-sal').click(function() {
        var id = $(this).data('id');
        var tagid = $(this).closest('tr').find('td:eq(3)').text().trim(); // Get Tag ID from the 4th column
        
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
                    url: 'process_sal.php',
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

<!-- Sal Chart Section -->

<div class="container mt-5 mb-5">
    <div class="card shadow-lg">
        <div class="card-header bg-gradient-primary text-white">
            <h5 class="mb-0"><i class="fas fa-dollar-sign me-2"></i>Gasto Total Mensual en Sal</h5>
        </div>
        <div class="card-body">
            <div class="chart-container" style="position: relative; height:50vh; width:100%">
                <canvas id="monthlyExpenseSalChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script for Monthly Expense Line Chart -->
<script>
$(document).ready(function() {
    let monthlyExpenseSalChart = null;

    // Add loading state
    $('#monthlyExpenseSalChart').parent().addClass('loading');

    // Fetch monthly expense data and create the chart
    $.ajax({
        url: 'get_salt_data.php?type=monthly_expense',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log('Received monthly expense sal data:', data);
            
            // Remove loading state
            $('#monthlyExpenseSalChart').parent().removeClass('loading');
            
            if (data.error) {
                console.error('Server error fetching monthly expense sal:', data.error);
                $('#monthlyExpenseSalChart').parent().html('<div class="alert alert-danger">Error: ' + data.error + '</div>');
                return;
            }
            
            if (!data || data.length === 0) {
                console.log('No monthly expense sal data available');
                $('#monthlyExpenseSalChart').parent().html('<div class="alert alert-info">No hay datos de gastos mensuales disponibles para mostrar en el gráfico.</div>');
                return;
            }
            
            createMonthlyExpenseSalChart(data);
        },
        error: function(xhr, status, error) {
            // Remove loading state
            $('#monthlyExpenseSalChart').parent().removeClass('loading');
            
            console.error('Error fetching monthly expense sal data:', error);
            console.error('Response text:', xhr.responseText);
            $('#monthlyExpenseSalChart').parent().html('<div class="alert alert-danger">Error al cargar datos: ' + error + '</div>');
        }
    });

    function createMonthlyExpenseSalChart(data) {
        try {
            var ctx = document.getElementById('monthlyExpenseSalChart').getContext('2d');

            if (!data || data.length === 0) {
                console.log('No data to create monthly expense chart');
                return;
            }

            // Format the data for the chart
            var labels = data.map(function(item) {
                return item.month;
            });

            var expenses = data.map(function(item) {
                return parseFloat(item.total_expense) || 0;
            });
            
            console.log('Monthly expense chart labels:', labels);
            console.log('Monthly expense chart data:', expenses);

            // Create gradient for professional look
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(102, 126, 234, 0.8)');
            gradient.addColorStop(1, 'rgba(102, 126, 234, 0.1)');

        monthlyExpenseSalChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Gasto Total Mensual Sal ($)',
                    data: expenses,
                    backgroundColor: gradient,
                    borderColor: 'rgba(102, 126, 234, 1)',
                    borderWidth: 4,
                    pointBackgroundColor: 'rgba(102, 126, 234, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 8,
                    pointHoverRadius: 12,
                    pointHoverBackgroundColor: 'rgba(102, 126, 234, 1)',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 4,
                    tension: 0.4,
                    fill: true,
                    pointStyle: 'circle'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart',
                    onProgress: function(animation) {
                        // Add subtle glow effect during animation
                        const chart = animation.chart;
                        const ctx = chart.ctx;
                        ctx.shadowColor = 'rgba(102, 126, 234, 0.3)';
                        ctx.shadowBlur = 20;
                    },
                    onComplete: function(animation) {
                        // Remove glow effect after animation
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
                        title: {
                            display: true,
                            text: 'Gasto Total Sal ($)',
                            font: {
                                size: 14,
                                weight: 'bold',
                                family: 'Arial, sans-serif'
                            },
                            color: '#333',
                            padding: 20
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 10,
                            callback: function(value) {
                                return '$ ' + value.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }
                        },
                        grid: {
                            color: 'rgba(102, 126, 234, 0.1)',
                            lineWidth: 1,
                            drawBorder: false
                        },
                        border: {
                            color: 'rgba(102, 126, 234, 0.2)',
                            width: 2
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Mes',
                            font: {
                                size: 14,
                                weight: 'bold',
                                family: 'Arial, sans-serif'
                            },
                            color: '#333',
                            padding: 20
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 10
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            lineWidth: 1,
                            drawBorder: false
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
                                family: 'Arial, sans-serif'
                            },
                            color: '#333'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: {
                            size: 16,
                            weight: 'bold',
                            family: 'Arial, sans-serif'
                        },
                        bodyFont: {
                            size: 14,
                            family: 'Arial, sans-serif'
                        },
                        padding: 16,
                        cornerRadius: 8,
                        displayColors: true,
                        borderColor: 'rgba(102, 126, 234, 0.5)',
                        borderWidth: 2,
                        callbacks: {
                            label: function(context) {
                                return '💰 Gasto Total: $ ' + context.parsed.y.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            },
                            title: function(tooltipItems) {
                                return '📅 Mes: ' + tooltipItems[0].label;
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Gasto Total Mensual en Sal',
                        font: {
                            size: 18,
                            weight: 'bold',
                            family: 'Arial, sans-serif'
                        },
                        color: '#333',
                        padding: 20,
                        align: 'center'
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 12,
                        hoverBorderWidth: 4
                    },
                    line: {
                        borderWidth: 4
                    }
                }
            }
        });
        } catch (error) {
            console.error('Error creating monthly expense sal chart:', error);
            $('#monthlyExpenseSalChart').parent().html('<div class="alert alert-danger">Error al crear el gráfico: ' + error.message + '</div>');
        }
    }
});
</script>

<div class="container mt-5 mb-5">
    <div class="card shadow-lg">
        <div class="card-header bg-gradient-info text-white">
            <h5 class="mb-0"><i class="fas fa-chart-area me-2"></i>Gasto Acumulado Mensual en Sal</h5>
        </div>
        <div class="card-body">
            <div class="chart-container" style="position: relative; height:50vh; width:100%">
                <canvas id="cumulativeExpenseSalChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script for Cumulative Monthly Expense Line Chart -->
<script>
$(document).ready(function() {
    let cumulativeExpenseSalChart = null;

    // Add loading state
    $('#cumulativeExpenseSalChart').parent().addClass('loading');

    // Fetch the SAME monthly expense data used for the total monthly chart
    $.ajax({
        url: 'get_salt_data.php?type=monthly_expense',
        type: 'GET',
        dataType: 'json',
        success: function(monthlyData) {
            console.log('Received monthly data for cumulative chart:', monthlyData);
            
            // Remove loading state
            $('#cumulativeExpenseSalChart').parent().removeClass('loading');
            
            if (monthlyData.error) {
                console.error('Server error fetching monthly expense sal for cumulative chart:', monthlyData.error);
                $('#cumulativeExpenseSalChart').parent().html('<div class="alert alert-danger">Error: ' + monthlyData.error + '</div>');
                return;
            }
            if (!Array.isArray(monthlyData) || monthlyData.length === 0) {
                 console.warn('No monthly data sal received for cumulative chart.');
                 $('#cumulativeExpenseSalChart').parent().html('<div class="alert alert-info">No hay datos disponibles para mostrar el gasto acumulado.</div>');
                 return;
            }

            // Calculate cumulative data
            let cumulativeTotal = 0;
            const cumulativeData = monthlyData.map(item => {
                cumulativeTotal += parseFloat(item.total_expense) || 0;
                return {
                    month: item.month,
                    cumulative_expense: cumulativeTotal
                };
            });

            createCumulativeExpenseSalChart(cumulativeData);
        },
        error: function(xhr, status, error) {
            // Remove loading state
            $('#cumulativeExpenseSalChart').parent().removeClass('loading');
            
            console.error('Error fetching monthly expense sal data for cumulative chart:', error);
            console.error('Response text:', xhr.responseText);
            $('#cumulativeExpenseSalChart').parent().html('<div class="alert alert-danger">Error al cargar datos para el gráfico acumulado: ' + error + '</div>');
        }
    });

    function createCumulativeExpenseSalChart(data) {
        var ctx = document.getElementById('cumulativeExpenseSalChart').getContext('2d');

        // Create gradient for professional look
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(23, 162, 184, 0.8)');
        gradient.addColorStop(1, 'rgba(23, 162, 184, 0.1)');

        // Format the data for the chart
        var labels = data.map(function(item) {
            return item.month;
        });

        var cumulativeExpenses = data.map(function(item) {
            return parseFloat(item.cumulative_expense) || 0;
        });

        cumulativeExpenseSalChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Gasto Acumulado Mensual Sal ($)',
                    data: cumulativeExpenses,
                    backgroundColor: gradient,
                    borderColor: 'rgba(23, 162, 184, 1)',
                    borderWidth: 4,
                    pointBackgroundColor: 'rgba(23, 162, 184, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 8,
                    pointHoverRadius: 12,
                    pointHoverBackgroundColor: 'rgba(23, 162, 184, 1)',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 4,
                    tension: 0.4,
                    fill: true,
                    pointStyle: 'circle'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart',
                    onProgress: function(animation) {
                        // Add subtle glow effect during animation
                        const chart = animation.chart;
                        const ctx = chart.ctx;
                        ctx.shadowColor = 'rgba(23, 162, 184, 0.3)';
                        ctx.shadowBlur = 20;
                    },
                    onComplete: function(animation) {
                        // Remove glow effect after animation
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
                        title: {
                            display: true,
                            text: 'Gasto Acumulado Sal ($)',
                            font: {
                                size: 14,
                                weight: 'bold',
                                family: 'Arial, sans-serif'
                            },
                            color: '#333',
                            padding: 20
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 10,
                            callback: function(value) {
                                return '$ ' + value.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }
                        },
                        grid: {
                            color: 'rgba(23, 162, 184, 0.1)',
                            lineWidth: 1,
                            drawBorder: false
                        },
                        border: {
                            color: 'rgba(23, 162, 184, 0.2)',
                            width: 2
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Mes',
                            font: {
                                size: 14,
                                weight: 'bold',
                                family: 'Arial, sans-serif'
                            },
                            color: '#333',
                            padding: 20
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 10
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            lineWidth: 1,
                            drawBorder: false
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
                                family: 'Arial, sans-serif'
                            },
                            color: '#333'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: {
                            size: 16,
                            weight: 'bold',
                            family: 'Arial, sans-serif'
                        },
                        bodyFont: {
                            size: 14,
                            family: 'Arial, sans-serif'
                        },
                        padding: 16,
                        cornerRadius: 8,
                        displayColors: true,
                        borderColor: 'rgba(23, 162, 184, 0.5)',
                        borderWidth: 2,
                        callbacks: {
                            label: function(context) {
                                return '📈 Acumulado hasta ' + context.label + ': $ ' + context.parsed.y.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            },
                            title: function(tooltipItems) {
                                return '📅 Mes: ' + tooltipItems[0].label;
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Gasto Acumulado Mensual en Sal',
                        font: {
                            size: 18,
                            weight: 'bold',
                            family: 'Arial, sans-serif'
                        },
                        color: '#333',
                        padding: 20,
                        align: 'center'
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 12,
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
    <div class="card shadow-lg">
        <div class="card-header bg-gradient-warning text-dark">
            <h5 class="mb-0"><i class="fas fa-weight-hanging me-2"></i>Peso Total Mensual Registrado Sal</h5>
        </div>
        <div class="card-body">
            <div class="chart-container" style="position: relative; height:50vh; width:100%">
                <canvas id="monthlyWeightSalChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script for Monthly Total Weight Line Chart -->
<script>
$(document).ready(function() {
    let monthlyWeightSalChart = null;

    // Add loading state
    $('#monthlyWeightSalChart').parent().addClass('loading');

    // Fetch monthly weight data
    $.ajax({
        url: 'get_salt_data.php?type=monthly_weight',
        type: 'GET',
        dataType: 'json',
        success: function(weightData) {
            console.log('Received monthly weight sal data:', weightData);
            
            // Remove loading state
            $('#monthlyWeightSalChart').parent().removeClass('loading');
            
            if (weightData.error) {
                console.error('Server error fetching monthly weight sal:', weightData.error);
                $('#monthlyWeightSalChart').parent().html('<div class="alert alert-danger">Error al cargar datos de peso: ' + weightData.error + '</div>');
                return;
            }
            if (!Array.isArray(weightData) || weightData.length === 0) {
                 console.warn('No weight data sal received.');
                 $('#monthlyWeightSalChart').parent().html('<div class="alert alert-info">No hay datos de peso disponibles para mostrar.</div>');
                 return;
            }

            createMonthlyWeightSalChart(weightData);
        },
        error: function(xhr, status, error) {
            // Remove loading state
            $('#monthlyWeightSalChart').parent().removeClass('loading');
            
            console.error('Error fetching monthly weight sal data:', error);
            console.error('Response text:', xhr.responseText);
            $('#monthlyWeightSalChart').parent().html('<div class="alert alert-danger">Error al cargar datos para el gráfico de peso: ' + error + '</div>');
        }
    });

    function createMonthlyWeightSalChart(data) {
        var ctx = document.getElementById('monthlyWeightSalChart').getContext('2d');

        // Create gradient for professional look
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(255, 193, 7, 0.8)');
        gradient.addColorStop(1, 'rgba(255, 193, 7, 0.1)');

        // Format the data for the chart
        var labels = data.map(function(item) {
            return item.month;
        });

        var weights = data.map(function(item) {
            return parseFloat(item.total_weight) || 0;
        });

        monthlyWeightSalChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Peso Total Mensual (kg)',
                    data: weights,
                    backgroundColor: gradient,
                    borderColor: 'rgba(255, 193, 7, 1)',
                    borderWidth: 4,
                    pointBackgroundColor: 'rgba(255, 193, 7, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 8,
                    pointHoverRadius: 12,
                    pointHoverBackgroundColor: 'rgba(255, 193, 7, 1)',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 4,
                    tension: 0.4,
                    fill: true,
                    pointStyle: 'circle'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart',
                    onProgress: function(animation) {
                        // Add subtle glow effect during animation
                        const chart = animation.chart;
                        const ctx = chart.ctx;
                        ctx.shadowColor = 'rgba(255, 193, 7, 0.3)';
                        ctx.shadowBlur = 20;
                    },
                    onComplete: function(animation) {
                        // Remove glow effect after animation
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
                        title: {
                            display: true,
                            text: 'Peso Total (kg)',
                            font: {
                                size: 14,
                                weight: 'bold',
                                family: 'Arial, sans-serif'
                            },
                            color: '#333',
                            padding: 20
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 10,
                            callback: function(value) {
                                return value.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + ' kg';
                            }
                        },
                        grid: {
                            color: 'rgba(255, 193, 7, 0.1)',
                            lineWidth: 1,
                            drawBorder: false
                        },
                        border: {
                            color: 'rgba(255, 193, 7, 0.2)',
                            width: 2
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Mes',
                            font: {
                                size: 14,
                                weight: 'bold',
                                family: 'Arial, sans-serif'
                            },
                            color: '#333',
                            padding: 20
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 10
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            lineWidth: 1,
                            drawBorder: false
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
                                family: 'Arial, sans-serif'
                            },
                            color: '#333'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: {
                            size: 16,
                            weight: 'bold',
                            family: 'Arial, sans-serif'
                        },
                        bodyFont: {
                            size: 14,
                            family: 'Arial, sans-serif'
                        },
                        padding: 16,
                        cornerRadius: 8,
                        displayColors: true,
                        borderColor: 'rgba(255, 193, 7, 0.5)',
                        borderWidth: 2,
                        callbacks: {
                            label: function(context) {
                                return '⚖️ Peso Total: ' + context.parsed.y.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + ' kg';
                            },
                            title: function(tooltipItems) {
                                return '📅 Mes: ' + tooltipItems[0].label;
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Peso Total Mensual Registrado',
                        font: {
                            size: 18,
                            weight: 'bold',
                            family: 'Arial, sans-serif'
                        },
                        color: '#333',
                        padding: 20,
                        align: 'center'
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 12,
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
    <div class="card shadow-lg">
        <div class="card-header bg-gradient-purple text-white">
            <h5 class="mb-0"><i class="fas fa-exchange-alt me-2"></i>Indice de Conversión Alimentaria (Kg Alimento / Kg Peso Animal)</h5>
        </div>
        <div class="card-body">
            <div class="chart-container" style="position: relative; height:50vh; width:100%">
                <canvas id="monthlyConversionSalChart"></canvas>
                 <div id="conversionSalChartMessage" class="text-center mt-3"></div> <!-- Message area -->
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script for Monthly Average Conversion Rate -->
<script>
$(document).ready(function() {
    let monthlyConversionSalChart = null;
    
    // Add loading state
    $('#monthlyConversionSalChart').parent().addClass('loading');
    
    // URL for Numerator: Monthly Total Feed Weight (Projected)
    const feedWeightUrl = 'get_salt_data.php?type=monthly_feed_weight'; 
    // URL for Denominator Calculation: Monthly Total Animal Weight
    const animalWeightUrl = 'get_salt_data.php?type=animal_weight'; 

    // Use Promise.all to fetch both datasets concurrently
    Promise.all([
        $.getJSON(feedWeightUrl), // Fetch total feed weight (Numerator)
        $.getJSON(animalWeightUrl) // Fetch total animal weight (for Denominator)
    ])
    .then(function([feedWeightData, animalWeightData]) {
        console.log('Received feed weight data:', feedWeightData);
        console.log('Received animal weight data:', animalWeightData);
        
        // Remove loading state
        $('#monthlyConversionSalChart').parent().removeClass('loading');
        
        // --- Basic Error Handling --- 
        let hasError = false;
        if (!Array.isArray(feedWeightData) || feedWeightData.error) {
            console.error('Error or invalid format fetching feed weight data:', feedWeightData);
            $('#conversionSalChartMessage').html('<div class="alert alert-danger">Error al cargar datos de peso de alimento: ' + (feedWeightData.error || 'Datos inválidos') + '</div>');
            hasError = true;
        }
        if (!Array.isArray(animalWeightData) || animalWeightData.error) {
            console.error('Error or invalid format fetching animal weight data:', animalWeightData);
            $('#conversionSalChartMessage').append('<div class="alert alert-danger">Error al cargar datos de peso animal: ' + (animalWeightData.error || 'Datos inválidos') + '</div>');
             hasError = true;
        }
        if (hasError) return; // Stop if errors occurred

        if (feedWeightData.length === 0 || animalWeightData.length === 0) {
             console.warn('No data available for feed weight or animal weight to calculate FCR.');
             $('#conversionSalChartMessage').html('<div class="alert alert-info">No hay suficientes datos para calcular la conversión (Kg Alimento / Kg Ganancia).</div>');
             return;
        }

        // --- Data Processing --- 
        const feedByMonth = {};
        feedWeightData.forEach(item => {
            feedByMonth[item.month] = parseFloat(item.total_feed_kg) || 0;
        });

        const weightByMonth = {};
        animalWeightData.forEach(item => {
            weightByMonth[item.month] = parseFloat(item.total_weight) || 0;
        });

        // Get all unique months present in *both* datasets and sort them
        const allMonths = [...new Set([...Object.keys(feedByMonth), ...Object.keys(weightByMonth)])].sort(); 

        const conversionData = [];

        for (let i = 0; i < allMonths.length; i++) {
            const currentMonth = allMonths[i];
            const currentFeedKg = feedByMonth[currentMonth] || 0;
            const currentWeightKg = weightByMonth[currentMonth] || 0;

            // Calculate Weight Gain (Denominator)
            let weightGain = 0;
             if (i > 0) {
                 const previousMonth = allMonths[i-1];
                 const previousWeightKg = weightByMonth[previousMonth] || 0;
                 // Ensure previous month data actually exists for calculation
                 if (weightByMonth.hasOwnProperty(previousMonth)) {
                    weightGain = currentWeightKg - previousWeightKg;
                 }
             } else {
                 // Cannot calculate gain for the very first month
                 continue; 
             }

            // Calculate Feed Conversion Ratio (FCR) (Kg Feed / Kg Gain)
            // Avoid division by zero or division when weight gain is zero or negative.
            const fcr = (weightGain > 0) ? (currentFeedKg / weightGain) : 0;

            // Only add data points where we have feed data for the current month 
            // AND positive weight gain calculated from the previous month.
            if (feedByMonth.hasOwnProperty(currentMonth) && weightGain > 0) {
                 conversionData.push({
                     month: currentMonth,
                     fcr: fcr // Indice (Kg Alimento / Kg Ganancia)
                 });
            }
        }
         
         if (conversionData.length === 0) {
             $('#conversionSalChartMessage').html('<div class="alert alert-warning">No se pudo calcular la conversión (quizás falta información de alimento o ganancia de peso positiva).</div>');
             return;
         }

        createMonthlyConversionChart(conversionData);
    })
    .catch(function(error) {
        // Remove loading state
        $('#monthlyConversionSalChart').parent().removeClass('loading');
        
        console.error('Error fetching data for FCR chart:', error);
        $('#conversionSalChartMessage').html('<div class="alert alert-danger">Ocurrió un error al obtener los datos para el gráfico de conversión: ' + error + '</div>');
    });

    function createMonthlyConversionChart(data) {
        var ctx = document.getElementById('monthlyConversionSalChart').getContext('2d');

        // Create gradient for professional look
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(111, 66, 193, 0.8)');
        gradient.addColorStop(1, 'rgba(111, 66, 193, 0.1)');

        // If chart exists, destroy it before creating a new one
        if (monthlyConversionSalChart) {
            monthlyConversionSalChart.destroy();
        }

        var labels = data.map(item => item.month);
        var rates = data.map(item => parseFloat(item.fcr)); 

        monthlyConversionSalChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Indice Conversion Alimentaria Sal (ICA)', // FCR Label
                    data: rates,
                    backgroundColor: gradient,
                    borderColor: 'rgba(111, 66, 193, 1)',
                    borderWidth: 4,
                    pointBackgroundColor: 'rgba(111, 66, 193, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 8,
                    pointHoverRadius: 12,
                    pointHoverBackgroundColor: 'rgba(111, 66, 193, 1)',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 4,
                    tension: 0.4,
                    fill: true,
                    pointStyle: 'circle'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart',
                    onProgress: function(animation) {
                        // Add subtle glow effect during animation
                        const chart = animation.chart;
                        const ctx = chart.ctx;
                        ctx.shadowColor = 'rgba(111, 66, 193, 0.3)';
                        ctx.shadowBlur = 20;
                    },
                    onComplete: function(animation) {
                        // Remove glow effect after animation
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
                         beginAtZero: true, // FCR is typically >= 0
                        title: {
                            display: true,
                            text: 'Indice Sal (Kg Alimento / Kg Peso Animal)', // FCR Axis Label
                            font: {
                                size: 14,
                                weight: 'bold',
                                family: 'Arial, sans-serif'
                            },
                            color: '#333',
                            padding: 20
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 10,
                            callback: function(value) {
                                // Format as a ratio 
                                return value.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }
                        },
                        grid: {
                            color: 'rgba(111, 66, 193, 0.1)',
                            lineWidth: 1,
                            drawBorder: false
                        },
                        border: {
                            color: 'rgba(111, 66, 193, 0.2)',
                            width: 2
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Mes',
                            font: {
                                size: 14,
                                weight: 'bold',
                                family: 'Arial, sans-serif'
                            },
                            color: '#333',
                            padding: 20
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            padding: 10
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            lineWidth: 1,
                            drawBorder: false
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
                                family: 'Arial, sans-serif'
                            },
                            color: '#333'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: {
                            size: 16,
                            weight: 'bold',
                            family: 'Arial, sans-serif'
                        },
                        bodyFont: {
                            size: 14,
                            family: 'Arial, sans-serif'
                        },
                        padding: 16,
                        cornerRadius: 8,
                        displayColors: true,
                        borderColor: 'rgba(111, 66, 193, 0.5)',
                        borderWidth: 2,
                        callbacks: {
                            label: function(context) {
                                // FCR Tooltip
                                return '📊 Indice: ' + context.parsed.y.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }); // Unitless ratio (kg/kg)
                            },
                            title: function(tooltipItems) {
                                return '📅 Mes: ' + tooltipItems[0].label;
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Indice Conversion Alimentaria Sal (Kg Alimento / Kg Peso Animal)', // ICA Title
                        font: {
                            size: 18,
                            weight: 'bold',
                            family: 'Arial, sans-serif'
                        },
                        color: '#333',
                        padding: 20,
                        align: 'center'
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 12,
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