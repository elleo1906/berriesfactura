
<!doctype html>
<html>
<head>

 <script>
function sumar() {
var n1 = parseInt(document.form1.num1.value);
var n2 = parseInt(document.form1.num2.value);

document.form1.resultado.value=n1+n2;
}
</script>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Numero1:</td>
      <td><input type="text" name="num1" id="num1" size="20" onChange="sumar()"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Numero2:</td>
      <td><input type="text" name="num2" id="num2" size="20" onChange="sumar()"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Resultado:</td>
      <td><input type="text" name="resultado" id="resultado"disabled value="0"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
    <input type="hidden" name="MM_insert" value="form1">
  </p>
  
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
