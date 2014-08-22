<?php
	session_start();
	error_reporting(0);
	require_once('functions.php');
	//require_once('functions-micuenta.php');
	
	header('Content-Type:application/json');

	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'updateContrasena':
				updateContrasena();
				break;
			case 'modificarPerfil':
				modificarPerfil();
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

	function modificarPerfil() {
		if (isset($_GET['idPerfil']) &&
			isset($_GET['nombre']) &&
			isset($_GET['apellido1']) &&
			isset($_GET['apellido2']) &&
			isset($_GET['telefono']) &&
			isset($_GET['skypeid']) &&
			isset($_GET['horario']) OR
			isset($_GET['avatar'])) {

			$idPerfil = $_GET['idPerfil'];
			$nombre = $_GET['nombre'];
			$apellido1 = $_GET['apellido1'];
			$apellido2 = $_GET['apellido2'];
			$telefono = $_GET['telefono'];
			$skypeid = $_GET['skypeid'];
			$horario = $_GET['horario'];
			$avatar = $_GET['avatar'];

			$result = modifiyProfile($idPerfil, $nombre, $apellido1, $apellido2, $telefono, $skypeid, $horario, $avatar);

			if (empty($result)) {
				deliver_response(200, 'No data', NULL);
			} else {
				deliver_response(200, 'OK', 'Perfil modificado con éxito.');
			}
		} else {
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