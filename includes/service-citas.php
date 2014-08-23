<?php session_start(); 
    error_reporting(0);
	require_once('../includes/functions.php');
	require_once('../includes/functions-citas.php');

	// Retornar un json.
	header('Content-Type:application/json');

	// Procesar el request (url)
	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'consultarCitas':
				consultarCitas();
				break;
			case 'consultarCitaPorId':
				consultarCitaPorId();
				break;
			case 'insertarCita':
				insertarCita();
				break;
			case 'cancelarCita':
				cancelarCita();
				break;
			case 'consultarUsuarioPorId':
				consultarUsuarioPorId();
				break;
			case 'crearSolicitud':
				crearSolicitud();
				break;
			case 'expirarCitas':
				expirarCitas();
				break;
			case 'finalizarCita':
				finalizarCita();
				break;
			case 'actualizarHoraSolicitud':
				actualizarHoraSolicitud();
				break;
			case 'aceptarPropuestaSolicitud':
				aceptarPropuestaSolicitud();
				break;
			case 'rechazarSolicitud':
				rechazarSolicitud();
				break;
		}
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
	}

	function consultarCitas() {
		if (!empty($_GET['usuario']) && !empty($_GET['rol']) && !empty($_GET['fechaInicio']) && !empty($_GET['fechaFin'])) {
			$usuario = $_GET['usuario'];
			$rolUsuario = $_GET['rol'];
			$fechaInicio = $_GET['fechaInicio'];
			$fechaFin = $_GET['fechaFin'];
			
			// Ejecutar consulta que retorna citas por usuario
			// para una fecha específica.
			$citasUsuario = getCitasUsuario($usuario, $rolUsuario, $fechaInicio, $fechaFin);

			if (empty($citasUsuario)) {
				deliver_response(200, 'No data', NULL);
			} else {
				// Retornar resultados de la consulta.
				deliver_response(200, 'OK', json_encode($citasUsuario));
			}
		}
	}

	function consultarCitaPorId() {
		if (!empty($_GET['citaId'])) {
			$citaId = $_GET['citaId'];
			
			$cita = getCitaPorId($citaId);

			if (empty($cita)) {
				deliver_response(200, 'No data', NULL);
			} else {
				// Retornar resultados de la consulta.
				deliver_response(200, 'OK', json_encode($cita));
			}
		}
	}


	function insertarCita() {
		insertCita($_GET['idSolicitante'], $_GET['idSolicitado'], $_GET['fechaInicio'], $_GET['fechaFin'], $_GET['asunto'], $_GET['modalidad'], $_GET['tipo'], $_GET['observaciones'], $_GET['curso']);	
		deliver_response(200, 'OK', NULL);
	}


	function cancelarCita() {
		if (!empty($_GET['citaId']) && !empty($_GET['motivo']) && !empty($_GET['quienCancela'])) {
			$citaId = $_GET['citaId'];
			$motivo = $_GET['motivo'];
			$quienCancela = $_GET['quienCancela'];
			$result = cancelCita($citaId, $motivo, $quienCancela);

			if ($result) {
				deliver_response(200, 'OK', NULL);
			} else {
				deliver_response(401, 'Fallo en la cancelación de la cita', NULL);
			}
		} else {
			deliver_response(400, 'Bad request', NULL);
		}
	}

	function expirarCitas() {
		$expiracionSolicitud = intval(getExpiracionSolicitud());
		$result = expireSolicitudesCitas($expiracionSolicitud);

		deliver_response(200, 'OK', json_encode($result));
	}

	function finalizarCita() {
		if (!empty($_GET['citaId'])) {
			$citaId = $_GET['citaId'];
			$result = finishCita($citaId);

			if ($result) {
				deliver_response(200, 'OK', NULL);
			} else {
				deliver_response(401, 'Fallo en la finalización de la cita', NULL);
			}
		} else {
			deliver_response(400, 'Bad request', NULL);
		}
	}

	function consultarUsuarioPorId() {
		if (!empty($_GET['usuarioId'])) {
			$usuarioId = $_GET['usuarioId'];
			
			$usuario = getUsuarioPorId($usuarioId);

			if (empty($usuario)) {
				deliver_response(200, 'No data', NULL);
			} else {
				// Retornar resultados de la consulta.
				deliver_response(200, 'OK', json_encode($usuario));
			}
		}
	}

	function crearSolicitud() {
		$idSolcitante = $_SESSION['usuarioActivoId'];
		$idSolicitado = $_GET['idSolicitado'];
		$asunto = $_GET['asunto'];
		$modalidad = $_GET['modalidad'];
		$tipo = $_GET['tipo'];
		$observaciones = $_GET['observaciones'];
		$idCurso = $_GET['idCurso'];

		$query = "SELECT * FROM `tcitas` WHERE idSolicitado='$idSolicitado' AND idSolicitante='$idSolcitante' AND esCita=0;";
		$solicitudes = do_query($query);
		if (mysqli_num_rows($solicitudes) > 0) {
			deliver_response(400, 'Ya hay una solicitud pendiente con este usuario', NULL);
		} else {
			$query = "INSERT INTO tcitas(asunto, curso, esCita, estado, idSolicitado, idSolicitante, modalidad, observaciones, tipo) VALUES ('$asunto','$idCurso', '0', '1', '$idSolicitado', '$idSolcitante', '$modalidad', '$observaciones', '$tipo')";
			
			$resultado = do_query($query);			
			
			deliver_response(200, 'OK', 'Solicitud realizada exitosamente');
		}
	}
	
	function actualizarHoraSolicitud() {		
		$idCita = $_GET['idCita'];
		$fechaInicio = $_GET['fechaInicio'];
		$fechaFin = $_GET['fechaFin'];
		$query = "UPDATE `tcitas` SET `fechaInicio` = '$fechaInicio', `fechaFin` = '$fechaFin' WHERE `tcitas`.`id` = '$idCita';";
		$resultado = do_query($query);			
		deliver_response(200, 'OK', 'Solicitud actualizada exitosamente');
	}
	
	function aceptarPropuestaSolicitud() {
		$idCita = $_GET['idCita'];
		$query = "UPDATE `tcitas` SET `estado` = '2',`esCita` = '1' WHERE `tcitas`.`id` = '$idCita';";
			
		$resultado = do_query($query);			
		deliver_response(200, 'OK', 'Solicitud aceptada exitosamente');
	}
	
	function rechazarSolicitud() {
		$idCita = $_GET['idCita'];
		$query = "UPDATE `tcitas` SET `estado` = '3' WHERE `tcitas`.`id` = '$idCita';";
			
		$resultado = do_query($query);			
		deliver_response(200, 'OK', 'Solicitud rechazada exitosamente');
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