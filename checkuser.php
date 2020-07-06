<?php
include_once("header.php");
include("config.php");

$RUT="'".$_POST['usuario']."' ";


$query = 'SELECT COUNT(*) FROM public."Cliente" WHERE "Cliente_ID" ='.$RUT;

$q = pg_query($conexion, $query);

$check = pg_fetch_all($q);
foreach($check as $key => $value){
    $users=$value['count'];
}
print($users);

if($users == 1){
    header('Location: user.php');
}else{
    header('Location: registerUser.php');
}
?>