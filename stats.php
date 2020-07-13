<?php

include("header.php");
include("config.php");
?>

<div class="container mt-5">
    <p class="display-4">Stats</p>
    <div class="row">
        <div class="col-4">
            <div id="legend">
                 <legend class="">Estadisticas Clientes</legend>
            </div>

            <div class="row my-3">
                <div class="col-7">Cliente que mas veces<br> ha comprado: </div>
                <?php 
                $sql = 'select x.*
                        from (	select "Cliente_ID", count(*) as total
                                from public."Orden"
                                group by "Cliente_ID") as X
                        where total = (select max(total)
                                        from (	select count(*) as total
                                                from public."Orden"
                                                group by "Cliente_ID") as X);
                ';
                $q = pg_query($conexion,$sql);
                $results = pg_fetch_assoc($q);
                #print_r($results);
                echo '
                <div class="col-5">'.$results['Cliente_ID'].'</div>
            </div>
                ';
                ?>


            <div class="row my-3">
                <div class="col-7">Cantidad de compras del cliente que mas ha comprado: </div>
                <div class="col-5"><?php echo $results['total'] ?></div>
            </div>


            <div class="row my-3">
                <div class="col-7">Cantidad de clientes registrados: </div>
                <?php  
                $sql = ' select count(*)
                        from "Cliente"
                    ';
                $q = pg_query($conexion,$sql);
                $results = pg_fetch_result($q,'count');
                ?>
                <div class="col-5"><?php echo $results ?></div>
                
            </div>


    
            <div class="row my-3">
                <div class="col-7">Cliente que mas compra: </div>
                <?php 
                $sql = '
                select X.*
                from ( 	select sum("Cant_Producto_Pagado"*"Precio_Producto_Pagado") as totalCompras,"Cliente_ID"
                        from "OrdenDetalleProductos","Orden"
                        where "OrdenDetalleProductos"."Orden_ID" = "Orden"."Orden_ID"
                        group by "Cliente_ID") as X
                where X.totalCompras = (select max(X.totalCompras)
                                        from ( select sum("Cant_Producto_Pagado"*"Precio_Producto_Pagado") as totalCompras
                                        from public."OrdenDetalleProductos",public."Orden"
                                        where "OrdenDetalleProductos"."Orden_ID" = "Orden"."Orden_ID"
                                        group by "Cliente_ID") as X )

                ';

                $q = pg_query($conexion,$sql);
                $results = pg_fetch_assoc($q);
                #print_r($results);
               ?>
                <div class="col-5"><?php echo $results['Cliente_ID'] ?></div>
            </div>


            <div class="row my-3"> 
                <div class="col-7">Monto comprado por el cliente que mas compra: </div>
                <div class="col-5">$<?php echo $results['totalcompras'] ?></div>
            </div>


            <div class="row my-2">
                <div class="col-7">Comuna que mas compra: </div>
                <div class="col-5">
                    <?php
                    $sql = '
                            select X.*
                            from ( 	select sum("Cant_Producto_Pagado"*"Precio_Producto_Pagado") as totalCompras,"Comuna"
                                    from "OrdenDetalleProductos","Orden","Direccion"
                                    where "OrdenDetalleProductos"."Orden_ID" = "Orden"."Orden_ID"
                                    and "Orden"."Cliente_ID" = "Direccion"."Rut_Titular"
                                    group by "Comuna") as X
                            where X.totalCompras = (select max(X.totalCompras)
                                                        from ( select "Comuna", sum("Cant_Producto_Pagado"*"Precio_Producto_Pagado") as totalCompras 
                                                                from "OrdenDetalleProductos","Orden","Direccion"
                                                                where "OrdenDetalleProductos"."Orden_ID" = "Orden"."Orden_ID"
                                                                and "Orden"."Cliente_ID" = "Direccion"."Rut_Titular"
                                                                group by "Comuna") as X )
                            ';                    
                    $q = pg_query($conexion,$sql);
                    $results = pg_fetch_all($q);
                    #print_r($results);
                    foreach($results as $key => $value){
                        ?>
                        <div class="row">
                            <div class="col-12"><?php echo $value['Comuna'] ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>



            <div class="row my-2">
                <div class="col-7">Ciudad que mas compra: </div>
                <div class="col-5">
                <?php
                    $sql = '
                            select X.*
                            from ( 	select sum("Cant_Producto_Pagado"*"Precio_Producto_Pagado") as totalCompras,"Ciudad"
                                    from "OrdenDetalleProductos","Orden","Direccion"
                                    where "OrdenDetalleProductos"."Orden_ID" = "Orden"."Orden_ID"
                                    and "Orden"."Cliente_ID" = "Direccion"."Rut_Titular"
                                    group by "Ciudad") as X
                            where X.totalCompras = (select max(X.totalCompras)
                                                        from ( select "Ciudad", sum("Cant_Producto_Pagado"*"Precio_Producto_Pagado") as totalCompras 
                                                                from "OrdenDetalleProductos","Orden","Direccion"
                                                                where "OrdenDetalleProductos"."Orden_ID" = "Orden"."Orden_ID"
                                                                and "Orden"."Cliente_ID" = "Direccion"."Rut_Titular"
                                                                group by "Ciudad") as X )
                            ';                    
                    $q = pg_query($conexion,$sql);
                    $results = pg_fetch_all($q);
                    #print_r($results);
                    foreach($results as $key => $value){
                        ?>
                        <div class="row">
                            <div class="col-12"><?php echo $value['Ciudad'] ?></div>
                        </div>
                    <?php } ?>
    
                </div>
            </div>
        </div>



        <div class="col-4 ">
            
            <div id="legend">
                 <legend class="">Estadisticas Ordenes</legend>
            </div>
            <div class="row my-3">
                <div class="col-6">Cantidad de ordenes<br>generadas:  </div>
                <?php 
                $sql = ' select count(*)
                        from (select count(*) as ordenes
                                from "OrdenDetalleProductos"
                                group by "Orden_ID") as X;
                ';
                $q = pg_query($conexion,$sql);
                $results = pg_fetch_result($q,'count');
                ?>
                <div class="col-6"><?php echo $results?></div>
            </div>
            <div class="row my-3">
                <div class="col-6">Monto promedio de ventas</div>

                <?php 
                $sql = 'select cast(SUM("Precio_Producto_Pagado" * "Cant_Producto_Pagado") / SUM("Cant_Producto_Pagado") as int) as prom
                from public."OrdenDetalleProductos",public."Orden"
                where "OrdenDetalleProductos"."Orden_ID" = "Orden"."Orden_ID"
                        ';           
                $q = pg_query($conexion,$sql);
                $results = pg_fetch_result($q,'prom');        
                             
                ?>
                <div class="col-6">$<?php echo  $results; ?></div>
            </div> 
            <div class="row my-3">
                <div class="col-6">Mayor monto en una sola venta:</div>

                <?php
                $sql = '
                select X.totalPorOrden
                from (	select "OrdenDetalleProductos"."Orden_ID", sum("Cant_Producto_Pagado"*"Precio_Producto_Pagado") as totalPorOrden
                            from public."OrdenDetalleProductos",public."Orden"
                            where "OrdenDetalleProductos"."Orden_ID" = "Orden"."Orden_ID"
                            group by "OrdenDetalleProductos"."Orden_ID")as X
                where x.totalPorOrden = (select max(x.totalPorOrden)
                                        from (select sum("Cant_Producto_Pagado"*"Precio_Producto_Pagado") as totalPorOrden
                                                from public."OrdenDetalleProductos",public."Orden"
                                                where "OrdenDetalleProductos"."Orden_ID" = "Orden"."Orden_ID"
                                                group by "OrdenDetalleProductos"."Orden_ID")as X)
                ';
                $q = pg_query($conexion,$sql);
                $results = pg_fetch_result($q,'totalpororden');
                ?>

                <div class="col-6">$<?php echo $results ?></div>
            </div>  
        </div>



        <div class="col-4">
        <div id="legend">
                 <legend class="">Estadisticas Productos</legend>
            </div>

            <div class="row my-3">
                        <div class="col-7">Cantidad de productos disponibles: </div>
                        <?php 
                            $sql = ' select count(*)
                                    from (select count(*) 
                                            from "Productos"
                                            group by "Prod_ID") as X;
                            ';
                            $q = pg_query($conexion,$sql);
                            $results = pg_fetch_result($q,'count');
                            ?>
                        <div class="col-5"><?php echo $results ?></div>
            </div>


            <div class="row my-3">
                <div class="col-7">Precio promedio de productos</div>
                <?php
                    $sql = ' select cast(avg("Productos"."Precio_Prod") as int)
                                from public."Productos"
                    ';
                    $q = pg_query($conexion,$sql);
                    $results = pg_fetch_result($q,'avg');
                ?>
                <div class="col-5">$<?php echo $results ?></div>
            </div>

            <div class="row my-3">
                <div class="col-7">Cantidad de veces que se<br> ha vendido el producto mas caro: </div>
                <?php
                $sql = '   
                        select sum("Cant_Producto_Pagado")
                        from public."OrdenDetalleProductos"
                        where "Precio_Producto_Pagado" = (select max("Precio_Prod")
                                                        from public."Productos")
                    ';
                $q = pg_query($conexion,$sql);
                $results = pg_fetch_result($q,'sum');

                ?>
                
                <div class="col-5"><?php echo $results ?></div>
        </div>




    </div>
</div>