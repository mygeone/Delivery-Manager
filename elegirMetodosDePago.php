<?php
include_once("header.php");
include_once("config.php");
include("footer.php");

#-----escribir metodo direccion en orden detalle-----
foreach($_POST as $aliasDireccion => $status){
    $aliasDireccion = str_replace('_',' ',($aliasDireccion));
    $sql = 'UPDATE public."Orden" 
            SET "Alias_Direccion" = '."'".$aliasDireccion."'".' 
            where "Orden_ID" ='."'".$_GET['order']."'";
    $q = pg_query($conexion,$sql);
    $results = pg_fetch_all($q);
}

?>
<div class="container mt-5">
    <div id="legend">
        <legend class="">Metodos disponibles para pago</legend>
    </div>
</div>



<?php 
$sql = 'SELECT * from public."MetodoPago" where "Rut_Titular" ='."'".$_GET['rut']."'";
$q = pg_query($conexion,$sql);
$results = pg_fetch_all($q);

echo '
<form action="/proyectoBDD/mostrarOrden.php/?rut='.$_GET['rut'].'&order='.$_GET['order'].'  " method="POST">';
foreach($results as $key => $value){
    echo '
        <div class="input-group border border-black mt-3 ml-5">
        <div class="input-group-prepend">
            <div class="input-group-text">
            <input type="radio" name="'.$value['Alias_Metodo'].'" aria-label="Radio button for following text input">
            </div>
        </div>
            <div class="container ml-5">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2">Numero Tarjeta:</div>
                            <div class="col-4">'.$value['Numero_Tarjeta'].'</div>
                        </div>
                        <div class="row">
                            <div class="col-2">Fecha Expiracion:</div>
                            <div class="col-4">'.$value['Fecha_Exp'].'</div>
                        </div>
                        <div class="row">
                            <div class="col-2">Tipo Tarjeta:</div>
                            <div class="col-4">'.$value['Nombre_Metodo'].'</div>
                        </div>
                        <div class="row">
                            <div class="col-2">Alias Metodo:</div>
                            <div class="col-4">'.$value['Alias_Metodo'].'</div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    ';
} ?>
<div class="container mt-5">
    <div class="row justify-content-end">
        <div class="col-2">
            <input class="btn btn-primary" type="submit" value="Confirmar Metodo de Pago">
        </div>
    </div>
</div>

</form>

<!---sql

UPDATE public."Orden" SET "Alias_Direccion" = 'casa mama' where "Orden_ID" ='49697'

SELECT * from public."MetodoPago" where "Rut_Titular" ='9492314k' 

