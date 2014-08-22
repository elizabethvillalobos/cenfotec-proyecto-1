<?php
	error_reporting(0);
	require_once('../includes/functions.php');

	header('Content-Type:application/json');

	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'crearCarrera':
				crearCarrera();
				break;
			case 'modificarCarrera':
				modificarCarrera();
				break;
			/*case 'consultarCursosActivos':
				consultarCursosActivos();
				break;
			case 'modificarCurso':
				modificarCurso();
			break;*/
		}
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
	}

	
	function crearCarrera(){
		if (!empty($_GET['pCodigo']) && !empty($_GET['pNombre']) && !empty($_GET['pDirector'])){
			$codigo = utf8_decode($_GET['pCodigo']);
			$nombre = utf8_decode($_GET['pNombre']);
			$director = utf8_decode($_GET['pDirector']);

			$query = "SELECT * FROM tcarrera WHERE id='$codigo' OR nombre='$nombre';";
			$result = do_query($query);	
			
			if(mysqli_num_rows($result) > 0){
				deliver_response(400, 'La carrera ya se encuentra registrada', NULL);
			}else{
				$query = "INSERT INTO tcarrera(id, nombre, idDirector, activo) VALUES ('$codigo', '$nombre', '$director', '1')";
				$resultado = do_query($query);
				deliver_response(200, 'OK', 'Registrado con exito');				
			}			
		}else{
			deliver_response(400, 'Bad request', NULL);
		}
	}

	function modificarCarrera(){
		if (!empty($_GET['pCodigo']) && !empty($_GET['pNombre']) && !empty($_GET['pDirector'])){
			$codigo = utf8_decode($_GET['pCodigo']);
			$nombre = utf8_decode($_GET['pNombre']);	
			$director = utf8_decode($_GET['pDirector']);

			$query = "UPDATE tcarrera SET nombre='$nombre', idDirector='$director' WHERE id='$codigo'";
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