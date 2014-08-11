<?php
	require_once('../includes/functions.php');

	// Retornar un json.
	header('Content-Type:application/json');

	$query = "SELECT * FROM tusuarios WHERE rol='4';";
	$profesores = do_query($query);
	$resultados = array();
	while($r = mysqli_fetch_assoc($profesores)) {
		$resultados[] = $r;
	}
	if (mysqli_num_rows($profesores) > 0) {
		deliver_response(400, 'Profesores retornados', json_encode($resultados));
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