<?php
include("header.php");
include("config.php");
include("footer.php");
?>
<div class="container">
<div class="d-block my-3">
  <div class="custom-control custom-radio">
    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
    <label class="custom-control-label" for="credit">Tarjta de Credito</label>
  </div>
  <div class="custom-control custom-radio">
    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
    <label class="custom-control-label" for="debit">Tarjeta de Debito</label>
  </div>
  
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label for="cc-name">Nombre de Cliente</label>
    <input type="text" class="form-control" id="cc-name" placeholder="" required>
    <small class="text-muted">Nombre completo impreso en la tarjeta</small>
    <div class="invalid-feedback">
      Name on card is required
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <label for="cc-number">Numero de tarjeta</label>
    <input type="text" class="form-control" id="cc-number" placeholder="" required>
    <div class="invalid-feedback">
      Credit card number is required
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-3 mb-3">
    <label for="cc-expiration">Fecha de expiracion</label>
    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
    <div class="invalid-feedback">
      Expiration date required
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <label for="cc-cvv">CVV</label>
    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
    <div class="invalid-feedback">
      Security code required
    </div>
  </div>
</div>

<hr class="mb-4">
<button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
</form>
</div>