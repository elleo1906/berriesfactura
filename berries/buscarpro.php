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

<style type="text/css">
body {
	background-image: url(imagenes/moras-en-zarzas-boyanas.jpg);
}
</style>
<link href="boton.css" rel="stylesheet" type="text/css">
</head>

<body >
<form name="form1" method="post" action="">

  <p>&nbsp;</p>
  <p align="center"><img src="imagenes/buscador.png" width="1223" height="177"></p>
  <p>&nbsp;	</p>
  <p>&nbsp;</p>
  <p>
    <label for="idproveedor"> 
      <div align="center"><strong class="error">Ingresa id del Proveedor</strong>
        <input type="text" name="idproveedor" id="idproveedor">
        <input type="submit" name="buscar" id="buscar" value="Buscar">
      </div>
    </label>
    <div align="center"></div>
  </p>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p align="center"><a href="registrop.php" class="error">Has Clik para registrar un nuevo Proveedor</a></p>
<form name="form2" method="post" action="">
  <div align="center"></div>
</form>
<div align="center">
  <table border="1">
    <tr class="error">
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
        <td class="error"><?php echo $row_Recordset1['idproveedor']; ?></td>
        <td class="error"><?php echo $row_Recordset1['nombreprove']; ?></td>
        <td class="error"><?php echo $row_Recordset1['apellidosprove']; ?></td>
        <td class="error"><?php echo $row_Recordset1['localidadprovee']; ?></td>
        <td class="error"><?php echo $row_Recordset1['municipioprove']; ?></td>
        <td class="error"><?php echo $row_Recordset1['emailprove']; ?></td>
        <td class="error"><p><a href="modificar.php?recordID=<?php echo $row_Recordset1['idproveedor']; ?>" class="error">Editar</a></p>
        <p><a href="eliminar1.php?recorID=<?php echo $row_Recordset1['idproveedor']; ?>" class="error1">Eliminar</a></p></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
  <p><a href="enviar.php" class="error">Regresar al menu de acciones</a></p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
