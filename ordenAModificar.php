<?php
include("header.php");
echo '
   
        <div class="container mt-5">
            <p class="display-4 mb-5">Modificar Orden    </p>
            <form action="\proyectoBDD\api\modificarOrden.php" method="get">
                <div class="form-row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ingrese Numero de Orden</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="ordenToModify" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </div>
            </form>
        </div>
';
?>