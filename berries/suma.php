<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style type="text/css">
body {
	background-image: url(imagenes/descarga_fondo.jfif);
}
</style>
<style type="text/css" media="resolution">
@import url("boton.css");
</style>
</head>


<body>
<?php
$num1=$_POST['num1'];
$num2=$_POST['num2'];
$suma=$num1*$num2;

?>
<form id="form1" name="form1" action="suma.php" method="post">
  <p>ingrese numero 1
  <input type="text" name="num1" id="textfield" />
  </p>
  <p>ingrese numero 2
  <input type="text" name="num2" id="textfiel2"/>
  <input type="text" name="result" id="textfiel3" value="<?=$suma?>"/>
  </p>
  <p>
  <input type="submit" name="button" id="button" value="Submit"/>
  </p>

</form>


</body>
</html>