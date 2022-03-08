<?php

include ('../../../../Modelo/db.php');

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = '../../../../Modelo/uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `comidas`(`name`, `price`, `image`) VALUES 
   ('$p_name', '$p_price', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'Producto añadido con exito';
   }else{
      $message[] = 'No se pudo añadir el producto';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `comidas` where id_Comida= '$delete_id'") or die('query failed');
   if($delete_query){
      header('location:menu.php');
      $message[] = 'El producto ha sido eliminado';
   }else{
      header('location:menu.php');
      $message[] = 'El producto no pudo ser borrado';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = '../../../../Modelo/uploaded_img/'.$update_p_image;
   $update_query = mysqli_query($conn, "UPDATE `comidas` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id_Comida = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'Actualizado con exito';
      header('location:menu.php');
   }else{
      $message[] = 'El producto no pudo ser actualizado';
      header('location:menu.php');
   }

}

?>



<!-- Conectar Esta Pagina que es el login del admin -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>
    <!-- <link rel="stylesheet" href="../styles/normalice.css">
    <link rel="stylesheet" href="../styles/stylesadmin.css">
    <link rel="stylesheet" href="../styles/sylesadd.css"> -->
    <link rel="stylesheet" href="../styles/normalice.css">
    <link rel="stylesheet" href="../styles/stylesadmin.css">
    <link rel="stylesheet" href="../styles/sylesadd.css">

</head>

<body>
<div class="nav-bg">
        <nav class="navegacion contenedor">
            <a href="../pages/homepage.html">Inicio</a>
            <a href="../pages/userdata.html">Datos Pendientes</a>
            <a href="../pages/menu.php">Menús</a>
            
            <a id="lg" href="../../login.html">Cerrar Sesion</a>
            <!--Se va a quedar pendiente  -->


        </nav>
    </div>

    <header style="background: none;" class="header ">
        <h1>Menús</h1>
    </header>

   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Añadir un producto</h3>
   <input type="text" name="p_name" placeholder="Introduzca el nombre del producto" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="Introduzca el precio del producto" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="Agregar producto" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>Imagen del producto</th>
         <th>Nombre del producto</th>
         <th>Precio del producto</th>
         <th>Acciones</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `comidas`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="../../../../Modelo/uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="menu.php?delete=<?php echo $row['id_Comida']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> Borrar </a>
               <a href="menu.php?edit=<?php echo $row['id_Comida']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Actualizar </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no hay productos añadidos</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>