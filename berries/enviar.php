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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style type= "text/css">
	body{
	background-position: center;
	background-image: url(imagenes/fond3.jpg);
	}
	
	form{
	background:url(imagenes/descarga.jpg);
	width: 677px;
	border: 1px solid #003;
	border-radius:9px;
	-moz- border-radius:3px;
	webkit- border-radius:3px;
	margin:100px auto;
	}
	
	.enviar {
	color: #FFF;
}
Desconectar {
	color: #FFF;
}
desc {
	color: #000;
}
c {
	color: #FFF;
}
color {
	color: #FFF;
}
.enviar a {
	color: #FFF;
}
</style>
    
     <meta charset="utf-8">
    <link type="text/css" href="./../css/style.css" rel="stylesheet" />
</head>

<body>
<form name="form1" method="post" action="">
  <table width="573" border="1">
    <tr>
      <td width="162" height="357"><a href="buscarpro.php"><img src="buscarpro.jpg" width="162" height="200" align="absmiddle"></a> 
      <div align="center"><p>Buscar proveedor</p> </div></td>
      
      
      <td width="162"><a href="eliminar.php"><img src="eliminarp.jpg" width="162" height="200
      " align="absmiddle"></a>
      <div align="center">
        <p>Eliminar Proveedor</p>
      </div></td>
      <td width="162"><a href="factura.php"><img src="factura.jpg" width="162" height="200" align="absmiddle"></a>
      <div align="center"><p>Realizar Factura</p> </div></td>
      <td width="59"><a href="registrop.php"><img src="Usuario.png" width="162" height="200" align="absmiddle"></a>
      <div align="center"><p>Registrar Proveedor</p> </div></td>
    </tr>
  </table>
</form>
<blockquote>
  <h2  align="center"><span class="enviar"><a href="<?php echo $logoutAction ?>">Desconectar</a></span> </h2>
  
</blockquote>
</body>
</html>	 