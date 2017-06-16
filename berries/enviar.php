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

$MM_restrictGoTo = "proyectoF.php";
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
@import url("boton.css");

	body{
	background-position: center;
	background-image:url(imagenes/moras-en-zarzas-boyanas.jpg);
	}
	
	form{
	background:url(imagenes/moras-en-zarzas-boyanas.jpg);
	width: 675px;
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
  <table width="675" height="493" border="1">
    <tr>
     <td height="40" colspan="3"><div align="center" class="error"> <h1>Menu de Acciones </h1></div></td>
    </tr>
    <tr>
      <td width="237" height="445"><div align="center">
        <p><a href="buscarpro.php"><img src="buscarpro.jpg" width="166" height="221" align="absmiddle"></a> 
        </p>
        <p>&nbsp;</p>
      </div>
      <div align="center"><p class="error"><a href="buscarpro.php" class="error1">Buscar proveedor</a></p> </div></td>
      <td width="218"><div align="center">
        <p><a href="app/reportes/factura.html"><img src="factura.jpg" width="176" height="224" align="absmiddle"></a>
        </p>
        <p>&nbsp;</p>
      </div>
      <div align="center"><p class="error"><a href="app/reportes/factura.html" class="error1">Realizar Factura</a></p> </div></td>
      <td width="198"><div align="center">
        <p><a href="pruepro.php"><img src="imagenes/proveedores.png" width="177" height="221" align="absmiddle"></a>
        </p>
        <p>&nbsp;</p>
      </div>
      <div align="center"><p class="error"><a href="pruepro.php" class="error1">Registrar Proveedor</a></p> </div></td>
    </tr>
  </table>
</form>
<blockquote>
  <h2  align="center"><span class="enviar"><a href="<?php echo $logoutAction ?>">Desconectar</a></span> </h2>
  
</blockquote>
</body>
</html>	 