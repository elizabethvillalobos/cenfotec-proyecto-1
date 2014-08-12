<?php
	require_once('../includes/functions.php');

	// Retornar un json.
	header('Content-Type:application/json');

	// Procesar el request (url)
	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'registrarCurso':
				registrarCurso();
				break;
			case 'consultarCurso':
				consultarCurso();
				break;
		}
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
	}
	
	function registrarCurso()
	{
		if (!empty($_GET['pnombre']) && !empty($_GET['pcodigo'])) {
			$nombre = $_GET['pnombre'];
			$codigo = $_GET['pcodigo'];
			$idProfesor1 = $_GET['pidProfesor1'];
			$idProfesor2 = $_GET['pidProfesor2'];
			$idProfesor3 = $_GET['pidProfesor3'];
			$idCarrera = $_GET['pidCarrera'];

			$query = "SELECT * FROM tcursos WHERE id='$codigo';";
			$cursos = do_query($query);

			if (mysqli_num_rows($cursos) > 0) {
				// $resultado="Ya existe";
				deliver_response(400, 'El curso ya existe', NULL);
			} else {
				$query = "INSERT INTO tcursos(id, nombre, activo) VALUES ('$codigo','$nombre', '1')";
				$resultado = do_query($query);
				
				$query = "INSERT INTO tusuariosxcurso(idcurso, idusuario) VALUES ('$codigo','$idProfesor1')";
				$resultado = do_query($query);
				if($idProfesor2!=""){
					$query = "INSERT INTO tusuariosxcurso(idcurso, idusuario) VALUES ('$codigo','$idProfesor2')";
					$resultado = do_query($query);
				}
				if($idProfesor3!=""){
					$query = "INSERT INTO tusuariosxcurso(idcurso, idusuario) VALUES ('$codigo','$idProfesor3')";
					$resultado = do_query($query);
				}
				$query = "INSERT INTO tcursosxcarrera(idcarrera, idcurso) VALUES ('$idCarrera','$codigo')";
				$resultado = do_query($query);
				
				deliver_response(200, 'OK', 'Registrado con exito');
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