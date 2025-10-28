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
<title>Caprino Register Decesos</title>
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
  REGISTROS DE DECESOS
  </h3>
    
  <!-- New Deceso Entry Modal -->
  <div class="modal fade" id="newDecesoModal" tabindex="-1" aria-labelledby="newDecesoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDecesoModalLabel">
                    <i class="fas fa-plus-circle me-2"></i>Nuevo Registro Deceso
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="newDecesoForm">
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
                            <i class="fa-solid fa-skull-crossbones"></i>
                                <label for="new_causa" class="form-label">Causa</label>
                                <input type="text" class="form-control" id="new_causa" name="causa" required>
                            </span>                            
                        </div>
                    </div>                                                                                 
                </form>
            </div>
            <div class="modal-footer btn-group">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancelar
                </button>
                <button type="button" class="btn btn-success" id="saveNewDeceso">
                    <i class="fas fa-save me-1"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>
    <!-- Deceased Animals Table -->
  <div class="container table-section mb-4" style="display: block;">
      <h4 class="text-dark mb-3">
          <i class="fas fa-skull me-2"></i>Animales Fallecidos
      </h4>
      <div class="table-responsive">
          <table id="deceasedAnimalsTable" class="table table-striped table-bordered">
              <thead>
                  <tr>
                                             <th class="text-center">Imagen</th>
                       <th class="text-center">Acciones</th>
                       <th class="text-center">Estatus</th>
                       <th class="text-center">Nombre</th>
                       <th class="text-center">F. Muerte</th>
                       <th class="text-center">Causa</th>
                       <th class="text-center">Tag ID</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                   try {
                       // Query to get deceased animals with deceso_fecha
                       $deceasedQuery = "SELECT v.*, v.deceso_fecha as fecha_fallecimiento
                                     FROM caprino v
                                     WHERE v.estatus = 'Muerto'
                                     ORDER BY v.deceso_fecha DESC";
                       $stmt = $conn->prepare($deceasedQuery);
                       $stmt->execute();
                       $deceasedData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                       
                       // If no data, display a message
                       if (empty($deceasedData)) {
                           echo "<tr><td colspan='7' class='text-center'>No hay animales fallecidos</td></tr>";
                       } else {
                           foreach ($deceasedData as $row) {
                               echo "<tr>";
                               echo '<td class="text-center">';
                               // Check if animal has an image
                               if (!empty($row['image'])) {
                                   echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Imagen del animal" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                               } else {
                                   echo '<img src="images/vaca.png" alt="Imagen por defecto" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                               }
                               echo '</td>';
                               
                               // Add action buttons
                               echo '<td class="text-center">
                                   <div class="btn-group" role="group">
                                       <button class="btn btn-warning btn-sm edit-deceso" 
                                           data-id="' . htmlspecialchars($row['id'] ?? '') . '"
                                           data-tagid="' . htmlspecialchars($row['tagid'] ?? '') . '"
                                           data-fecha="' . htmlspecialchars($row['fecha_fallecimiento'] ?? '') . '"
                                           data-causa="' . htmlspecialchars($row['deceso_causa'] ?? '') . '">
                                           <i class="fas fa-edit"></i>
                                       </button>
                                       <button class="btn btn-danger btn-sm delete-deceso" 
                                           data-id="' . htmlspecialchars($row['id'] ?? '') . '">
                                           <i class="fas fa-trash"></i>
                                       </button>
                                   </div>
                               </td>';

                                                               echo "<td class='text-center'>" . htmlspecialchars($row['estatus'] ?? '') . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['nombre'] ?? 'N/A') . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['fecha_fallecimiento'] ?? 'N/A') . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['deceso_causa'] ?? 'N/A') . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['tagid'] ?? '') . "</td>";                            
                               echo "</tr>";
                           }
                       }
                   
                   } catch (PDOException $e) {
                       error_log("Error in deceased animals table: " . $e->getMessage());
                       echo "<tr><td colspan='7' class='text-center'>Error al cargar los datos: " . $e->getMessage() . "</td></tr>";
                   }
                   ?>
               </tbody>
           </table>
       </div>
   </div>

  <!-- Available for Deceso Table -->
  <div class="container table-section mb-4" style="display: block;">
             <h4 class="text-dark mb-3">
           <i class="fas fa-heart me-2"></i>Activos o Descarte
       </h4>
      <div class="table-responsive">
          <table id="availableDecesoTable" class="table table-striped table-bordered">
              <thead>
                  <tr>
                                             <th class="text-center">Imagen</th>
                       <th class="text-center">Acciones</th>
                       <th class="text-center">Estatus</th>
                       <th class="text-center">Nombre</th>
                       <th class="text-center">F. Nacimiento</th>
                       <th class="text-center">Tag ID</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                   try {
                       // Query to get available animals for deceso with fecha_nacimiento
                       $availableDecesoQuery = "SELECT v.*
                                     FROM caprino v
                                     WHERE v.estatus IN ('Activo', 'Descarte')
                                     ORDER BY v.estatus DESC, v.fecha_nacimiento DESC";
                       $stmt = $conn->prepare($availableDecesoQuery);
                       $stmt->execute();
                       $availableDecesoData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                       
                       // If no data, display a message
                       if (empty($availableDecesoData)) {
                           echo "<tr><td colspan='6' class='text-center'>No hay animales disponibles para deceso</td></tr>";
                       } else {
                           foreach ($availableDecesoData as $row) {
                               echo "<tr>";
                               echo '<td class="text-center">';
                               // Check if animal has an image
                               if (!empty($row['image'])) {
                                   echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Imagen del animal" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                               } else {
                                   echo '<img src="images/vaca.png" alt="Imagen por defecto" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                               }
                               echo '</td>';
                               
                               // Add action buttons
                               echo '<td class="text-center">
                                   <div class="btn-group" role="group">
                                       <button class="btn btn-dark btn-sm register-dead" 
                                           data-tagid="' . htmlspecialchars($row['tagid'] ?? '') . '">
                                           <i class="fas fa-skull"></i>
                                       </button>
                                       <button class="btn btn-warning btn-sm edit-deceso" 
                                           data-id="' . htmlspecialchars($row['id'] ?? '') . '"
                                           data-tagid="' . htmlspecialchars($row['tagid'] ?? '') . '"
                                           data-fecha="' . htmlspecialchars($row['fecha_nacimiento'] ?? '') . '"
                                           data-causa="' . htmlspecialchars($row['deceso_causa'] ?? '') . '">
                                           <i class="fas fa-edit"></i>
                                       </button>
                                       <button class="btn btn-danger btn-sm delete-deceso" 
                                           data-id="' . htmlspecialchars($row['id'] ?? '') . '">
                                           <i class="fas fa-trash"></i>
                                       </button>
                                   </div>
                               </td>';

                                                               echo "<td class='text-center'>" . htmlspecialchars($row['estatus'] ?? '') . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['nombre'] ?? 'N/A') . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['fecha_nacimiento'] ?? 'N/A') . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['tagid'] ?? '') . "</td>";                            
                               echo "</tr>";
                           }
                       }
                   
                   } catch (PDOException $e) {
                       error_log("Error in available deceso table: " . $e->getMessage());
                       echo "<tr><td colspan='6' class='text-center'>Error al cargar los datos: " . $e->getMessage() . "</td></tr>";
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
    // Initialize Deceased Animals DataTable only if there are records
    if ($('#deceasedAnimalsTable tbody tr').length > 1) { // More than just the "no records" row
        $('#deceasedAnimalsTable').DataTable({
        // Set initial page length
        pageLength: 10,
        
        // Configure length menu options
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Todos"]
        ],
        
        // Order by fecha fallecimiento (date) column descending
        order: [[5, 'desc']], // Fecha Fallecimiento column (6th column, 0-indexed)
        
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
                targets: [5], // Fecha Fallecimiento column (6th column, 0-indexed)
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
    }

    // Initialize Available Deceso DataTable only if there are records
    if ($('#availableDecesoTable tbody tr').length > 1) { // More than just the "no records" row
        $('#availableDecesoTable').DataTable({
        // Set initial page length
        pageLength: 10,
        
        // Configure length menu options
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Todos"]
        ],
        
        // Order by fecha nacimiento (date) column descending
        order: [[4, 'asc']],
        
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
                targets: [4], // F. Nacimiento column
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
                targets: [1], // Actions column
                orderable: false,
                searchable: false
            }
        ]
        });
    }
});
</script>

