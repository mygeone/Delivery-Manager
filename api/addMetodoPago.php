<?php
include("../config.php");
include("../header.php");
#print_r($_POST);


    $query = 'select exists(select "Alias_Metodo","Rut_Titular"
                            from public."MetodoPago"
                            where "Alias_Metodo" = '."'".$_POST['pago_alias']."'".'
                            and "Rut_Titular" = '."'".$_GET['id']."'".')
            ';

    $q = pg_query($conexion,$query);
    $results = pg_fetch_all($q);
    #print($query);

    if($results[0]['exists'] == 't'){
        echo '
        <div class="container my-4 mx-5">
            <div class="lead">Ya existe un alias asociado a otro metodo. <br>
            Por favor escoge otro alias.
            </div>
        </div>
        ';
        header( "refresh:2;url= \proyectoBDD\modificarCliente.php\?rutToModify".$_GET['id']."" );
        die();

    } else {
        $sql = ' INSERT INTO public."MetodoPago" ("Rut_Titular","Alias_Metodo","Nombre_Metodo","Numero_Tarjeta","CCV","Fecha_Exp")
                values ('."'".$_GET['id']."'".',
                        '."'".$_POST['pago_alias']."'".',
                        '."'".$_POST['pago_tipo']."'".',
                        '."'".$_POST['pago_numero']."'".',
                        '."'".$_POST['pago_ccv']."'".',
                        '."'".$_POST['pago_fecha']."'".'
                        )
                ';
        #print($sql);
        $q = pg_query($conexion,$sql);
        echo '
        <div class="container my-4 mx-5">
            <div class="lead">Metodo de pago ingresado correctamente.
            </div>
        </div>
        ';
        header( "refresh:2;url= \proyectoBDD\adminClientes.php" );

    }
?>

<!---
select exists(select "Alias_Direccion","Rut_Titular" 
                from public."Direccion" 
                where "Alias_Direccion" = 'casa mama' 
                and "Rut_Titular" = '9492314k') 

                 INSERT INTO public."MetodoPago" 
                 ("Rut_Titular","Alias_Metodo","Nombre_Metodo","Numero_Tarjeta","CCV","Fecha_Exp") values ('160770641', 'paypal', 'Crédito', '151684654', '848', '2020-07-07' )     