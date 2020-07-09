<?php
include("../config.php");
include("../header.php");
#print_r($_POST);

$sql = 'SELECT "Cant_Prod" FROM public."Productos" where "Prod_ID" ='."'".pg_escape_string($_POST['id'])."'";
$q = pg_query($conexion,$sql);
$results = pg_fetch_assoc($q);


if($_POST['cantidad']<=0){
    echo json_encode('Ingrese cantidad mayor que 0');
    header( "refresh:1;url= \proyectoBDD\ingresarOrden.php\?step=1&rut=".$_POST['rutCliente']."" );
    
    #header("Location:\proyectoBDD\ingresarOrden.php\?step=1&rut=".$_POST['rutCliente'].""  );
}else if($_POST['cantidad'] > $results['Cant_Prod']){
    echo json_encode('Cantidad supera stock maximo');
    header( "refresh:1;url= \proyectoBDD\ingresarOrden.php\?step=1&rut=".$_POST['rutCliente']."" );
}

if($_POST['cantidad'] > 0 and $_POST['cantidad'] <= $results['Cant_Prod']){
    #$_SESSION['cart'][$_POST['rutCliente']] = array($_POST['id'] => $_POST['cantidad']);
    #array_merge($_SESSION['cart'][$_POST['rutCliente']], array($_POST['id'] => $_POST['cantidad']));
    #array_push($_SESSION['cart'][$_POST['rutCliente']], array($_POST['id'] =>  $_POST['cantidad']));
    $_SESSION['cart'][$_POST['rutCliente']][$_POST['id']] = $_POST['cantidad'];
    header( "refresh:0;url= \proyectoBDD\ingresarOrden.php\?step=1&rut=".$_POST['rutCliente']."" );
}

#header("Location:\proyectoBDD\ingresarOrden.php\?step=1&rut=".$_POST['rutCliente']."");
?>