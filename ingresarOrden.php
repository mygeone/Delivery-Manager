<?php
include("header.php");
include("config.php");
?>

<?php
if($_GET['step'] == 0){
        echo '
            <div class="container mt-5">
                <form action="/proyectoBDD/ingresarOrden.php/?step=1" method="POST">
                    <div class="form-row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingrese Rut Cliente</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="rutCliente" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-4 d-flex align-items-center">
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        ';
    }
?>

<?php
if($_GET['step'] == 1){
    $rutToVerify = pg_escape_string($_POST['rutCliente']);
    $query = ' SELECT exists(select "Cliente_ID" from public."Cliente" where "Cliente_ID" ='."'".$rutToVerify."'".')';
    $q = pg_query($conexion,$query);
    $results = pg_fetch_all($q);
    if($results[0]['exists'] == 't'){
        echo
        '
        <div class="container">
            <div class="row">

                <!-- RUT DISABLED CLIENTE-->
                <div class="col-8">
                    <div class="container mt-5">
                        <div class="form-row">
                            <div class="col-4">
                                <form>
                                    <fieldset disabled>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Ingrese Rut Cliente</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="'.$_POST['rutCliente'].'">
                                        </div>
                                    </fielset>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- SELECCION DE PRODUCTO-->
                    
                    <div class="container mt-3">
                        <form method="POST" action="/ProyectoBDD/addToCarrito.php">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Seleccione un producto</label>
                                    <select class="form-control" id="exampleFormControlSelect1">';
                                        $q = pg_query($conexion, 'select * from public."Productos" ');
                                        $row = pg_fetch_all($q);
                                        print_r($row);
                                        foreach($row as $index => $prod){
                                        echo $prod['Nombre_Prod'];
                                        echo "<option>".$prod['Nombre_Prod']."  $".$prod['Precio_Prod']."</option>";
                                        }
                                        echo '
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Cantidad</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="can" placeholder="1">
                                </div>
                            </div>
                            <div class="col-2 d-flex align-items-center mt-3"><a class="btn btn-primary" href="ingresarMetodoPago.php" role="button">Agregar</a></div>
                            </div>
                        </div>
                        </form>
                    <div class="row justify-content-center mt-5">
                        <div class="col-3 d-flex align-items-center"><a class="btn btn-primary" href="ingresarMetodoPago.php" role="button">Ingresar Otro Producto</a></div>
                        <div class="col-2 d-flex align-items-center"><a class="btn btn-primary" href="ingresarMetodoPago.php" role="button">Finalizar</a></div>
                    </div>
                </div>

                <!-- CARRITO -->
                <div class="col-4">CARRITO</div>
            </div>
        </div>
        ';    
    }else{
        echo
        '
        <div class="displa-4">Rut no existe</div>
        ';
        header("Refresh: 3;url=/proyectoBDD/registerUser.php");
        }
}
?>


</div>
