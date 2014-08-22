<?php
	error_reporting(0);
	require_once('functions.php');

	header('Content-Type:application/json');

	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'modificarDiasDeExpiracion':
				modificarDiasDeExpiracion();
				break;
			case 'modificarCaracteres':
				modificarCaracteres();
				break;
			case 'modificarCorreoClave':
				modificarCorreoClave();
				break;
		}
	} else {
		deliver_response(400, 'Bad request', NULL);
	}

	function modificarDiasDeExpiracion(){
		if (!empty($_GET['pdias'])){
			$dias = utf8_decode($_GET['pdias']);
			$query = "UPDATE configuracion SET valor='$dias' WHERE parametro='diasExpiracion'";
			$result = do_query($query);
			deliver_response(200, 'OK', 'Registrado con exito');
		}else{
			deliver_response(400, 'Bad request', NULL);
		}
	}

	function modificarCaracteres(){
		if (!empty($_GET['pcaracteres'])){
			$caracteres = utf8_decode($_GET['pcaracteres']);
			$query = "UPDATE configuracion SET valor='$caracteres' WHERE parametro='caracteresMaximos'";
			$result = do_query($query);
			deliver_response(200, 'OK', 'Registrado con exito');
		}else{
			deliver_response(400, 'Bad request', NULL);
		}
	}

	function modificarCorreoClave(){
		if (!empty($_GET['pcorreo']) && !empty($_GET['pclave'])){
			$correo = utf8_decode($_GET['pcorreo']);
			$clave = utf8_decode($_GET['pclave']);
			$query = "UPDATE configuracion SET valor='$correo' WHERE parametro='correoNotificacion'";
			$result = do_query($query);
			$query = "UPDATE configuracion SET valor='$clave' WHERE parametro='contrasena'";
			$result = do_query($query);
			deliver_response(200, 'OK', 'Registrado con exito');
		}else{
			deliver_response(400, 'Bad request', NULL);
		}
	}

	function deliver_response($status, $statusMessage, $data) {
		header("HTTP/1.1 $status $statusMessage");
		$response['status'] = $status;
		$response['status-message'] = $statusMessage;
		$response['data'] = $data;
		echo json_encode($response);
	} 



?>