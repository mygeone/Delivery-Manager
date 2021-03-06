<?php 
include("header.php");
include("config.php");
include("footer.php");

    $q = pg_query($conexion, 'select * from public."Cliente" ');
    $row = pg_fetch_all($q);
    ?>
    <div class="container mt-5">
    <p class="display-4 mb-5">Ver Clientes</p>
        <div class="row">
            <div class="col-2 ml-2 font-weight-bold">ID Cliente</div>
            <div class="col-3 ml-4 font-weight-bold">Email </div>
            <div class="col-2 ml-4 font-weight-bold">Nombre</div>
        </div>
        <?php 
        foreach($row as $key => $value){?>
        <div class="row mt-2 justify-content-around">
            <div class="col-2 "><?php echo $value['Cliente_ID'];?></div>
            <div class="col-3 "><?php echo $value['Email'];?></div>
            <div class="col-2 "><?php echo $value['Nombre_Cliente'];?></div>
            <div class="col-4 justify-content-start">
                <a class="btn btn-primary btn-sm" href="/proyectoBDD/modificarCliente.php/?rutToModify=<?php echo $value['Cliente_ID'] ?>" role="button">Modificar</a>
                <a class="btn btn-primary btn-sm" href="/proyectoBDD/detallesCliente.php/?idCliente=<?php echo $value['Cliente_ID'] ?>" role="button">Ver Detalles Cliente</a>
                <a class="btn btn-primary btn-sm" href="/proyectoBDD/api/deleteUser.php?idToDelete=<?php echo $value['Cliente_ID'] ?>" role="button">Eliminar Cliente</a>
            </div>
        </div>
        <?php } ?>
    </div>
