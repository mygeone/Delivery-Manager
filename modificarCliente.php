<?php
include("header.php");
include("config.php");

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
?>
<form  method="POST" action="/proyectoBDD/api/updateClient.php/?id=<?php echo $_GET['rutToModify'] ?>">
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

    <div class="form-group"> 
        <div class="form-row mt-2"> 
            <div class="col-2 d-flex align-items-center">Rut Cliente</div>
            <div class="col-4"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $_GET['rutToModify'] ?>"></fieldset></div>
        </div>
        <div class="form-row mt-2"> 
            <div class="col-2 d-flex align-items-center">Nombre Cliente</div>
            <div class="col-4"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Nombre_Cliente'] ?>"></fieldset></div>
            <div class="col-4"><input type="text" class="form-control" id="exampleFormControlInput1" name="newName" placeholder="Nuevo valor"></div>
        </div>
        <div class="form-row mt-2"> 
            <div class="col-2 d-flex align-items-center">Email Cliente</div>
            <div class="col-4"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $results['Email'] ?>"></fieldset></div>
            <div class="col-4"><input type="text" class="form-control" id="exampleFormControlInput1" name="newEmail" placeholder="Nuevo valor"></div>
        </div>
        <div class="row d-flex justify-content-end mt-3 mr-3">
            <div class="col-3"><button type="submit" class="btn btn-primary">Modificar</button></div>
        </div>
</div> 
<?php } ?>