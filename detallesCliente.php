<?php 
include("header.php");
include("config.php");


    $query = 'select "Cliente_ID", "Email", "Nombre_Cliente","Alias_Metodo","Nombre_Metodo","Numero_Tarjeta","Fecha_Exp","CCV"
    from public."Cliente",public."MetodoPago" 
    where "Cliente_ID" ='."'".$_GET['idCliente']."'".'
    and "Cliente_ID" = "MetodoPago"."Rut_Titular"
        ';
    #print($query);
    $q = pg_query($conexion, $query);
    $row = pg_fetch_all($q);
    print_r($row);
?>


<div class="container mt-5">
    <p class="display-4 mb-5">Ver Clientes</p>
    <div class="container mt-3">    
        <div class="container">
            <div class="row mt-3">
                <div class="col-2">ID Cliente:</div>
                <div class="col-2"><?php echo $_GET['idCliente'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-2">Nombre Cliente: </div>
                <div class="col-2"><?php echo $row[0]['Nombre_Cliente'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-2">Email Cliente: </div>
                <div class="col-2"><?php echo $row[0]['Email'] ?></div>
            </div>
        </div>
    </div>
    

    <div class="container mt-5">
        <div class="row">
        <!--- Metodo pagos--->
            <div class="col-5">
            <p class="lead">Metodos de pago registrados</p>
                <?php 
                $query = 'select "Cliente_ID", "Email", "Nombre_Cliente","Alias_Metodo","Nombre_Metodo","Numero_Tarjeta","Fecha_Exp","CCV"
                from public."Cliente",public."MetodoPago" 
                where "Cliente_ID" ='."'".$_GET['idCliente']."'".'
                and "Cliente_ID" = "MetodoPago"."Rut_Titular"
                    ';
                #print($query);
                $q = pg_query($conexion, $query);
                $row = pg_fetch_all($q);
                #print_r($row)
                foreach($row as $key => $dataPago) { ?>
                    <div class="container border border-black my-2 py-3">
                        <div class="row mt-3">
                            <div class="col-6">Numero Tarjeta:</div>
                            <div class="col-6"><?php echo $dataPago['Alias_Metodo']?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">Nombre Metodo: </div>
                            <div class="col-6"><?php echo $dataPago['Nombre_Metodo']?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">Fecha Exp: </div>
                            <div class="col-6"><?php echo $dataPago['Numero_Tarjeta']?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">Alias: </div>
                            <div class="col-6"><?php echo $dataPago['Alias_Metodo']?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">Fecha exp: </div>
                            <div class="col-6"><?php echo $dataPago['Fecha_Exp']?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">CCV: </div>
                            <div class="col-6"><?php echo $dataPago['CCV']?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>

       <!--- Metodo pagos--->
            <div class="col-5">
                <p class="lead">Direcciones registradas</p>
                <?php 
                $query = 'select "Calle","Numero","Comuna","Ciudad","Alias_Direccion"
                from public."Cliente",public."Direccion" 
                where "Cliente_ID" ='."'".$_GET['idCliente']."'".'
                and "Cliente_ID" = "Direccion"."Rut_Titular"
                    ';
                #print($query);
                $q = pg_query($conexion, $query);
                $row = pg_fetch_all($q);
                #print_r($row)
                foreach($row as $key => $dataDireccion) { ?>
                    <div class="container border border-black my-2 py-3">
                        <div class="row mt-3">
                            <div class="col-6">Calle: </div>
                            <div class="col-6"><?php echo $dataDireccion['Calle']?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">Numero: </div>
                            <div class="col-6"><?php echo $dataDireccion['Numero']?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">Comuna: </div>
                            <div class="col-6"><?php echo $dataDireccion['Comuna']?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">Ciudad: </div>
                            <div class="col-6"><?php echo $dataDireccion['Ciudad']?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">Alias Direccion: </div>
                            <div class="col-6"><?php echo $dataDireccion['Alias_Direccion']?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>


    </div>
</div>