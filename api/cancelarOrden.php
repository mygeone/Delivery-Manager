<?php
include("../header.php");
include("../config.php");
$idToDelete = pg_escape_string($_GET['idToDelete']);

$sql = ' DELETE FROM public."OrdenDetalle"
         WHERE "Orden_Detalle_ID" ='."'".$idToDelete."'".'
    ';
    $q = pg_query($conexion,$sql);
$Cancelada = 'Cancelada';

$sql = ' UPDATE public."Orden"
            set "Estado_Orden" ='."'".$Cancelada."'".' 
            where "Orden_ID" = '."'".$idToDelete."'".'
        ';

        $q = pg_query($conexion,$sql);
        $results = pg_affected_rows($q);

if($results == 1){
    echo '
        <div class="container my-4 mx-5">
            <div class="lead">Orden Eliminada con exito
            </div>
        </div>
    ';
}else if ($results == 0){
    echo '
        <div class="container my-4 mx-5">
            <div class="lead">Orden no existe en los registros
            </div>
        </div>
    ';
    }
?>