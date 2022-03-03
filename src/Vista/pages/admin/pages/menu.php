<!-- Conectar Esta Pagina que es el login del admin -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>
    <link rel="stylesheet" href="../styles/normalice.css">
    <link rel="stylesheet" href="../styles/stylesadmin.css">
    <link rel="stylesheet" href="../styles/sylesadd.css">


</head>

<body>

    <div class="nav-bg">
        <nav class="navegacion contenedor">
            <a href="../pages/homepage.html">Inicio</a>
            <a href="../pages/userdata.htm">Datos Pendientes</a>
            <a href="../pages/users.html">Usuarios</a>
            <a href="../pages/menu.html">Menús</a>
            <a href="../pages/bot.html">Ayuda</a>
            <a id="lg" href="../../login.html">Cerrar Sesion</a>
            <!--Se va a quedar pendiente  -->


        </nav>
    </div>

    <header class="header">
        <h1>Menús</h1>
    </header>

    <!--Aqui comienza el que agrega productos sin css 10:43 del video-->
    <div class="container">
        <section>
            <form action="../../../../Controlador/admin/add_product.php" method="post" class="add-product-form" enctype="multipart/form-data">
                <h3> agregar nuevo producto</h3>
                <input type="text" name="p_name" placeholder="Nombre del producto" class="box" required>
                <input type="number" name="p_price" placeholder="Precio" class="box" required>
                <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
                <input type="submit" value="Agregar el producto" name="add_product" class="btn">
            </form>
        </section>
    </div>


    <section class="display-product-table"> 
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
          
      <a href="../pages/menus.php?delete=" <button class="delete-btn fas fa-trash" onclick="myFunction()">Eliminar</button></a>
      <a href="../pages/menus.php?edit=" <button class="option-btn fas fa-edit"> Actualizar</button></a>
      </td>
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

    <script>
        function myFunction(){
            if(confirm('Estas seguro que quieres eliminar este producto')) == return true {
                
            }

        }
        </script>







</body>

</html>