<!-- Conectar Esta Pagina que es el login del admin -->

<?php

include('../../../../Modelo/db.php');

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `order` WHERE id = '$remove_id'");
    header('location:../../admin/pages/homepage.php');
};

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `order`");
    header('location:../../admin/pages/homepage.php');
}

?>

<?php


if (isset($_POST['add_to_complete'])) {

    $product_name = $_POST['product_name'];
    $product_method = $_POST['product_method'];
    $product_direccion = $_POST['product_direccion'];
    $product_colonia = $_POST['product_colonia'];
    $product_comentario = $_POST['product_comentario'];
    $product_productos = $_POST['product_productos'];
    $product_precio = $_POST['product_precio'];


  
  
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `order` WHERE name = '$product_name'");
    /**
     * Esta condicional if, hace referencia a que ya se a seleccionado el producto y nos mostrara un mensa "Producto ya agregado al carrito", no nos dejara agarrarlo otra vez, y la condicional else hace refencia a que si no esta en el carrito nos dejara agregarlo al carrrito de compras y nos aparecera el mensaje "Producto Agregado Correctamente"
     */
    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Producto ya fue agregado al carrito';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `completo`(name, flat, city, country, total_products, total_price) VALUES('$product_name', '$product_method', '$product_direccion', '$product_colonia', '$product_colonia, '$product_colonia', '$product_comentario', '$product_productos', '$product_precio')");
        $message[] = 'Producto agregado correctamente!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page Admin</title>
    <link rel="stylesheet" href="../styles/normalice.css">
    <link rel="stylesheet" href="../../admin/styles/sylesadd.css">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="../../admin/pages/dataTable.js" type="text/javascript"></script>
    
</head>

