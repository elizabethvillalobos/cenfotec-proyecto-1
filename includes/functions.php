<?php
// Constantes
define('ROOT', dirname(dirname(__FILE__)));
define('APP_TITLE', 'Universidad Cenfotec - Gestor Ingeligente de Citas');

$db_hostname = 'localhost';
$db_database = 'gic';
$db_username = 'root';
$db_password = 'root';

$db_server = db_init();

function db_init() {
	global 	$db_hostname,
			$db_database,
			$db_username,
			$db_password;

	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);

	if (!$db_server) {
		die('No se pudo establecer conexión con mySql: ' . mysql_error());
	}

	$db_selected = mysqli_select_db($db_server, $db_database);
	if (!$db_selected) {
		die('No se pudo establecer conexión con la base de datos: ' . mysql_error());
	}		

	return $db_server;
}

// Realiza un query a la base de datos.
function do_query($query) {
	global $db_server;

	$result = mysqli_query($db_server, $query);

	if (!$result) {
		die('Falló la sentencia ' . mysql_error());
	}

	return $result;
}


// Retorna una fecha en el formato "Lunes 11 de Agosto de 2014"
function dateLongString($dayWeek, $day, $month, $year) {
	// Días
	switch($dayWeek) {
		case '1':
			$dayString = 'Domingo';
			break;
		case '2':
			$dayString = 'Lunes';
			break;
		case '3':
			$dayString = 'Martes';
			break;
		case '4':
			$dayString = 'Miércoles';
			break;
		case '5':
			$dayString = 'Jueves';
			break;
		case '6':
			$dayString = 'Viernes';
			break;
		case '7':
			$dayString = 'Sábado';
			break;
	}

	// Meses
	switch($month) {
		case '1':
			$monthString = 'Enero';
			break;
		case '2':
			$monthString = 'Febrero';
			break;
		case '3':
			$monthString = 'Marzo';
			break;
		case '4':
			$monthString = 'Abril';
			break;
		case '5':
			$monthString = 'Mayo';
			break;
		case '6':
			$monthString = 'Junio';
			break;
		case '7':
			$monthString = 'Julio';
			break;
		case '8':
			$monthString = 'Agosto';
			break;
		case '9':
			$monthString = 'Setiembre';
			break;
		case '10':
			$monthString = 'Octubre';
			break;
		case '11':
			$monthString = 'Noviembre';
			break;
		case '12':
			$monthString = 'Diciembre';
			break;
	}

	return $dayString.' '.$day.' de '.$monthString.' de '.$year;
}




	function getCursoParaModificar($pidcurso){

		$query = "SELECT `tcursos`.`id` as `cursoId`, `tcursos`.`nombre` as `cursoNombre`, 
		`tusuarios`.`nombre` as `usuarioNombre`, `tusuarios`.`apellido1` as `usuarioApellido1`, 
		`tusuarios`.`apellido2` as `usuarioApellido2`" . "FROM tcursos, tusuariosxcurso, 
		tusuarios WHERE `tcursos`.`id` = `tusuariosxcurso`.`idCurso` AND `tusuarios`.`id` = `tusuariosxcurso`.`idUsuario` 
		AND (`tusuarios`.`rol` = 4 OR `tusuarios`.`rol` = 3)AND `tcursos`.`id` = '$pidcurso'";

		

		$result = do_query($query);
    
   		$row = mysqli_fetch_assoc($result);
    
  		return $row;

	}

// Retorna una hora en el formato "12:00 p.m."
function timeLongString($timeToString) {
	return date('g:i a', strtotime($timeToString));
}


// Consultas genericas
function getCarreras() {
	$query = "SELECT * FROM tcarrera";
	return do_query($query);
}

function mostrarCarrerasOnSelect() {
    $carreras = getCarreras();
	while ($row = mysqli_fetch_assoc($carreras)) {
		echo '<option value='.$row['id'].' > '.utf8_encode($row['nombre']).'</option>';
	}
}

function getCursos() {
	$query = "SELECT * FROM tcursos WHERE activo=1";
	return do_query($query);
}

function mostrarCursosOnSelect() {
    $cursos = getCursos();
	while ($row = mysqli_fetch_assoc($cursos)) {
		echo '<option value='.utf8_encode($row['id']).' > '.utf8_encode($row['nombre']).'</option>';
	}
}







?>

