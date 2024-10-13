<?php
    $db = 'ng_inventarioVinos_db';
    $host = 'localhost';
    $password = 'jimmy123';
    $user = 'root';

    try {
//Se está creando una instancia de la clase PDO, que se utiliza para conectarse a la base de datos.
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //Configura el modo de manejo de errores de PDO para que lance excepciones
       // echo '<h5>Conexion exitosa</h5>';
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
        echo '<h5>Conexion fallida</h5>';
    }
?>