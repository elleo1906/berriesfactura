<!doctype html>
<html>
<head>

<style type= "text/css">
	body{
	background-position: center;
	background-image: url(imagenes/fond3.jpg);
	}
	
	form{
	background:url(imagenes/descarga.jpg);
	width: 750px;
	height: 565px;
	border: 1px solid #003;
	border-radius:11px;
	-moz- border-radius:4px;
	webkit- border-radius:4px;
	margin:50px auto;
	}
	
	.volver {
	color: #FFF;
}
#apDiv1 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 1;
}
#apDiv8 {
	position: absolute;
	width: 133px;
	height: 115px;
	z-index: 8;
	left: 122px;
	top: 283px;
}
#apDiv9 {
	position: absolute;
	width: 134px;
	height: 102px;
	z-index: 9;
	left: 1119px;
	top: 280px;
}
#apDiv {	position: absolute;
	width: 133px;
	height: 115px;
	z-index: 8;
	left: 122px;
	top: 283px;
}
#apDiv2 {	position: absolute;
	width: 133px;
	height: 115px;
	z-index: 8;
	left: 122px;
	top: 283px;
}
</style>
<meta charset="utf-8">
<title>Documento sin título</title>



</head>

<body>

  <div align="center">
  <h1>Factura de empresa berries  </h1></div>
  <table width="650" height="404" border="1">
    <tr>
      <td height="99" colspan="4"><img src="p1.jpg" width="170" height="168" align="middle"> Empresa Berries Export Company ubicada en la carretera Tecario-Tacambaro</td>
    </tr>
    <form id="form1" name="form1" method="post" action="Connections/inset_fact.php">
    <tr>
      <td width="140"><div align="center">Nombre proveedor</div></td>
      <td><div align="center">
        <input name="nproveedor" type="text" autofocus class="nombre" id="nombre" placeholder="Ingrese con su Nombre y Apellidos" size="39"/ >
      </div></td>
      <td width="120"><div align="center">Fecha de la factura</div></td>
      <td width="175"><div align="center">
        <input name="usuario" type="number" autofocus class="nombre" id="ffactura" placeholder="Dia/Mes/año" size="17"/ >
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Clave proveedor</div></td>
      <td><div align="center">
        <input name="cproveedor" type="number" autofocus class="nombre" id="nombre2" placeholder="Ingrese clave proveedor" size="39"/ >
      </div></td>
      <td><div align="center">No.Factura</div></td>
      <td><div align="center">
        <input name="ffactura" type="number" autofocus class="nombre" id="ffactura2" placeholder="" size="17"/ >
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Tamaño de cluncher</div></td>
      <td width="102"><div align="center">Cantidad</div></td>
      <td><div align="center">Precio unitario</div></td>
      <td><div align="center">Precio total</div></td>
    </tr>
    <tr>
      <td>
      
      
        Grande</td>
      <td><div align="center">
        <input name="camp1" type="number" autofocus class="nombre" id="nombre3" placeholder="" size="17"/ >
      </div></td>
      <td><input name="camp2" type="number" autofocus class="nombre" id="nombre9" placeholder="" size="20"/ ></td>
      <td><div align="center">
        <input name="result" type="text" autofocus class="nombre" id="nombre12" placeholder="" size="17"/ >
      </div></td>
    </tr>
    <tr>
      <td><input type="radio" name="radio2" id="radio2" value="radio2">
      Mediano</td>
      <td><div align="center">
        <input name="nombre2" type="text" autofocus class="nombre" id="nombre4" placeholder="" size="17"/ >
      </div></td>
      <td><input name="nombre8" type="text" autofocus class="nombre" id="nombre10" placeholder="" size="20"/ ></td>
      <td><div align="center">
        <input name="nombre11" type="text" autofocus class="nombre" id="nombre13" placeholder="" size="17"/ >
      </div></td>
    </tr>
    <tr>
      <td><input type="radio" name="radio3" id="radio3" value="radio3">
      Grande</td>
      <td><div align="center">
        <input name="nombre3" type="text" autofocus class="nombre" id="nombre5" placeholder="" size="17"/ >
      </div></td>
      <td><input name="nombre9" type="text" autofocus class="nombre" id="nombre11" placeholder="" size="20"/ ></td>
      <td><div align="center">
        <input name="nombre12" type="text" autofocus class="nombre" id="nombre14" placeholder="" size="17"/ >
      </div></td>
    </tr>
    <tr>
      <td height="26" colspan="2">&nbsp;</td>
      <td><div align="center">Total</div></td>
      <td><div align="center">
        <input name="nombre13" type="text" autofocus class="nombre" id="nombre15" placeholder="" size="17"/ >
      </div></td>
    </tr>
  </table>
  <div id="apDiv9">
    <div align="center"><a href="enviar.php" class="volver"><strong>Volver a la pagina anterior</strong></a>
      <p>&nbsp;</p>
      <p><a href="enviar.php"><img src="imagenes/zarza.png" alt="" width="134" height="62" align="middle"></a></p>
    </div>
  </div>

<div align="center"><a href="enviar.php" class="volver"><strong>Volver a la pagina anterior</strong></a>
  		<input type="submit" name="generar" id="button" value="Generar Factura">
        </form>
</div>
</body>
</html>