<?php

include("header.php");
include("config.php");
?>

<div class="container mt-5">
    <p class="display-4">Stats</p>
    <div class="row">
        <div class="col-4">
            <p class="lead">Estadisticas Clientes</p>

            <div class="row my-3">
                <div class="col-6">Cliente que mas veces<br> ha comprado: </div>
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
                <div class="col-6">'.$results['Cliente_ID'].'</div>
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

            <div class="row my-3">Cliente que mas compra: </div>
            <div class="row my-2">Comuna que mas compra: </div>
            <div class="row my-2">Ciudad que mas compra: </div>
        </div>
        <div class="col-4 ">
            <p class="lead">Estadisticas Ordenes</p>
            <div class="row my-3">
                <div class="col-6">Cantidad de ordenes<br>generadas:  </div>
                <div class="col-6">xxxxxxxx</div>
            </div>
            <div class="row my-3">
                <div class="col-6">Monto promedio de ventas</div>
                <div class="col-6"></div>
            </div>
            <div class="row my-3">
                <div class="col-6">Cantidad de ordenes<br>generadas:</div>
                <div class="col-6"></div>
            </div> 
            <div class="row my-3">
                <div class="col-6">Mayor monto en una sola venta:</div>
                <div class="col-6"></div>
            </div>  
        </div>
        <div class="col-4">
            <p class="lead">Estadisticas Productos</p>
            <div class="row my-3">Cantidad de productos disponibles: </div>
            <div class="row my-3">Precio promedio de productos: </div>
            <div class="row my-3">Precio promedio de productos: </div>
            <div class="row my-3">Cantidad de veces que se<br> ha vendido el producto mas caro: </div>
        </div>
    </div>
</div>