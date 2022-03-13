<!-- Conectar Esta Pagina que es el login del admin -->
<?php

include('../../../../Modelo/db.php');

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
    <link rel="stylesheet" href="/src/Vista/pages/admin/styles/sylesadd.css">


</head>

<body>

    <div class="nav-bg">
        <nav class="navegacion contenedor">

            <a href="../pages/homeuser.php">Inicio</a>

            <a href="../pages/ashuda.html">Ayuda</a>


            <a id="lg" href="../../login.html">Cerrar Sesion</a>



        </nav>
    </div>

    <header class="headermio">
        <h1>Bienvenido de Nuevo</h1>
        <p>¿Que vas a ordenar hoy?!</p>
        <h1 class="headermio">Menú</h1>
    </header>

    <main>

        <div class="container">
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
                                    <img src="/src/Modelo/uploaded_img/<?php echo $fetch_comida['image']; ?>" alt="Hola soy una imagen">
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