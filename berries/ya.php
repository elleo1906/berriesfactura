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
  $insertSQL = sprintf("INSERT INTO operacion (clavenumero, nombreP, ClaveP, Fecha, tipo, numero1, numero2, resultado) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['clavenumero'], "int"),
                       GetSQLValueString($_POST['nombreP'], "text"),
                       GetSQLValueString($_POST['ClaveP'], "int"),
                       GetSQLValueString($_POST['Fecha'], "date"),
                       GetSQLValueString($_POST['tipo'], "text"),
                       GetSQLValueString($_POST['numero1'], "int"),
                       GetSQLValueString($_POST['numero2'], "int"),
                       GetSQLValueString($_POST['resultado'], "int"));

  mysql_select_db($database_usuarios, $usuarios);
  $Result1 = mysql_query($insertSQL, $usuarios) or die(mysql_error());
}
?>
<!doctype html>
<html">
<head>
<script>
function sumar() {
var n1 = parseInt(document.form1.numero1.value);
var n2 = parseInt(document.form1.numero2.value);
document.form1.resultado.value=n1+n2;
}
</script>

<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 405px;
	height: 51px;
	left: 369px;
	top: 139px;
}

</style>

<style type="text/css">
body,td,th {
	color: #FFF;
}
</style>
<body background="imagenes/moras-en-zarzas-boyanas.jpg">
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table background="" align="center">
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><table width="754" border="1">
        <tr>
          <td colspan="4"><p align="center"><img src="imagenes/Registro1.png" alt="" width="230" height="275"></p>
            <p align="center" class="error"><strong>Facturación de la empresa Berries Export company ubicado en el tramo Tecario-Tacambaro</strong></p></td>
        </tr>
        <tr>
          <td width="132"><strong>Nombre del proveedor</strong></td>
          <td width="187"><input type="text" name="nombreP" value="" size="32"></td>
          <td width="187"><strong>Fecha de realización de factura</strong></td>
          <td width="220"><input type="text" name="Fecha" value="" size="32"></td>
        </tr>
        <tr>
          <td><strong>Clave del Proveedor</strong></td>
          <td><input type="text" name="ClaveP" value="" size="32"></td>
          <td><strong>Clave factura </strong></td>
          <td><input type="text" name="clavenumero" value="" size="32"></td>
        </tr>
        <tr>
          <td><strong>Tipo de producto</strong></td>
          <td>Cantidad</td>
          <td><strong>Precio unitario</strong></td>
          <td><strong>Total</strong></td>
        </tr>
        <tr>
          <td><input type="text" name="tipo" value="" size="32"></td>
          <td><input type="text" name="numero1" id="numero1" size="20" onChange="sumar()"></td>
          <td><input type="text" name="numero2" id="numero2" size="20" onChange="sumar()"></td>
          <td><input type="text" name="resultado"   id="resultado" size="20"></td>
        </tr>
        <tr>
          <td colspan="4"><div align="center"><strong>
            <input type="submit" name="Submit" value="Insertar Registro" />
          </strong></div></td>
          </tr>
      </table></td>
      <td><input type="hidden" name="action" value="add" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<?php if ($state) { ?>
<p><em>Registro insertado correctamente</em></p>
<?php } ?> 
</body>
</html>