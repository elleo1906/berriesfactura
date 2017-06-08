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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "enviar.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_usuarios, $usuarios);
  
  $LoginRS__query=sprintf("SELECT username, password FROM usuarios WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $usuarios) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Formulario</title>
    
    <style type= "text/css">
	body{
	background-position:center	
	}
	
	form{
	background:#808040;
	width: 500px;
	height: 450px;
	border: 1px solid #003;
	border-radius:11px;
	-moz- border-radius:4px;
	webkit- border-radius:4px;
	margin:80px auto;
	}
	
	</style>
    <meta charset="utf-8">
    <link type="text/css" href="./../css/style.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="boton.css">
    
</head>
 

    </div>
<body background="f1.jpg">
  
    <div id="envoltura">
    <h1> <p align="center" class="encabezado"> Facturación Berries Export Company</p></h1> 
<form id="form-login" action="<?php echo $loginFormAction; ?>" method="POST" >
      <h2><p align="center">Inicio de Seción</p></h2>
  <div align="center">
        <p><img src="p1.jpg" Berries.jpg" width="180" height="188" alt="logo" longdesc="file:///C|/AppServ/www/proyectoFinal/logo Berries.jpg"></p>
        <!--=============================================================================================-->
        <!--La sisguientes 2 líneas son para agregar campos al formulario con sus respectivos labels-->
        <!--Puedes usar tantas como necesites-->
        <!--=============================================================================================-->
  </div>
     <h3> <p align="center" >
        <label for="nombre" class="usuario">Usuario  </label>
        <input name="usuario" type="text" id="nombre" class="nombre" placeholder="Ingrese con su ID" autofocus/ >
     </p>
  </h3>
      <div align="center">
        <p></p>
  </div>
     <h3> <p align="center" id="bot">
        <label for="pass2">Password</label>
        <input name="password" type="password" id="password" class="password" placeholder="Ingrese contraseña"/ >
      </p></h3>
      <div id="contenedor">
        <div align="center">
        <h3>  <input name="submit" type="submit" id="boton" value="Ingresar" class="boton" /></h3>
        </div>
        <div id="cuerpo" >
          <div align="center"></div>
        </div>
      </div>
    </form>
</body>
<p>&nbsp;</p>
    </html>