<?php 
require_once('../Modelo/db.php');
if (isset($_POST['Enviar'])) {

        /*/*Datos a enviar */
        $NombreCompleto = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $texto = $_POST['texto'];

        $query_Contactos = "INSERT INTO info(`name`, `email`, `telefono`, `texto`)
        Values ('$NombreCompleto', '$email', '$telefono', '$texto')";

        
        $insertar_Info = mysqli_query($conn, $query_Contactos) or die('query failed');
        require_once('index.html');
    }

    


?>