<!-- Conectar Esta Pagina que es el login del admin -->
<?php

include('../../../../Modelo/db.php');
if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Producto ya agregado al carrito';
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

                <a class="heading__mio" href="../pages/ashuda.html">Ayuda</a>

                <?php

                $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);

                ?>

                <a href="cart.php" class="cart">carrito <span>(<?php echo $row_count; ?>)</span> </a>
                <a id="lg" href="../../login.html">Cerrar Sesion</a>

            </nav>
            <header class="headermio">
                <h1>Bienvenido de Nuevo</h1>
                <p>¿Que vas a ordenar hoy?!</p>
                <h1 class="headermio">Menú</h1>
            </header>

            <section class="products">
                <!-- Cambiar el color  -->
                <h1 class="heading">Ultimo agregados</h1>

                <div class="box-container">

                    <?php


                    $select_comidas = mysqli_query($conn, "SELECT * FROM `comidas`");
                    if (mysqli_num_rows($select_comidas) > 0) {
                        while ($fetch_comida = mysqli_fetch_assoc($select_comidas)) {

                    ?>
                            <form action="" method="post">

                                <div class="box">
                                    <img src="../../../../Modelo/uploaded_img/<?php echo $fetch_comida['image']; ?>" alt="Hola soy una imagen">
                                    <h3><?php echo $fetch_comida['name']; ?></h3>
                                    <div class="price">$<?php echo $fetch_comida['price']; ?> Mxn.</div>
                                    <input type="hidden" name="product_name" value="<?php echo $fetch_comida['name']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $fetch_comida['price']; ?>">
                                    <input type="hidden" name="product_image" value="<?php echo $fetch_comida['image']; ?>">


                                    <input type="submit" class="btn" value="Agregar al Carrito" name="add_to_cart">
                                </div>

                            </form>

                    <?php
                        };
                    };
                    ?>




                </div>

            </section>
        </div>


    </main>





</body>

</html>