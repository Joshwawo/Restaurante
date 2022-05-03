<?php 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= productos.xls");

    

?>
<table  class="tabla hp">

<thead>
    <th>Nombre</th>
    <th>Metodo Pago</th>
    <th>Direccion</th>   
    <th>Telefono</th>
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
                <td class="td__admin"><?php echo $fetch_cart['flat'] . "," . $fetch_cart['city'] ?></td>
                <td class="td__admin"><?php echo $fetch_cart['number'] ?></td>
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
<a href="../../admin/pages/excel.php">Descargar Datos</a>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>