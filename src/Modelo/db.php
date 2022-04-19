<?php
    session_start();
    /**
     * Esta Es la variable de Conexion que Muestra nuestra  base de datos del sistema
     */
    $conn = mysqli_connect(
        'localhost',
        'root',
        'root',
        'restaurante'
    );

//     if (!$conn) {
//     echo "Error en la conexion";
// } else {
//     echo "Conexion Correcta A la base de datos";
// }
?>
