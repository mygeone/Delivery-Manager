<?php
include("header.php");
include("config.php");

#print_r($_POST);

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


$queryUser = 'INSERT INTO public."Cliente"("Cliente_ID","Email","Nombre_Cliente") 
            values ('."'".$rut."'".','."'".$email."'".','."'".$nombre."'".') ';
#print($queryUser);
$resultQueryUser = pg_query($conexion, $queryUser);


$queryPago = 'INSERT INTO public."MetodoPago"("Rut_Titular","Alias_Metodo","Nombre_Metodo","Numero_Tarjeta","Fecha_Exp","CCV") 
            values('."'".$rut."'".','."'".$AliasPago."'".','."'".$nombre."'".','."'".$Numero_Tarjeta."'".','."'".$Fecha_Expiracion."'".','."'".$CCV."'".')';
#print($queryPago);
$resultQueryPago = pg_query($conexion, $queryPago);


$queryDireccion = 'INSERT INTO public."Direccion"("Rut_Titular","Calle","Numero","Comuna","Ciudad","Alias_Direccion") 
                values('."'".$rut."'".','."'".$DireccionCalle."'".','."'".$DireccionNum."'".','."'".$DirecionComuna."'".','."'".$DireccionCiudad."'".','."'".$DireccionAlias."'".')';
$resulQueryDirecicon = pg_query($conexion, $queryDireccion);

echo '
        <div class="container my-4 mx-5">
            <div class="lead">Usuario agregado con exito.
            </div>
        </div>
    ';

?>