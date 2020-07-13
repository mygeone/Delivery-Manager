<?php
include("../header.php");
include("../config.php");
include("../footer.php");
$idToDelete = pg_escape_string($_GET['idToDelete']);


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
            <div class="lead">Orden cancelada con exito
            </div>
        </div>
    ';

    #-----restore stock----

    $sqlGetPaidQuantity = ' select "ID_Producto_Pagado" 
                            from public."OrdenDetalleProductos"
                            where "Orden_ID" = '."'".$idToDelete."'".'
                        ';
    $results = pg_fetch_all(pg_query($conexion,$sqlGetPaidQuantity));

    
    foreach($results as $key => $value){

        $sqlUpdateStock = 'update public."Productos"
        set "Cant_Prod" = "Cant_Prod" + (select "Cant_Producto_Pagado" as toReStock
                                        from public."OrdenDetalleProductos"
                                        where "ID_Producto_Pagado" = '."'".$value['ID_Producto_Pagado']."'".'
                                        and "Orden_ID" = '."'".$idToDelete."'".')
        where "Prod_ID" = '."'".$value['ID_Producto_Pagado']."'".'
                ';
        
    #print($sqlUpdateStock);
    $q = pg_query($conexion,$sqlUpdateStock);
    $results = pg_affected_rows($q);
    }
    
        $q = pg_query($conexion,$sql);
        $results = pg_affected_rows($q);

}else if ($results == 0){
    echo '
        <div class="container my-4 mx-5">
            <div class="lead">Orden no existe en los registros
            </div>
        </div>
    ';
    }


    header( "refresh:2;url= \proyectoBDD\adminOrdenes.php" );
?>



<!----

update public."Productos" 
set "Cant_Prod" = "Cant_Prod" + (select "Cant_Producto_Pagado" as toReStock 
                                from public."OrdenDetalleProductos" 
                                where "ID_Producto_Pagado" = '7410' 
                                and "Orden_ID" = '49697') 
where "Prod_ID" = '7410'