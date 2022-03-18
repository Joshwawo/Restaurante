<?php

include('../../../../Modelo/db.php');

/**
 *La variable $select_rows seleciona nuestra tabla llamada "Cart" de nuestra base de datos,  y una condicional que si se preciona un boton nos llevaria a la pagina de pagar, y introduceriamos todos nuestros informacion del pedido
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $ad1 = $_POST['address1'];
    $ad2 = $_POST['adress2'];
    $city = $_POST['colony'];
    $pc = $_POST['pc'];
    $message = $_POST['message'];

    
    
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
if (isset($_POST['order_btn'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    // $state = $_POST['state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` ");
    $price_total = 0;

    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ') ';
            $product_price = number_format($product_item['price'] * $product_item['quantity']);
            $price_total += $product_price;
        };
    };
    $total_product = implode(', ', $product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$country','$pin_code','$total_product','$price_total')") or die('query failed');

    if ($cart_query && $detail_query) {
        echo "
        <div class='order-message-container'>
        <div class='message-container'>
           <h3>Gracias Por Tu Compra!</h3>
           <div class='order-detail'>
              <span>" . $total_product . "</span>
              <span class='total'>Su total : $" . $price_total . " Mxn.  </span>
           </div>
           <div class='customer-details'>
              <p> Tu Nombre : <span>" . $name . "</span> </p>
              <p> Tu numero : <span>" . $number . "</span> </p>
              <p> Tu email : <span>" . $email . "</span> </p>
              <p> Tu Direccion : <span>" . $flat . ", " . $street . ", " . $city . ", - " . $pin_code . "</span> </p>
              <p> Mensaje : <span>" . $country . "</span> </p>
              <p> Tu Metodo De Pago : <span>" . $method . "</span> </p>
              <p style='font-weight:bold' ></p>
           </div>
              <a href='../../../pages/users/pages/homeuser.php' class='btn'>Continuar Comprando</a>
           </div>
        </div>
        ";
    }
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admin/styles/sylesadd.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">

    <title>Pago</title>
</head>

<body>

    <div class="container">

        <section class="checkout-form">
            <nav class="heading__mio">
                <a class="heading__mio" href="../pages/homeuser.php">Inicio</a>
                <a class="heading__mio" href="../pages/ashuda.php">Ayuda</a>
                <?php
                $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');

                /**
                 * Esta variable es el contador de los productos que se han agregado al carrito
                 */
                $row_count = mysqli_num_rows($select_rows);
                ?>
                <a href="cart.php" class="cart">carrito <span>(🛒<?php echo $row_count; ?>)</span> </a>
                <a id="lg" href="../../login.html">Cerrar Sesion</a>
            </nav>

            <h1 class="heading">Completa Tu Pedido</h1>
            <form action="" method="POST">
                <div class="display-order">
                    <?php
                    /**
                     * La variable $select_rows selecciona nuestra tabla llamada "Cart" de nuestra base de datos.

                     */
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    /**
                     * Esta variable almacena el total final que el cliente va a pagar
                     */
                    $total = 0;
                    /**
                     * Esta variable es el precio total a pagar por el cliente en la pantalla de pagar
                     */
                    $grand_total = 0;

                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                            $grand_total = $total += $total_price;

                    ?>
                            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                    <?php
                        }
                        /**
                         *Esta condicional else, hace referencia que si no hay productos agregados al carrito de compras nos saldra un aviso que el carrito de compras esta vacio y no dejara hacer la compra si esta vacio

                         */
                    } else {

                        echo "<div class='display-order'><span>Tu Carrito Esta Vacio</span></div>";
                    }
                    ?>
                    <span class="grand-total"> Su total a Pagar : $<?= $grand_total; ?> Mxn. </span>

                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Nombre*</span>
                        <input pattern="[a-zA-Z ]{2,254}" title="Solo Letras" type="text" placeholder="Introduce Tu Nombre Completo*" name="name" required>
                    </div>
                    <div class="inputBox">
                        <span>Numero De Telefono*</span>
                        <input title="Solo numeros" pattern="^[0-9]+" min="10" max="10" type="text" placeholder="Introduce Tu Numero" name="number" required>

                    </div>
                    <div class="inputBox">
                        <span>Tu Email*</span>
                        <input pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="correo@correo.com" type="email" placeholder="Introduce Tu Email" name="email" required>
                    </div>

                    <div class="inputBox">
                        <span>Metodo De Pago*</span>
                        <select name="method" id="">

                            <option value="Metodo" disabled selected>Elegir Metodo de Pago</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Paypal">Paypal</option>
                        </select>
                    </div>

                    <div class="inputBox">
                        <span>Direccion 1*</span>
                        <input type="text" placeholder="ave. col. no." name="flat" required>
                    </div>
                    <div class="inputBox">
                        <span>Direccion 2<small style="font-size: 1.2rem;">*Opcional*</small> </span>
                        <input type="text" placeholder="piso. departamento." name="street">
                    </div>

                    <div class="inputBox">
                        <span>Colonia*</span>
                        <input type="text" placeholder="Colonia" name="city" required>
                    </div>

                    <!-- <div class="inputBox">
                        <span>Nose que poner aqui</span>
                        <input type="text" placeholder="Undefined" name="state" >
                    </div> -->

                    <!-- <div class="inputBox">
                        <span>Codigo Postal*</span>
                        <input 
                        pattern="/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/"
                         type="number" placeholder="CodigoPostal" name="pin_code" required>
                    </div> -->

                    <div class="inputBox">
                        <span>Mensaje <small style="font-size: 1.2rem;">*Opcional*</small> </span>
                        <input  type="text" placeholder="Podrian Agregar Cubiertos Extras." name="country">
                    </div>
                    <!-- <a href="../../users/pages/cart.php?delete_all" onclick="return confirm('¿Estas Seguro que quieres eliminar todo del carrito?');" class="delete-btn"> <i class="fas fa-trash"></i> Eliminar Todo </a> -->

                    <input type="submit" value="Confirmar Pedido" name="order_btn" class="btn">







                    <!-- <input type="submit" value="Realizar Pedido" name="order_btn" class="btn"> -->








                </div>
                <!--FIN FLEX  -->



            </form>


        </section>
    </div>

</body>

</html>