<?php

//Recibiendo datos de imagen
$nombre_imagen=$_FILES['imagen'] ['name'];
$tipo_imagen=$_FILES['imagen'] ['type'];
$tamano_imagen=$_FILES['imagen'] ['size'];

//echo $_FILES['imagen'] ['size'];
echo $tipo_imagen;

//Carpeta destino
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/imagenes_subidas/e-commerce/';

//Moviendo imagen del dir temporal al escogido
move_uploaded_file($_FILES['imagen'] ['tmp_name'], $carpeta_destino.$nombre_imagen);


//Subiendo a la BD
// require("conexion.php");

// $sql = "INSERT INTO productos (imagen) VALUES ('$nombre_imagen')";
//$sql="UPDATE articulo SET imagen='$nombre_imagen' WHERE id='1'";
    // $sentencia = $pdo->prepare($sql);
    // $sentencia->execute(array($nombre_imagen));
    // $resultado = $sentencia->fetchAll();
    // echo "<br>";
    // echo "<br>";
 //   var_dump($resultado);




