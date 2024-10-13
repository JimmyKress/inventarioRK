<?php
    include '../functions/crud.php';
    // Obtener el ID del vino
    $id = $_GET['id'];

    // Obtener los datos del vino por ID
    $vino = eliminarVino($id); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $cepa = $_POST['cepa'];
        $tipo_id = $_POST['tipo_id'];
        $precioFecha = $_POST['precioFecha'];
        $precioCompra = $_POST['precioCompra'];
        $stock = $_POST['stock'];
    
        // Actualizar el vino en la base de datos
        eliminarVino($id, $nombre, $cepa, $tipo_id, $precioFecha, $precioCompra, $stock);
        
        // Redirigir a la página de índice después de actualizar
        header('Location: home.php');
        exit;
    }

    if (isset($_GET['id'])) {
        header('Location: index.php'); // Redirigir si no hay ID
        exit;
    }