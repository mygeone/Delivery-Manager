<?php
include_once("header.php");
include("footer.php");

?>
<div class="container pt-5 d-flex justify-content-center">
    <p class="display-4 mb-5">Administrar Ordenes</p>
</div>
<div class="container pt-5 d-flex justify-content-center"></div>
  <div class="row justify-content-center">
      <a class="btn btn-primary" href="ingresarOrden.php?step=0" role="button">Ingresar Orden</a>
  </div>
  <div class="row pt-3  d-flex justify-content-center">
      <a class="btn btn-primary" href="ordenACancelar.php" role="button">Cancelar Orden </a>
  </div>
  <div class="row pt-3  d-flex justify-content-center">
      <a class="btn btn-primary" href="ordenAModificar.php" role="button">Modificar Orden </a>
  </div>
  <div class="row pt-3  d-flex justify-content-center">
      <a class="btn btn-primary" href="verOrdenes.php" role="button">Ver Ordenes </a>
  </div>
</div>


<!--
<div class="container pt-5">
      <div class="row justify-content-around">
        <a class="btn btn-primary" href="ordenesPreparacion.php" role="button"> Ordenes en Preparacion</a></div>
        <a class="btn btn-primary" href="ordenesEnCamino.php" role="button"> Ordenes en Camino</a></div>
        <a class="btn btn-primary" href="ordenesEntregadas.php" role="button"> Ordenes Entregadas</a></div>
    </div>
</div> -->