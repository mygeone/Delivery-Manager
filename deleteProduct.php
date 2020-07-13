<?php
include("config.php");
include("header.php");
include("footer.php");

$idToDelete = pg_escape_string($_GET['id']);

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
header('Refresh: 2; URL=/proyectoBDD/productosMenu.php');
    ?>
?>

<!---
DELETE FROM public."Productos" 
WHERE "Prod_ID" = '4559' 
-->