<?php
include_once("header.php");
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
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>


                    <select id="nameProducts">
                        <option value="">Select Product</option>';
                            $query = 'SELECT * FROM public."Productos" '; 
                            $result = pg_query($conexion,$query );
                            if(pg_num_rows($result) > 0){ 
                                while($row = pg_fetch_assoc($result)){
                                    echo '<option value="'.$row['Prod_ID'].'">'.$row['Nombre_Prod'].'</option>'; 
                                }
                            }else{ 
                                echo '<option value="">Product not available</option>'; 
                            };
       echo '      </select>


                    <!-- Quantity dropdown -->
                    <select id="stock">
                        <option value="">Select Quantity</option>
                    </select>
                </div>
            </div>
        </div>
            ';    
    }else{
        echo
            '
            <div class="display-4">Rut no existe</div>';
            #header("Location: 3;url=/proyectoBDD/registerUser.php");
        } ?>



<?php } ?>



</div>
