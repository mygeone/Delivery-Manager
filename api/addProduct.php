<?php
include("../config.php");
include("../header.php");
include("../footer.php");

$sql = ' INSERT INTO public."Productos" ("Prod_ID","Nombre_Prod","Precio_Prod","Cant_Prod")
        values ('."'".$_POST['IDProductToAdd']."'".','."'".$_POST['NameProductToAdd']."'".','."'".$_POST['priceProductToAdd']."'".','."'".$_POST['stockProductToAdd']."'".')
        ';
$q = pg_query($conexion,$sql);
#print($sql);

if(!$q){
    echo'
    <div class="container my-4 mx-5">
        <div class="lead">ID de producto ya existe en la base de datos.</div>
    </div>
    ';
}else{
    echo '
    <div class="container my-4 mx-5">
        <div class="lead">Producto Agregado Con Exito!</div>
    </div>
    ';
}

header('Refresh: 4; URL=/proyectoBDD/productosMenu.php');
?>
<!--sql

INSERT INTO public."Productos" 
("Prod_ID","Nombre_Prod","Precio_Prod","Cant_Prod") 
values ('97598','Helado Chocolate','1000','90') 
-->