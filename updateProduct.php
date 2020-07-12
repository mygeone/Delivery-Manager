<?php
include('config.php');
include("header.php");

$id = $_GET['id'];

$newNombre_Prod = pg_escape_string($_POST['newNombre_Prod']);
$newPrecio_Prod = pg_escape_string($_POST['newPrecio_Prod']);
$newCant_Prod = pg_escape_string($_POST['newCant_Prod']);


$preSql = ' UPDATE public."Productos" SET ';

if ($newNombre_Prod != ''){
    $preSql .= ' "Nombre_Prod" ='."'" .$newNombre_Prod."', ";
}if($newPrecio_Prod != ''){
    $preSql .= ' "Precio_Prod" ='."'" .$newPrecio_Prod."', ";
}if($newCant_Prod != ''){
    $preSql .= ' "Cant_Prod" ='."'" .$newCant_Prod."', ";
}
$preSql = rtrim($preSql, ", ");

$preSql .= 'WHERE "Prod_ID" ='."'".$id."'";

$results = pg_query($conexion, $preSql);
echo '
        <div class="container my-4 mx-5">
            <div class="lead">Producto modificado con exito.
            </div>
        </div>
    ';