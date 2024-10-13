<?php
    require_once '../config/db.php';

    // Obtener todos los productos
    function obtenerVinos() {
        global $pdo;
        $sql = "SELECT * FROM vinos";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve los resultados de la consulta como un array asociativo
    }   
    
    function obtenerVinoPorId($id) {
        global $pdo;
        $sql = "SELECT * FROM vinos WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $vino = $stmt->fetch(PDO::FETCH_ASSOC); // Retorna el vino como un array asociativo
    
        // Verifica si se encontró el vino
        if ($vino === false) {
            // Manejo del error, por ejemplo, retornando null o lanzando una excepción
            return null; 
        }
        
        return $vino; // Retorna el vino si se encontró
    }
    
    // Agregar producto
    function agregarVino($nombre, $cepa, $bodega, $precioFecha, $precioCompra, $stock) {
        global $pdo;
        $sql = "INSERT INTO vinos (nombre, cepa, bodega, precioFecha, precioCompra, stock) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$nombre, $cepa, $bodega, $precioFecha, $precioCompra, $stock]);
    }

    // Editar producto
    function editarVino($id, $nombre, $cepa, $bodega, $precioFecha, $precioCompra, $stock) {
        global $pdo;
        $sql = "UPDATE vinos SET nombre = ?, cepa = ?, bodega = ?, precioFecha = ?, precioCompra = ?, stock = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$nombre, $cepa, $bodega, $precioFecha, $precioCompra, $stock, $id]);
    }

    //Eliminar producto
    function eliminarVino($id) {
        global $pdo;
        $sql = "DELETE FROM vinos WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    function obtenerVinosFiltrados($pdo, $busqueda) {
        // Preparar la consulta SQL para buscar en nombre, cepa o bodega
        $sql = "SELECT * FROM vinos WHERE nombre LIKE :busqueda OR cepa LIKE :busqueda OR bodega LIKE :busqueda";
    
        // Preparar la sentencia
        $stmt = $pdo->prepare($sql);
        
        // Agregar comodines a la búsqueda
        $busqueda_param = "%" . $busqueda . "%";
        
        // Vincular el parámetro de búsqueda
        $stmt->bindValue(':busqueda', $busqueda_param, PDO::PARAM_STR);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener todos los resultados
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Retornar los resultados
        return $resultado;
    }

?>