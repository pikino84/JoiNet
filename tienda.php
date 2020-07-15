<?php
$conexion = mysql_connect("localhost","adminjoinet","Wis)jcq9CCx+.6lsEM") or die("No se pudo conectar a la base de datos");
mysql_select_db("db_mayoreo");
$conexiona = mysql_connect("localhost","adminjoinet","Wis)jcq9CCx+.6lsEM") or die("No se pudo conectar a la base de datos");
mysql_select_db("db_mayoreo");
?>
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connection = "localhost";
$database_connection = "db_mayoreo";
$username_connection = "adminjoinet";
$password_connection = "Wis)jcq9CCx+.6lsEM";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_tienda1 = "localhost";
$database_tienda1 = "db_mayoreo";
$username_tienda1 = "adminjoinet";
$password_tienda1 = "Wis)jcq9CCx+.6lsEM";
$tienda1 = mysql_pconnect($hostname_tienda1, $username_tienda1, $password_tienda1) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php
# FileName="faqtienda_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_faqtienda = "localhost";
$database_faqtienda = "db_mayoreo";
$username_faqtienda = "adminjoinet";
$password_faqtienda = "Wis)jcq9CCx+.6lsEM";
$faqtienda = mysql_pconnect($hostname_faqtienda, $username_faqtienda, $password_faqtienda) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php
# FileName="gal_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_gal = "localhost";
$database_gal = "db_mayoreo";
$username_gal = "adminjoinet";
$password_gal = "Wis)jcq9CCx+.6lsEM";
$gal = mysql_pconnect($hostname_gal, $username_gal, $password_gal) or trigger_error(mysql_error(),E_USER_ERROR); 
?>