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
  $insertSQL = sprintf("INSERT INTO operacion (clavenumero, nombreP, ClaveP, Fecha, NumeroF, numero1, numero2, resultado) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['clavenumero'], "int"),
                       GetSQLValueString($_POST['nombreP'], "text"),
                       GetSQLValueString($_POST['ClaveP'], "int"),
                       GetSQLValueString($_POST['Fecha'], "date"),
                       GetSQLValueString($_POST['NumeroF'], "int"),
                       GetSQLValueString($_POST['numero1'], "int"),
                       GetSQLValueString($_POST['numero2'], "int"),
                       GetSQLValueString($_POST['resultado'], "int"));

  mysql_select_db($database_usuarios, $usuarios);
  $Result1 = mysql_query($insertSQL, $usuarios) or die(mysql_error());
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php
$num1=$_POST['numero1'];
$num2=$_POST['numero2'];
$suma=$num1*$num2;
?>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Clavenumero:</td>
      <td><input type="text" name="clavenumero" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">NombreP:</td>
      <td><input type="text" name="nombreP" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">ClaveP:</td>
      <td><input type="text" name="ClaveP" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Fecha:</td>
      <td><input type="text" name="Fecha" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">NumeroF:</td>
      <td><input type="text" name="NumeroF" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Numero1:</td>
      <td><input type="text" name="numero1" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Numero2:</td>
      <td><input type="text" name="numero2" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Resultado:</td>
      <td><input type="text" name="resultado" value="<?=$suma?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td><input type="submit" name="suma" id=""value="Insertar registro"></td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>