<?php
include("header.php");
include("config.php");

#  print_r($_POST);
$rut=$_POST['rut'];
$nombre=$_POST['nombre'];
$email=$_POST['email'];

$metodo_ID=$rut.'/0';
$Nombre_Metodo=$_POST['pago_tipo'];
$Numero_Tarjeta=$_POST['pago_numero'];
$Fecha_Expiracion=$_POST['pago_fecha'];
$CCV=$_POST['pago_ccv'];




#$queryUser = 'INSERT INTO public."Cliente"("Cliente_ID","Email","Nombre_Cliente") values ($1,$2,$3) ';
#$resultQueryUser = pg_query_params($conexion, $query, array($rut,$nombre,$email));

$queryPago = 'INSERT INTO public."MetodoPago"("Metodo_ID","Nombre_Metodo","Numero_Tarjeta","Fecha_Expiracion","CCV") values($1,$2,$3,$4,$5)';
$resultQueryPago = pg_query_params($conexion, $queryPago, array($metodo_ID,$Nombre_Metodo,$Numero_Tarjeta,$Fecha_Expiracion,$CCV));

$queryDireccion =  'INSERT INTO public."Direccion"( 

?>