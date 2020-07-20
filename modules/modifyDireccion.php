<?php
include("header.php");
include("config.php");

?>



    <div class="container mt-5">
        <p class="display-4 mb-5">Modificar Direccion</p>
        <?php
        $sql = 'select *
                from public."Direccion"
                where "Rut_Titular" = '."'".$_GET['id']."'".'
                and "Alias_Direccion" ='."'".$_GET['alias']."'".'
        ';
        $q = pg_query($conexion,$sql);
        $results = pg_fetch_assoc($q);
     
        ?>
        <form action="/proyectoBDD/api/updateDireccion.php/?id=<?php echo $_GET['id'] ?> " method="POST">
        <div class="container">
            <div class="form-group"> 
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Rut Cliente</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $_GET['id'] ?>"></fieldset></div>
                </div>
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Calle</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Calle'] ?>"></fieldset></div>
                    <div class="col-5"><input type="text" class="form-control" id="exampleFormControlInput1" name="newCalle" placeholder="Nueva Calle"></div>
                </div>
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Numero</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Numero'] ?>"></fieldset></div>
                    <div class="col-5"><input type="text" class="form-control" id="exampleFormControlInput1" name="newNumero" placeholder="Nuevo Numero"></div>
                </div>  
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Alias</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php  echo $results['Alias_Direccion'] ?>"></fieldset></div>
                </div>  
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Comuna</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Comuna'] ?>"></fieldset></div>
                    <div class="col-5"><input type="text" class="form-control" id="exampleFormControlInput1" name="newComuna" placeholder="Nueva Comuna"></div>
                </div> 
                <div class="form-row mt-2"> 
                    <div class="col-2 d-flex align-items-center">Ciudad</div>
                    <div class="col-5"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Ciudad'] ?>"></fieldset></div>
                    <div class="col-5"><input type="text" class="form-control" id="exampleFormControlInput1" name="newCiudad" placeholder="Nueva Ciudad"></div>
                </div>
                <input id="prodId" name="aliasToModify" type="hidden" value="<?php echo $results['Alias_Direccion'] ?>">
                <div class="row d-flex justify-content-end mt-3 mr-3">
                    <div class="col-1"><button type="submit" class="btn btn-primary">Modificar</button></div>
                </div>
            </div>
        </div>
        </form>
    </div>
</form>