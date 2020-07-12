<?php
include_once("header.php");
include("config.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <!-- form card login -->
                    <div class="card rounded shadow shadow-sm">
                        <div class="card-body">
                            <form class="form" action="checkUser.php" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="uname1">Usuario</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="usuario" id="uname1" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->

<?php include_once("footer.php"); ?>