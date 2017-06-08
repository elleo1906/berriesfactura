<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_usuarios = "localhost";
$database_usuarios = "berries";
$username_usuarios = "root";
$password_usuarios = "root1905";
$usuarios = mysql_pconnect($hostname_usuarios, $username_usuarios, $password_usuarios) or trigger_error(mysql_error(),E_USER_ERROR); 
?>