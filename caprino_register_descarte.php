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
<title>Caprino Register Descarte</title>
<!-- Link to the Favicon -->
<link rel="icon" href="images/Ganagram_New_Logo-png.png" type="image/x-icon">
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
  REGISTROS DE DESCARTE
  </h3>
  
  <!-- New Descarte Entry Modal -->
  
  <div class="modal fade" id="newDescarteModal" tabindex="-1" aria-labelledby="newDescarteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDescarteModalLabel">
                    <i class="fas fa-plus-circle me-2"></i>Nuevo Registro Descarte
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="newDescarteForm">
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
                <button type="button" class="btn btn-success" id="saveNewDescarte">
                    <i class="fas fa-save me-1"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>
  
  <!-- DataTable for caprinoTable records -->
  
  <!-- Discarded Animals Table -->
  <div class="container table-section mb-4" style="display: block;">
      <h4 class="text-dark mb-3">
          <i class="fas fa-times-circle me-2"></i>Animales en Descarte
      </h4>
      <div class="table-responsive">
          <table id="discardedAnimalsTable" class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">Imagen</th>
                      <th class="text-center">Acciones</th>
                      <th class="text-center">Estatus</th>
                      <th class="text-center">Nombre</th>                    
                      <th class="text-center">Tag ID</th>
                      <th class="text-center">Fecha Descarte</th>
                      <th class="text-center">Peso (Kg)</th>                      
                      <th class="text-center">Precio ($)</th>                      
                  </tr>
              </thead>
              <tbody>
                  <?php
                  try {
                      // Query to get discarded animals
                      $discardedQuery = "SELECT *
                                FROM caprino
                                WHERE estatus = 'Descarte'
                                ORDER BY descarte_fecha DESC";
                      $stmt = $conn->prepare($discardedQuery);
                      $stmt->execute();
                      $discardedData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      
                      // If no data, display a message with proper column structure
                      if (empty($discardedData)) {
                          echo "<tr>";
                          echo "<td class='text-center'>-</td>";
                          echo "<td class='text-center'>-</td>";
                          echo "<td class='text-center'>-</td>";
                          echo "<td class='text-center'>No hay animales en descarte</td>";
                          echo "<td class='text-center'>-</td>";
                          echo "<td class='text-center'>-</td>";
                          echo "<td class='text-center'>-</td>";
                          echo "<td class='text-center'>-</td>";
                          echo "</tr>";
                      } else {
                          foreach ($discardedData as $row) {
                              echo "<tr>";
                              
                              // Add image column
                              echo '<td class="text-center">';
                              if (!empty($row['image'])) {
                                  echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Imagen del animal" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                              } else {
                                  echo '<img src="images/vaca.png" alt="Imagen por defecto" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                              }
                              echo '</td>';
                              
                              // Add action buttons (edit and delete only)
                              echo '<td class="text-center">
                                  <div class="btn-group" role="group">
                                      <button class="btn btn-warning btn-sm edit-descarte" 
                                          data-id="' . htmlspecialchars($row['id'] ?? '') . '"
                                          data-tagid="' . htmlspecialchars($row['tagid'] ?? '') . '"
                                          data-fecha="' . htmlspecialchars($row['descarte_fecha'] ?? '') . '"
                                          data-peso="' . htmlspecialchars($row['descarte_peso'] ?? '') . '"
                                          data-precio="' . htmlspecialchars($row['descarte_precio'] ?? '') . '">
                                          <i class="fas fa-edit"></i>
                                      </button>
                                      <button class="btn btn-danger btn-sm delete-descarte" 
                                          data-id="' . htmlspecialchars($row['id'] ?? '') . '">
                                          <i class="fas fa-trash"></i>
                                      </button>
                                  </div>
                              </td>';
                              
                              echo "<td class='text-center'>" . htmlspecialchars($row['estatus'] ?? '') . "</td>";
                              echo "<td class='text-center'>" . htmlspecialchars($row['nombre'] ?? 'N/A') . "</td>";
                              echo "<td class='text-center'>" . htmlspecialchars($row['tagid'] ?? '') . "</td>";
                              echo "<td class='text-center'>" . htmlspecialchars($row['descarte_fecha'] ?? 'N/A') . "</td>";
                              echo "<td class='text-center'>" . htmlspecialchars($row['descarte_peso'] ?? 'N/A') . "</td>";
                              echo "<td class='text-center'>" . htmlspecialchars($row['descarte_precio'] ?? 'N/A') . "</td>";
                              echo "</tr>";
                          }
                      }
                  } catch (PDOException $e) {
                      error_log("Error in discarded animals table: " . $e->getMessage());
                      echo "<tr>";
                      echo "<td class='text-center'>-</td>";
                      echo "<td class='text-center'>-</td>";
                      echo "<td class='text-center'>-</td>";
                      echo "<td class='text-center'>Error al cargar los datos: " . $e->getMessage() . "</td>";
                      echo "<td class='text-center'>-</td>";
                      echo "<td class='text-center'>-</td>";
                      echo "<td class='text-center'>-</td>";
                      echo "<td class='text-center'>-</td>";
                      echo "</tr>";
                  }
                  ?>
              </tbody>
          </table>
      </div>
  </div>

  <!-- Active Animals Table -->
  <div class="container table-section mb-4" style="display: block;">
      <h4 class="text-dark mb-3">
          <i class="fas fa-heart me-2"></i>Animales Activos
      </h4>
      <div class="table-responsive">
          <table id="activeAnimalsTable" class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">Imagen</th>
                      <th class="text-center">Acciones</th>
                      <th class="text-center">Estatus</th>
                      <th class="text-center">Nombre</th>                    
                      <th class="text-center">Tag ID</th>
                      <th class="text-center">F. Nacimiento</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  try {
                      // Query to get active animals
                      $activeQuery = "SELECT *
                                FROM caprino
                                WHERE estatus = 'Activo'
                                ORDER BY fecha_nacimiento DESC";
                      $stmt = $conn->prepare($activeQuery);
                      $stmt->execute();
                      $activeData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      
                      // If no data, display a message with proper column structure
                      if (empty($activeData)) {
                          echo "<tr>";
                          echo "<td class='text-center'>-</td>";
                          echo "<td class='text-center'>-</td>";
                          echo "<td class='text-center'>-</td>";
                          echo "<td class='text-center'>No hay animales activos</td>";
                          echo "<td class='text-center'>-</td>";
                          echo "<td class='text-center'>-</td>";
                          echo "</tr>";
                      } else {
                          foreach ($activeData as $row) {
                              echo "<tr>";
                              
                              // Add image column
                              echo '<td class="text-center">';
                              if (!empty($row['image'])) {
                                  echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Imagen del animal" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                              } else {
                                  echo '<img src="images/vaca.png" alt="Imagen por defecto" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                              }
                              echo '</td>';
                              
                              // Add action buttons (add new discard record, edit, delete)
                              echo '<td class="text-center">
                                  <div class="btn-group" role="group">
                                      <button class="btn btn-dark btn-sm register-descarte" 
                                          data-tagid="' . htmlspecialchars($row['tagid'] ?? '') . '"
                                          title="Agregar registro de descarte">
                                          <i class="fas fa-plus"></i>
                                      </button>
                                      <button class="btn btn-warning btn-sm edit-descarte" 
                                          data-id="' . htmlspecialchars($row['id'] ?? '') . '"
                                          data-tagid="' . htmlspecialchars($row['tagid'] ?? '') . '"
                                          data-fecha="' . htmlspecialchars($row['fecha_nacimiento'] ?? '') . '"
                                          data-peso="' . htmlspecialchars($row['descarte_peso'] ?? '') . '"
                                          data-precio="' . htmlspecialchars($row['descarte_precio'] ?? '') . '">
                                          <i class="fas fa-edit"></i>
                                      </button>
                                      <button class="btn btn-danger btn-sm delete-descarte" 
                                          data-id="' . htmlspecialchars($row['id'] ?? '') . '">
                                          <i class="fas fa-trash"></i>
                                      </button>
                                  </div>
                              </td>';
                              
                              echo "<td class='text-center'>" . htmlspecialchars($row['estatus'] ?? '') . "</td>";
                              echo "<td class='text-center'>" . htmlspecialchars($row['nombre'] ?? 'N/A') . "</td>";
                              echo "<td class='text-center'>" . htmlspecialchars($row['tagid'] ?? '') . "</td>";
                              echo "<td class='text-center'>" . htmlspecialchars($row['fecha_nacimiento'] ?? 'N/A') . "</td>";
                              echo "</tr>";
                          }
                      }
                  } catch (PDOException $e) {
                      error_log("Error in active animals table: " . $e->getMessage());
                      echo "<tr>";
                      echo "<td class='text-center'>-</td>";
                      echo "<td class='text-center'>-</td>";
                      echo "<td class='text-center'>-</td>";
                      echo "<td class='text-center'>Error al cargar los datos: " . $e->getMessage() . "</td>";
                      echo "<td class='text-center'>-</td>";
                      echo "<td class='text-center'>-</td>";
                      echo "</tr>";
                  }
                  ?>
              </tbody>
          </table>
      </div>
  </div>
</div>

<!-- Initialize DataTables for both tables -->
<script>
$(document).ready(function() {
    // Initialize Discarded Animals DataTable
    $('#discardedAnimalsTable').DataTable({
        // Set initial page length
        pageLength: 10,
        
        // Disable auto width calculation to prevent column count issues
        autoWidth: false,
        
        // Configure length menu options
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Todos"]
        ],
        
        // Order by descarte fecha (date) column descending
        order: [[5, 'desc']], // Fecha Descarte column (6th column, 0-indexed)
        
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
                targets: [5], // Fecha Descarte column (6th column, 0-indexed)
                render: function(data, type, row) {
                    if (type === 'display' && data !== 'N/A') {
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
                targets: [1], // Actions column (2nd column, 0-indexed)
                orderable: false,
                searchable: false
            }
        ]
    });

    // Initialize Active Animals DataTable
    $('#activeAnimalsTable').DataTable({
        // Set initial page length
        pageLength: 10,
        
        // Disable auto width calculation to prevent column count issues
        autoWidth: false,
        
        // Configure length menu options
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Todos"]
        ],
        
        // Order by fecha nacimiento (date) column descending
        order: [[5, 'desc']], // F. Nacimiento column (6th column, 0-indexed)
        
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
                targets: [5], // F. Nacimiento column (6th column, 0-indexed)
                render: function(data, type, row) {
                    if (type === 'display' && data !== 'N/A') {
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
                targets: [1], // Actions column (2nd column, 0-indexed)
                orderable: false,
                searchable: false
            }
        ]
    });
    
    // Error handling for column count issues in discarded animals table
    try {
        const discardedTable = $('#discardedAnimalsTable').DataTable();
        const columnCount = discardedTable.columns().count();
        const expectedColumns = 8; // Discarded animals table has 8 columns
        
        if (columnCount !== expectedColumns) {
            console.warn(`Column count mismatch in discarded table: Expected ${expectedColumns}, got ${columnCount}`);
            // Force table redraw
            discardedTable.columns.adjust().draw();
        }
    } catch (error) {
        console.error('Error checking discarded table column count:', error);
    }
    
    // Error handling for column count issues in active animals table
    try {
        const activeTable = $('#activeAnimalsTable').DataTable();
        const columnCount = activeTable.columns().count();
        const expectedColumns = 6; // Active animals table has 6 columns
        
        if (columnCount !== expectedColumns) {
            console.warn(`Column count mismatch in active table: Expected ${expectedColumns}, got ${columnCount}`);
            // Force table redraw
            activeTable.columns.adjust().draw();
        }
    } catch (error) {
        console.error('Error checking active table column count:', error);
    }
});
</script>

