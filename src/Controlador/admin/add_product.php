<?php
    include('../../Modelo/db.php');

    if(isset($_POST['add_product'])){
        $p_name = $_POST['p_name'];
        $p_price = $_POST['p_price'];
        $p_image = $_FILES['p_image']['name'];
        $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
        $p_image_folder = '../../Modelo/uploaded_img/'.$p_image;

        $insert_query = mysqli_query($conn, "INSERT INTO `comidas`(`name`, `price`, `image`) VALUES 
        ('$p_name', '$p_price', '$p_image')") or die('query failed');

        if($insert_query){
            move_uploaded_file($p_image_tmp_name, $p_image_folder);
            $message[] = 'producto añadido con exito';
            echo'<script type="text/javascript">
            alert("Producto guardado con exito");
            window.location.href="../../Vista/pages/admin/pages/menu.php";
            </script>';
        }
        else{
            echo'<script type="text/javascript">
            alert("Hubo un error al cargar el producto");
            window.location.href="../../Vista/pages/admin/pages/menu.php";
            </script>';
        }
    };

    if(isset($_GET['delete'])){
        echo'Hola';
       /* $delete_id = $_GET['delete'];
        $delete_query = mysqli_query($conn, "DELETE FROM 'comidas' where id_Comida= '$delete_id'");
        if($delete_query){
            $messaegDelete[] = 'Producto eliminado';
            echo'<script type="text/javascript">
            alert("Producto eliminado");
            window.location.href="../../Vista/pages/admin/pages/menu.php";
            </script>';*/

        }
    

?>