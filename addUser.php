<?php
include("header.php");
include("config.php");

print_r($_POST);

$rut=pg_escape_string($_POST['rut']);
$nombre=pg_escape_string($_POST['nombre']);
$email=pg_escape_string($_POST['email']);

$Nombre_Metodo=pg_escape_string($_POST['pago_tipo']);
$Numero_Tarjeta=pg_escape_string($_POST['pago_numero']);
$Fecha_Expiracion=pg_escape_string($_POST['pago_fecha']);
$CCV=pg_escape_string($_POST['pago_ccv']);
$AliasPago=pg_escape_string($_POST['pago_alias']);

$DireccionCalle = pg_escape_string($_POST['direccion_calle']);
$DireccionNum = pg_escape_string($_POST['direccion_numero']);
$DireccionCiudad=pg_escape_string($_POST['direccion_ciudad']);
$DirecionComuna = pg_escape_string($_POST['direccion_comuna']);
$DireccionAlias = pg_escape_string($_POST['direccion_alias']);


#$queryUser = 'INSERT INTO public."Cliente"("Cliente_ID","Email","Nombre_Cliente") values ($1,$2,$3) ';
#$resultQueryUser = pg_query_params($conexion, $query, array($rut,$nombre,$email));

#$queryPago = 'INSERT INTO public."MetodoPago"("Metodo_ID","Nombre_Metodo","Numero_Tarjeta","Fecha_Expiracion","CCV") values($1,$2,$3,$4,$5)';
#$resultQueryPago = pg_query_params($conexion, $queryPago, array($metodo_ID,$Nombre_Metodo,$Numero_Tarjeta,$Fecha_Expiracion,$CCV));

#$queryDireccion =  'INSERT INTO public."Direccion"( 

?>