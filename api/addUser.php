<?php
include("header.php");
include("config.php");
include("footer.php");

#print_r($_POST);

$rut=pg_escape_string($_POST['rut']);

function rut( $rut ) {
    return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}

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
            values ('."'".rut($rut)."'".','."'".$email."'".','."'".$nombre."'".') ';
#print($queryUser);
$resultQueryUser = pg_query($conexion, $queryUser);
if(!$resultQueryUser){
    echo '
        <div class="container my-4 mx-5">
            <div class="lead">Ya existe un usuario registrado con ese rut. <br>
            Porfavor ingrese un rut distinto.
            </div>
        </div>
    ';
}

$queryPago = 'INSERT INTO public."MetodoPago"("Rut_Titular","Alias_Metodo","Nombre_Metodo","Numero_Tarjeta","Fecha_Exp","CCV") 
            values('."'".$rut."'".','."'".$AliasPago."'".','."'".$nombre."'".','."'".$Numero_Tarjeta."'".','."'".$Fecha_Expiracion."'".','."'".$CCV."'".')';
#print($queryPago);
$resultQueryPago = pg_query($conexion, $queryPago);
if(!$resultQueryPago){
    echo '
        <div class="container my-4 mx-5">
            <div class="lead">Ya existe un metodo de pago ingresado con ese alias <br>
            para este usuario. Por favor elija otro alias.
            </div>
        </div>
    ';
}

$queryDireccion = 'INSERT INTO public."Direccion"("Rut_Titular","Calle","Numero","Comuna","Ciudad","Alias_Direccion") 
                values('."'".$rut."'".','."'".$DireccionCalle."'".','."'".$DireccionNum."'".','."'".$DirecionComuna."'".','."'".$DireccionCiudad."'".','."'".$DireccionAlias."'".')';
$resulQueryDirecicon = pg_query($conexion, $queryDireccion);

    if(!$resulQueryDirecicon){
        echo '
            <div class="container my-4 mx-5">
                <div class="lead">Ya existe una direccion ingresado con ese alias <br>
                para este usuario. Por favor elija otro alias.
                </div>
            </div>
        ';
        
    }

if(isset($resulQueryDirecicon) and isset($resultQueryPago) and isset($resultQueryUser)){
    echo '
            <div class="container my-4 mx-5">
                <div class="lead">Usuario registrado con exito.
                </div>
            </div>
        ';
        
}
header('Refresh: 2; URL=/proyectoBDD/adminClientes.php');
?>