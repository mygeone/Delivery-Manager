<?php
session_start();
print_r($_SESSION);

$numOrder = rand(1000,9999);
$clienteOrden = $_GET['rut'];
$estadoOrden = 'En Preparacion';

$productos = array();
foreach($_SESSION['cart'][$_GET['rut']] as $idProd => $cantidad){
    print($idProd." --- ".$cantidad);
    echo '<br>';
}
?>
