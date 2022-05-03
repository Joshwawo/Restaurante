<?php 
    include('../../Modelo/db.php');

    if(isset($_POST['validacion_Login'])){
        $Correo_Usuario = $_POST['correo'];
        $constrasena = $_POST['contrasena'];
        $buscarCorreo = "SELECT id_usuario FROM `usuarios` WHERE (id_usuario ='$Correo_Usuario' or correo = '$Correo_Usuario')";
        $resultado = $conn->query($buscarCorreo);

        $contador = mysqli_num_rows($resultado);

        //Si existen las credenciales en el sistema
        if($contador == 1){
            $busquedaContra = "SELECT contrasena from usuarios WHERE (id_usuario ='$Correo_Usuario' or correo = '$Correo_Usuario')";
            $resultadoBusqueda = mysqli_query($conn, $busquedaContra);

            if(mysqli_num_rows($resultadoBusqueda)==1){
                $row = mysqli_fetch_array($resultadoBusqueda);
                $resultadoConsulta = $row['contrasena'];

                $stringHash = (string)$resultadoConsulta;

                if($constrasena == $stringHash){
                    if($Correo_Usuario == 'Don Burritos' || $Correo_Usuario == 'adrian28588@gmail.com'){
                            header("Location: ../../Vista/pages/admin/pages/homepage.php");
                            exit();
                                                
                    }
                    else{
                        header("Location: ../../Vista/pages/users/pages/homeuser.php");
                    }
                }
                else{
                    $message = "Contraseña incorrecta";
                    $timestamp = 2;
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    /*sleep($timestamp);
                    header("Location: ../../Vista/pages/login.html");
                    exit();*/
                }
            }
        }
    }



    session_abort();
?>





<?php 

if ($contador == 1) {
    $busquedaContra = "SELECT contrasena from usuarios WHERE (id_usuario ='$Correo_Usuario' or correo = '$Correo_Usuario')";
    $resultadoBusqueda = mysqli_query($conn, $busquedaContra);

    if (mysqli_num_rows($resultadoBusqueda) == 1) {
        $row = mysqli_fetch_array($resultadoBusqueda);
        $resultadoConsulta = $row['contrasena'];

        $stringHash = (string)$resultadoConsulta;

        if ($constrasena == $stringHash) {
            if ($Correo_Usuario == 'Don Burritos' || $Correo_Usuario == 'adrian28588@gmail.com' || $Correo_Usuario == 'josh' || $Correo_Usuario == 'jorge@hotmail.com') {
                header("Location: ../../Vista/pages/admin/pages/homepage.php");
                exit();
            } else {
                echo '<script>
                alert("Error Usuario o Correo Incorrecto, vuelve a intentarlo");
                window.location=" login.html";
                
              </script>';
                exit;
            }
        } else {
            echo '<script>
                alert("Error Usuario o Correo Incorrecto, vuelve a intentarlo");
                window.location=" login.html";
                
              </script>';;
            exit;
        }
    }
}

?>