<?php
include('../config.php');
include("../header.php");
include("../footer.php");
#print_r($_POST);
$rutToModify = $_GET['id'];

$newName = pg_escape_string($_POST['newName']);
$newEmail = pg_escape_string($_POST['newEmail']);
$preSql = ' UPDATE public."Cliente" SET ';

if($newName != ''){
    $preSql .= ' "Nombre_Cliente" ='."'" .$newName."'";
    if($newEmail != ''){
        $preSql .= ', "Email" ='."'" .$newEmail."' ";
    }
}

if($newEmail != '' and $newName == ''){
    $preSql .= ' "Email" ='."'" .$newEmail."' ";
}

$preSql .= 'WHERE "Cliente_ID" ='."'".$rutToModify."'";
$results = pg_query($conexion, $preSql);
echo '
        <div class="container my-4 mx-5">
            <div class="lead">Cliente modificado con exito.
            </div>
        </div>
    ';
    header( "refresh:2;url= \proyectoBDD\adminClientes.php" );

?>
