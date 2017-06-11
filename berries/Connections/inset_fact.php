
<?php


include('usuarios.php');

$nombp=$_POST['nproveedor'];
$fechf=$_POST['usuario'];
$cvp=$_POST['cproveedor'];
$nof=$_POST['ffactura'];

$camp3=$_POST['camp1'];
$camp4=$_POST['camp2'];
$mult=$camp3*$camp4_POST['result'];


       


$registrar="insert into factura value('$nombp','$fechf','$cvp','$nof','$camp3','$camp4','$mult')";
$ro=mysql_query($registrar,$usuarios);



?>