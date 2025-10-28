<?php
require_once './pdo_conexion.php';  

// Debug connection type
if (!($conn instanceof PDO)) {
    die("Error: Connection is not a PDO instance. Please check your connection setup.");
}
// Enable PDO error mode to get better error messages
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// --- Fetch data for the line chart ---
$chartLabels = [];
$chartData = [];
try {
    $chartQuery = "SELECT DATE_FORMAT(ch_parto_fecha, '%Y-%m') as month_year, COUNT(*) as count 
                     FROM ch_parto 
                     GROUP BY month_year 
                     ORDER BY month_year ASC";
    $chartStmt = $conn->prepare($chartQuery);
    $chartStmt->execute();
    $chartResults = $chartStmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($chartResults as $row) {
        $chartLabels[] = $row['month_year'];
        $chartData[] = (int)$row['count'];
    }
} catch (PDOException $e) {
    error_log("Error fetching chart data: " . $e->getMessage());
    // Handle error appropriately, maybe set default values or show an error message
}

// Encode data for JavaScript
$chartLabelsJson = json_encode($chartLabels);
$chartDataJson = json_encode($chartData);
// --- End chart data fetching ---

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Caprino Register Parto</title>
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

.bg-gradient-success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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
    padding: 2rem;
    margin: 2rem 0;
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
        padding: 1rem;
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
  REGISTROS DE PARTOS
  </h3>
  
  <!-- New Parto Entry Modal -->
  
  <div class="modal fade" id="newPartoModal" tabindex="-1" aria-labelledby="newPartoModalLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPartoModalLabel">
                    <i class="fas fa-plus-circle me-2"></i>Nuevo Registro Parto
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="newPartoForm">
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
                                <label for="new_numero" class="form-label">Parto #</label>
                                <input type="number" class="form-control" id="new_numero" name="numero" required>
                            </span>                            
                        </div>
                    </div>                                                              
                </form>
            </div>
            <div class="modal-footer btn-group">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancelar
                </button>
                <button type="button" class="btn btn-success" id="saveNewParto">
                    <i class="fas fa-save me-1"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>
  
  <!-- DataTable for ch_parto records -->
  
  <div class="container table-section" style="display: block;">
      <div class="table-responsive">
          <table id="partoTable" class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">Acciones</th>
                      <th class="text-center">Fecha</th>
                      <th class="text-center">Nombre</th>                    
                      <th class="text-center">Tag ID</th>
                      <th class="text-center">Parto #</th>  
                      <th class="text-center">Estatus</th>
                  </tr>
              </thead>
              <tbody>
              <?php
                  try {
                      // Query to get all Female animals and their LATEST parto record (if any)
                        $partoQuery = "
                            SELECT
                                v.tagid AS caprino_tagid,
                                v.nombre AS animal_nombre,
                                ins.id AS parto_id,
                                ins.ch_parto_fecha,
                                ins.ch_parto_tagid, -- Will be NULL if no parto
                                ins.ch_parto_numero
                            FROM
                                caprino v
                            LEFT JOIN ch_parto ins
                              ON v.tagid = ins.ch_parto_tagid
                            LEFT JOIN ch_parto ins_check
                              ON ins.ch_parto_tagid = ins_check.ch_parto_tagid
                             AND ins.ch_parto_fecha < ins_check.ch_parto_fecha -- Check for a newer record
                             -- You might need this if dates can be identical: AND ins.id < ins_check.id
                            WHERE
                                v.genero = 'Hembra'
                                AND ins_check.id IS NULL -- Ensures 'ins' is the latest or only record for that tagid
                                AND v.estatus = 'Activo'
                            ORDER BY
                                CASE WHEN ins.id IS NOT NULL THEN 0 ELSE 1 END ASC, -- Females with insemination first
                                ins.ch_parto_fecha DESC, -- Then by latest insemination date
                                v.nombre ASC"; // Finally by name

                        $stmt = $conn->prepare($partoQuery);
                        $stmt->execute();
                        $partoData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      // If no data, display a message
                      if (empty($partoData)) {
                          echo "<tr><td colspan='8' class='text-center'>No hay hembras registradas</td></tr>"; // Adjusted message
                      } else {
                          // Get vigencia setting for parto records
                          $vigencia = 30; // Default value
                          try {
                              $configQuery = "SELECT e_vencimiento_parto FROM e_vencimiento LIMIT 1";
                              $configStmt = $conn->prepare($configQuery);
                              $configStmt->execute();
                              
                              // Explicitly use PDO fetch method
                              $row = $configStmt->fetch(PDO::FETCH_ASSOC);
                              if ($row && isset($row['e_vencimiento_parto'])) {
                                  $vigencia = intval($row['e_vencimiento_parto']);
                              }
                          } catch (PDOException $e) {
                              error_log("Error fetching configuration: " . $e->getMessage());
                              // Continue with default value
                          }
                          
                          $currentDate = new DateTime();
                          foreach ($partoData as $row) {
                              $hasparto = !empty($row['parto_id']);
                              $partoFecha = $row['ch_parto_fecha'] ?? null;

                              echo "<tr>";

                              // Action buttons
                              echo '<td class="text-center">
                                  <div class="btn-group" role="group">
                                      <button class="btn btn-success btn-sm" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#newPartoModal" 
                                              data-tagid-prefill="'.htmlspecialchars($row['caprino_tagid'] ?? '').'"  -- Pass tagid to modal
                                              title="Registrar Nueva parto">
                                          <i class="fas fa-plus"></i>
                                      </button>
                                      <button class="btn btn-warning btn-sm edit-parto" 
                                          data-id="'.htmlspecialchars($row['parto_id'] ?? '').'" 
                                          data-tagid="'.htmlspecialchars($row['caprino_tagid'] ?? '').'" 
                                          data-numero="'.htmlspecialchars($row['ch_parto_numero'] ?? '').'" 
                                          data-fecha="'.htmlspecialchars($partoFecha ?? '').'" 
                                          title="Editar" '.(!$hasparto ? 'disabled' : '').'>
                                          <i class="fas fa-edit"></i>
                                      </button>
                                      <button class="btn btn-danger btn-sm delete-parto" 
                                          data-id="'.htmlspecialchars($row['parto_id'] ?? '').'" 
                                          data-tagid="'.htmlspecialchars($row['caprino_tagid'] ?? '').'" 
                                          title="Eliminar" '.(!$hasparto ? 'disabled' : '').'>
                                          <i class="fas fa-trash"></i>
                                      </button>
                                  </div>
                              </td>';

                              // Display data or placeholders
                              echo "<td class='text-center'>" . ($partoFecha ? htmlspecialchars($partoFecha) : 'N/A') . "</td>";
                              echo "<td class='text-center'>" . htmlspecialchars($row['animal_nombre'] ?? 'N/A') . "</td>";
                              echo "<td class='text-center'>" . htmlspecialchars($row['caprino_tagid'] ?? 'N/A') . "</td>"; // Now using caprino_tagid
                              echo "<td class='text-center'>" . ($hasparto ? htmlspecialchars($row['ch_parto_numero'] ?? '') : 'N/A') . "</td>";                              

                              // Calculate due date and determine status only if insemination exists
                              if ($hasparto && $partoFecha) {
                                  try {
                                      $partoDate = new DateTime($partoFecha);
                                      $dueDate = clone $partoDate;
                                      $dueDate->modify("+{$vigencia} days");

                                      if ($currentDate > $dueDate) {
                                          echo '<td class="text-center"><span class="badge bg-danger">VENCIDO</span></td>';
                                      } else {
                                          echo '<td class="text-center"><span class="badge bg-success">VIGENTE</span></td>';
                                      }
                                  } catch (Exception $e) {
                                      error_log("Date error: " . $e->getMessage() . " for date: " . $partoFecha);
                                      echo '<td class="text-center"><span class="badge bg-warning">ERROR FECHA</span></td>';
                                  }
                              } else {
                                  // Display status for animals without insemination
                                  echo '<td class="text-center"><span class="badge bg-secondary">Sin Partos</span></td>';
                              }

                              echo "</tr>";
                          }
                      }
                  } catch (PDOException $e) {
                      error_log("Error in parto table: " . $e->getMessage());
                      echo "<tr><td colspan='8' class='text-center'>Error al cargar los datos: " . $e->getMessage() . "</td></tr>"; // Adjusted colspan from 9 to 8
                  }
                  ?>
            </tbody>
          </table>
      </div>
  </div>
