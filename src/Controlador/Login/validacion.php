<?php 
    include('../../Modelo/db.php');

    if(isset($_POST['validacion_Login'])){
        $Correo_Usuario = $_POST['correo'];
        $constrasena = $_POST['contrasena'];
    }

    $query_Comparacion = "SELECT FROM usuarios where id_usuario || correo ='$Correo_Usuario' ";
    $query_Comparacion->bindParam("id_usuario", $Correo_Usuario, PDO::PARAM_STR)

    }

?>