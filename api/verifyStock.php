<?php
include("../config.php");
include("../header.php");
include("../footer.php");
#print_r($_POST);

$sql = 'SELECT "Cant_Prod" FROM public."Productos" where "Prod_ID" ='."'".pg_escape_string($_POST['id'])."'";
$q = pg_query($conexion,$sql);
$results = pg_fetch_assoc($q);


if($_POST['cantidad']<=0){

    echo '
    <div class="container my-4 mx-5">
        <div class="lead">Ingrese una cantidad mayor que 0.
        </div>
    </div>
    ';
    header( "refresh:2;url= \proyectoBDD\ingresarOrden.php\?step=1&rut=".$_POST['rutCliente']."" );
    
}else if($_POST['cantidad'] > $results['Cant_Prod']){
    echo '
    <div class="container my-4 mx-5">
        <div class="lead">La cantidad solicitada supera el stock disponible.
        </div>
    </div>
    ';
    header( "refresh:2;url= \proyectoBDD\ingresarOrden.php\?step=1&rut=".$_POST['rutCliente']."" );
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