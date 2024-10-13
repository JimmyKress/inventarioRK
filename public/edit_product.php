<link rel="stylesheet" href="../assets/css/edit.css">
<body>
    
    <?php
        require_once '../functions/crud.php';

        // Verificar si se ha enviado el ID del vino
        if (isset($_GET['id'])) {
            //header('Location: index.php'); // Redirigir si no hay ID
            //exit;
        
        // Obtener el ID del vino
        $id = $_GET['id'];
        
    }
        // Obtener los datos del vino por ID
        $vino = obtenerVinoPorId($id); // Necesitas implementar esta función en productos.php

    // Verifica si la solicitud HTTP que llegó al servidor es de tipo POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            // Obtener datos del formulario
            $nombre = $_POST['nombre'];
            $cepa = $_POST['cepa'];
            $bodega = $_POST['bodega'];
            $precioFecha = $_POST['precioFecha'];
            $precioCompra = $_POST['precioCompra'];
            $stock = $_POST['stock'];
        
            // Actualizar el vino en la base de datos
            editarVino($id, $nombre, $cepa, $bodega, $precioFecha, $precioCompra, $stock);

            // Redirigir a la página de índice después de actualizar
            header('Location: index.php');
            exit;
        }
    ?>

    <?php //include '../includes/header.php'; ?>

    <h1 id="titleEdit">Editar Vino</h1>

    <form method="POST" class = "formEDIT">
        <div class="contenedorEdit">
        <input type="text" name="nombre" value="<?= $vino['nombre'] ?>" placeholder="Nombre" required><br><br>
        <input type="text" name="cepa" value="<?= $vino['cepa'] ?>" placeholder="Cepa" required><br><br>
        <input type="text" name="bodega" value="<?= $vino['bodega'] ?>" placeholder="Cepa" required><br><br>
        <input type="date" name="precioFecha" value="<?= $vino['precioFecha'] ?>" required><br><br>
        <input type="number" step="0.01" name="precioCompra" value="<?= $vino['precioCompra'] ?>" placeholder="Precio Compra" required><br><br>
        <input type="number" name="stock" value="<?= $vino['stock'] ?>" placeholder="Stock" required><br><br>
        <button type="submit">Actualizar</button>
        </div>
    </form>

    <?php include '../includes/footer.php'; ?>
</body>