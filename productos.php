<?php
include("config.php");
#$conexion
include("header.php");

?>
<div class="container ml-3">
  <div class="row">
    <div class="col-5">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Seleccione un producto</label>
        <select class="form-control" id="exampleFormControlSelect1">
        <?php
        $q = pg_query($conexion, 'select * from public."Productos" ');
        $row = pg_fetch_all($q);
        #print_r($row);
        foreach($row as $index => $prod){
          #echo $prod['Nombre_Prod'];
          echo "<option>".$prod['Nombre_Prod']."</option>";
        }
        ?>
        </select>
      </div>
    </div>
    <div class="col-2">
      <div class="form-group">
        <label for="exampleFormControlInput1">Cantidad</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="1">
      </div>
    </div>
    <div class="col-3 d-flex align-items-center"><a class="btn btn-primary" href="ingresarMetodoPago.php" role="button">Continuar</a></div>
  </div>
</div>
<?php 


?>