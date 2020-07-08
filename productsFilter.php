<?php
include("header.php");
include("config.php");
#print_r($_POST);
$filter = pg_escape_string($_GET['filter']);

if(isset($_POST['applyIDFilter']) and $_POST['applyIDFilter'] != ''){
    #print('aplicar filtro de id');
    $id=pg_escape_string($_POST['IDFilter']);
    $query = ' SELECT * from public."Productos" WHERE "Prod_ID" = '."'".$id."'";

    $results = pg_query($conexion, $query);
    $rows = pg_fetch_all($results);
    if(empty($rows)){ print('No existe producto con el id solicitada');}
    if(!empty($rows)){
            echo '
            <div class="container mt-5">
                <div class="row"><div class="col-2">Codigo Producto:</div>'.$rows[0]['Prod_ID'].'</div>
                <div class="row"><div class="col-2">Nombre Producto:</div>'. $rows[0]['Nombre_Prod'].'</div>
                <div class="row"><div class="col-2">Precio Producto:</div>'. $rows[0]['Precio_Prod'].'</div>
                <div class="row"><div class="col-2">Stock Producto:</div>'. $rows[0]['Cant_Prod'].'</div>
                                  <div class="col-4 d-flex justify-content-end"><a class="btn btn-primary btn-sm" href="/proyectoBDD/modificarProducto.php/?id='.$rows[0]['Prod_ID'].'" role="button">Modificar Producto</a></div>
            </div>
            ';
        }
}

$preSql = 'SELECT * from public."Productos" WHERE ';

if(isset($_POST['applyNameFilter'])){
    $nameToFilter=pg_escape_string($_POST['nameFilter']);
    $sqlName = '"Nombre_Prod" = '. "'".$nameToFilter."'";
    $preSql .= $sqlName;
}

if(isset($_POST['applyPriceFilter']) and isset($_POST['applyNameFilter'])){
    $minPriceToFilter=pg_escape_string($_POST['minPriceFilter']);
    $maxPriceToFilter=pg_escape_string($_POST['maxPriceFilter']);
    $sqlPrice = ' AND "Precio_Prod" >= '. "'".$minPriceToFilter."'".' and "Precio_Prod" <= '."'".$maxPriceToFilter."'";
    $preSql .= $sqlPrice;
}elseif(isset($_POST['applyPriceFilter']) and !isset($_POST['applyNameFilter'])){
    $minPriceToFilter=pg_escape_string($_POST['minPriceFilter']);
    $maxPriceToFilter=pg_escape_string($_POST['maxPriceFilter']);
    $sqlPrice = ' "Precio_Prod" >= '. "'".$minPriceToFilter."'".' and "Precio_Prod" <= '."'".$maxPriceToFilter."'";
    $preSql .= $sqlPrice;
}

if(isset($_POST['applyStockFilter']) and isset($_POST['applyPriceFilter'])){
    $minStockToFilter=pg_escape_string($_POST['minStockFilter']);
    $maxStockToFilter=pg_escape_string($_POST['maxStockFilter']);
    $sqlStock = ' AND "Cant_Prod" >= '. "'".$minStockToFilter."'".' and "Cant_Prod" <= '."'".$maxStockToFilter."'";
    $preSql .= $sqlStock;
}elseif(isset($_POST['applyStockFilter']) and  !isset($_POST['applyPriceFilter'])){
    $minStockToFilter=pg_escape_string($_POST['minStockFilter']);
    $maxStockToFilter=pg_escape_string($_POST['maxStockFilter']);
    $sqlStock = ' "Cant_Prod" >= '. "'".$minStockToFilter."'".' and "Cant_Prod" <= '."'".$maxStockToFilter."'";
    $preSql .= $sqlStock;

}
#print($preSql);

if(!isset($_POST['applyIDFilter'])){
    $results = pg_query($conexion,$preSql);
    $rows = pg_fetch_all($results);
    #print_r($rows);
    foreach($rows as $key => $value){
        echo '
            <div class="container mt-5">
                <div class="row"><div class="col-2">ID Producto:</div>'.$value['Prod_ID'].'</div>
                <div class="row"><div class="col-2">Nombre Producto:</div>'.$value['Nombre_Prod'].'</div>
                <div class="row"><div class="col-2">Precio Producto:</div>'.$value['Precio_Prod'].'</div>
                <div class="row">
                        <div class="col-2">Stock Producto:</div>
                        <div class="col-2">'.$value['Cant_Prod'].'</div>
                        <div class="col-2"><a class="btn btn-primary btn-sm" href="/proyectoBDD/modificarProducto.php/?id='.$value['Prod_ID'].'" role="button">Modificar Producto</a></div>
                        <div class="col-2"><a class="btn btn-primary btn-sm" href="/proyectoBDD/deleteProduct.php/?id='.$value['Prod_ID'].'" role="button">Eliminar Producto</a></div>
                </div>
            </div>';
    }
}



?>
