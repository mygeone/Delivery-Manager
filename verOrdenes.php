<?php 
include("header.php");
include("config.php");

    $q = pg_query($conexion, 'select * from public."Orden" ');
    $row = pg_fetch_all($q);
    ?>
    <div class="container mt-5">
    <p class="display-4 mb-5">Ver Ordenes</p>
        <div class="row ">
            <div class="col-2">ID Orden </div>
            <div class="col-2">Cliente </div>
            <div class="col-2">Estado Orden</div>
        </div>
        <?php 
        foreach($row as $key => $value){?>
        <div class="row mt-2">
            <div class="col-2 "><?php echo $value['Orden_ID'];?></div>
            <div class="col-2 "><?php echo $value['Cliente_ID'];?></div>
            <div class="col-2 "><?php echo $value['Estado_Orden'];?></div>
            <div class="col-2"><a class="btn btn-primary btn-sm" href="/proyectoBDD/mostrarOrden.php/?order=<?php echo $value['Orden_ID'] ?>" role="button">Ver Detalles</a></div>
            <div class="col-2"><a class="btn btn-primary btn-sm" href="/proyectoBDD/api/cancelarOrden.php?idToDelete=<?php echo $value['Orden_ID'] ?>" role="button">Eliminar Orden</a></div>

        </div>
        <?php } ?>
    </div>
