<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />    

<title>Formulario</title>
</head>
<body>
<h3>Ejemplo de formulario para</h3>
<h1>introducir datos Factura</h1>
<form  action="0012b.php" method="POST" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Nombre empresa:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="nombreempresa"> <br>
        </div>
                    <label for="usuario" class="col-sm-3 control-label">Cif empresa:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="cifempresa"> <br>
        </div>
                    <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Direccion empresa:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="direccionempresa"> <br>
        </div>
        </div>
                        <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Nombre cliente:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="nombrecliente"> <br>
        </div>
                    <label for="usuario" class="col-sm-3 control-label">Codigo cliente:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="codigocliente"> <br>
        </div>
        </div>
                        <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Cif cliente:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="cifcliente"> <br>
        </div>
        </div>
                        <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Direccion cliente:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="direccioncliente"> <br>
        </div>
                    <label for="usuario" class="col-sm-3 control-label">Codigo Postal:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="codigopostal"> <br>
        </div>
        </div>
                        <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Fecha:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="fecha"> <br>
        </div>
        </div>
                        <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Localidad:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="localidad"> <br>
        </div>
                    <label for="usuario" class="col-sm-3 control-label">Provincia:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="provincia"> <br>
        </div>
        </div>
                        <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Num Factura:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="numerofactura"> <br>
        </div>
        </div>
                        <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Articulo:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="detalle"> <br>
        </div>
        </div>
                        <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Importe base:</label>
      <div class="col-sm-2">
            <input class="form-control"type="text" name="base"> <br>
        </div>
        <input value="enviar" class="btn btn-default"type="submit">
        </div>
</form>
</body>
</html>