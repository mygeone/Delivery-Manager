<?php
include("header.php");
include("config.php");
include("footer.php");

if(!isset($_GET['rutToModify'])){
   echo '
    <div class="container mt-5">
        <form action="\proyectoBDD\modificarCliente.php" method="GET">
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingrese Rut Cliente</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="rutToModify" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-4 d-flex align-items-center">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </div>
        </form>
    </div>
    ';

}else{
    $rutToVerify = pg_escape_string($_GET['rutToModify']);
    $query = ' SELECT exists(select "Cliente_ID" from public."Cliente" where "Cliente_ID" ='."'".$rutToVerify."'".')';
    $q = pg_query($conexion,$query);
    #print($query);
    $results = pg_fetch_all($q);
    if($results[0]['exists'] != 't'){
        echo '
        <div class="container my-4 mx-5">
            <div class="lead">Usuario no existe en los registros.<br>
            Redirigiendo a registro de usuario.
            </div>
        </div>
         ';
        header('Refresh: 5; URL=/proyectoBDD/registerUser.php');
        die();
    }
?>

<form method="POST" action="/proyectoBDD/api/updateClient.php/?id=<?php echo $_GET['rutToModify'] ?>">
    <div class="container mt-5">
        <p class="display-4 mb-5">Modificar Cliente</p>
        <?php
        $sql = 'select "Email","Nombre_Cliente"
                from public."Cliente"
                where "Cliente_ID" = '."'".$_GET['rutToModify']."'".'
        ';
        $q = pg_query($conexion,$sql);
        $results = pg_fetch_assoc($q);
        ?>

        <div class="container">
            <div class="form-group"> 
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Rut Cliente</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $_GET['rutToModify'] ?>"></fieldset></div>
                </div>
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Nombre Cliente</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Nombre_Cliente'] ?>"></fieldset></div>
                    <div class="col-5"><input type="text" class="form-control" id="exampleFormControlInput1" name="newName" placeholder="Nuevo nombre"></div>
                </div>
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Email Cliente</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Email'] ?>"></fieldset></div>
                    <div class="col-5"><input type="text" class="form-control" id="exampleFormControlInput1" name="newEmail" placeholder="Nuevo email"></div>
                </div>
                <div class="row d-flex justify-content-end mt-3 mr-3">
                    <div class="col-1"><button type="submit" class="btn btn-primary">Modificar</button></div>
                </div>
            </div>
        </div>
    </div>
</form>


<form  method="POST" action="/proyectoBDD/api/addAddress.php/?id=<?php echo $_GET['rutToModify'] ?>">
    <div class="container">
        <div id="legend">
            <legend class="">Registrar nueva direccion</legend>
        </div>
        <div class="form-row">
            <div class="form-group col-8">
                <label for="inputAddress">Calle</label>
                <input type="text" class="form-control" name="direccion_calle" id="inputAddress" placeholder="Av. Providencia">
            </div>
            <div class="form-group col-md-4">
                <label for="inputZip">Numero</label>
                <input type="number" class="form-control" name="direccion_numero"id="inputZip">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCity">Ciudad</label>
                <input type="text" class="form-control" name="direccion_ciudad" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputCity">Comuna</label>
                <input type="text" class="form-control" name="direccion_comuna" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputCity">Alias Direccion</label>
                <input type="text" class="form-control" name="direccion_alias" id="inputCity" placeholder="Casa pololo">
            </div>
            <div class="row d-flex ">
                <div class="col-12 justify-content-end"><button type="submit" class="btn btn-primary">Agregar Direccion</button></div>
            </div>
        </div>
    </div>
</form>



<form  method="POST" action="/proyectoBDD/api/addMetodoPago.php/?id=<?php echo $_GET['rutToModify'] ?>">
    <div class="container my-5">
        <div id="legend">
            <legend class="">Registrar método de pago</legend>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre Titular</label>
                <input type="text" class="form-control" id="rut" name="pago_nombre" placeholder="Miguel A. Contreras Pezoa">
            </div>
            <div class="form-group col-md-6">
            <label for="inputPassword4">Numero Tarjeta</label>
            <input type="text" class="form-control" name="pago_numero" id="inputPassword4">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="exampleFormControlSelect1">Tipo Método</label>
                    <select class="form-control" name="pago_tipo" id="exampleFormControlSelect1">
                        <option>Crédito</option>
                        <option>Débito</option>
                    </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Fecha Expiracion</label>
                <input type="date" class="form-control" name="pago_fecha" id="inputPassword4">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">CCV</label>
                <input type="text" class="form-control" name="pago_ccv" id="inputPassword4">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Alias Metodo</label>
                <input type="text" class="form-control" name="pago_alias" id="inputPassword4" placeholder="Tarjeta principal">
            </div>
        </div>
            <button type="submit" class="btn btn-primary">Agregar Metodo</button>
        </div>
    </div>
</form>

<?php } ?>
<!---sql

'select "Email","Nombre_Cliente"
            from public."Cliente"
            where "Cliente_ID" = '."'".$_GET['rutToModify']."'".'

SELECT exists(select "Cliente_ID" 
                from public."Cliente"
                 where "Cliente_ID" ='44') -->