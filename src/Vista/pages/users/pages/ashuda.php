<!-- Conectar Esta Pagina que es el login del admin -->
<?php

include('../../../../Modelo/db.php');
if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");
    /**
     * Esta condicional if, hace referencia a que ya se a seleccionado el producto y nos mostrara un mensa "Producto ya agregado al carrito", no nos dejara agarrarlo otra vez, y la condicional else hace refencia a que si no esta en el carrito nos dejara agregarlo al carrrito de compras y nos aparecera el mensaje "Producto Agregado Correctamente"
     */
    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Producto ya fue agregado al carrito';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
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
    <title>Home User</title>
    <!-- <link rel="stylesheet" href="/Restaurante/src/Vista/pages/users/styles/normalice.css">
    <link rel="stylesheet" href="/Restaurante/src/Vista/pages/users/styles/stylescliente.css"> -->
    <link rel="stylesheet" href="../styles/normalice.css">
    <!-- <link rel="stylesheet" href="../styles/stylescliente.css"> -->
    <link rel="stylesheet" href="../styles/stails.css">

    <link rel="stylesheet" href="../../admin/styles/sylesadd.css">



</head>

<body>

    <?php

    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        };
    };

    ?>
    <main>

        <div class="container">
            <nav class="heading__mio">
                <a class="heading__mio" href="../pages/homeuser.php">Inicio</a>
                <a class="heading__mio" href="../pages/ashuda.php">Ayuda</a>
                <?php
                /**
                 *La variable $select_rows seleciona nuestra tabla llamada "Cart" de nuestra base de datos y si no encuentra la tabla nos mandara un error de fallo de consulta
                 */
                $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                /**
                 * Esta variable es el contador de los productos que se han agregado al carrito
                 */
                $row_count = mysqli_num_rows($select_rows);
                ?>
                <a href="cart.php" class="cart headermio_mio--2">carrito <span>(🛒<?php echo $row_count; ?>)</span> </a>
                <a class="heading__mio" id="lg" href="../../login.html">Cerrar Sesion</a>
            </nav>
            <header class="headermio">
                <h1 class="headermio--h1">¿Necesitas Ayuda?</h1>
                <p class="headermio--p">¡Talvez esto puede ayudarte!</p>

            </header>


        </div>


    </main>





</body>

</html>