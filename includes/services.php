<?php
	require_once('../includes/functions.php');
	require_once('../includes/functions-citas.php');

	// Retornar un json.
	header('Content-Type:application/json');

	// Procesar el request (url)
	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'consultar':
				consultarCitas();
				break;
			case 'insertar':
				insertarCita();
				break;
			case 'modificar':
				break;
			case 'eliminar':
				break;
		}
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
	}

	function consultarCitas() {
		if (!empty($_GET['solicitante'])) {
			$solicitante = $_GET['solicitante'];
			//$fecha = $_GET['fecha'];
			
			// Ejecutar consulta que retorna citas por usuario
			// para una fecha específica.
			$citasUsuario = getCitasUsuario($solicitante);

			if (empty($citasUsuario)) {
				deliver_response(200, 'No data', NULL);
			} else {
				// Retornar resultados de la consulta.
				deliver_response(200, 'OK', json_encode($citasUsuario));
			}
		}
	}

	function insertarCita() {
		// if (!empty($_GET['idSolicitante']) && !empty($_GET['idSolicitado']) && !empty($_GET['fechaInicio']) && !empty($_GET['fechaFin']) && !empty($_GET['asunto'])  && !empty($_GET['modalidad']) && !empty($_GET['tipo'])  && !empty($_GET['observaciones']) && !empty($_GET['curso'])) {
			insertCita($_GET['idSolicitante'], $_GET['idSolicitado'], $_GET['fechaInicio'], $_GET['fechaFin'], $_GET['asunto'], $_GET['modalidad'], $_GET['tipo'], $_GET['observaciones'], $_GET['curso']);	
			deliver_response(200, 'OK', NULL);
		// } else {
			// deliver_response(400, 'Invalid data', NULL);
		// }
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