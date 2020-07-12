<?php
include("../config.php");
include("../header.php");

$sql = ' INSERT INTO public."Productos" ("Prod_ID","Nombre_Prod","Precio_Prod","Cant_Prod")
        values ('."'".$_POST['IDProductToAdd']."'".','."'".$_POST['NameProductToAdd']."'".','."'".$_POST['priceProductToAdd']."'".','."'".$_POST['stockProductToAdd']."'".')
        ';
$q = pg_query($conexion,$sql);

echo '
<div class="container my-4 mx-5">
    <div class="lead">Producto Agregado Con Exito!
    </div>
</div>
';

?>