<!-- JavaScript for Edit and Delete buttons -->
<script>
$(document).ready(function() {
    // Add handler for register-descarte button
    $('.register-descarte').click(function() {
        var tagid = $(this).data('tagid');
        
        // Populate the tagid field in the newDescarteModal
        $('#new_tagid').val(tagid);
        
        // Show the modal
        var newDescarteModal = new bootstrap.Modal(document.getElementById('newDescarteModal'));
        newDescarteModal.show();
    });

    // Handle new entry form submission
    $('#saveNewDescarte').click(function() {
        // Validate the form
        var form = document.getElementById('newDescarteForm');
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
            text: `¿Desea registrar el descarte para el animal con Tag ID ${formData.tagid}? Esto marcará el animal como "Descarte".`,
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
                    url: 'process_descarte.php',
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
                        var modal = bootstrap.Modal.getInstance(document.getElementById('newDescarteModal'));
                        modal.hide();
                        
                        // Show success message
                        Swal.fire({
                            title: '¡Registro exitoso!',
                            text: 'El registro de descarte ha sido guardado correctamente',
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
    $('.edit-descarte').click(function() {
        var id = $(this).data('id');
        var tagid = $(this).data('tagid');
        var peso = $(this).data('peso');
        var precio = $(this).data('precio');
        var fecha = $(this).data('fecha');
        
        // Edit Descarte Modal dialog for editing

        var modalHtml = `
        <div class="modal fade" id="editDescarteModal" tabindex="-1" aria-labelledby="editDescarteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDescarteModalLabel">
                            <i class="fas fa-weight me-2"></i>Editar Descarte
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editDescarteForm">
                            <input type="hidden" id="edit_id" value="${id}">
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
                                        <i class="fa-solid fa-weight"></i>
                                        <label for="edit_peso" class="form-label">Peso (kg)</label>                                    
                                        <input type="text" class="form-control" id="edit_peso" value="${peso}" required>
                                    </span>                                    
                                </div>
                            </div>
                            <div class="mb-2">                            
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        <label for="edit_precio" class="form-label">Precio ($/Kg)</label>                                    
                                        <input type="text" class="form-control" id="edit_precio" value="${precio}" required>
                                    </span>                                    
                                </div>
                            </div>                                                 
                        </form>
                    </div>
                    <div class="modal-footer btn-group">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Cancelar
                        </button>
                        <button type="button" class="btn btn-success" id="saveEditDescarte">
                            <i class="fas fa-save me-1"></i>Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>`;
        
        // Remove any existing modal
        $('#editDescarteModal').remove();
        
        // Add the modal to the page
        $('body').append(modalHtml);
        
        // Show the modal
        var editModal = new bootstrap.Modal(document.getElementById('editDescarteModal'));
        editModal.show();
        
        // Handle save button click
        $('#saveEditDescarte').click(function() {
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
                text: `¿Desea actualizar el descarte para el animal con Tag ID ${formData.tagid}?`,
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
                        url: 'process_descarte.php',
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
                                text: 'El descarte para el animal con Tag ID ${formData.tagid} ha sido actualizado correctamente',
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
    $('.delete-descarte').click(function() {
        var id = $(this).data('id');
        var tagid = $(this).data('tagid');
        
        // Confirm before deleting using SweetAlert2
        Swal.fire({
            title: '¿Eliminar descarte?',
            text: `¿Está seguro de que desea eliminar el descarte para el animal con Tag ID ${tagid}? Esta acción no se puede deshacer.`,
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
                    url: 'process_descarte.php',
                    type: 'POST',
                    data: {
                        action: 'delete',
                        id: id
                    },
                    success: function(response) {
                        // Show success message
                        Swal.fire({
                            title: '¡Eliminado!',
                            text: 'El descarte para el animal con Tag ID ${tagid} ha sido eliminado correctamente',
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

<!-- Descarte Line Chart Section -->

<div class="container mt-5 mb-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-warning text-dark d-flex align-items-center justify-content-between">
            <h5 class="mb-0">
                                 <i class="fas fa-chart-bar me-2"></i>
                 Evolución de Descartes - Valor Mensual y Cantidad de Animales (Barras + Línea)
            </h5>
        </div>
        <div class="card-body p-4">
            <!-- Enhanced time filter with professional styling -->
            <div class="row mb-4">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <label for="dataRangeFilter" class="form-label fw-bold text-muted mb-2">
                        <i class="fas fa-calendar-alt me-2"></i>Período de Tiempo:
                    </label>
                    <select id="dataRangeFilter" class="form-select form-select-lg bg-white border-0 shadow-sm">
                        <option value="all">Todos los meses</option>
                        <option value="12" selected>Últimos 12 meses</option>
                        <option value="6">Últimos 6 meses</option>
                        <option value="3">Últimos 3 meses</option>
                    </select>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="chart-container">
                <canvas id="descarteChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Professional CSS Styling for Descarte Chart -->
<style>
/* Gradient backgrounds */
.bg-gradient-warning {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%) !important;
}

.bg-gradient-success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

.bg-gradient-info {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%) !important;
}

.bg-gradient-purple {
    background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%) !important;
}

/* Chart container styling */
.chart-container {
    position: relative;
    height: 70vh;
    width: 100%;
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.chart-container.loading::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 50px;
    height: 50px;
    margin: -25px 0 0 -25px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #ffc107;
    border-radius: 50%;
    animation: spin 1.2s linear infinite;
    z-index: 1000;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Card styling */
.card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15) !important;
}

.card-header {
    border-bottom: none;
    padding: 1.75rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%) !important;
}

.card-body {
    padding: 2.5rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

/* Enhanced form controls */
.form-select {
    border-radius: 12px;
    font-weight: 600;
    min-width: 180px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.form-select:focus {
    box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
    border-color: #ffc107;
    transform: translateY(-2px);
}

.form-select:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.form-label {
    font-size: 1.1rem;
    color: #495057;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

/* Canvas styling */
canvas {
    border-radius: 12px;
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

canvas:hover {
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .chart-container {
        height: 60vh;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .card-header {
        padding: 1.25rem;
    }
    
    .form-select {
        min-width: 140px;
        font-size: 0.9rem;
    }
    
    .form-label {
        font-size: 1rem;
    }
}

/* Enhanced shadows and effects */
.shadow-lg {
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
}

/* Typography enhancements */
h5 {
    font-weight: 700;
    letter-spacing: 0.4px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Loading state */
.chart-container.loading canvas {
    opacity: 0.4;
    transition: opacity 0.3s ease;
}

/* Animation for chart elements */
.chart-container {
    animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Enhanced hover effects */
.card:hover .card-header {
    background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%) !important;
}

/* Smooth transitions */
* {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Professional color scheme */
.text-muted {
    color: #6c757d !important;
}

.fw-bold {
    font-weight: 700 !important;
}

/* Enhanced form styling */
.form-select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
}
</style>

<!-- Chart.js Script for Descarte Mixed Chart (Bar + Line) -->
<script>
$(document).ready(function() {
    let allDescarteData = [];
    let descarteChart = null;
    
    // Add loading state to chart container
    $('.chart-container').addClass('loading');
    
    // Fetch discount data and create the chart
    $.ajax({
        url: 'get_descarte_monthly_data.php',
        type: 'GET',
        dataType: 'json',
        beforeSend: function() {
            $('.chart-container').addClass('loading');
        },
        success: function(response) {
            $('.chart-container').removeClass('loading');
            
            if (response.error) {
                console.error('Server error:', response.message);
                $('#descarteChart').after('<div class="alert alert-danger shadow-sm border-0">Error al cargar datos: ' + response.message + '</div>');
                return;
            }
            
            // Debug data received from server
            console.log('Monthly Descarte data received:', response);
            
            if (!response.data || response.data.length === 0) {
                console.warn('No descarte data received from server');
                $('#descarteChart').after('<div class="alert alert-warning shadow-sm border-0">No hay datos de descartes disponibles.</div>');
                return;
            }
            
            // Log data structure to help with debugging
            if (response.data.length > 0) {
                console.log('Sample month data:', response.data[0]);
            }
            
            allDescarteData = response.data;
            createDescarteChart(response.data);
            
            // Add event listener for the data range filter
            $('#dataRangeFilter').on('change', function() {
                updateChart();
            });
        },
        error: function(xhr, status, error) {
            $('.chart-container').removeClass('loading');
            console.error('Error fetching descarte data:', error);
            $('#descarteChart').after('<div class="alert alert-danger shadow-sm border-0">Error al cargar datos de descartes: ' + error + '</div>');
        }
    });
    
    function updateChart() {
        const selectedRange = $('#dataRangeFilter').val();
        
        let filteredData = [...allDescarteData];
        
        // Sort data by date (though it should already be sorted)
        filteredData.sort((a, b) => a.month_year.localeCompare(b.month_year));
        
        // Apply range filter to months
        if (selectedRange !== 'all' && filteredData.length > parseInt(selectedRange)) {
            // Keep only the most recent X months
            filteredData = filteredData.slice(-parseInt(selectedRange));
        }
        
        // Check if we have data after filtering
        if (filteredData.length === 0) {
            if (descarteChart) {
                descarteChart.destroy();
                descarteChart = null;
            }
            $('.alert').remove();
            $('#descarteChart').after('<div class="alert alert-warning shadow-sm border-0">No hay datos para el período seleccionado.</div>');
            return;
        }
        
        // Update chart with filtered data
        updateChartData(filteredData);
    }
    
    function updateChartData(data) {
        if (descarteChart) {
            descarteChart.destroy();
        }
        $('.alert').remove(); // Remove any previous alert messages
        createDescarteChart(data);
    }
    
    function createDescarteChart(data) {
        var ctx = document.getElementById('descarteChart').getContext('2d');
        
        // Create professional gradients
        const valueGradient = ctx.createLinearGradient(0, 0, 0, 400);
        valueGradient.addColorStop(0, 'rgba(255, 193, 7, 0.9)');
        valueGradient.addColorStop(0.5, 'rgba(255, 193, 7, 0.6)');
        valueGradient.addColorStop(1, 'rgba(255, 193, 7, 0.2)');

        const countGradient = ctx.createLinearGradient(0, 0, 0, 400);
        countGradient.addColorStop(0, 'rgba(220, 53, 69, 0.9)');
        countGradient.addColorStop(0.5, 'rgba(220, 53, 69, 0.6)');
        countGradient.addColorStop(1, 'rgba(220, 53, 69, 0.2)');

        const lineGradient = ctx.createLinearGradient(0, 0, 0, 400);
        lineGradient.addColorStop(0, 'rgba(220, 53, 69, 1)');
        lineGradient.addColorStop(1, 'rgba(255, 193, 7, 1)');
        
        // Extract the data for the chart
        var months = data.map(item => item.display_date);
        var totalValues = data.map(item => item.total_value);
        var animalCounts = data.map(item => item.discount_count);
        
                 // Create the chart
         descarteChart = new Chart(ctx, {
             type: 'bar',
            data: {
                labels: months,
                datasets: [
                    {
                        label: '💰 Valor Total de Descartes',
                        data: totalValues,
                        backgroundColor: valueGradient,
                        borderColor: 'rgba(255, 193, 7, 1)',
                        borderWidth: 3,
                        borderRadius: 8,
                        borderSkipped: false,
                        yAxisID: 'y',
                        pointBackgroundColor: 'rgba(255, 193, 7, 1)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 3,
                        pointRadius: 8,
                        pointHoverRadius: 12,
                        pointHoverBackgroundColor: 'rgba(255, 193, 7, 1)',
                        pointHoverBorderColor: '#fff',
                        pointHoverBorderWidth: 4
                    },
                                         {
                         label: '🐄 Número de Animales',
                         data: animalCounts,
                         type: 'line',
                         backgroundColor: 'transparent',
                         borderColor: 'rgba(220, 53, 69, 1)',
                         borderWidth: 3,
                         pointBackgroundColor: 'rgba(220, 53, 69, 1)',
                         pointBorderColor: '#fff',
                         pointRadius: 6,
                         pointHoverRadius: 10,
                         pointHoverBackgroundColor: 'rgba(220, 53, 69, 1)',
                         pointHoverBorderColor: '#fff',
                         pointHoverBorderWidth: 3,
                         tension: 0.4,
                         fill: false,
                         yAxisID: 'y1'
                     }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2500,
                    easing: 'easeInOutQuart',
                    onProgress: function(animation) {
                        const chart = animation.chart;
                        const ctx = chart.ctx;
                        const dataset = chart.data.datasets[0];
                        const meta = chart.getDatasetMeta(0);
                        
                        if (meta.data.length > 0) {
                            const lastPoint = meta.data[meta.data.length - 1];
                            if (lastPoint) {
                                ctx.save();
                                ctx.shadowColor = 'rgba(255, 193, 7, 0.6)';
                                ctx.shadowBlur = 25;
                                ctx.shadowOffsetX = 0;
                                ctx.shadowOffsetY = 0;
                                ctx.restore();
                            }
                        }
                    },
                    onComplete: function(animation) {
                        const chart = animation.chart;
                        const ctx = chart.ctx;
                        ctx.shadowBlur = 0;
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    y: {
                        type: 'linear',
                        position: 'left',
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Valor Total ($)',
                            color: '#495057',
                            font: {
                                size: 14,
                                weight: '700',
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            },
                            padding: {
                                bottom: 15
                            }
                        },
                        ticks: {
                            color: '#6c757d',
                            font: {
                                size: 12,
                                weight: '600',
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            },
                            padding: 10,
                            callback: function(value) {
                                return '$' + value.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.08)',
                            lineWidth: 1,
                            drawBorder: false
                        },
                        border: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            width: 1
                        }
                    },
                    y1: {
                        type: 'linear',
                        position: 'right',
                        beginAtZero: true,
                        grid: {
                            drawOnChartArea: false // only show grid for the left y-axis
                        },
                        title: {
                            display: true,
                            text: 'Número de Animales',
                            color: '#495057',
                            font: {
                                size: 14,
                                weight: '700',
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            },
                            padding: {
                                bottom: 15
                            }
                        },
                        ticks: {
                            color: '#6c757d',
                            font: {
                                size: 12,
                                weight: '600',
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            },
                            padding: 10,
                            stepSize: 1
                        },
                        border: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            width: 1
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Mes/Año',
                            color: '#495057',
                            font: {
                                size: 14,
                                weight: '700',
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            },
                            padding: {
                                top: 15
                            }
                        },
                        ticks: {
                            color: '#6c757d',
                            font: {
                                size: 12,
                                weight: '600',
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            },
                            padding: 10
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.08)',
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
                            padding: 25,
                            font: {
                                size: 14,
                                weight: '700',
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            },
                            color: '#495057',
                            generateLabels: function(chart) {
                                const data = chart.data;
                                if (data.labels.length && data.datasets.length) {
                                    return data.datasets.map((dataset, i) => ({
                                        text: dataset.label,
                                        fillStyle: dataset.backgroundColor,
                                        strokeStyle: dataset.borderColor,
                                        lineWidth: 0,
                                        hidden: false,
                                        index: i
                                    }));
                                }
                                return [];
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.95)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: {
                            size: 16,
                            weight: '700',
                            family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                        },
                        bodyFont: {
                            size: 14,
                            family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                        },
                        padding: 18,
                        cornerRadius: 16,
                        displayColors: false,
                        borderColor: 'rgba(255, 193, 7, 0.8)',
                        borderWidth: 3,
                        callbacks: {
                            label: function(context) {
                                const index = context.dataIndex;
                                const monthData = data[index];
                                
                                if (!monthData) return [];
                                
                                // Different formatting based on dataset
                                if (context.datasetIndex === 0) {
                                    // Value dataset
                                    return '💰 Valor Total: $' + monthData.total_value.toLocaleString('es-ES', {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    });
                                } else {
                                    // Count dataset
                                    return '🐄 Número de Animales: ' + monthData.discount_count;
                                }
                            },
                            afterBody: function(context) {
                                const index = context[0].dataIndex;
                                const monthData = data[index];
                                
                                if (!monthData || !monthData.animal_details || monthData.animal_details.length === 0) return [];
                                
                                const lines = ['───────────────────', '📋 Detalle de Animales:'];
                                
                                // Show up to 5 animals in the tooltip with their values
                                const detailsToShow = monthData.animal_details.slice(0, 5);
                                
                                detailsToShow.forEach(animal => {
                                    const animalName = animal.nombre || 'Sin nombre';
                                    const animalValue = animal.value.toLocaleString('es-ES', {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    });
                                    
                                    lines.push(`${animalName} (${animal.tagid}): $${animalValue}`);
                                });
                                
                                // If there are more than 5 animals, indicate there are more
                                if (monthData.animal_details.length > 5) {
                                    lines.push(`... y ${monthData.animal_details.length - 5} más`);
                                }
                                
                                // Add average data
                                lines.push('───────────────────');
                                lines.push(`📊 Valor Promedio: $${monthData.average_value.toLocaleString('es-ES', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                })}`);
                                
                                return lines;
                            },
                            title: function(context) {
                                return '📅 ' + context[0].label;
                            }
                        }
                    },
                    title: {
                        display: false
                    }
                },
                elements: {
                    point: {
                        hoverBorderWidth: 4,
                        hoverBorderColor: '#fff'
                    },
                    line: {
                        borderWidth: 3
                    }
                }
            }
        });
    }
});
</script>