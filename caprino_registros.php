<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Caprino  Registros</title>
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

<!-- Add these in the <head> section, after your existing CSS/JS links -->

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
    /* Modal Styling */
    .modal-content {
        border: none;
        border-radius: 0.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }
    
    .modal-header {
        background: linear-gradient(to right, #28a745, #20c997);
        color: white;
        border-bottom: none;
        padding: 1.5rem;
    }
    
    .modal-header .modal-title {
        font-weight: 600;
        font-size: 1.25rem;
    }
    
    .modal-header .btn-close {
        color: white;
        opacity: 0.8;
        transition: opacity 0.3s;
        filter: brightness(0) invert(1);
    }
    
    .modal-header .btn-close:hover {
        opacity: 1;
    }
    
    .modal-body {
        padding: 1.75rem;
        background-color: #f8f9fa;
    }
    
    .modal-footer {
        border-top: none;
        padding: 1rem 1.75rem 1.5rem;
        background-color: #f8f9fa;
    }
    
    /* Form Elements */
    .modal .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 0.5rem;
    }
    
    .modal .form-control {
        border-radius: 0.375rem;
        border: 1px solid #ced4da;
        padding: 0.75rem 1rem;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    
    .modal .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
    }
    
    .modal .form-control:hover:not(:focus) {
        border-color: #adb5bd;
    }
    
    /* Buttons */
    .modal .btn {
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        border-radius: 0.375rem;
        transition: all 0.3s;
    }
    
    .modal .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    
    .modal .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
    }
    
    .modal .btn-success:active {
        transform: translateY(0);
        box-shadow: none;
    }
    
    .modal .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    
    .modal .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }
    
    .modal .btn-secondary:active {
        transform: translateY(0);
        box-shadow: none;
    }
    
    /* Animation */
    .modal.fade .modal-dialog {
        transform: scale(0.9);
        opacity: 0;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    
    .modal.show .modal-dialog {
        transform: scale(1);
        opacity: 1;
    }
    
    /* Modal Backdrop */
    .modal-backdrop.show {
        opacity: 0.7;
        backdrop-filter: blur(3px);
    }
    
    /* Input Group */
    .input-group {
        margin-bottom: 1rem;
    }
    
    /* Input Group Text */
    .input-group-text {
        background-color: #f8f9fa;
        border-color: #ced4da;
        color: #28a745;
    }
    
    /* Focused Form Group Effect */
    .modal .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
    }
    
    /* Modal Highlight Animation on Open */
    @keyframes modalHighlight {
        0% {
            box-shadow: 0 0 0 rgba(40, 167, 69, 0);
        }
        50% {
            box-shadow: 0 0 30px rgba(40, 167, 69, 0.3);
        }
        100% {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
    }
    
    .modal.show .modal-content {
        animation: modalHighlight 0.5s ease forwards;
    }
    
    /* Hover effect for input groups */
    .modal .input-group:hover .input-group-text {
        background-color: #e9ecef;
        transition: background-color 0.3s;
    }
    
    /* Readonly fields styling */
    .modal input[readonly] {
        background-color: #e9ecef;
        cursor: not-allowed;
    }
    
    /* Form validation styles */
    .modal .form-control:invalid:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
    }
    
    /* Modal title icon */
    .modal-title i {
        margin-right: 8px;
    }

    /* Back to Top Button Styling */
    .back-to-top {
        position: fixed;
        bottom: 25px;
        right: 25px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1000;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .back-to-top.visible {
        opacity: 1;
        visibility: visible;
    }

    .back-to-top:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    }

    .back-to-top:active {
        transform: translateY(0);
    }

    @media (max-width: 768px) {
        .back-to-top {
            bottom: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
    }





    .error-message {
        background-color: #ffebee;
        color: #c62828;
        padding: 10px;
        margin: 10px 0;
        border-radius: 20px;
        border-bottom-left-radius: 5px;
    }

    .full-width-button {
        width: 100% !important;
        display: block !important;
        box-sizing: border-box !important;
    }



    /* Scroll Icons Container */
    .scroll-icons-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        overflow-y: visible;
        padding: 15px 0;
        position: relative;
        height: auto;
        -webkit-overflow-scrolling: touch;
    }

    .scroll-icons-container .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
        margin-bottom: 10px;
        width: 100%;
        padding: 0 15px;
    }







    /* Category container styling with improved spacing, vertical alignment and subtle shadows */
    .salud-container, .reproduccion-container, .poblacion-container, .alimentacion-container, .produccion-container {
        border: 2px dotted #28a745;
        border-radius: 15px;
        padding: 20px 10px 15px 10px;
        margin-bottom: 25px;
        position: relative;
        width: 95%; /* Slightly narrower than parent to show borders clearly */
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(248, 249, 250, 0.9));
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center; /* Center items vertically */
        box-shadow: 
            0px 4px 8px rgba(0, 0, 0, 0.06),
            0px 2px 4px rgba(0, 0, 0, 0.04),
            inset 0px 1px 2px rgba(255, 255, 255, 0.9);
        transition: all 0.3s ease;
    }

    .salud-container:hover, .reproduccion-container:hover, .poblacion-container:hover, 
    .alimentacion-container:hover, .produccion-container:hover {
        box-shadow: 
            0px 6px 12px rgba(0, 0, 0, 0.08),
            0px 3px 6px rgba(0, 0, 0, 0.06),
            inset 0px 1px 2px rgba(255, 255, 255, 1);
        border-color: #20c997;
        background: linear-gradient(145deg, rgba(255, 255, 255, 1), rgba(248, 249, 250, 0.95));
    }

    /* Adjust the button container inside categories for better spacing and alignment */
    .salud-container .container, .reproduccion-container .container, 
    .poblacion-container .container, .alimentacion-container .container, 
    .produccion-container .container {
        padding: 0;
        margin: 0;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center; /* Center items vertically */
    }

    /* Category label styling with enhanced professional appearance */
    .salud-container::before, .reproduccion-container::before, .poblacion-container::before, 
    .alimentacion-container::before, .produccion-container::before {
        content: attr(data-category);
        position: absolute;
        top: -12px;
        left: 20px;
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        padding: 4px 15px;
        font-size: 0.85rem;
        font-weight: bold;
        color: #28a745;
        text-transform: uppercase;
        border-radius: 8px;
        box-shadow: 
            0px 3px 6px rgba(0, 0, 0, 0.12),
            0px 1px 3px rgba(0, 0, 0, 0.08),
            inset 0px 1px 2px rgba(255, 255, 255, 0.9);
        z-index: 1;
        border: 1px solid rgba(40, 167, 69, 0.2);
        text-shadow: 0px 1px 2px rgba(255, 255, 255, 0.8);
        transition: all 0.3s ease;
    }

    .salud-container:hover::before, .reproduccion-container:hover::before, .poblacion-container:hover::before, 
    .alimentacion-container:hover::before, .produccion-container:hover::before {
        color: #20c997;
        border-color: rgba(32, 201, 151, 0.3);
        box-shadow: 
            0px 4px 8px rgba(0, 0, 0, 0.15),
            0px 2px 4px rgba(0, 0, 0, 0.1),
            inset 0px 1px 2px rgba(255, 255, 255, 1);
        text-shadow: 0px 1px 2px rgba(255, 255, 255, 1);
    }

    /* Button styling to match nav-icons-container buttons */
    .btn.btn-outline-secondary {
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
        border: none;
        border-radius: 50%;
        width: 75px;
        height: 100px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        padding: 0;
        box-shadow: 
            0 4px 8px rgba(0,0,0,0.15),
            inset 0 2px 4px rgba(255,255,255,0.8),
            inset 0 -2px 4px rgba(0,0,0,0.1);
        cursor: pointer;
        margin: 5px;
    }

    .btn.btn-outline-secondary:hover {
        transform: translateY(-3px);
        box-shadow: 
            0 8px 16px rgba(0,0,0,0.2),
            inset 0 2px 4px rgba(255,255,255,0.9),
            inset 0 -2px 4px rgba(0,0,0,0.15);
        background: linear-gradient(145deg, #f8f8f8, #e8e8e8);
    }

    .btn.btn-outline-secondary:active {
        transform: translateY(1px);
        box-shadow: 
            0 2px 4px rgba(0,0,0,0.1),
            inset 0 1px 2px rgba(0,0,0,0.1);
    }

    .btn.btn-outline-secondary .nav-icon {
        width: 30px;
        height: 30px;
        object-fit: contain;
        transition: all 0.3s ease;
    }

    .btn.btn-outline-secondary .button-label {
        font-size: 0.6rem;
        font-weight: 600;
        color: #495057;
        text-align: center;
        margin-top: 0.5rem;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn.btn-outline-secondary:hover .button-label {
        color: #28a745;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .btn.btn-outline-secondary {
            width: 69px;
            height: 91px;
        }
        
        .btn.btn-outline-secondary .nav-icon {
            width: 25px;
            height: 25px;
        }
        
        .btn.btn-outline-secondary .button-label {
            font-size: 0.6rem;
        }
    }

    @media (max-width: 480px) {
        .btn.btn-outline-secondary {
            width: 63px;
            height: 84px;
        }
        
        .btn.btn-outline-secondary .nav-icon {
            width: 22px;
            height: 22px;
        }
        
        .btn.btn-outline-secondary .button-label {
            font-size: 0.6rem;
        }
    }

    /* Remove height restriction for all screen sizes */
    @media (max-height: 800px) {
        .scroll-icons-container {
            max-height: none;
            overflow-y: visible;
        }
    }
</style>

</head>
<body>
<!-- Navigation Title -->
<nav class="navbar text-center">
    <!-- Title Row -->
    <div class="container-fluid">
        <div class="row w-100">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="navbar-title text-center mx-auto">
                <i class="fas fa-clipboard-list me-2"></i>REGISTROS CAPRINOS<span class="ms-2"><i class="fas fa-file-medical"></i></span>
                </h1>
            </div>
        </div>
    </div>
</nav>

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
            <img src="./images/robot-de-chat.png" alt="Veterinario IA" class="nav-icon">
        </button>
        <span class="button-label">VETERINARIO</span>
    </div>

    <div class="icon-button-container">
        <button onclick="window.location.href='./caprino_indices.php'" class="icon-button">
            <img src="./images/indices.png" alt="Indices" class="nav-icon">
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
<!-- Scroll Icons Container -->
<div class="container scroll-icons-container">
    <div class="container salud-container" data-category="SALUD">
        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
                data-bs-toggle="collapse" 
                data-tooltip="Clostridiosis"
                aria-expanded="false"
                aria-controls="clostridiosis"
                onclick="window.location.href='./caprino_register_clostridiosis.php'">
                <img src="./images/clostridiosis.png" alt="Clostridiosis" class="nav-icon">
            </button>
            <span class="button-label text-center">CLOSTRIDIOSIS</span>
        </div>
    

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
                data-bs-toggle="collapse" 
                data-tooltip="Brucelosis"
                aria-expanded="false"
                aria-controls="brucelosis"
                onclick="window.location.href='./caprino_register_brucelosis.php'">
                <img src="./images/cabra-brucelosis.png" alt="Brucelosis" class="nav-icon">
            </button>
            <span class="button-label text-center">BRUCELOSIS</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
                data-bs-toggle="collapse" 
                data-tooltip="Tetanos"
                aria-expanded="false"
                aria-controls="tetanos"
                onclick="window.location.href='./caprino_register_tetanos.php'">
                <img src="./images/tetanos.png" alt="Tetanos" class="nav-icon">
            </button>
            <span class="button-label text-center">TETANOS</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
                data-bs-toggle="collapse" 
                data-tooltip="RABIA"
                aria-expanded="false"
                aria-controls="rabia"
                onclick="window.location.href='./caprino_register_rabia.php'">
                <img src="./images/rabia.png" alt="RABIA" class="nav-icon">
            </button>
            <span class="button-label text-center">RABIA</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
                data-bs-toggle="collapse" 
                data-tooltip="GARRAPATAS"
                aria-expanded="false"
                aria-controls="garrapatas"
                onclick="window.location.href='./caprino_register_garrapatas.php'">
                <img src="./images/garrapatas.png" alt="GARRAPATAS" class="nav-icon">
            </button>
            <span class="button-label text-center">GARRAPATAS</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
                data-bs-toggle="collapse" 
                data-tooltip="Parasitos"
                aria-expanded="false"
                aria-controls="parasitos"
                onclick="window.location.href='./caprino_register_parasitos.php'">
                <img src="./images/parasitos.png" alt="Parasitos" class="nav-icon">
            </button>
            <span class="button-label text-center">PARASITOS</span>
        </div>
    </div>  
    <div class="container poblacion-container" data-category="POBLACION">
        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
                data-bs-toggle="collapse" 
                data-tooltip="Compras"
                aria-expanded="false"
                aria-controls="compras"
                onclick="window.location.href='./caprino_register_compras.php'">
                <img src="./images/pagos.png" alt="Compras" class="nav-icon">
            </button>
            <span class="button-label text-center">COMPRAS</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button"
                data-bs-toggle="collapse"
                data-tooltip="Ventas"
                aria-expanded="false"
                aria-controls="ventas"
                onclick="window.location.href='./caprino_register_ventas.php'">
                <img src="./images/venta.png" alt="Ventas" class="nav-icon">
            </button>
            <span class="button-label text-center">VENTAS</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button"
                data-bs-toggle="collapse"
                data-tooltip="Deceso    "
                aria-expanded="false"
                aria-controls="decesos"
                onclick="window.location.href='./caprino_register_decesos.php'">
                <img src="./images/deceso.png" alt="Decesos" class="nav-icon">
            </button>
            <span class="button-label">DECESOS</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button"
                data-bs-toggle="collapse"
                data-tooltip="Descarte"
                aria-expanded="false"
                aria-controls="descarte"
                onclick="window.location.href='./caprino_register_descarte.php'">
                <img src="./images/descarte.png" alt="Descarte" class="nav-icon">
            </button>
            <span class="button-label">DESCARTE</span>
        </div>
    </div>

    <div class="container reproduccion-container" data-category="REPRODUCCION">
        <div class="d-flex flex-column align-items-center">    
            <button class="btn btn-outline-secondary mb-1" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#reproduccion" 
            data-tooltip="Inseminacion"
            aria-expanded="false"
            aria-controls="reproduccion"
            onclick="window.location.href='./caprino_register_inseminacion.php'">
            <img src="./images/inseminacion.png" alt="Inseminacion" class="nav-icon">
            </button>
            <span class="button-label">INSEMINACION</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#gestacion" 
            data-tooltip="Gestacion"
            aria-expanded="false"
            aria-controls="gestacion"
            onclick="window.location.href='./caprino_register_gestacion.php'">
            <img src="./images/gestacion.png" alt="Gestacion" class="nav-icon">
            </button>        
            <span class="button-label">GESTACION</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#parto" 
            data-tooltip="Parto"
            aria-expanded="false"
            aria-controls="parto"
            onclick="window.location.href='./caprino_register_parto.php'">
            <img src="./images/parto.png" alt="Parto" class="nav-icon">            
            </button>
            <span class="button-label">PARTO</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#destete" 
            data-tooltip="Destete"
            aria-expanded="false"
            aria-controls="destete"
            onclick="window.location.href='./caprino_register_destete.php'">
            <img src="./images/destete.png" alt="Destete" class="nav-icon">            
            </button>
            <span class="button-label">DESTETE</span>
        </div>
    </div>

    <div class="container alimentacion-container" data-category="ALIMENTACION">
        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#feed" 
            data-tooltip="ABA"
            aria-expanded="false"   
            aria-controls="feed"  
            onclick="window.location.href='./caprino_register_feed.php'">    
            <img src="./images/feed.png" alt="Feed" class="nav-icon">
            </button>
            <span class="button-label">ABA</span>
        </div>    

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#melaza" 
                data-tooltip="Melaza"
                aria-expanded="false"   
                aria-controls="melaza"  
                onclick="window.location.href='./caprino_register_melaza.php'"> 
                <img src="./images/melaza.png" alt="Melaza" class="nav-icon">
            </button>
            <span class="button-label">MELAZA</span>
        </div>

        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#sal" 
                data-tooltip="Sal"
                aria-expanded="false"   
                aria-controls="sal"  
                onclick="window.location.href='./caprino_register_sal.php'">
                <img src="./images/sal.png" alt="Sal" class="nav-icon">
            </button>
            <span class="button-label">SAL</span>
        </div>
    </div>

    <div class="container produccion-container" data-category="GANANCIA PESO">
        <div class="d-flex flex-column align-items-center">
            <button class="btn btn-outline-secondary mb-1" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#carne" 
                data-tooltip="Carne"
                aria-expanded="false"   
                aria-controls="carne"  
                onclick="window.location.href='./caprino_register_meat.php'">
                <img src="./images/default_image.png" alt="Carne" class="nav-icon">
            </button>
            <span class="button-label">PESO</span>
        </div>

    </div>
</div>
</body>
</html>