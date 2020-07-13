<?php
include("header.php");
include("config.php");
include("footer.php");

    #--------Verifica si orden fue cancelada------
    $orderToVerify = pg_escape_string($_GET['order']);
    $query = ' SELECT "Estado_Orden" 
                        from public."Orden"
                        where "Orden_ID" ='."'".$orderToVerify."'";
    $q = pg_query($conexion,$query);
    $results = pg_fetch_all($q);    
    #print($query);

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
    $sql = 'UPDATE public."Orden" 
            SET "Alias_Metodo" = '."'".$aliasMetodo."'".' 
            where "Orden_ID" ='."'".$_GET['order']."'";
   
    $q = pg_query($conexion,$sql);
    $results = pg_fetch_all($q);
    #print($sql);
}

?>
<div class="container">
    <p class="display-4 my-5">Detalles de orden</p>
    <div class="row">
        <div class="col-4">
            <div class="container mt-5 py-3 ">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center border border-black py-3<div id="legend">
                        <div id="legend">
                            <legend class="">Detalles de orden</legend>
                         </div>
                    </div>
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

      
        <div class="col-8">

            <div class="container-fluid mt-5 py-3 px-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center  border border-black py-3 px-3">
                        <div id="legend">
                            <legend class="">Detalles de productos</legend>
                         </div>
                    </div>
                </div>
                <div class="row mt-2 mt-1 ">
                    <div class="col-12  border border-black py-3 px-3">
                       <div class="row">
                        <div class="col-2">ID Producto</div>
                        <div class="col-3">Nombre </div>
                        <div class="col-2">Cantidad</div>
                        <div class="col-3">Precio Producto</div>
                        <div class="col-2">Subtotal</div>
                    </div>

            <?php 
            
            #-----QUERY PRODUCTOS-------
            $sql = 'SELECT *
                    from public."OrdenDetalleProductos"
                    where "Orden_ID" ='."'".$_GET['order']."'";
            $q = pg_query($conexion,$sql);
            $results = pg_fetch_all($q);
            
            #print_r($results);
            
            
            foreach($results as $key => $dataProduct){
                $sql = ' select "Nombre_Prod"
                        from public."Productos"
                        where "Prod_ID" ='."'".$dataProduct['ID_Producto_Pagado']."'".    '
                ';




            echo '
            <div class="row">
                <div class="col-2">'.$dataProduct['ID_Producto_Pagado'].'</div>
                <div class="col-3">'.$dataProduct['Cant_Producto_Pagado'].'</div>
                <div class="col-2">'.$dataProduct['Cant_Producto_Pagado'].'</div>
                <div class="col-3">'.$dataProduct['Precio_Producto_Pagado'].'</div>
                <div class="col-2">$'.intval($dataProduct['Precio_Producto_Pagado'])*intval($dataProduct['Cant_Producto_Pagado']).'</div>
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
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div id="legend">
                            <legend class="">Detalles de Pago</legend>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DETALLE PAGO -->
            <?php $sql = 
                'select "Numero_Tarjeta", "Fecha_Exp","MetodoPago"."Alias_Metodo"
                from public."MetodoPago",public."Orden"
                where "Orden"."Alias_Metodo" = "MetodoPago"."Alias_Metodo"
                and "Orden"."Cliente_ID" = "MetodoPago"."Rut_Titular"
                and "Orden"."Orden_ID" ='."'".$_GET['order']."'".' 
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
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div id="legend">
                            <legend class="">Detalles de Envio</legend>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DETALLE Envio -->
            <?php $sql = 
                'select "Calle", "Numero","Comuna","Ciudad", "Direccion"."Alias_Direccion"
                from public."Orden",public."Direccion"
                where public."Orden"."Alias_Direccion" = public."Direccion"."Alias_Direccion"
                and public."Orden"."Cliente_ID" = public."Direccion"."Rut_Titular"
                and public."Orden"."Orden_ID" ='."'".$_GET['order']."'".' 
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

<!--sql

select "Calle", "Numero","Comuna","Ciudad", "Direccion"."Alias_Direccion" 
from public."Orden",public."Direccion" 
where public."Orden"."Alias_Direccion" = public."Direccion"."Alias_Direccion" 
and public."Orden"."Cliente_ID" = public."Direccion"."Rut_Titular" 
and public."Orden"."Orden_ID" ='49697' 

SELECT "Estado_Orden" from public."Orden" where "Orden_ID" ='49697'

UPDATE public."Orden" 
SET "Alias_Metodo" = 'tarjeta principal' 
where "Orden_ID" ='49697'