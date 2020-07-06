<?php
include("header.php")
#<div class="control-group">
 #   <!-- Button -->
  #  <div class="controls">
        #<button class="btn btn-success">Register</button>
    #</div>
#</div>
?>


<div class="container">
    <form method=POST action=addUser.php>
    <div id="legend">
        <legend class="">Datos personales</legend>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Rut</label>
            <input type="text" class="form-control" id="rut" name="rut"  placeholder="1918561850">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Email</label>
        <input type="email" class="form-control" name="email" id="inputPassword4">
        </div>
    </div>

    <div class="form-group">
        <label for="inputAddress">Nombre Completo</label>
        <input type="text" class="form-control" name="nombre" id="inputAddress" placeholder="Miguel Contreras Pezoa">
    </div>
    <div class="form-row">
        <div class="form-group col-8">
            <label for="inputAddress">Calle</label>
            <input type="text" class="form-control" name="direccion_calle" id="inputAddress" placeholder="Av. Providencia">
        </div>
        <div class="form-group col-md-4">
            <label for="inputZip">Numero</label>
            <input type="number" class="form-control" name="direccion_numero"id="inputZip">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="inputCity">Ciudad</label>
        <input type="text" class="form-control" name="direccion_ciudad" id="inputCity">
        </div>
        <div class="form-group col-md-4">
        <label for="inputCity">Comuna</label>
        <input type="text" class="form-control" name="direccion_comuna" id="inputCity">
        </div>
        <div class="form-group col-md-4">
        <label for="inputCity">Alias Direccion</label>
        <input type="text" class="form-control" name="direccion_alias" id="inputCity" placeholder="Casa pololo">
        </div>
    </div>

    <div id="legend">
        <legend class="">Método de pago</legend>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Nombre Titular</label>
            <input type="text" class="form-control" id="rut" name="pago_nombre" placeholder="Miguel A. Contreras Pezoa">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Numero Tarjeta</label>
        <input type="text" class="form-control" name="pago_numero" id="inputPassword4">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="exampleFormControlSelect1">Tipo Método</label>
                <select class="form-control" name="pago_tipo" id="exampleFormControlSelect1">
                    <option>Crédito</option>
                    <option>Débito</option>
                </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4">Fecha Expiracion</label>
            <input type="date" class="form-control" name="pago_fecha" id="inputPassword4">
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4">CCV</label>
            <input type="text" class="form-control" name="pago_ccv" id="inputPassword4">
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4">Alias Metodo</label>
            <input type="text" class="form-control" name="pago_alias" id="inputPassword4" placeholder="Tarjeta principal">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Registar</button>
    </form>
</div>