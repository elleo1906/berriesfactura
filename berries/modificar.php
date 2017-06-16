<?php require_once('Connections/usuarios.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "Index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE registroproveedor SET nombreprove=%s, apellidosprove=%s, localidadprovee=%s, municipioprove=%s, emailprove=%s WHERE idproveedor=%s",
                       GetSQLValueString($_POST['nombreprove'], "text"),
                       GetSQLValueString($_POST['apellidosprove'], "text"),
                       GetSQLValueString($_POST['localidadprovee'], "text"),
                       GetSQLValueString($_POST['municipioprove'], "text"),
                       GetSQLValueString($_POST['emailprove'], "text"),
                       GetSQLValueString($_POST['idproveedor'], "int"));

  mysql_select_db($database_usuarios, $usuarios);
  $Result1 = mysql_query($updateSQL, $usuarios) or die(mysql_error());

  $updateGoTo = "buscarpro.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$var_id_rsNombres = "0";
if (isset($_GET['recordID'] )) {
  $var_id_rsNombres = $_GET['recordID'] ;
}
mysql_select_db($database_usuarios, $usuarios);
$query_rsNombres = sprintf("SELECT * FROM registroproveedor WHERE registroproveedor.idproveedor=%s", GetSQLValueString($var_id_rsNombres, "int"));
$rsNombres = mysql_query($query_rsNombres, $usuarios) or die(mysql_error());
$row_rsNombres = mysql_fetch_assoc($rsNombres);
$totalRows_rsNombres = mysql_num_rows($rsNombres);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="boton.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(imagenes/moras-en-zarzas-boyanas.jpg);
}
</style>
</head>

<body background="imagenes/moras-en-zarzas-boyanas.jpg">
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <h1><p align="center" class="error">Estas a punto de modificar un registro de un proveedor</p></h1>
  <p>&nbsp;</p>
  <p align="center"><img src="imagenes/proveedores.png" width="160" height="160"></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td align="right" nowrap class="error"><div align="left">Nombreprove:</div></td>
      <td><input type="text" name="nombreprove" value="<?php echo htmlentities($row_rsNombres['nombreprove'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="error"><div align="left">Apellidosprove:</div></td>
      <td><input type="text" name="apellidosprove" value="<?php echo htmlentities($row_rsNombres['apellidosprove'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="error"><div align="left">Localidadprovee:</div></td>
      <td><input type="text" name="localidadprovee" value="<?php echo htmlentities($row_rsNombres['localidadprovee'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="error"><div align="left">Municipioprove:</div></td>
      <td><input type="text" name="municipioprove" value="<?php echo htmlentities($row_rsNombres['municipioprove'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="error"><div align="left">Emailprove:</div></td>
      <td><input type="text" name="emailprove" value="<?php echo htmlentities($row_rsNombres['emailprove'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Actualizar registro"></td>
    </tr>
  </table>
  <p align="center"><a href="<?php echo $logoutAction ?>">Desconectar</a></p>
  <p>
    <input type="hidden" name="idproveedor" value="<?php echo $row_rsNombres['idproveedor']; ?>">
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="idproveedor" value="<?php echo $row_rsNombres['idproveedor']; ?>">
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsNombres);
?>

