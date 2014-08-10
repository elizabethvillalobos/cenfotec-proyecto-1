<?php

include_once('functions.php');

// Usuarios
function getUsuarios() {
	$query = 'SELECT * FROM gic_usuarios';

	return do_query($query);
}

function insertarCurso() {
	$nombre=$_POST['pnombre'];
	$codigo=$_POST['pcodigo'];
	$query = "SELECT * FROM tcursos WHERE id='$codigo';";
	$cursos = do_query($query);
	$resultado="";
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
	$response['status'] = 200;
	$response['status-message'] = $resultado;
	$arr = array('status' => 1, 'statusMessage' => '$resultado');
	return json_encode($response);
}

if($_SERVER['REQUEST_METHOD']=="POST") {
	$function = $_POST['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    echo 'Function Not Exists!!';
	}
}

?>