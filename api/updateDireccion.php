<?php
include("../config.php");
include("../header.php");
include("../footer.php");


if($_POST['newCalle'] != ''){
    $query = 'UPDATE public."Direccion" 
            set   "Calle" = '."'".$_POST['newCalle']."'".'
            where "Rut_Titular" = '."'".$_GET['id']."'".
            'and "Alias_Direccion" = '."'".$_POST['aliasToModify']."'";
    $q = pg_query($conexion,$query);
}

if($_POST['newNumero'] != ''){
    $query = 'UPDATE public."Direccion" 
            set   "Numero" = '."'".$_POST['newNumero']."'".'
            where "Rut_Titular" = '."'".$_GET['id']."'".
            'and "Alias_Direccion" = '."'".$_POST['aliasToModify']."'";
    $q = pg_query($conexion,$query);
}

if($_POST['newComuna'] != ''){
    $query = 'UPDATE public."Direccion" 
            set   "Comuna" = '."'".$_POST['newComuna']."'".'
            where "Rut_Titular" = '."'".$_GET['id']."'".
            'and "Alias_Direccion" = '."'".$_POST['aliasToModify']."'";
    $q = pg_query($conexion,$query);
}

if($_POST['newCiudad'] != ''){
    $query = 'UPDATE public."Direccion" 
            set   "Ciudad" = '."'".$_POST['newCiudad']."'".'
            where "Rut_Titular" = '."'".$_GET['id']."'".
            'and "Alias_Direccion" = '."'".$_POST['aliasToModify']."'";
    $q = pg_query($conexion,$query);
}

echo '
        <div class="container my-4 mx-5">
            <div class="lead">Direccion actualizada con exito.
            </div>
        </div>
        ';
    header( "refresh:2;url= \proyectoBDD\adminClientes.php" );

?>