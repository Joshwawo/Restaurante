<!-- Conectar Esta Pagina que es el login del admin -->
<!-- Aqui Falta Mucho Codigo PhP -->

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
    <link rel="stylesheet" href="../styles/stylescliente.css">
    <link rel="stylesheet" href="/src/Vista/pages/admin/styles/sylesadd.css">


</head>

<body>

    <div class="nav-bg">
        <nav class="navegacion contenedor">

            <a href="../pages/homeuser.php">Inicio</a>
           
            <a href="../pages/ayuda.html">Ayuda(bot)</a>
            
            
            <a id="lg" href="../../login.html">Cerrar Sesion</a>
            
            
            
        </nav>
    </div>

    <header class="headermio">
        <h1>Bienvenido de Nuevo</h1>
        <p>¿Que vas a ordenar hoy?!</p>
    </header>

    <main>
        <section class="products">
            <h1 class="headermio">Menú</h1>
            <div class="box-container">
                <!-- Aqui falta codigo PHP -->
                <!-- Aqui falta codigo PHP -->
                <!-- -->
                <form action="" method="post">
                    <div class="box">
                        <img src="/src/Modelo/uploaded_img/ ?> alt="">
                        <h3>
                            <?php echo $fetch_product['price'];?>
                        </h3>

                        <!-- Esto Se tiene que arreglar con php -->
                        <div class="price">$<?php echo $fetch_product['price']; ?>/</div>


                        <!-- Codigo PHP -->
                        <input type=" hidden" name="product_name" value="<?php echo $fetch_product['name'];
                        ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price'];
                        ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image'];
                        ?>">
                        <input type="submit" class="btn" value="add to cart" name="add_to_cart">


                    </div>
                </form>


            </div>
        </section>
        


    </main>





</body>

</html>