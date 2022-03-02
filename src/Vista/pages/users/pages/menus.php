<!-- Conectar Esta Pagina que es el login del admin -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Menu</title>
    <!-- <link rel="stylesheet" href="/Restaurante/src/Vista/pages/users/styles/normalice.css">
    <link rel="stylesheet" href="/Restaurante/src/Vista/pages/users/styles/stylescliente.css"> -->
    <link rel="stylesheet" href="../styles/normalice.css">
    <link rel="stylesheet" href="../styles/stylescliente.css">

</head>

<body>

    <div class="nav-bg">
        <nav class="navegacion contenedor">

            <!-- <a href="/Restaurante/src/Vista/pages/users/pages/homeuser.html">Inicio</a>
            <a href="/Restaurante/src/Vista/pages/users/pages/menus.html">Menús</a>
            <a href="/Restaurante/src/Vista/pages/users/pages/botusers.html">Ayuda (bot)</a> -->
            <a href="../pages/homeuser.html">Inicio</a>
            <a href="../pages/menus.html">Menús</a>
            <a href="../pages/botusers.html">Ayuda(bot)</a>

            
            <a id="lg" href="#">Cerrar Sesion</a>
            
            
            
        </nav>
    </div>

    <header class="header">
        <h1>Menú</h1>
        <p>En nuestras no tan variadas opciones</p>
    </header>


    <section class="display-product-table">
        <?php 
        
        /*
          <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `comidas`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>
        
        */
        ?>
        
        
        <table>

<thead>
   <th>imagen del producto</th>
   <th>Nombre del producto</th>
   <th>Precio del producto</th>
   <th>Accion</th>
</thead>

<tbody>
   <?php
        include('../../../../Modelo/db.php');
      $select_products = mysqli_query($conn, "SELECT * FROM `comidas`");
      if(mysqli_num_rows($select_products) > 0){
         while($row = mysqli_fetch_assoc($select_products)){
   ?>

   <tr>
      <td><img src="../../../../Modelo/uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
      <td><?php echo $row['name']; ?></td>
      <td>$<?php echo $row['price']; ?>/-</td>
      <td>
      <a href="../pages/menus.php?delete=<?php echo $row['id_Comida ']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
      <a href="../pages/menus.php?edit=<?php echo $row['id_Comida ']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
                </tr>


                <?php
                    };
                }else{
                    echo "<span> no hay productos añadidos</span>";
                }
                ?>
            </tbody>
        </table>
    </section>





</body>

</html>