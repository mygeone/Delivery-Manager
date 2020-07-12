<?php
include("config.php");
#$conexion
include("header.php");

$option = $_GET['key'];

if($option == 0){
    $q = pg_query($conexion, 'select * from public."Productos" ');
    $row = pg_fetch_all($q);
    ?>
    <div class="container mt-5">
        <p class="display-4 mb-5">Lista Productos</p>
        <div class="row ">
            <div class="col-2">Codigo Producto</div>
            <div class="col-2">Nombre Producto</div>
            <div class="col-2">Precio Producto</div>
            <div class="col-2">Cantidad Producto</div>
        </div>
        <?php foreach($row as $key => $value){?>
        <div class="row mt-2">
            <div class="col-2 "><?php echo $value['Prod_ID'];?></div>
            <div class="col-2 "><?php echo $value['Nombre_Prod'];?></div>
            <div class="col-2 "><?php echo $value['Precio_Prod'];?></div>
            <div class="col-2 "><?php echo $value['Cant_Prod'];?></div>
            <div class="col-2"><a class="btn btn-primary btn-sm" href="/proyectoBDD/modificarProducto.php/?id=<?php echo $value['Prod_ID'] ?>" role="button">Modificar Producto</a></div>
            <div class="col-2"><a class="btn btn-primary btn-sm" href="/proyectoBDD/deleteProduct.php/?id=<?php echo $value['Prod_ID'] ?>" role="button">Eliminar Producto</a></div>

        </div>
        <?php } ?>
    </div>
<?php } ?>

<?php
if($option == 1){?>
    <form method="POST" action="/proyectoBDD/productsFilter.php/?filter=0">
        <div class="container mt-5">
            <div class="form-row">
                <div class="col-1 pt-2"><div class="form-check"><input class="form-check-input" type="checkbox" name="applyIDFilter" value="1" id="defaultCheck1"></div></div>
                <div class="col-3 pt-1">Filtrar por ID de Producto</div>
                <div class="col-md-2"><input type="text" class="form-control" name="IDFilter"id="inputZip" placeholder="ID Producto"></div>
                <div class="col-3 d-flex justify-content-end"><input class="btn btn-primary" type="submit" value="Aplicar"></div>
            </div>
        </div>
    </form>
    <form method="POST" action="/proyectoBDD/productsFilter.php/?filter=1">
        <div class="container mt-5">
            <div class="form-row">
                <div class="col-1 pt-2"><div class="form-check"><input class="form-check-input" type="checkbox" name="applyNameFilter"value="1" id="defaultCheck1"></div></div>
                <div class="col-3 pt-1">Filtrar por Nombre</div>
                <div class="col-md-2"><input type="text" class="form-control" name="nameFilter" id="inputZip" placeholder="Nombre Producto"></div>
            </div>
            <div class="form-row pt-2">
                <div class="col-1 pt-2"><div class="form-check"><input class="form-check-input" type="checkbox" value="1" name="applyPriceFilter" id="defaultCheck1"></div></div>
                <div class="col-3 pt-1">Filtrar por Precio</div>
                <div class="col-2 pt-"><input type="number" class="form-control" name="minPriceFilter" id="inputZip" placeholder="Minimo"></div>
                <div class="col-2"><input type="number" class="form-control" name="maxPriceFilter" id="inputZip" placeholder="Maximo"></div>
            </div>
            <div class="form-row pt-2">
                <div class="col-1 pt-2"><div class="form-check"><input class="form-check-input" type="checkbox" value="1" name="applyStockFilter" id="defaultCheck1"></div></div>
                <div class="col-3 pt-1">Filtrar por Stock</div>
                <div class="col-2 pt-"><input type="number" class="form-control" name="minStockFilter" id="inputZip" placeholder="Minimo"></div>
                <div class="col-2"><input type="number" class="form-control" name="maxStockFilter" id="inputZip" placeholder="Maximo"></div>
                <div class="col-1 d-flex justify-content-end"><input class="btn btn-primary" type="submit" value="Aplicar"></div></div>
            </div>
        </div>
    </form>


<?php } 

?>
