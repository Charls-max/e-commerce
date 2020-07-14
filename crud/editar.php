<?php

// echo 'editar.php?id=1&color=success&descripcion=este es un color verde';
// echo '<br>';

$id = $_GET['id'];
$codigo= $_GET['codigo'];
$descripcion = $_GET['descripcion'];

echo $id;
echo '<br>';
echo $codigo;
echo '<br>';
echo $descripcion;

include_once 'conexion.php';

$sql_editar = 'UPDATE productos SET codigo=?,descripcion=? WHERE id=?';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($codigo,$descripcion,$id));

//cerramos conexión base de datos y sentencia
$pdo = null; 
$sentencia_editar = null; 

header('location:index.php');