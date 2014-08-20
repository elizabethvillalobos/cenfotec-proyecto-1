<?php session_start(); 
    error_reporting(0);
	require_once('../includes/functions.php');
	require_once('../includes/functions-usuarios.php');

	// Retornar un json.
	header('Content-Type:application/json');

	// Procesar el request (url)
	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'consultarProfesores':
				consultarProfesores();
				break;
			case 'consultarInvitados':
				consultarInvitados();
				break;
			case 'consultarDestinatarios':
				consultarDestinatarios();
				break;
		}
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
	}

	function consultarProfesores() {
		$profesores = getProfesores();

		if (empty($profesores)) {
			deliver_response(200, 'No data', NULL);
		} else {
			// Retornar resultados de la consulta.
			deliver_response(200, 'OK', json_encode($profesores));
		}
	}
	
	function consultarInvitados() {
		$invitados = getInvitados();
		if (empty($invitados)) {
			deliver_response(200, 'No data', NULL);
		} else {
			// Retornar resultados de la consulta.
			deliver_response(200, 'OK', json_encode($invitados));
		}
	}
	
	function consultarDestinatarios() {		
		$idRemitente= $_SESSION['usuarioActivoId'];
		$destinatarios = getDestinatarios($idRemitente);
		if (empty($destinatarios)) {
			deliver_response(200, 'No data', NULL);
		} else {
			// Retornar resultados de la consulta.
			deliver_response(200, 'OK', json_encode($destinatarios));
		}
	}
	

	// Esta función retorna la respuesta que se enviará
	// a la solicitud de ajax.
	// Parámetros:
	//   $status: código del estado (referencia: https://dev.twitter.com/docs/error-codes-responses)
	// 		200: OK
	// 		400: Bad Request
	//   $statusMessage: mensaje a mostrar para el valor de $status
	//   $data: el objeto a retornar.
	// Ejemplo:
	// deliver_response(200, 'OK', json_encode($ARRAY_CON_DATOS));
	function deliver_response($status, $statusMessage, $data) {
		header("HTTP/1.1 $status $statusMessage");
		$response['status'] = $status;
		$response['status-message'] = $statusMessage;
		$response['data'] = $data;

		echo json_encode($response);
	} 
?>