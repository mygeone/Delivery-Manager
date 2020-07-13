<?php
session_start();
include("../config.php");
include("../footer.php");

#----datos ordenes-------
$numOrder = rand(1000,99999);
$clienteOrden = $_GET['rut'];
$estadoOrden = 'En Preparacion';

#-----productos/cantidad a array------
$productos = array();
$productosCantidad = array();


    #---INSERT ORDEN-----
    $sql = 'insert into public."Orden" ("Orden_ID","Cliente_ID","Estado_Orden")
        values ('."'".$numOrder."',"."'".$clienteOrden."',"."'".'En Preparacion'."'".')
        ';
    $q = pg_query($conexion,$sql);

    #---INSERT ordenDetalleProductos
    foreach($_SESSION['cart'][$_GET['rut']] as $idProd => $cantidad){
    $PrecioQuery = ' select "Precio_Prod"
            from public."Productos"
            where "Prod_ID" = '."'".$idProd."'".'
    ';
    $q = pg_query($conexion,$PrecioQuery);
    $resultsPrecio = pg_fetch_assoc($q,'Precio_Prod');
    $insertQuery = ' insert into public."OrdenDetalleProductos" ("Orden_ID","ID_Producto_Pagado","Cant_Producto_Pagado","Precio_Producto_Pagado")
                        values ('  ."'".$numOrder."',"   ."'".$idProd."',"."'".$cantidad."',"."'".$resultsPrecio['Precio_Prod']."'".')
    ';
    $q = pg_query($conexion,$insertQuery);


    #----update stock----
    $sqlUpdateStock = 'UPDATE public."Productos" 
                        SET "Cant_Prod" = "Cant_Prod" -'.$cantidad.' 
                        WHERE "Prod_ID"='."'".$idProd."'".' 
                ';
    $q = pg_query($conexion,$sqlUpdateStock);
}

header('Location: \proyectoBDD\elegirDireccion.php\?step=1&rut='.$_GET['rut'].'&order='.$numOrder);




















































die();

#------pregunta por el total pagado--------
$preSql = '';
$count = 0;
foreach($productos as $key => $ID){
    $count++;
    if($count == 0){
        $preSql = ' SELECT "Precio_Prod" FROM public."Productos" WHERE'.'"Prod_ID"='."'".$ID."'";
    }else if($count != 0 and $count != count($productos)){
        $preSql .= ' SELECT "Precio_Prod" FROM public."Productos" WHERE'.'"Prod_ID"=' ."'".$ID."'".'UNION ALL';
    }else if($count == count($productos)){
        $preSql .= ' SELECT "Precio_Prod" FROM public."Productos" WHERE'.'"Prod_ID"=' ."'".$ID."'";
    }
}
$sql = 'select sum("Precio_Prod")
        from ('.$preSql.') as Precio_Prod';
$q = pg_query($conexion,$sql);
$results = (pg_fetch_array($q));

#-------Precio total pagado por todos los productos------
$precioPagado = $results['sum'];

#-------escribe la orden--------
$sqlOrden = ' INSERT into public."Orden" ("Orden_ID","Cliente_ID","Estado_Orden")
                values ( '."'".$numOrder."'".' ,'."'".$clienteOrden."'".','."'".$estadoOrden."'".')';
$q = pg_query($conexion,$sqlOrden);
$results = pg_fetch_assoc($q);


#--------Orden detalle-----------

        #----Precio por cada producto----
        $preProductosArray = implode("','", $productos);
        $productosArray = "'".$preProductosArray."'";
        $sql = ' SELECT "Prod_ID","Precio_Prod" 
                from public."Productos"
                where "Prod_ID" in ('.$productosArray.')';
        $q = pg_query($conexion,$sql);
        $results = pg_fetch_all($q);

        #--------PRECIO Y CANTIDAD POR CADA producto----->
        $dataProductosOrden = array ();
        foreach($results as $key => $value){
            foreach($productosCantidad as $key2 => $value2){
            $dataProductosOrden[$value['Prod_ID']]= array("precio" => $value['Precio_Prod'],
                                                            "cantidad" => $_SESSION['cart'][$_GET['rut']][$value['Prod_ID']]);
            }
        }

        #----data to arrays----
        
            #----array de ID----
            $listProducts = array();
            $listCantidad = array();
            $listPrecios = array();
            foreach($dataProductosOrden as $ID => $precioYCantidad){
                $listProducts[] = $ID;
                $listCantidad[] = $precioYCantidad['cantidad'];
                $listPrecios[] = $precioYCantidad['precio'];
            }
    
            $array = implode("','", $listProducts);
            $array2 = implode("','", $listCantidad);
            $array3 = implode("','", $listPrecios);

            $ProductsToDetailedOrder = "'".$array."'";
            $QuantityToDetailedOrder = "'".$array2."'";
            $PricesToDetailedOrder = "'".$array3."'";

#----QUERY: ESCRIBE ORDEN DETALLE---------
$preSqlOrdenDetalle = 'INSERT into public."OrdenDetalle" ("Orden_Detalle_ID","ProdsPagados_ID","ProdsPagados_Precio","ProdsPagados_Cantidad")
                       values ('.$numOrder.', array['.$ProductsToDetailedOrder.'],array['.$PricesToDetailedOrder.'],array['.$QuantityToDetailedOrder.']) ';
$q = pg_query($conexion,$preSqlOrdenDetalle);



header('Location: \proyectoBDD\elegirDireccion.php\?step=1&rut='.$_GET['rut'].'&order='.$numOrder);
?>


