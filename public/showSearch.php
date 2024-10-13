<link rel="stylesheet" href="../assets/css/search.css">

<?php
require_once '../functions/crud.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['busqueda'])) {
    $busqueda = trim($_POST['busqueda']);
    
    // Llamar a la función para obtener los vinos filtrados
    $vinosFiltrados = obtenerVinosFiltrados($pdo, $busqueda);
    
    // Mostrar los resultados de la búsqueda
    echo "<h2>Resultados de la búsqueda:</h2>";
    if (empty($vinosFiltrados)) {
        echo "<p>No se encontraron vinos que coincidan con la búsqueda.</p>";
    } else {
        ?>
        <table class="table table-bordered" style="border: 1px solid black;">
        <thead>
            <tr>
                <th class="table-primary">Nombre</th>
                <th class="table-primary">Cepa</th>
                <th class="table-primary">Bodega</th>
                <th class="table-primary">Fecha de compra</th>
                <th class="table-primary">Precio de Compra</th>
                <th class="table-primary">Stock</th>
                <th class="table-primary">Configuración</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($vinosFiltrados as $vino): ?>
                <tr>
                    <td><?= $vino['nombre'] ?></td>
                    <td><?= $vino['cepa'] ?></td>
                    <td><?= $vino['bodega'] ?></td>
                    <td><?= $vino['precioFecha'] ?></td>
                    <td><?= $vino['precioCompra'] ?></td>
                    <td><?= $vino['stock'] ?></td>
                    <td style="text-align: center; vertical-align: middle;">
    
                        <button type="button" class="btn btn-primary" style="margin-right: 10px;">
                           <a href="edit_product.php?id=<?= $vino['id'] ?>" style="text-decoration: none; color: inherit;"> 
                                Editar <i class="bi bi-pencil"></i>
                            </a>
                        </button>
                        
                        <button type="button" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">
                            <a href="delete_product.php?id=<?= $vino['id'] ?>" style="text-decoration: none; color: inherit;">
                                Eliminar <i class="bi bi-trash"></i>
                            </a>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    }
}
?>