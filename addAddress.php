<?php 
include("header.php");
?>


<form class="form-horizontal" action='addAddress.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Registrar nuevo usuario </legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">RUT</label>
      <div class="controls">
        <input type="text" id="rut" name="rut" placeholder="" class="input-xlarge">
        <p class="help-block">Ingrese su rut sin puntos ni guion</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Nombre</label>
      <div class="controls">
        <input type="text" id="nombre" name="nombre" placeholder="" class="input-xlarge">
        <p class="help-block">Ingrese su nombre</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Register</button>
      </div>
    </div>
  </fieldset>
</form>