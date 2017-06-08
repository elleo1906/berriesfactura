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
	background-position:center	
	}
	
	form{
	background:#808040;
	width: 469px;
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

<body background="f1.jpg">
<form name="form1" method="post" action="">
  <table width="470" height="334" border="1">
    <tr>
      <td height="46" colspan="3"><div align="center"><h3 class="registro1">Registro de proveedores </h3></div></td>
    </tr>
    <tr>
     <div align="center"> <td width="106" rowspan="6"><img src="p1.jpg" alt="logo" width="125" height="137" longdesc="file:///C|/AppServ/www/proyectoFinal/p1.jpg" align="middle"></td></div>
      <td width="110" class="registro1">Nombre</td>
      
      <td width="153"><div align="center">
        <input name="Nombre" type="text" id="nombre" class="nombre" placeholder="Ingrese su(s) nombre(s)" autofocus/ > 
      </div></td>
      
    </tr>
    <tr>
      <td class="registro1">Apellidos</td>
      <td><div align="center">
        <input name="Apellidos" type="text" id="apellidos" class="apellidos" placeholder="Ingrese sus apellidos" autofocus/ > 
      </div></td>
    </tr>
    <tr>
      <td class="registro1">Localidad</td>
      <td><div align="center">
        <input name="Localidad" type="text" id="localidad" class="localidad" placeholder="Ingrese su localida" autofocus/ >
      </div></td>
    </tr>
    <tr>
      <td class="registro1">Municipio</td>
      <td><div align="center">
        <input name="Municipio" type="text" id="municipio" class="municipio" placeholder="Ingrese su municipio" autofocus/ >
      </div></td>
    </tr>
    <tr>
      <td class="registro1">Telefono</td>
      <td><div align="center">
        <input name="Telefono" type="text" id="telefono" class="telefono" placeholder="Ingrese su telefono" autofocus/ >
      </div></td>
    </tr>
    <tr>
      <td class="registro1">Email</td>
      <td><div align="center">
        <input name="Email" type="text" id="email" class="email" placeholder="Ingrese su email" autofocus/ >
      </div></td>
    </tr>
    <tr>
      <td colspan="3"> <div align="center">
        <input name="submit" type="submit" id="boton" value="Registrar" class="boton" />
      </div></td>
    </tr>
  </table>
  <div align="center">
    <blockquote>
      <p><a href="enviar.php" class="error1"><strong>Regresar a la pagina anteriror</strong></a></p>
    </blockquote>
    <p><strong><a href="<?php echo $logoutAction ?>" class="registro1">Desconectar</a></strong></p>
  </div>
</form>
</body>
</html>