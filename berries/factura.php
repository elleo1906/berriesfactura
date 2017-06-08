<!doctype html>
<html>
<head>

<style type= "text/css">
	body{
	background-position:center	
	}
	
	form{
	background:#808040;
	width: 690px;
	height: 520px;
	border: 1px solid #003;
	border-radius:11px;
	-moz- border-radius:4px;
	webkit- border-radius:4px;
	margin:50px auto;
	}
	
	.volver {
	color: #FFF;
}
</style>
<meta charset="utf-8">
<title>Documento sin título</title>



</head>

<body background="f1.jpg">
<form action="factura" method="get">
  <div align="center"> <h1>Factura de empresa berries  </h1></div>
  <table width="691" height="404" border="1">
    <tr>
      <td height="99" colspan="5"><img src="p1.jpg" width="164" height="168" align="middle"> Empresa Berries Export Company ubicada en la carretera Tecario-Tacambaro</td>
    </tr>
    <tr>
      <td width="140"><div align="center">Nombre proveedor</div></td>
      <td colspan="2"><div align="center">
        <input name="nproveedor" type="text" autofocus class="nombre" id="nombre" placeholder="Ingrese con su Nombre y Apellidos" size="39"/ >
      </div></td>
      <td width="120"><div align="center">Fecha de la factura</div></td>
      <td width="175"><div align="center">
        <input name="usuario" type="text" autofocus class="nombre" id="ffactura" placeholder="Dia/Mes/año" size="17"/ >
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Clave proveedor</div></td>
      <td colspan="2"><div align="center">
        <input name="cproveedor" type="text" autofocus class="nombre" id="nombre2" placeholder="Ingrese clave proveedor" size="39"/ >
      </div></td>
      <td><div align="center">No.Factura</div></td>
      <td><div align="center">
        <input name="ffactura" type="text" autofocus class="nombre" id="ffactura2" placeholder="" size="17"/ >
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Tamaño de cluncher</div></td>
      <td width="102"><div align="center">Cantidad</div></td>
      <td width="120"><div align="center">Producto rechazado</div></td>
      <td><div align="center">Precio unitario</div></td>
      <td><div align="center">Precio total</div></td>
    </tr>
    <tr>
      <td><input type="radio" name="radio" id="radio" value="radio">
        Grande</td>
      <td><div align="center">
        <input name="nombre" type="text" autofocus class="nombre" id="nombre3" placeholder="" size="17"/ >
      </div></td>
      <td><input name="nombre4" type="text" autofocus class="nombre" id="nombre6" placeholder="" size="20"/ ></td>
      <td><input name="nombre7" type="text" autofocus class="nombre" id="nombre9" placeholder="" size="20"/ ></td>
      <td><div align="center">
        <input name="nombre10" type="text" autofocus class="nombre" id="nombre12" placeholder="" size="17"/ >
      </div></td>
    </tr>
    <tr>
      <td><input type="radio" name="radio2" id="radio2" value="radio2">
      Mediano</td>
      <td><div align="center">
        <input name="nombre2" type="text" autofocus class="nombre" id="nombre4" placeholder="" size="17"/ >
      </div></td>
      <td><input name="nombre5" type="text" autofocus class="nombre" id="nombre7" placeholder="" size="20"/ ></td>
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
      <td><input name="nombre6" type="text" autofocus class="nombre" id="nombre8" placeholder="" size="20"/ ></td>
      <td><input name="nombre9" type="text" autofocus class="nombre" id="nombre11" placeholder="" size="20"/ ></td>
      <td><div align="center">
        <input name="nombre12" type="text" autofocus class="nombre" id="nombre14" placeholder="" size="17"/ >
      </div></td>
    </tr>
    <tr>
      <td height="26" colspan="3">&nbsp;</td>
      <td><div align="center">Total</div></td>
      <td><div align="center">
        <input name="nombre13" type="text" autofocus class="nombre" id="nombre15" placeholder="" size="17"/ >
      </div></td>
    </tr>
  </table>
</form>
<div align="center"><a href="enviar.php" class="volver"><strong>Volver a la pagina anterior</strong></a>
  		<input type="submit" name="button" id="button" value="Generar Factura">
</div>
</body>
</html>