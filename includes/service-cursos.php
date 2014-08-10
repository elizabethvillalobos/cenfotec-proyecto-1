<?php
	require_once('../includes/functions.php');

	// Retornar un json.
	header('Content-Type:application/json');

	if (!empty($_GET['pnombre']) && !empty($_GET['pcodigo'])) {
		$nombre = $_GET['pnombre'];
		$codigo = $_GET['pcodigo'];

		$query = "SELECT * FROM tcursos WHERE id='$codigo';";
		$cursos = do_query($query);

		if (mysqli_num_rows($cursos) > 0) {
			// $resultado="Ya existe";
			deliver_response(400, 'El curso ya existe', NULL);
		} else {
			$query = "INSERT INTO tcursos(id, nombre, activo) VALUES ('$codigo','$nombre', '1')";
			$resultado = do_query($query);
			// $resultado="Registrado con exito";
			deliver_response(200, 'OK', 'Registrado con exito');
		}
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
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