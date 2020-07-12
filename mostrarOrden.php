<?php
include("header.php");
include("config.php");

    #--------Verifica si orden fue cancelada------
    $orderToVerify = pg_escape_string($_GET['order']);
    $query = ' SELECT "Estado_Orden" 
                        from public."Orden"
                        where "Orden_ID" ='."'".$orderToVerify."'";
    $q = pg_query($conexion,$query);
    $results = pg_fetch_all($q);    
    
    if(pg_affected_rows($q) == 0){
        echo '
        <div class="container my-4 mx-5">
            <div class="lead">Los datos de orden no estan disponibles. <br>
            La orden fue eliminada o el numero de orden es incorrecto
            </div>
        </div>
        ';
        exit();
    }

    if($results[0]['Estado_Orden'] == 'Cancelada'){
        echo '
        <div class="container my-4 mx-5">
            <div class="lead">Los datos de orden no estan disponibles <br>
            porque la orden fue cancelada.
            </div>
        </div>
    ';
    } else {




#-----escribir metodo pago en orden detalle-----
foreach($_POST as $aliasMetodo => $status){
    $aliasMetodo = str_replace('_',' ',($aliasMetodo));
    #$AliasDireccion = $aliasMetodo;
    $sql = 'UPDATE public."OrdenDetalle" 
            SET "Alias_Metodo" = '."'".$aliasMetodo."'".' 
            where "Orden_Detalle_ID" ='."'".$_GET['order']."'";
   
    $q = pg_query($conexion,$sql);
    $results = pg_fetch_all($q);
}
?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="container mt-5 py-3 ">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center border border-black py-3">Detalles de Orden</div>
                </div>
                <div class="row mt-1">
                    <div class="col-12 border border-black py-3">
                        <?php
                        $sql = ' SELECT "Cliente_ID", "Estado_Orden"
                                from public."Orden"
                                where "Orden_ID" ='."'".$_GET['order']."'".'

                        ';
                        $q = pg_query($conexion,$sql);
                        $results = pg_fetch_assoc($q);
                        ?>
                        <div class="row ">
                            <div class="col-5 ">ID de Orden: </div>
                            <div class="col-7 "><?php echo $_GET['order'] ?></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-5">Rut Cliente: </div>
                            <div class="col-7"> <?php echo $results['Cliente_ID'] ?> </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-5">Estado Orden: </div>
                            <div class="col-7"> <?php echo $results['Estado_Orden'] ?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-----asa--->
        <div class="col-8">

            <div class="container-fluid mt-5 py-3 px-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center  border border-black py-3 px-3">Detalles de Productos</div>
                </div>
                <div class="row mt-2 mt-1 ">
                    <div class="col-12  border border-black py-3 px-3">
                       <div class="row">
                        <div class="col-3">ID Producto</div>
                        <div class="col-3">Nombre Producto</div>
                        <div class="col-3">Cantidad Producto</div>
                        <div class="col-3">Precio Total</div>
                    </div>

            <?php 
            
            #-----QUERY ORDEN-------
            $sql = 'SELECT *
                    from public."OrdenDetalle"
                    where "Orden_Detalle_ID" ='."'".$_GET['order']."'";
            $q = pg_query($conexion,$sql);
            $results = pg_fetch_assoc($q);
            $ProdsPagados_ID = explode(",", $results['ProdsPagados_ID']);
            $ProdsPagados_Precio = explode(",", $results['ProdsPagados_Precio']);
            $ProdsPagados_Cantidad = explode(",", $results['ProdsPagados_Cantidad']);

            
            $ProdsPagados_Precio = str_replace('{','',$ProdsPagados_Precio);
            $ProdsPagados_Precio = str_replace('}','',$ProdsPagados_Precio);
            

            $ProdsPagados_Cantidad = str_replace('{','',$ProdsPagados_Cantidad);
            $ProdsPagados_Cantidad = str_replace('}','',$ProdsPagados_Cantidad);


            $array = '';
            foreach($ProdsPagados_ID as $key => $value){
                $array .= "'".$value."'".",";
            }
            $newArray = rtrim($array, ", ");

            $newArray = str_replace('{','(',$newArray);
            $newArray = str_replace('}',')',$newArray);
            $newArray = str_replace("'(","('",$newArray);
            $newArray = str_replace(")'","')",$newArray);
            
            #-----QUERY PRODUCTOS--------
            $sql = 'SELECT * 
                    from public."Productos"
                    where "Prod_ID" in '.$newArray;
            $q = pg_query($conexion,$sql);

            $results = pg_fetch_all($q);            
            
            foreach($results as $key => $dataProduct){
            echo '
            <div class="row">
                <div class="col-3">'.$dataProduct['Prod_ID'].'</div>
                <div class="col-3">'.$dataProduct['Nombre_Prod'].'</div>
                <div class="col-3">'.$ProdsPagados_Cantidad[$key].'</div>
                <div class="col-3">'.$ProdsPagados_Precio[$key].'</div>
            </div> 
            ';
             } ?>


        </div>
    </div>
    </div>
</div>
        

<div class="container">
    <div class="row">
        <!-- DETALLE PAGO -->
        <div class="col-6">
            <div class="container border border-black mt-5  py-3 px-3 ">
                <div class="row d-flex justify-content-center"><div class="col-6">Detalles de Metodo de Pago</div></div>
            </div>
            <!-- DETALLE PAGO -->
            <?php $sql = 
                'select "Numero_Tarjeta", "Fecha_Exp","MetodoPago"."Alias_Metodo"
                from public."OrdenDetalle",public."MetodoPago",public."Orden"
                where "OrdenDetalle"."Alias_Metodo" = "MetodoPago"."Alias_Metodo"
                and "Orden"."Cliente_ID" = "MetodoPago"."Rut_Titular"
                and "OrdenDetalle"."Orden_Detalle_ID" = "Orden"."Orden_ID"
                and "OrdenDetalle"."Orden_Detalle_ID" ='."'".$_GET['order']."'".' 
            ';
            $q = pg_query($conexion,$sql);
            $resultsMetodoPago = pg_fetch_assoc($q);
            #print_r($resultsMetodoPago);
            ?>
            <div class="container border border-black mt-1  py-3 px-3 ">
                <div class="row ">
                    <div class="col-4">Numero Tarjeta: </div>
                    <div class="col-4"><?php echo $resultsMetodoPago['Numero_Tarjeta'] ?></div>
                </div>
                <div class="row ">
                    <div class="col-4">Fecha Exp : </div>
                    <div class="col-4"><?php echo $resultsMetodoPago['Fecha_Exp'] ?></div>
                </div>
                <div class="row ">
                    <div class="col-4">Alias Metodo:</div>
                    <div class="col-4"><?php echo $resultsMetodoPago['Alias_Metodo'] ?></div>
                </div>
            </div>
        </div> 
        


        <div class="col-6">
            <div class="container border border-black mt-5  py-3 px-3">
                <div class="row d-flex justify-content-center"><div class="col-6">Detalles de Direccion de Envio</div></div>
            </div>
            <!-- DETALLE Envio -->
            <?php $sql = 
                'select "Calle", "Numero","Comuna","Ciudad",  "Direccion"."Alias_Direccion"
                from public."OrdenDetalle",public."Direccion",public."Orden"
                where public."OrdenDetalle"."Alias_Direccion" = public."Direccion"."Alias_Direccion"
                and public."Orden"."Cliente_ID" = public."Direccion"."Rut_Titular"
                and public."OrdenDetalle"."Orden_Detalle_ID" = public."Orden"."Orden_ID"
                and public."OrdenDetalle"."Orden_Detalle_ID" ='."'".$_GET['order']."'".' 
                
            
            ';
            $q = pg_query($conexion,$sql);
            #print($sql);
            $resultsDireccion = pg_fetch_assoc($q);
            #print_r($resultsDireccion);
            ?>
            <div class="container border border-black mt-1  py-3 px-3">
                <div class="row ">
                    <div class="col-4">Calle: </div>
                    <div class="col-4"><?php echo $resultsDireccion['Calle'] ?></div>
                </div>
                <div class="row ">
                    <div class="col-4">Numero: </div>
                    <div class="col-4"><?php echo $resultsDireccion['Numero'] ?></div>
                </div>
                <div class="row ">
                    <div class="col-4"> Comuna:</div>
                    <div class="col-4"><?php echo $resultsDireccion['Comuna'] ?></div>
                </div>
                <div class="row ">
                    <div class="col-4"> Ciudad:</div>
                    <div class="col-4"><?php echo $resultsDireccion['Ciudad'] ?></div>
                </div>
                <div class="row ">
                    <div class="col-4"> Alias Direccion:</div>
                    <div class="col-4"><?php echo $resultsDireccion['Alias_Direccion'] ?></div>
                </div>
            </div>
        </div>         
    </div>
</div>

<div class="container">
    <a href="\proyectoBDD\api\cancelarOrden.php\?idToDelete=<?php echo $_GET['order'];?>" class="btn btn-danger" role="button">Cancelar Orden</a>
</div>
            <?php } ?>

