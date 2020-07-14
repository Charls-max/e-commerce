<?php

$link = 'mysql:host=localhost;dbname=e_commerce_db';
$usuario = 'root';
$pass = 'root';

try{

    $pdo = new PDO($link,$usuario,$pass);

    //echo 'Conectado <br>';

    // foreach ($pdo->query('SELECT * FROM `usuarios`') as $fila) {
    //     print_r($fila);
    // }

}catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}