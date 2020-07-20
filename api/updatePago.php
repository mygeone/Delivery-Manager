<?php
include("../config.php");
include("../header.php");
include("../footer.php");


if($_POST['newNumero'] != ''){
    $query = 'UPDATE public."MetodoPago" 
            set   "Numero_Tarjeta" = '."'".$_POST['newNumero']."'".'
            where "Rut_Titular" = '."'".$_GET['id']."'".
            'and "Alias_Metodo" = '."'".$_POST['aliasToModify']."'";
    $q = pg_query($conexion,$query);
}

if($_POST['newNombreMetodo'] != ''){
    $query = 'UPDATE public."MetodoPago" 
            set   "Nombre_Metodo" = '."'".$_POST['newNombreMetodo']."'".'
            where "Rut_Titular" = '."'".$_GET['id']."'".
            'and "Alias_Metodo" = '."'".$_POST['aliasToModify']."'";
    $q = pg_query($conexion,$query);
}

if($_POST['newFecha'] != ''){
    $query = 'UPDATE public."MetodoPago" 
            set   "Fecha_Exp" = '."'".$_POST['newFecha']."'".'
            where "Rut_Titular" = '."'".$_GET['id']."'".
            'and "Alias_Metodo" = '."'".$_POST['aliasToModify']."'";
    $q = pg_query($conexion,$query);
}

if($_POST['newCCV'] != ''){
    $query = 'UPDATE public."MetodoPago" 
            set   "CCV" = '."'".$_POST['newCCV']."'".'
            where "Rut_Titular" = '."'".$_GET['id']."'".
            'and "Alias_Metodo" = '."'".$_POST['aliasToModify']."'";
    $q = pg_query($conexion,$query);
}

echo '
        <div class="container my-4 mx-5">
            <div class="lead">Metodo actualizado con exito.
            </div>
        </div>
        ';
    header( "refresh:2;url= \proyectoBDD\adminClientes.php" );

?>