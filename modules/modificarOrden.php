<?php
include("config.php");
include("header.php");
include("footer.php");

$OrderToVerify = pg_escape_string($_GET['ordenToModify']);
$query = ' SELECT exists(select * from public."OrdenDetalleProductos" where "Orden_ID" ='."'".$_GET['ordenToModify']."'".')';
$q = pg_query($conexion,$query);
$results = pg_fetch_all($q);

    $queryStatus = ' SELECT "Estado_Orden" from public."Orden" where "Orden_ID" ='."'".$_GET['ordenToModify']."'";
    $qStatus = pg_query($conexion,$queryStatus);
    $resultsStatus = pg_fetch_assoc($qStatus);
    #print_r($resultsStatus);
    
    if(isset($resultsStatus['Estado_Orden']) and $resultsStatus['Estado_Orden'] == 'Cancelada'){
        echo '
            <div class="container my-4 mx-5">
                <div class="lead">La orden ingresada fue cancelada.
                </div>
            </div>
            ';
            header( "refresh:2;url= \proyectoBDD\adminOrdenes.php" );
       
        die();
        
    }


if($results[0]['exists'] == 't'){ ?>

<form action="/proyectoBDD/api/updateOrder.php/?id=<?php echo $_GET['ordenToModify']?>"  method="POST"  >
    <div class="container mt-5">
        <div class="form-group"> 
            <div class="form-row"> 
                <div class="col-2 d-flex align-items-center">ID Orden</div>
                <div class="col-4"><fieldset disabled><input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $_GET['ordenToModify'] ?>"></fieldset></div>
            </div>
            <div class="form-row my-2"> 
                <div class="col-2 d-flex align-items-center">Direccion de Envio</div>
                <?php
                $sql = 'select * 
                        from public."Direccion",public."Orden"
                        where "Direccion"."Rut_Titular" = "Orden"."Cliente_ID"
                        and "Orden"."Orden_ID" = '."'".$_GET['ordenToModify']."'".'
                        and "Direccion"."Alias_Direccion" = "Orden"."Alias_Direccion"
                        ';
                $q = pg_query($conexion,$sql);
                $results = pg_fetch_assoc($q);

                $oldAddress =' ['.$results['Alias_Direccion'].']'.'  '.$results['Calle'].', #'.$results['Numero'].', '.$results['Comuna'];
                ?>

                <div class="col-4"><fieldset disabled>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $oldAddress ?>"></fieldset>
                </div>
                <div class="col-4">

               

                <select name="newDireccion" class="custom-select">
                    <option selected>Nueva Direccion de Envio</option>
                <?php
                $sql = 'select "Direccion"."Alias_Direccion","Direccion","Calle","Numero","Comuna"
                from public."Direccion",public."Orden"
                where "Direccion"."Rut_Titular" = "Orden"."Cliente_ID"
                and "Orden"."Orden_ID" = '."'".$_GET['ordenToModify']."'".'
                ';
                $q = pg_query($conexion,$sql);
                $results = pg_fetch_all($q);
                print_r($results);
                foreach($results as $key => $direccion){
                    $oldAddress =' ['.$direccion['Alias_Direccion'].']'.'  '.$direccion['Calle'].', #'.$direccion['Numero'].', '.$direccion['Comuna'];
                    echo'
                        <option name="newDireccion" value="'.$direccion['Alias_Direccion'].'">'.$oldAddress.'</option>
                    ';
                }
                ?>
                </select>
                </div>

            </div>


            <div class="form-row my-2"> 
                <div class="col-2 d-flex align-items-center">Metodo de Pago</div>
                <?php
                $sql = 'select * 
                        from public."MetodoPago",public."Orden"
                        where "MetodoPago"."Rut_Titular" = "Orden"."Cliente_ID"
                        and "Orden"."Orden_ID" = '."'".$_GET['ordenToModify']."'".'
                        and "MetodoPago"."Alias_Metodo" = "Orden"."Alias_Metodo"
                        ';
                $q = pg_query($conexion,$sql);
                $results = pg_fetch_assoc($q);

                $oldAddress = $results['Alias_Metodo']
                ?>

                <div class="col-4"><fieldset disabled>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $oldAddress ?>"></fieldset>
                </div>
                <div class="col-4">

               

                <select name="newPago" class="custom-select">
                    <option selected>Nuevo Metodo de Pago</option>
                <?php
                $sql = 'select "Nombre_Metodo", "MetodoPago"."Alias_Metodo"
                from public."MetodoPago",public."Orden"
                where "MetodoPago"."Rut_Titular" = "Orden"."Cliente_ID"
                and "Orden"."Orden_ID" = '."'".$_GET['ordenToModify']."'".'
                ';
                $q = pg_query($conexion,$sql);
                $results = pg_fetch_all($q);
                print_r($results);

                foreach($results as $key => $MetodoPago){

                   #$oldPayment = $results['Alias_Metodo'];
                    echo'
                        <option name="newPago" value="'.$MetodoPago['Alias_Metodo'].'">'.$MetodoPago['Alias_Metodo'].'</option>
                        
                    ';
                }
                ?>
                </select>
                </div>

            </div>


    </div>  
    
        <div class="row d-flex justify-content-end">
            <div class="col-3"><button type="submit" class="btn btn-primary">Modificar</button></div>
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
            header( "refresh:2;url= \proyectoBDD\ordenAModificar.php" );
        ';
    }else{
        echo '
            <div class="container my-4 mx-5">
                <div class="lead">La orden solicitada no existe en los registros.
                </div>
            </div>
        ';
        header( "refresh:2;url= \proyectoBDD\ordenAModificar.php" );

    }

}


?>

<!----
 SELECT exists(select * from public."OrdenDetalleProductos" where "Orden_Detalle_ID" ='1')

'select "Direccion"."Alias_Direccion","Direccion","Calle","Numero","Comuna"
                from public."Direccion",public."Orden"
                where "Direccion"."Rut_Titular" = "Orden"."Cliente_ID"
                and "Orden"."Orden_ID" = '."'".$_GET['ordenToModify']."'".'