<?php

include_once('functions.php');

header('Content-Type:application/json');

// Usuarios
function getCursos() {
	$query = 'SELECT * FROM tcursos';

	return do_query($query);
}

function insertarCurso() {
	$nombre=$_GET['pnombre'];
	$codigo=$_GET['pcodigo'];
	$query = "SELECT * FROM tcursos WHERE id='$codigo';";
	echo "1";
	$cursos = do_query($query);
	$resultado="";
	echo "2";
	if (mysqli_num_rows($cursos) > 0) {
		$resultado="Ya existe";		
	} 
	else
	{
		$query = "INSERT INTO tcursos(id, nombre, activo) VALUES ('$codigo','$nombre', '1')";
		do_query($query);
		$resultado="Registrado con exito";
	}
	echo $resultado;
	header("HTTP/1.1 200 $resultado");
	$response['status'] = 200;
	$response['status-message'] = $resultado;
	$response['data'] = NULL;
	$arr = array('status' => 1, 'statusMessage' => '$resultado');
	echo json_encode($response);
}

if($_SERVER['REQUEST_METHOD']=="GET") {
	$function = $_GET['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    echo 'Function Not Exists!!';
	}
}

?>