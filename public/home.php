<?php include '../includes/meta.php'; ?>

<?php
    require_once '../functions/crud.php';
    // Obtener los vinos filtrados
    $vinos = obtenerVinos();
?>
<div class="tituloContainer">
    <h1 id="titulo">Inventario</h1>
</div>
<a href="add_product.php">
    <button type="button" class="btn btn-success">
        + Agregar un producto
    </button>
</a>
<br><br>

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
        <?php if (!empty($vinos)): ?>
            <?php foreach ($vinos as $vino): ?>
            <tr>
                <td><?= htmlspecialchars($vino['nombre']) ?></td>
                <td><?= htmlspecialchars($vino['cepa']) ?></td>
                <td><?= htmlspecialchars($vino['bodega']) ?></td>
                <td><?= htmlspecialchars($vino['precioFecha']) ?></td>
                <td><?= htmlspecialchars($vino['precioCompra']) ?></td>
                <td><?= htmlspecialchars($vino['stock']) ?></td>
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
        <?php else: ?>
            <tr>
                <td colspan="6">No se encontraron vinos.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>
