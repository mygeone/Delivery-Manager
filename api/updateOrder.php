<?php
include("../config.php");
include("../header.php");
include("../footer.php");


if($_POST['newDireccion'] != 'Nueva Direccion de Envio' and $_POST['newPago'] != 'Nuevo Metodo de Pago'){
    $preSql = ' "Alias_Direccion" ='."'".$_POST['newDireccion']."',"
                .'"Alias_Metodo" ='. "'".$_POST['newPago']."'" ;
    $query = 'UPDATE public."Orden" 
            set'.$preSql.'where "Orden_ID" = '."'".$_GET['id']."'" ;


}else if($_POST['newDireccion'] != 'Nueva Direccion de Envio'){
    $preSql = ' "Alias_Direccion" ='."'".$_POST['newDireccion']."'";
    $query = 'UPDATE public."Orden" 
            set'.$preSql.'where "Orden_ID" = '."'".$_GET['id']."'" ;
}else{
    $preSql = '"Alias_Metodo" ='. "'".$_POST['newPago']."'" ;
    $query = 'UPDATE public."Orden" 
            set'.$preSql.'where "Orden_ID" = '."'".$_GET['id']."'" ;
}
$q = pg_query($conexion,$query);
echo '
        <div class="container my-4 mx-5">
            <div class="lead">La orden fue actualizada con exito
            </div>
        </div>
        ';
    header( "refresh:2;url= \proyectoBDD\adminOrdenes.php" );

?>
