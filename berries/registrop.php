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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO registroproveedor (idproveedor, nombreprove, apellidosprove, localidadprovee, municipioprove, emailprove) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['idproveedor'], "int"),
                       GetSQLValueString($_POST['nombreprove'], "text"),
                       GetSQLValueString($_POST['apellidosprove'], "text"),
                       GetSQLValueString($_POST['localidadprovee'], "text"),
                       GetSQLValueString($_POST['municipioprove'], "text"),
                       GetSQLValueString($_POST['emailprove'], "text"));

  mysql_select_db($database_usuarios, $usuarios);
  $Result1 = mysql_query($insertSQL, $usuarios) or die(mysql_error());

  $insertGoTo = "registrop.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
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
	
  $logoutGoTo = "proyectoF.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "error.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>

<?php
 if(isset ($_POST['registrar'])){
	 $nombre= $_POST['Nombre'];
	 $apellidos= $_POST['Apellidos'];
	 $localidad= $_POST['Localidad'];
	 $municipio= $_POST['Municipio'];
	 $email= $_POST['Email'];
	 $clave= $_POST['clave'];
	
	 
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
	background:url(imagenes/descarga.jpg);
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
  <p align="center"><img src="imagenes/Registro1.png" width="228" height="183"></p>
  <p align="center">&nbsp;</p>
  <div align="center">
    <table align="center">
      <tr valign="baseline">
        <td nowrap align="right">Clave</td>
        <td><input type="text" name="idproveedor" value="001" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Nombre</td>
        <td><input type="text" name="nombreprove" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Apellidos</td>
        <td><input type="text" name="apellidosprove" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Localidad</td>
        <td><input type="text" name="localidadprovee" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Municipio</td>
        <td><input type="text" name="municipioprove" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Email</td>
        <td><input type="text" name="emailprove" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td><div align="center">
          <input type="submit" value="Registrar">
        </div></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form2">
  </div>
</form>
<p>&nbsp;</p>
</body>
</html>