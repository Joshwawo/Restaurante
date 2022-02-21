<?php 
    include('../../Modelo/db.php');
    if(isset($_POST['Registrarte'])){

        /*  Datos de registro*/
        $nombre_completo = $_POST['nombre_completo'];
        $correo_Electronico = $_POST['correo_Electronico'];
        $usuario = $_POST['usuario'];
        $contrasena  = $_POST['contrasena'];
        $Constrasena_Hash = password_hash($contrasena, PASSWORD_BCRYPT);
        $direccion = $_POST['direccion'];
/*
        $query = $connection->prepare("SELECT * FROM usuarios WHERE (id_usuario='$usuario')");
        $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
        //$query->bindParam("correo", $correo_Electronico, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount()>0){
            echo'<p class="error"> EL usuario o Correo ya estan registrados</p>';
        }

        if($query->rowCount()==0){
            $query = $connection->prepare("INSERT INTO usuarios(id_usuario, contrasena, nombreCompleto, correo, direccion)
            Values (:usuario, :Constrasena_Hash, :nombre_completo, :correo_Electronico, :direccion)");
            $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
            $query->bindParam("Constrasena_Hash", $Constrasena_Hash, PDO::PARAM_STR);
            $query->bindParam("nombre_completo", $nombre_completo, PDO::PARAM_STR);
            $query->bindParam("correo_Electronico", $correo_Electronico, PDO::PARAM_STR);
            $query->bindParam("direccion", $direccion, PDO::PARAM_STR);
            $result_query = $query->execute();

            if($result_query){
                echo '<Script language="javascript">alert("Datos guardados correctamente"</script>';
            }
            else{
                echo '<Script language="javascript">alert("Problema al guardar los datos"</script>';
            }

        }

*/
        $query_Usuarios = "INSERT INTO usuarios(id_usuario, contrasena, nombreCompleto, correo, direccion)
        Values ('$usuario', '$Constrasena_Hash', '$nombre_completo', '$correo_Electronico', '$direccion')";

        $result_Query = mysqli_query($conn, $query_Usuarios);

        echo '<Script language="javascript">alert("Datos guardados correctamente"</script>';
        session_abort();
        header("Location: ../../Vista/pages/login.html");
            $_SESSION['message'] = 'Datos guardados con exito';
            $_SESSION['message_type'] = 'succes';



    }

?>