</div>

<!-- Initialize DataTable for VH parto -->
<script>
$(document).ready(function() {
    $('#partoTable').DataTable({
        // Set initial page length
        pageLength: 25,
        
        // Configure length menu options
        lengthMenu: [
            [25, 50, 100, -1],
            [25, 50, 100, "Todos"]
        ],
        
        // Order by fecha (date) column descending
        order: [[5, 'desc']],
        
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
                targets: [1], // Fecha column
                render: function(data, type, row) {
                    if (type === 'display') {
                        // Parse the date parts manually to avoid timezone issues
                        if (data) {
                            // Split the date string (format: YYYY-MM-DD)
                            var parts = data.split('-');
                            // Create date string in local format (DD/MM/YYYY)
                            if (parts.length === 3) {
                                return parts[2] + '/' + parts[1] + '/' + parts[0];
                            }
                        }
                        return data; // Return original if parsing fails
                    }
                    return data;
                }
            },
            {
                targets: [5], // Status column
                orderable: true,
                searchable: true
            },
            {
                targets: [1], // Actions column
                orderable: false,
                searchable: false
            }
        ]
    });
});
</script>

<!-- JavaScript for Edit and Delete buttons -->
<script>
$(document).ready(function() {
    var newPartoModalEl = document.getElementById('newPartoModal');
    var tagIdInput = document.getElementById('new_tagid');

    // --- Pre-fill Tag ID when New Parto Modal opens --- 
    if (newPartoModalEl && tagIdInput) {
        newPartoModalEl.addEventListener('show.bs.modal', function (event) {
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
        newPartoModalEl.addEventListener('hidden.bs.modal', function (event) {
            tagIdInput.value = ''; 
            // Optionally reset form validation state
            $('#newPartoForm').removeClass('was-validated'); 
            document.getElementById('newPartoForm').reset(); // Reset other fields too
        });
    }
    // --- End Pre-fill Logic ---
    
    // Handle new entry form submission
    $('#saveNewParto').click(function() {
        // Validate the form
        var form = document.getElementById('newPartoForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        
        // Get form data
        var formData = {
            tagid: $('#new_tagid').val(),
            numero: $('#new_numero').val(),
            fecha: $('#new_fecha').val()
        };
        
        // Show confirmation dialog using SweetAlert2
        Swal.fire({
            title: '¿Confirmar registro?',
            text: `¿Desea registrar la parto numero ${formData.numero} para el animal con Tag ID ${formData.tagid}?`,
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
                    url: 'process_parto.php',
                    type: 'POST',
                    data: {
                        action: 'insert',
                        tagid: formData.tagid,
                        numero: formData.numero,
                        fecha: formData.fecha
                    },
                    success: function(response) {
                        // Close the modal
                        var modal = bootstrap.Modal.getInstance(document.getElementById('newPartoModal'));
                        modal.hide();
                        
                        // Show success message
                        Swal.fire({
                            title: '¡Registro exitoso!',
                            text: 'El registro de parto ha sido guardado correctamente',
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
    $('.edit-parto').click(function() {
        var id = $(this).data('id');
        var tagid = $(this).data('tagid');
        var numero = $(this).data('numero');
        var fecha = $(this).data('fecha');
        
        // Edit Parto Modal dialog for editing

        var modalHtml = `
        <div class="modal fade" id="editPartoModal" tabindex="-1" aria-labelledby="editPartoModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPartoModalLabel">
                            <i class="fas fa-weight me-2"></i>Editar Dosis de Parto
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editPartoForm">
                            <input type="hidden" name="id" id="edit_id" value="${id}">
                            <div class="mb-2">                                
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                            <label for="edit_fecha" class="form-label">Fecha</label>
                                            <input type="date" class="form-control" id="edit_fecha" value="${fecha}" required>
                                        </span>
                                    </div>
                                </div>                            
                            <div class="mb-2">                                
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-tag"></i>
                                        <label for="edit_tagid" class="form-label"> Tag ID </label>
                                        <input type="text" class="form-control" id="edit_tagid" value="${tagid}" readonly>
                                    </span>                                    
                                </div>
                            </div>
                            <div class="mb-2">                            
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-syringe"></i>
                                        <label for="edit_numero" class="form-label">Numero</label>                                    
                                        <input type="text" class="form-control" id="edit_numero" value="${numero}" required>
                                    </span>                                    
                                </div>
                            </div>                     
                        </form>
                    </div>
                    <div class="modal-footer btn-group">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Cancelar
                        </button>
                        <button type="button" class="btn btn-success" id="saveEditParto">
                            <i class="fas fa-save me-1"></i>Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>`;
        
        // Remove any existing modal
        $('#editPartoModal').remove();
        
        // Add the modal to the page
        $('body').append(modalHtml);
        
        // Show the modal
        var editModal = new bootstrap.Modal(document.getElementById('editPartoModal'));
        editModal.show();
        
        // Handle save button click
        $('#saveEditParto').click(function() {
            var formData = {
                id: $('#edit_id').val(),
                tagid: $('#edit_tagid').val(),
                numero: $('#edit_numero').val(),
                fecha: $('#edit_fecha').val()
            };
            
            // Show confirmation dialog
            Swal.fire({
                title: '¿Guardar cambios?',
                text: `¿Desea actualizar la parto numero ${formData.numero} para el animal con Tag ID ${formData.tagid}?`,
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
                        url: 'process_parto.php',
                        type: 'POST',
                        data: {
                            action: 'update',
                            id: formData.id,
                            tagid: formData.tagid,
                            numero: formData.numero,
                            fecha: formData.fecha
                        },
                        success: function(response) {
                            // Close the modal
                            editModal.hide();
                            
                            // Show success message
                            Swal.fire({
                                title: '¡Actualización exitosa!',
                                text: 'La parto numero ${formData.numero} ha sido actualizada correctamente',
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
});
</script>



<!-- Chart Section -->
<div class="container mt-5 mb-5">
    <div class="card shadow-lg">
        <div class="card-header bg-gradient-warning text-dark">
            <h5 class="mb-0">
                <i class="fas fa-chart-line me-2"></i>
                Historial Mensual de Partos
            </h5>
        </div>
        <div class="card-body">
            <div class="chart-container" style="position: relative; height:60vh; width:100%">
                <canvas id="partoChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Chart -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctxParto = document.getElementById('partoChart').getContext('2d');
    const partoLabels = <?php echo $chartLabelsJson; ?>;
    const partoData = <?php echo $chartDataJson; ?>;

    // Create beautiful gradient for professional look
    const gradient = ctxParto.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(255, 193, 7, 0.8)'); // Warning yellow at top
    gradient.addColorStop(1, 'rgba(255, 193, 7, 0.1)'); // Faint yellow at bottom

    // Create secondary gradient for line
    const lineGradient = ctxParto.createLinearGradient(0, 0, 0, 400);
    lineGradient.addColorStop(0, 'rgba(255, 193, 7, 1)'); // Solid warning yellow
    lineGradient.addColorStop(1, 'rgba(224, 168, 0, 1)'); // Darker warning yellow

    new Chart(ctxParto, {
        type: 'line',
        data: {
            labels: partoLabels,
            datasets: [{
                label: 'Número de Partos por Mes',
                data: partoData,
                borderColor: lineGradient,
                backgroundColor: gradient,
                borderWidth: 4,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: 'rgba(255, 193, 7, 1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 3,
                pointRadius: 8,
                pointHoverRadius: 12,
                pointHoverBackgroundColor: 'rgba(255, 193, 7, 1)',
                pointHoverBorderColor: '#fff',
                pointHoverBorderWidth: 4,
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
                title: {
                    display: false // Title is now in the card header
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
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.parsed.y + ' partos';
                            }
                            return '🐄 ' + label;
                        },
                        title: function(tooltipItems) {
                            return '📅 Mes: ' + tooltipItems[0].label;
                        }
                    }
                },
                datalabels: {
                    display: false // Keep datalabels off for a cleaner look
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Período (Año-Mes)',
                        color: '#333',
                        font: {
                            size: 14,
                            weight: 'bold',
                            family: 'Arial, sans-serif'
                        },
                        padding: 20
                    },
                    ticks: {
                        color: '#666',
                        font: {
                            size: 12,
                            weight: '500',
                            family: 'Arial, sans-serif'
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
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad de Partos',
                        color: '#333',
                        font: {
                            size: 14,
                            weight: 'bold',
                            family: 'Arial, sans-serif'
                        },
                        padding: 20
                    },
                    ticks: {
                        color: '#666',
                        font: {
                            size: 12,
                            weight: '500',
                            family: 'Arial, sans-serif'
                        },
                        padding: 10,
                        stepSize: Math.max(1, Math.ceil(Math.max(...partoData) / 5)),
                        precision: 0
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
});
</script>
<script>
// Wait for the document to be fully loaded
$(document).ready(function() {
    // Add click event listener to all delete-parto buttons
    $(document).on('click', '.delete-parto', function(e) {
        e.preventDefault();
        
        // Get the ID from the data-id attribute
        const partoId = $(this).data('id');
        
        // Show confirmation dialog using SweetAlert2
        Swal.fire({
            title: '¿Está seguro?',
            text: "Esta acción no se puede revertir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            // If user confirms the deletion
            if (result.isConfirmed) {
                // Send AJAX request to delete the record
                $.ajax({
                    url: 'process_parto.php',
                    type: 'POST',
                    dataType: 'json', // Explicitly tell jQuery to expect JSON
                    data: {
                        id: partoId,
                        action: 'delete'
                    },
                    success: function(data) {
                        // No need to parse again, jQuery does it automatically
                        if (data.success) {
                            // Show success message
                            Swal.fire(
                                'Eliminado!',
                                'El registro ha sido eliminado.',
                                'success'
                            ).then(() => {
                                // Reload the page
                                location.reload();
                            });
                        } else {
                            // Show error message
                            Swal.fire(
                                'Error!',
                                data.message || 'No se pudo eliminar el registro.',
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        // Show error message for AJAX error
                        let errorMessage = 'Error de conexión';
                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.message) {
                                errorMessage = response.message;
                            }
                        } catch (e) {
                            errorMessage += ': ' + error;
                        }
                        
                        Swal.fire(
                            'Error!',
                            errorMessage,
                            'error'
                        );
                        console.error('AJAX error:', xhr.responseText);
                    }
                });
            }
        });
    });
});
</script>
