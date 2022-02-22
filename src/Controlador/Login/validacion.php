<?php 
    include('../../Modelo/db.php');

    if(isset($_POST['validacion_Login'])){
        $Correo_Usuario = $_POST['correo'];
        $constrasena = $_POST['contrasena'];
        //$Constrasena_Hash = password_hash($constrasena, PASSWORD_BCRYPT);

        $buscarCorreo = "SELECT id_usuario FROM `usuarios` WHERE (id_usuario||correo)='$Correo_Usuario'";
        
        $resultado = $conn->query($buscarCorreo);

        $contador = mysqli_num_rows($resultado);

        //Si existen las credenciales en el sistema
        if($contador == 1){
            $busquedaContra = "SELECT contrasena from usuarios WHERE (id_usuario||correo)='$Correo_Usuario'";
            $resultadoBusqueda = mysqli_query($conn, $busquedaContra);

            if(mysqli_num_rows($resultadoBusqueda)==1){
                $row = mysqli_fetch_array($resultadoBusqueda);

                $resultadoConsulta = $row['contrasena'];

                $string = strval($resultadoConsulta);
                $stringUser= strval($constrasena);
                echo $string;
                echo '         ';
                echo $stringUser;

                if(password_verify($stringUser, $string)){
                    echo 'Contraseña correcta';
                }
                else{
                    echo 'no jalo';
                }
            }

           /* while($row = mysql_fetch_array($resultadoBusqueda)){
                echo $row['contrasena'];
            }
            //echo $resultadoBusqueda;
            /*if(password_verify($constrasena, $resultadoBusqueda)){
                echo 'Contraseña correcta';
            }*/
            
        }
    }



    session_abort();
    //echo 'jalo';

?>