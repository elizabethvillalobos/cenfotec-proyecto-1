<?php
	require_once('../includes/functions.php');
	require_once('../includes/functions-seguridad.php');

	// Retornar un json.
	header('Content-Type:application/json');

	// Procesar el request (url)
	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'comprobarCorreo':
				comprobarCorreoExiste();
				break;
            case 'comprobarContrasena':
				comprobarPWExiste();
				break;
            case 'comprobarCodigo':
				comprobarCodigoActiv();
				break;
		}
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
	}

	function comprobarCorreoExiste() {   
		if (!empty($_GET['pid'])){
        	$correo = $_GET['pid'];
        	$result = comprobarCorreo($correo);

        	if ($result) {
        		deliver_response(200, 'OK', json_encode($result));	
        	} else {
        		deliver_response(200, 'No data', NULL);
        	}
    	} else {
    		// Invalid request.
			deliver_response(400, 'Bad request', NULL);
    	}	    
	}

    function comprobarPWExiste() {   
		if (!empty($_GET['pid']) &&
           !empty($_GET['pcontrasena'])){
        	$correo = $_GET['pid'];
            $contrasena = $_GET['pcontrasena'];
        	$result = comprobarContrasena($correo, $contrasena);

        	if ($result) {
        		deliver_response(200, 'OK', json_encode($result));	
        	} else {
        		deliver_response(200, 'No data', NULL);
        	}
    	} else {
    		// Invalid request.
			deliver_response(400, 'Bad request', NULL);
    	}	    
	}

    function comprobarCodigoActiv() {   
		if (!empty($_GET['pid']) &&
           !empty($_GET['pcodigo'])){
        	$correo = $_GET['pid'];
            $codigo = $_GET['pcodigo'];
        	$result = comprobarCodigo($correo, $codigo);

        	if ($result) {
        		deliver_response(200, 'OK', json_encode($result));	
        	} else {
        		deliver_response(200, 'No data', NULL);
        	}
    	} else {
    		// Invalid request.
			deliver_response(400, 'Bad request', NULL);
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