<?php
include("../header.php");
include("../config.php");
include("../footer.php");
$userToDelete = pg_escape_string($_GET['idToDelete']);

function rut( $rut ) {
    return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}


$sql = ' DELETE FROM public."Cliente"
         WHERE "Cliente_ID" ='."'".$userToDelete."'".'
    ';
    $q = pg_query($conexion,$sql);
    $results = pg_fetch_row($q);

if($results == 1){
    echo '
        <div class="container my-4 mx-5">
            <div class="lead">Cliente eliminado con exito
            </div>
        </div>
    ';
}else if ($results == 0){
    echo '
        <div class="container my-4 mx-5">
            <div class="lead">Cliente no existe en los registros
            </div>
        </div>
    ';
    }
?>