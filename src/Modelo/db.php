<?php
/*define('user', 'root');
define('pasword', '');
define('HOST', 'localhost');
define('DATABASE', 'restaurante');


try{
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, user, pasword);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
*/





    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'Restaurante'
    );

    /*if(isset($conn)){
        echo 'DB esta conectada';
    }*/

?>