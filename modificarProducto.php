<?php
include("config.php");
#$conexion
include("header.php");
$id = $_GET['id'];
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <p class="lead">Modificar producto ID: <?php echo $id?></p>
        </div>
    </div>
    <?php
    $query = 'SELECT * from public."Productos"  where "Prod_ID" ='."'".$id."'" ;
    $q = pg_query($conexion, $query);

    $oldValue = pg_fetch_array($q, 0, PGSQL_NUM);
    $columns = pg_num_fields($q);
    ?>
    <form  method="POST" action="/proyectoBDD/updateProduct.php/?id=<?php echo $id?>">
    <div class="container">
    <div class="form-group"> 
            <?php for($i=1;$i<$columns;$i++){ ?>
                <div class="form-row"> 
                    <div class="col-2 d-flex align-items-center"><?php echo pg_field_name($q,$i) ?></div>
                    <div class="col-4">
                        <fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $oldValue[$i] ?>"></fieldset>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="<?php echo 'new'.pg_field_name($q,$i)?>" placeholder="Nuevo valor">
                    </div>
                  
                </div>
            <?php } ?>
    </div>  
    <div class="container">
    </div>
    <div class="row d-flex justify-content-end">
            <div class="col-3"><button type="submit" class="btn btn-primary">Submit</button></div>
        </div>
    </form>            


</div>