<?php
include("config.php");
include("header.php");

$OrderToVerify = pg_escape_string($_GET['ordenToModify']);
$query = ' SELECT exists(select * from public."OrdenDetalle" where "Orden_Detalle_ID" ='."'".$_GET['ordenToModify']."'".')';
$q = pg_query($conexion,$query);
$results = pg_fetch_all($q);
if($results[0]['exists'] == 't'){ ?>

<form  method="POST" action="/proyectoBDD/updateProduct.php/?id=">
    <div class="container mt-5">
        <div class="form-group"> 
            <div class="form-row"> 
                <div class="col-2 d-flex align-items-center">ID Orden</div>
                <div class="col-4"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="ID ANTIGUO"></fieldset></div>
            </div>
            <div class="form-row"> 
                <div class="col-2 d-flex align-items-center">Direccion de Envio</div>
                <div class="col-4"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="ID ANTIGUO"></fieldset></div>
                <div class="col-4"><input type="text" class="form-control" id="exampleFormControlInput1" name="" placeholder="Nuevo valor"></div>
            </div>
    </div>  
    <div class="container">
    </div>
    <div class="row d-flex justify-content-end">
            <div class="col-3"><button type="submit" class="btn btn-primary">Submit</button></div>
        </div>
    </form>         


<?php    
}else{
    $query = ' SELECT "Estado_Orden" from public."Orden" where "Orden_ID" ='."'".$_GET['ordenToModify']."'";
    $q = pg_query($conexion,$query);
    $results = pg_fetch_all($q);
    if(isset($results[0]['Estado_Orden']) and $results[0]['Estado_Orden'] == 'Cancelada'){
        echo '
            <div class="container my-4 mx-5">
                <div class="lead">La orden ingresada fue cancelada.
                </div>
            </div>
        ';
    }else{
        echo '
            <div class="container my-4 mx-5">
                <div class="lead">La orden no existe.
                </div>
            </div>
        ';

    }

}


?>
