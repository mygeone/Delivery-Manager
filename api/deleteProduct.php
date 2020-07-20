<?php
include("config.php");
include("header.php");
include("footer.php");

$idToDelete = pg_escape_string($_GET['id']);

$idToVerify = pg_escape_string($_GET['id']);
    $query = ' SELECT exists(   select "Orden"."Orden_ID" 
                                from public."Orden" , public."OrdenDetalleProductos" 
                                where "Orden"."Orden_ID" =  "OrdenDetalleProductos"."Orden_ID"
                                and "OrdenDetalleProductos"."ID_Producto_Pagado" = '."'".$idToVerify."'".'
                                and "Orden"."Estado_Orden" = '."'".'Cancelada'."'".'
                            )';
    $q = pg_query($conexion,$query);

    $results = pg_fetch_all($q);

    if($results[0]['exists'] == 't'){
        echo '
        <div class="container my-4 mx-5">
            <div class="lead">No puedes borrar este producto porque está <br>
            en una orden en preparacion.
            </div>
        </div>
        ';
        header('Refresh: 2; URL=/proyectoBDD/productosMenu.php');
        
       
    } else {
        
  




$query = 'DELETE FROM public."Productos" WHERE "Prod_ID" = '."'".$idToDelete."'";
#print($query);
$q = pg_query($conexion, $query);
$results = pg_fetch_all($q);

print_r($results);

echo '
        <div class="container my-4 mx-5">
            <div class="lead">Producto eliminado con exito.
            </div>
        </div>
    ';

}
header('Refresh: 2; URL=/proyectoBDD/productosMenu.php');
    ?>
<!---
DELETE FROM public."Productos" 
WHERE "Prod_ID" = '4559' 
-->