<body >

    <div class="container">
        <nav class="heading__mio">

            <a style="font-size: 2rem;" href="../pages/homepage.php">Inicio</a>
            <a style="font-size: 2rem;" href="../pages/userdata.html">Datos Pendientes</a>
            <a style="font-size: 2rem;" href="../pages/menu.php">Menús</a>

            <a style="font-size: 2rem;" id="lg" href="../../login.html">Cerrar Sesion</a>
            <!--Se va a quedar pendiente  -->

        </nav>

        <section class="shopping-cart">
            <h1 class="heading">Admin Panel <br>De Pedidos</h1>

            <?php
                        /*$select_estado = mysqli_query($conn, "Select * from `order` where (`estado`== 0));
                     
                        if(mysqli_nums_rows($select_estado == 1)){
                <table  class="tabla hp">

                <thead>
                    <th>Nombre</th>
                    <th>Metodo Pago</th>
                    <th>Direccion</th>
                    <th>Colonia</th>
                    <th>Comentario</th>
                    <th>Productos</th>
                    <th>Precio Total</th>
                  
                    


                </thead>

                <tbody>
                    <?php

                    /**
                     * La variable $select_cart seleciona nuestra tabla llamada "Cart" de nuestra base de datos
                     */
                    //$select_cart = mysqli_query($conn, "SELECT * FROM `order` /*where `estado`== 0*/");


                    /**
                     * Esta variable es el precio total a pagar por el cliente - se inicia en cero porque no hay nada en el carrito
                     */
                    /*$grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    ?>

                            <tr>
                                <td class="td__admin"><?php echo $fetch_cart['name'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['method'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['flat'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['city'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['country'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['total_products'] ?></td>

                                <td class="td__admin"><?php echo $fetch_cart['total_price'] ?> Mxn.</td>
                                <!-- <td class="td__admin"><a href="?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('¿Estas Seguro de eliminar esto del carrito?')" class="delete-btn">  Eliminar</a></td> -->

                            </tr>

                    <?php
                            // $grand_total += $sub_total;
                        };
                    };
                    ?>

                </tbody>
                <td><a href="../../admin/pages/homepage.php?delete_all" onclick="return confirm('¿Estas Seguro que quieres eliminar todos los Pedidos?');" class="delete-btn"> <i class="fas fa-trash"></i> Eliminar Todo </a></td>
            </table>

                        }
                        else{
                            <tr>
                                <td class="td__admin"><?php echo $fetch_cart['name'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['method'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['flat'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['city'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['country'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['total_products'] ?></td>

                                <td class="td__admin"><?php echo $fetch_cart['total_price'] ?> Mxn.</td>
                                <!-- <td class="td__admin"><a href="?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('¿Estas Seguro de eliminar esto del carrito?')" class="delete-btn">  Eliminar</a></td> -->

                            </tr>
                        }


                        */

                        ?>

                      

           






        </section>

        
       
        <section class="shopping-cart">
        <h2 style="color: white; font-size: 2rem; text-align: center;">En proceso</h2>
       <table  class="tabla hp">

                <thead>
                    <th>Nombre</th>
                    <th>Metodo Pago</th>
                    <th>Direccion</th>
                    <th>Colonia</th>
                    <th>Comentario</th>
                    <th>Productos</th>
                    <th>Precio Total</th>
                    <th>Acción</th>
                  
                    


                </thead>

                <tbody>
                    <?php

                    /**
                     * La variable $select_cart seleciona nuestra tabla llamada "Cart" de nuestra base de datos
                     */
                    $select_cart = mysqli_query($conn, "SELECT * FROM `order`");


                    /**
                     * Esta variable es el precio total a pagar por el cliente - se inicia en cero porque no hay nada en el carrito
                     */
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    ?>

                            <tr>
                                <td class="td__admin"><?php echo $fetch_cart['name'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['method'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['flat'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['city'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['country'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['total_products'] ?></td>
                                    
                                <td class="td__admin"><?php echo $fetch_cart['total_price'] ?> Mxn.</td>
                                <td><button class="btn">Completo</button></td>
                                
                                 <!-- <td class="td__admin"><a href="?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('¿Estas Seguro de eliminar esto del carrito?')" class="delete-btn">  Eliminar</a></td> -->

                            </tr>

                    <?php
                            // $grand_total += $sub_total;
                        };
                    };
                    ?>

                </tbody>
                <td><a href="../../admin/pages/homepage.php?delete_all" onclick="return confirm('¿Estas Seguro que quieres eliminar todos los Pedidos?');" class="delete-btn"> <i class="fas fa-trash"></i> Eliminar Todo </a></td>
            </table>

       </section>
        
    
       <section class="shopping-cart">
       <h2 style="color: white; font-size: 2rem; text-align: center; padding-bottom:1 rem">Completas</h2>
       <table  class="tabla hp">

                <thead>
                    <th>Nombre</th>
                    <th>Metodo Pago</th>
                    <th>Direccion</th>
                    <th>Colonia</th>
                    <th>Comentario</th>
                    <th>Productos</th>
                    <th>Precio Total</th>
                  
                    


                </thead>

                <tbody>
                    <?php

                    /**
                     * La variable $select_cart seleciona nuestra tabla llamada "Cart" de nuestra base de datos
                     */
                    $select_cart = mysqli_query($conn, "SELECT * FROM `order`");


                    /**
                     * Esta variable es el precio total a pagar por el cliente - se inicia en cero porque no hay nada en el carrito
                     */
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    ?>

                            <tr>
                                <td class="td__admin"><?php echo $fetch_cart['name'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['method'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['flat'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['city'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['country'] ?></td>
                                <td class="td__admin"><?php echo $fetch_cart['total_products'] ?></td>

                                <td class="td__admin"><?php echo $fetch_cart['total_price'] ?> Mxn.</td>
                                
                                 <!-- <td class="td__admin"><a href="?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('¿Estas Seguro de eliminar esto del carrito?')" class="delete-btn">  Eliminar</a></td> -->

                            </tr>

                    <?php
                            // $grand_total += $sub_total;
                        };
                    };
                    ?>

                </tbody>
                <td><a href="../../admin/pages/homepage.php?delete_all" onclick="return confirm('¿Estas Seguro que quieres eliminar todos los Pedidos?');" class="delete-btn"> <i class="fas fa-trash"></i> Eliminar Todo </a></td>
            </table>

       </section>
    </div>

    <!-- <script src="../../.././pages/admin/pages/tabla.js"></script> -->
    <script src="../../admin/pages/tabla.js"></script>
  

</body>

</html>