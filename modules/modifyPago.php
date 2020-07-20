<?php
include("header.php");
include("config.php");

?>



    <div class="container mt-5">
        <p class="display-4 mb-5">Modificar metodo de pago</p>
        <?php
        $sql = 'select *
                from public."MetodoPago"
                where "Rut_Titular" = '."'".$_GET['id']."'".'
                and "Alias_Metodo" ='."'".$_GET['alias']."'".'
        ';
        $q = pg_query($conexion,$sql);
        $results = pg_fetch_assoc($q);
     
        ?>
        <form action="/proyectoBDD/api/updatePago.php/?id=<?php echo $_GET['id'] ?> " method="POST">
        <div class="container">
            <div class="form-group"> 
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Rut Cliente</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $_GET['id'] ?>"></fieldset></div>
                </div>
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Numero Tarjeta</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Numero_Tarjeta'] ?>"></fieldset></div>
                    <div class="col-5"><input type="text" class="form-control" id="exampleFormControlInput1" name="newNumero" placeholder="Nuevo numero"></div>
                </div>
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Nombre Metodo</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Nombre_Metodo'] ?>"></fieldset></div>
                    <div class="col-5"><input type="text" class="form-control" id="exampleFormControlInput1" name="newNombreMetodo" placeholder="Nuevo metodo"></div>
                </div>  
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Alias Metodo</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php  echo $results['Alias_Metodo'] ?>"></fieldset></div>
                </div>  
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Fecha Exp</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Fecha_Exp'] ?>"></fieldset></div>
                    <div class="col-5"><input type="date" class="form-control" id="exampleFormControlInput1" name="newFecha" placeholder="Nueva Fecha"></div>
                </div>
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">CCV</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['CCV'] ?>"></fieldset></div>
                    <div class="col-5"><input type="text" class="form-control" id="exampleFormControlInput1" name="newCCV" placeholder="Nuevo CCV"></div>
                </div>
                <input id="prodId" name="aliasToModify" type="hidden" value="<?php  echo $results['Alias_Metodo'] ?>">
                <div class="row d-flex justify-content-end mt-3 mr-3">
                    <div class="col-1"><button type="submit" class="btn btn-primary">Modificar</button></div>
                </div>
            </div>
        </div>
        </form>
    </div>
</form>