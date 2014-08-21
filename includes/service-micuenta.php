<?php
	session_start();
	error_reporting(0);
	require_once('../includes/functions.php');
	require_once('../includes/functions-micuenta.php');
	
	header('Content-Type:application/json');

	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'updateContrasena':
				updateContrasena();
				break;
		}
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
	}

	function updateContrasena() {
		if (!empty($_GET['contrasena']) && !empty($_GET['usuarioActivoId'])) {
			$contrasena = utf8_decode($_GET['contrasena']);
			$usuarioActivoId = utf8_decode($_GET['usuarioActivoId']);
			
			$query = "UPDATE tusuarios SET contrasena ='$contrasena' WHERE id ='$usuarioActivoId'";
			$result = do_query($query);	

			if (empty($result)) {
				deliver_response(200, 'No data', NULL);
			} else {
				// Retornar resultados de la consulta.
				deliver_response(200, 'OK', 'Registrado con exito');
			}
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