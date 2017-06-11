<?
$state = false;
if ($_POST['action'] == "add") { 
	$conexion = mysql_connect("localhost", "root", "");
	mysql_select_db("SUMA", $conexion);
	
	$que = "INSERT INTO Suma (NUMERO1, NUMERO2, NUMERO3, TOTAL) ";
	$que.= "VALUES ('".$_POST['num1']."', '".$_POST['num2']."', '".$_POST['num3']."', '".$_POST['TOTAL']."') ";
	$res = mysql_query($que, $conexion) or die(mysql_error());
	$state = true;
}


?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Insertar datos en MySQL</title>
<style type="text/css">
<!--
body {
	font-family: "Trebuchet MS", Tahoma, Arial;
	font-size: 12px;
	color: #333333;
}
h2 {
	font-size: 16px;
	color: #CC0000;
}
input, select {
	font-family: "Trebuchet MS", Tahoma, Arial;
	font-size: 11px;
	color: #666666;
}
-->
</style>

<head>
<title></title>

<script>
function sumar() {
var n1 = parseInt(document.insertar.num1.value);
var n2 = parseInt(document.insertar.num2.value);
var n3 = parseInt(document.insertar.num3.value);
document.insertar.TOTAL.value=n1+n2+n3;
}
</script>
</head>

<body>
<h2>Insertar datos en MySQL</h2>
<form id="insertar" name="insertar" method="post" action="">
<input type="text" name="num1" id="num1" size="20" onChange="sumar()">
<input type="text" name="num2" id="num2" size="20" onChange="sumar()">
<input type="text" name="num3" id="num3" size="20" onChange="sumar()">
<input type="text" name="TOTAL"   id="TOTAL" size="20">
 </p>
  <input type="submit" name="Submit" value="Insertar Registro" />
  <input type="hidden" name="action" value="add" />
</form>



<?php if ($state) { ?>
<p><em>Registro insertado correctamente</em></p>
<?php } ?> 
</body>
</html>
