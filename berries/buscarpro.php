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

$idp_Recordset1 = "-1";
if (isset($_POST["idproveedor"])) {
  $idp_Recordset1 = $_POST["idproveedor"];
}
mysql_select_db($database_usuarios, $usuarios);
$query_Recordset1 = sprintf("SELECT * FROM registroproveedor where idproveedor=%s", GetSQLValueString($idp_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $usuarios) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$idp_Recordset1 = "10";
if (isset($_POST["idproveedor"])) {
  $idp_Recordset1 = $_POST["idproveedor"];
}
mysql_select_db($database_usuarios, $usuarios);
$query_Recordset1 = sprintf("SELECT * FROM registroproveedor WHERE idproveedor=%s", GetSQLValueString($idp_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $usuarios) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>

</head>

<body >
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>
    <label for="idproveedor">Ingresa id del Proveedor</label>
    <input type="text" name="idproveedor" id="idproveedor">
    <input type="submit" name="buscar" id="buscar" value="Buscar">
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p><a href="registrop.php">Has Clik para registrar un nuevo Proveedor</a></p>
<form name="form2" method="post" action="">
</form>
<table border="1">
  <tr>
    <td>idproveedor</td>
    <td>nombreprove</td>
    <td>apellidosprove</td>
    <td>localidadprovee</td>
    <td>municipioprove</td>
    <td>emailprove</td>
    <td>Acciones</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['idproveedor']; ?></td>
      <td><?php echo $row_Recordset1['nombreprove']; ?></td>
      <td><?php echo $row_Recordset1['apellidosprove']; ?></td>
      <td><?php echo $row_Recordset1['localidadprovee']; ?></td>
      <td><?php echo $row_Recordset1['municipioprove']; ?></td>
      <td><?php echo $row_Recordset1['emailprove']; ?></td>
      <td><p><a href="modificar.php?recordID=<?php echo $row_Recordset1['idproveedor']; ?>">Editar</a></p>
      <p><a href="eliminar1.php?recorID=<?php echo $row_Recordset1['idproveedor']; ?>">Eliminar</a></p></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
