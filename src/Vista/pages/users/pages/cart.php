<?php

include('../../../../Modelo/db.php');

/**
 * Esta condicional tiene la funcionalidad de actualizar la cantidad de productos agregados al carrito de compra  
 */
if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity ='$update_value' 
    WHERE id ='$update_id' ");
    if ($update_quantity_query) {
        header('location:../../users/pages/cart.php');
    };
};

/**
 * Esta condicional tiene la funcionalidad de eliminar N elementros del carrito de compras para que se refleje en la base de datos
 */
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
    header('location:../../users/pages/cart.php');
};

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart`");
    header('location:../../users/pages/cart.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admin/styles/sylesadd.css">
    <title>Carrito De Compras</title>
</head>

<body>


    <div class="container">
        <nav class="heading__mio">

            <a class="heading__mio" href="../pages/homeuser.php">Inicio</a>

            <a class="heading__mio" href="../pages/ashuda.php">Ayuda</a>

            <?php
            /**
             * La variable $select_rows seleciona nuestra tabla llamada "Cart" de nuestra base de datos,  y una condicional que si preciona el boton eliminar todo se va eliminar todo lo que hay en nuestro carrito de compras
             */
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');

            /**
             * Esta variable es el contador de los productos que se han agregado al carrito
             */
            $row_count = mysqli_num_rows($select_rows);

            ?>

            <a href="cart.php" class="cart">carrito <span>(🛒<?php echo $row_count; ?>)</span> </a>
            <a id="lg" href="../../login.html">Cerrar Sesion</a>

        </nav>

        <section class="shopping-cart">
            <h1 class="heading">Tu Carrito de compras</h1>

            <table>

                <thead>
                    <th>Comida</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Precio Total</th>
                    <th>Acción</th>
                </thead>

                <tbody>
                    <?php

                    /**
                     * La variable $select_cart seleciona nuestra tabla llamada "Cart" de nuestra base de datos
                     */
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    /**
                     * Esta variable es el precio total a pagar por el cliente - se inicia en cero porque no hay nada en el carrito
                     */
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {



                    ?>

                            <tr>
                                <td><img src="../../../../Modelo/uploaded_img/<?php echo $fetch_cart['image'] ?>" height="100" alt="A"></td>
                                <td><?php echo $fetch_cart['name'] ?></td>
                                <td>$<?php echo number_format($fetch_cart['price']); ?> Mxn.</td>

                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                                        <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                                        <input type="submit" value="Actualizar" name="update_update_btn">
                                    </form>
                                </td>
                                <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?> Mxn.</td>
                                <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('¿Estas Seguro de eliminar esto del carrito?')" class="delete-btn"> <i class="fas fa-trash"></i> Eliminar</a></td>

                            </tr>

                    <?php
                            $grand_total += $sub_total;
                        };
                    };
                    ?>
                    <tr class="table-bottom">
                        <td><a href="../../../pages/users/pages/homeuser.php" class="option-btn">Volver al Menú</a></td>
                        <td colspan="3">Total A Pagar</td>
                        <td>$<?php echo $grand_total; ?> Mxn.</td>
                        <td><a href="../../users/pages/cart.php?delete_all" onclick="return confirm('¿Estas Seguro que quieres eliminar todo del carrito?');" class="delete-btn"> <i class="fas fa-trash"></i> Eliminar Todo </a></td>
                    </tr>
                </tbody>



            </table>

            <div class="checkout-btn">
                <!-- <a href="../../../pages/users/pages/pagar.php" class="btn"> Pagar</a> -->
                <a href="../../../pages/users/pages/pagar.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Realizar Pedido</a>

            </div>




        </section>

    </div>

</body>

</html>