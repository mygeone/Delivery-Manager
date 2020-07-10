<?php
include_once("..\header.php");
include("..\config.php");
?>

<?php
    $rutToVerify = pg_escape_string($_POST['rutCliente']);
    $query = ' SELECT exists(select "Cliente_ID" from public."Cliente" where "Cliente_ID" ='."'".$rutToVerify."'".')';
    $q = pg_query($conexion,$query);
    $results = pg_fetch_all($q);
    if($results[0]['exists'] == 't'){
        $_SESSION['cart'][$_POST['rutCliente']] = array();
        header("Location: ..\ingresarOrden.php\?step=1&rut=".$rutToVerify); die;
    } else {
        header("Location:../registerUser.php" ); die;
    }
?>