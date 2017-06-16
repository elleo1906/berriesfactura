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
 
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_usuarios, $usuarios);
  
  $LoginRS__query=sprintf("SELECT username, password FROM usuarios WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
	//$result=$mysqli->query($LoginRS__query);
	//$rows = $result->num_rows;
	//if($rows > 0){
		//$_SESSION[ ]
		//}
   
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
       }
}
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Formulario</title>
    
    <style type= "text/css">
	body{
	background-position: center;
	background-image: url(imagenes/moras-en-zarzas-boyanas.jpg);
	}
	
	form{
	background:;
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
    <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    #apDiv1 {
	position: absolute;
	width: 200px;
	height: 58px;
	z-index: 1;
	left: 586px;
	top: 616px;
}
    #apDiv2 {
	position: absolute;
	width: 223px;
	height: 226px;
	z-index: 1;
	left: 75px;
	top: 212px;
}
    #apDiv3 {
	position: absolute;
	width: 215px;
	height: 262px;
	z-index: 2;
	left: 981px;
	top: 162px;
}
    </style>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
 

    </div>
<body>	


  
<div id="envoltura">
<h1> <p align="center" class="encabezado"> Facturación Berries Export Company</p></h1> 
<form id="form-login" action="<?php echo $loginFormAction; ?>" method="POST" >
      <h2><p align="center">Inicio de Seción</p></h2>
  <div align="center">
    <p><img src="imagenes/Registro1.png" width="229" height="210"></p>
        <!--=============================================================================================-->
        <!--La sisguientes 2 líneas son para agregar campos al formulario con sus respectivos labels-->
        <!--Puedes usar tantas como necesites-->
        <!--=============================================================================================-->
  </div>
     <h3> <p align="center" >
        <label for="nombre" class="usuario">Usuario  </label>
       <span id="sprytextfield1">
        <input name="usuario" type="text" id="nombre" class="nombre" placeholder="Ingrese con su ID" autofocus/ >
        <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></p>
  </h3>
      <div align="center">
        <p></p>
  </div>
     <h3> <p align="center" id="bot">
        <label for="pass2">Password</label>
        <span class="passwordMinCharsState" id="sprypassword2">
        <input name="password" type="password" id="password" class="password" placeholder="Ingrese contraseña"/ >
        <span class="passwordRequiredMsg">Se necesita un valor.</span></span></p>
     </h3>
      <div id="contenedor">
        <div align="center">
        <h3>  <input name="submit" type="submit" id="boton" value="Ingresar" class="boton" /></h3>
        <p>&nbsp;</p>
        <p><a href="Index.php" class="error">Ir a la pagina de inicio</a></p>
        </div>
        <div id="cuerpo" >
          <div align="center">
            <p><a href="Index.php" class="error"></a><a href="https://www.facebook.com/Berries-Export-Company-928721017231779/"><img src="imagenes/face.png" width="180" height="152"></a></p>
          </div>
        </div>
      </div>
    </form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword2 = new Spry.Widget.ValidationPassword("sprypassword2");
</script>
</body>
<p>&nbsp;</p>
    </html>