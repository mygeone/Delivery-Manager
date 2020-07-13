<?php
include_once("header.php");
include("config.php");
include("footer.php");
?>

<?php
if($_GET['step'] == 0){
        echo '
            <div class="container mt-5">
                <form action="\proyectoBDD\api\verifyRUT.php" method="POST">
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
    echo '
    <p class="display-4 justify-content-center my-5 ml-5">Ingresar Productos</p>
        <div class="row">
            <div class="col-6">
                <div class="container-fluid">
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
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="'.$_GET['rut'].'">
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="/proyectoBDD/api/verifyStock.php" method="POST" name="aa" >
                    <div class="form-row">
                        <div class="col-5">';
                            $query = 'SELECT * FROM public."Productos" '; 
                            $q = pg_query($conexion,$query );
                            $results = pg_fetch_all($q);
                            echo '
                            <select name="id" class="custom-select"> ';
                                foreach($results as $key => $value){
                                    echo '
                                    <option selected value="'.$value['Prod_ID'].'" name="'.$value['Prod_ID'].' ">['.$value['Prod_ID'].'] '.$value['Nombre_Prod'].'  $'.$value['Precio_Prod'].'</option>
                                        '; 
                                    }
                            echo '                          
                            </select>
                            <input type="hidden" name="rutCliente" value="'.$_GET['rut'].'"></input>
                        </div>                
                        <div class="col-2"><input type="number" id="disabledTextInput" name="cantidad" class="form-control" placeholder="Cantidad"></div>
                        <div class="col-3"><input class="btn btn-primary" type="submit" value="Agregar Producto"></div>
                    </div> 
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div class="container border border-black mt-5">
                    <div class="row justify-content-center">
                        <div id="legend">
                            <legend class="">Pedidos de Orden</legend>
                        </div>
                    </div>
                    <div class="row mt-5">
                        
                        <div class="col-2 font-weight-bold">ID</div>
                        <div class="col-4 font-weight-bold">Producto</div>
                        <div class="col-4 font-weight-bold">Cantidad</div>
                        <div class="col-2 font-weight-bold">Subtotal</div>
                    </div>
                    ';
                    $total = 0;
                    foreach($_SESSION['cart'][$_GET['rut']] as $prod => $cantidad){
                        $sql = 'SELECT "Nombre_Prod","Precio_Prod","Prod_ID" from public."Productos" where "Prod_ID" ='."'".$prod."'";
                        $q = pg_query($conexion,$sql);
                        $results = pg_fetch_assoc($q);
                        $total = $total + $results['Precio_Prod']*$cantidad;
                        echo '
                        <div class="row">
                            <div class="col-2">'.$results['Prod_ID'].'</div>
                            <div class="col-4">'.$results['Nombre_Prod'].'</div>
                            <div class="col-4">'.$cantidad.'</div>
                            <div class="col-2"> $'.$results['Precio_Prod']*$cantidad.'</div>

                        </div>';
                    }
                    echo '
                    <div class="row mt-3 mr-3 justify-content-end font-weight-bold">Total orden: $'.$total.'</div>
                </div>
                <a class="btn btn-primary mt-2" href="/proyectoBDD/api/generarOrden.php/?rut='.$_GET['rut'].'" role="button">Proceder a Pago</a>
            </div>
        </div>
    ';
}   
?>