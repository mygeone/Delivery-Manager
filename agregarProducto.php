<?php
include("header.php");
include("config.php");

do {
    $IDInitial = rand(0,99999);
    $IDToVerify = pg_escape_string($IDInitial);
    $query = ' SELECT exists(select "Prod_ID" 
                            from public."Productos" 
                            where "Prod_ID" ='."'".$IDToVerify."'".')';
    $q = pg_query($conexion,$query);
    $results = pg_fetch_all($q);

  } while($results[0]['exists'] == 't');

?>


<form method="POST" action="/proyectoBDD/api/addProduct.php">
<div class="container mt-5">
    <p class="display-4 mb-5">Agregar Producto</h1>
    <div class="form-row"> 
        <div class="col-2 d-flex align-items-center">ID</div>
        <div class="col-4"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $IDInitial ?>"></fieldset></div>          
    </div>
    <div class="form-row mt-2"> 
        <div class="col-2 d-flex align-items-center">Nombre Producto</div>
        <div class="col-4"><input type="text" name="NameProductToAdd" id="disabledTextInput" class="form-control" placeholder="Ejemplo: Bebida Pepsi"></div>          
    </div>
    <div class="form-row mt-2"> 
        <div class="col-2 d-flex align-items-center">Precio Unitario</div>
        <div class="col-4"><input type="text" name="priceProductToAdd" id="disabledTextInput" class="form-control" placeholder="Ejemplo: 1500"></div>          
    </div>
    <div class="form-row mt-2"> 
        <div class="col-2 d-flex align-items-center">Stock Inicial</div>
        <div class="col-4"><input type="text" name="stockProductToAdd" id="disabledTextInput" class="form-control" placeholder="Ejemplo: 70"></div>          
    </div>
    <input type="hidden" id="custId" name="IDProductToAdd" value="<?php echo $IDToVerify  ?>">
    <div class="form-row mt-5 justify-content-end">
        <div class="col-7">
             <input class="btn btn-primary" type="submit" value="Confirmar">          
        </div> 
    </div>
   
</div>
</form>