<?php
include("../config.php");
include("../header.php");
#print_r($_POST);
    $query = 'select exists(select "Alias_Direccion","Rut_Titular"
                            from public."Direccion"
                            where "Alias_Direccion" = '."'".$_POST['direccion_alias']."'".'
                            and "Rut_Titular" = '."'".$_GET['id']."'".')
            ';

    $q = pg_query($conexion,$query);
    $results = pg_fetch_all($q);
    #print($query);

    if($results[0]['exists'] == 't'){
        echo '
        <div class="container my-4 mx-5">
            <div class="lead">Ya existe un alias asociado a otra direccion. <br>
            Por favor escoge otro alias.
            </div>
        </div>
        ';
    } else {
        $sql = ' INSERT INTO public."Direccion" ("Rut_Titular","Calle","Numero","Comuna","Ciudad","Alias_Direccion")
                values ('."'".$_GET['id']."'".',
                        '."'".$_POST['direccion_calle']."'".',
                        '."'".$_POST['direccion_numero']."'".',
                        '."'".$_POST['direccion_comuna']."'".',
                        '."'".$_POST['direccion_ciudad']."'".',
                        '."'".$_POST['direccion_alias']."'".'
                        )
                ';
        print($sql);
        $q = pg_query($conexion,$sql);
        echo '
        <div class="container my-4 mx-5">
            <div class="lead">Direccion ingresada correctamente.
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