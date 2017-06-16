<?php require_once('Connections/usuarios.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO registroproveedor (idproveedor, nombreprove, apellidosprove, localidadprovee, municipioprove, emailprove) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['idproveedor'], "int"),
                       GetSQLValueString($_POST['nombreprove'], "text"),
                       GetSQLValueString($_POST['apellidosprove'], "text"),
                       GetSQLValueString($_POST['localidadprovee'], "text"),
                       GetSQLValueString($_POST['municipioprove'], "text"),
                       GetSQLValueString($_POST['emailprove'], "text"));

  mysql_select_db($database_usuarios, $usuarios);
  $Result1 = mysql_query($insertSQL, $usuarios) or die(mysql_error());
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style type="text/css">
body {
	background-image: url(imagenes/moras-en-zarzas-boyanas.jpg);
}
.error1 {	color: #FFF;
}
</style>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p>&nbsp;</p>
  <p align="center"><span class="error1">
  <h1 align="center" class="error1">Aquí puedes registrar a un nuevo Proveedor</h1></span></p>
  <p align="center"><img src="imagenes/Registro1.png" width="240" height="220"></p>
  <p align="center">&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td align="right" nowrap class="error1"><div align="left">Idproveedor:</div></td>
      <td><input type="text" name="idproveedor" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="error1"><div align="left">Nombreprove:</div></td>
      <td><input type="text" name="nombreprove" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="error1"><div align="left">Apellidosprove:</div></td>
      <td><input type="text" name="apellidosprove" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="error1"><div align="left">Localidadprovee:</div></td>
      <td><input type="text" name="localidadprovee" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="error1"><div align="left">Municipioprove:</div></td>
      <td><input type="text" name="municipioprove" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="error1"><div align="left">Emailprove:</div></td>
      <td><input type="text" name="emailprove" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <p align="center"><a href="enviar.php" class="error1">Regresar al menu de acciones </a>
  </p>
  <p>
    <input type="hidden" name="MM_insert" value="form1">
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>