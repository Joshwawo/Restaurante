<?php
    session_start();
    /**
     * Esta Es la variable de Conexion que Muestra nuestra  base de datos del sistema
     */
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'Restaurante'
    );
?>