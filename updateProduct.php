<?php
include('config.php');
#print_r($_POST);
$id = $_GET['id'];

$newNombre_Prod = pg_escape_string($_POST['newNombre_Prod']);
$newPrecio_Prod = pg_escape_string($_POST['newPrecio_Prod']);
$newCant_Prod = pg_escape_string($_POST['newCant_Prod']);


$preSql = ' UPDATE public."Productos" SET ';

if ($newNombre_Prod != ''){
    $preSql .= ' "Nombre_Prod" ='."'" .$newNombre_Prod."',";
}if($newPrecio_Prod != ''){
    print("hola");
    $preSql .= ' "Precio_Prod" ='."'" .$newPrecio_Prod."',";
}if($newCant_Prod != ''){
    $preSql .= ' "Cant_Prod" ='."'" .$newCant_Prod."'";
}
$preSql .= 'WHERE "Prod_ID" ='."'".$id."'";

$results = pg_query($conexion, $preSql);