<!-----  query mostrar direccion

$sql = 
                'SELECT "Calle","Numero","Comuna","Ciudad","Direccion"."Alias_Direccion"
                from public."Direccion",public."Cliente",public."Orden",public."OrdenDetalle" 
                where public."OrdenDetalle"."Orden_Detalle_ID" ='."'".$_GET['order']."'".' 
                and public."Orden"."Orden_ID" = public."OrdenDetalle"."Orden_Detalle_ID" 
                and public."Orden"."Cliente_ID" = public."Cliente"."Cliente_ID" 
                and public."Direccion"."Rut_Titular" = public."Cliente"."Cliente_ID"
                and public."Direccion"."Alias_Direccion" = (SELECT "Alias_Direccion"
                                                                  from public."OrdenDetalle"
                                                                  where "Orden_Detalle_ID" ='."'".$_GET['order']."'".');
                
            ';
--->


 <!-- DETALLE PAGO
 $sql = 
                'SELECT "Numero_Tarjeta","Fecha_Exp",public."MetodoPago"."Alias_Metodo"
                from public."MetodoPago",public."Cliente",public."Orden",public."OrdenDetalle"
                where public."OrdenDetalle"."Orden_Detalle_ID" ='."'".$_GET['order']."'".'
                and public."Orden"."Orden_ID" = public."OrdenDetalle"."Orden_Detalle_ID"
                and public."Orden"."Cliente_ID" = public."Cliente"."Cliente_ID"
                and public."MetodoPago"."Rut_Titular" = public."Cliente"."Cliente_ID"
            ';