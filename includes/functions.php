<?php
// Constantes
define('ROOT', dirname(dirname(__FILE__)));
define('APP_TITLE', 'Universidad Cenfotec - Gestor Ingeligente de Citas');

$db_hostname = 'localhost';
$db_database = 'gic';
$db_username = 'root';
$db_password = '';

// $db_server = db_init();

function db_init() {
	global 	$db_hostname,
			$db_database,
			$db_username,
			$db_password;

	$db_server = mysql_connect($db_hostname, $db_username, $db_password);

	if (!$db_server) {
		die('No se pudo establecer conexión con mySql: ' . mysql_error());
	}

	$db_selected = mysql_select_db($db_database, $db_server);
	if (!$db_selected) {
		die('No se pudo establecer conexión con la base de datos: ' . mysql_error());
	}		

	return $db_server;
}

// Realiza un query a la base de datos.
function do_query($query) {
	global $db_server;

	$result = mysql_query($query, $db_server);

	if (!$result) {
		die('Falló la sentencia ' . mysql_error());
	}

	return $result;
}

?>