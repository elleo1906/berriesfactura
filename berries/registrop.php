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
<style type= "text/css">
	body{
	background-position: center;
	background-image: url(imagenes/moras-en-zarzas-boyanas.jpg);
	}
	
	form{
	background:url(imagenes/moras-en-zarzas-boyanas.jpg);
	width: 500px;
	border: 1px solid #003;
	border-radius:9px;
	-moz- border-radius:3px;
	webkit- border-radius:3px;
	margin:100px auto;
	}
	
	body form div p {
	color: #FFF;
}
regis {
	color: #FFF;
}
.error1 {
	color: #FFF;
}
.registro1 {
	color: #FFF;
}
</style>
    
     <meta charset="utf-8">
    <link type="text/css" href="./../css/style.css" rel="stylesheet" />
</head>

<body>



<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <p align="center">&nbsp;</p>
  <h3 align="center"> <p align="center" class="error1">Aquí puedes registrar a los nuevos Proveedores</p></h3>
  <p align="center"><img src="imagenes/Registro1.png" width="228" height="207"></p>
  <p align="center">&nbsp;</p>
  <div align="center">
    <table align="center">
      <tr valign="baseline">
        <td align="right" nowrap class="error1">Clave</td>
        <td><input type="text" name="idproveedor" value="001" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td align="right" nowrap class="error1">Nombre</td>
        <td><input type="text" name="nombreprove" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td align="right" nowrap class="error1">Apellidos</td>
        <td><input type="text" name="apellidosprove" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td align="right" nowrap class="error1">Localidad</td>
        <td><input type="text" name="localidadprovee" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td align="right" nowrap class="error1">Municipio</td>
        <td><input type="text" name="municipioprove" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td align="right" nowrap class="error1">Email</td>
        <td><input type="text" name="emailprove" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td><div align="center">
          <input type="submit" value="Registrar">
        </div></td>
      </tr>
    </table>
  <span class="error1"><a href="enviar.php" class="error1">Regresar al menu de acciones  </a></span></div>
  <div align="center">
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>