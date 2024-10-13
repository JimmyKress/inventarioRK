<body>
    <link rel="stylesheet" href="../assets/css/add.css">
      <?php
        require_once '../functions/crud.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            agregarVino($_POST['nombre'], $_POST['cepa'], $_POST['tipo'], $_POST['precioFecha'], $_POST['precioCompra'], $_POST['stock']);
            header('Location: index.php');
        }

    ?>
    <h1 id="titleADD">Agregar Vino</h1>
    <form method="POST" class="formADD">
        <div class="contenedorADD">
            <input type="text" name="nombre" placeholder="Nombre"><br><br>
            <input type="text" name="cepa" placeholder="Cepa"><br><br>
            <input type="text" name="tipo" placeholder="Tipo de vino (nombre)"><br><br>
            <input type="date" name="precioFecha"><br><br>
            <input type="number" step="0.01" name="precioCompra" placeholder="Precio Compra"><br><br>
            <input type="number" name="stock" placeholder="Stock"><br><br>
            <button class="agregar" type="submit">Agregar</button>
        </div>
    </form>
</body>