<!-- JavaScript for Edit and Delete buttons -->
<script>
$(document).ready(function() {
    // Handle new entry form submission
    $('#saveNewDeceso').click(function() {
        // Validate the form
        var form = document.getElementById('newDecesoForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        
        // Get form data
        var formData = {
            tagid: $('#new_tagid').val(),
            causa: $('#new_causa').val(),
            fecha: $('#new_fecha').val()
        };
        
        // Show confirmation dialog using SweetAlert2
        Swal.fire({
            title: '¿Confirmar registro?',
            text: `¿Desea registrar el deceso para el animal con Tag ID ${formData.tagid}? Esto marcará el animal como "Muerto".`,
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
                
                // Send AJAX request to update the caprino record
                $.ajax({
                    url: 'process_deceso.php',
                    type: 'POST',
                    data: {
                        action: 'update',
                        tagid: formData.tagid,
                        causa: formData.causa,
                        fecha: formData.fecha
                    },
                    success: function(response) {
                        // Close the modal
                        var modal = bootstrap.Modal.getInstance(document.getElementById('newDecesoModal'));
                        if (modal) {
                            modal.hide();
                        }
                        
                        if (response.success) {
                            // Show success message
                            Swal.fire({
                                title: '¡Registro exitoso!',
                                text: 'El registro de deceso ha sido guardado correctamente',
                                icon: 'success',
                                confirmButtonColor: '#28a745'
                            }).then(() => {
                                // Reload the page to show updated data
                                location.reload();
                            });
                        } else {
                            // Show error message
                            Swal.fire({
                                title: 'Error',
                                text: response.message || 'Ha ocurrido un error al registrar el deceso',
                                icon: 'error',
                                confirmButtonColor: '#dc3545'
                            });
                        }
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

    // Add handler for register-dead button
    $('.register-dead').click(function() {
        var tagid = $(this).data('tagid');
        
        // Populate the tagid field in the newDecesoModal
        $('#new_tagid').val(tagid);
        
        // Show the modal
        var newDecesoModal = new bootstrap.Modal(document.getElementById('newDecesoModal'));
        newDecesoModal.show();
    });

    // Handle edit button click
    $('.edit-deceso').click(function() {
        var id = $(this).data('id');
        var tagid = $(this).data('tagid');
        var causa = $(this).data('causa');
        var fecha = $(this).data('fecha');
        
        // Edit Deceso Modal dialog for editing

        var modalHtml = `
        <div class="modal fade" id="editDecesoModal" tabindex="-1" aria-labelledby="editDecesoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDecesoModalLabel">
                            <i class="fas fa-weight me-2"></i>Editar Deceso
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editDecesoForm">
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
                                        <i class="fas fa-skull-crossbones"></i>
                                        <label for="edit_causa" class="form-label">Causa</label>                                    
                                        <input type="text" class="form-control" id="edit_causa" value="${causa}" required>
                                    </span>                                    
                                </div>
                            </div>                                                 
                        </form>
                    </div>
                    <div class="modal-footer btn-group">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Cancelar
                        </button>
                        <button type="button" class="btn btn-success" id="saveEditDeceso">
                            <i class="fas fa-save me-1"></i>Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>`;
        
        // Remove any existing modal
        $('#editDecesoModal').remove();
        
        // Add the modal to the page
        $('body').append(modalHtml);
        
        // Show the modal
        var editModal = new bootstrap.Modal(document.getElementById('editDecesoModal'));
        editModal.show();
        
        // Handle save button click
        $('#saveEditDeceso').click(function() {
            var formData = {
                tagid: $('#edit_tagid').val(),
                causa: $('#edit_causa').val(),
                fecha: $('#edit_fecha').val()
            };
            
            // Show confirmation dialog
            Swal.fire({
                title: '¿Guardar cambios?',
                text: `¿Desea actualizar la información del deceso para el animal con Tag ID ${formData.tagid}?`,
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
                    
                    // Send AJAX request to update the death record
                    $.ajax({
                        url: 'process_deceso.php',
                        type: 'POST',
                        data: {
                            action: 'update',
                            tagid: formData.tagid,
                            causa: formData.causa,
                            fecha: formData.fecha
                        },
                        success: function(response) {
                            // Close the modal
                            editModal.hide();
                            
                            if (response.success) {
                                // Show success message
                                Swal.fire({
                                    title: '¡Actualización exitosa!',
                                    text: `La información del deceso para el animal con Tag ID ${formData.tagid} ha sido actualizada correctamente`,
                                    icon: 'success',
                                    confirmButtonColor: '#28a745'
                                }).then(() => {
                                    // Reload the page to show updated data
                                    location.reload();
                                });
                            } else {
                                // Show error message
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message || 'Ha ocurrido un error al actualizar la información',
                                    icon: 'error',
                                    confirmButtonColor: '#dc3545'
                                });
                            }
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
    $('.delete-deceso').click(function() {
        var id = $(this).data('id');
        var tagid = $(this).data('tagid');
        
        // Confirm before deleting using SweetAlert2
        Swal.fire({
            title: '¿Eliminar registro de deceso?',
            text: `¿Está seguro de que desea eliminar el registro de deceso para el animal con Tag ID ${tagid}? El estatus del animal volverá a "Activo".`,
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

                // Send AJAX request to delete the death record
                $.ajax({
                    url: 'process_deceso.php',
                    type: 'POST',
                    data: {
                        action: 'delete',
                        tagid: tagid
                    },
                    success: function(response) {
                        if (response.success) {
                            // Show success message
                            Swal.fire({
                                title: '¡Eliminado!',
                                text: `El registro de deceso para el animal con Tag ID ${tagid} ha sido eliminado correctamente`,
                                icon: 'success',
                                confirmButtonColor: '#28a745'
                            }).then(() => {
                                // Reload the page to show updated data
                                location.reload();
                            });
                        } else {
                            // Show error message
                            Swal.fire({
                                title: 'Error',
                                text: response.message || 'Ha ocurrido un error al eliminar el registro',
                                icon: 'error',
                                confirmButtonColor: '#dc3545'
                            });
                        }
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

<!-- Deceso Line Chart Section -->

<div class="container mt-5 mb-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Decesos</h5>
        </div>
        <div class="card-body">
                     <div class="row mb-4">
             <div class="col-md-6">
                 <h6 class="text-muted">Total de animales fallecidos por mes</h6>
             </div>
         </div>
            <div class="chart-container" style="position: relative; height:50vh; width:100%">
                <canvas id="decesoChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script for Deceso Line Chart -->
<script>
$(document).ready(function() {
    let allDecesoData = [];
    let decesoChart = null;
    
    // Fetch deceso data and create the chart
    $.ajax({
        url: 'get_deceso_data.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.error) {
                console.error('Server error:', data.error);
                return;
            }
            
            allDecesoData = data;
            createDecesoChart(data);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching deceso data:', error);
        }
    });
    
         function createDecesoChart(data) {
         var ctx = document.getElementById('decesoChart').getContext('2d');
         
         // Format the data for the chart
         var labels = data.map(function(item) {
             // Format month-year for display (e.g., "Ene 2024", "Feb 2024")
             var monthNames = [
                 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
             ];
             var parts = item.mes.split('-');
             if (parts.length === 2) {
                 var monthIndex = parseInt(parts[1]) - 1;
                 var year = parts[0];
                 return monthNames[monthIndex] + ' ' + year;
             }
             return item.mes;
         });
         
         var muertes = data.map(function(item) {
             return item.total_muertes;
         });
         
         decesoChart = new Chart(ctx, {
             type: 'bar',
             data: {
                 labels: labels,
                 datasets: [{
                     label: 'Total de Muertes',
                     data: muertes,
                     backgroundColor: 'rgba(220, 53, 69, 0.7)',
                     borderColor: 'rgba(220, 53, 69, 1)',
                     borderWidth: 2,
                     borderRadius: 4,
                     borderSkipped: false
                 }]
             },
             options: {
                 responsive: true,
                 maintainAspectRatio: false,
                 scales: {
                     y: {
                         beginAtZero: true,
                         title: {
                             display: true,
                             text: 'Número de Muertes',
                             font: {
                                 size: 14,
                                 weight: 'bold'
                             }
                         },
                         ticks: {
                             stepSize: 1,
                             callback: function(value) {
                                 return Math.floor(value);
                             }
                         }
                     },
                     x: {
                         title: {
                             display: true,
                             text: 'Mes',
                             font: {
                                 size: 14,
                                 weight: 'bold'
                             }
                         }
                     }
                 },
                 plugins: {
                     legend: {
                         display: true,
                         position: 'top'
                     },
                                           tooltip: {
                          callbacks: {
                              label: function(context) {
                                  var index = context.dataIndex;
                                  var dataPoint = data[index];
                                  
                                  var tooltipText = [
                                      'Total de Muertes: ' + context.parsed.y
                                  ];
                                  
                                  if (dataPoint && dataPoint.animales_detalle) {
                                      tooltipText.push('Animales: ' + dataPoint.animales_detalle);
                                  }
                                  
                                  return tooltipText;
                              }
                          }
                      },
                     title: {
                         display: true,
                         text: 'Muertes Mensuales por Animal',
                         font: {
                             size: 16
                         }
                     }
                 }
             }
         });
     }
});
</script>