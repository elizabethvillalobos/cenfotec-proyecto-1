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
	
	function consultarCurso() {
		if (!empty($_GET['pidCarrera'])) {
			$pidCarrera = $_GET['pidCarrera'];
			//$query = "SELECT tu.nombre AS nombreUsuario,tu.apellido1, tu.apellido2, cc.idcarrera,cc.idcurso, c.nombre, c.activo FROM `tcursosxcarrera` AS cc INNER JOIN`tcursos` AS c ON cc.idcurso = c.id INNER JOIN `tusuariosxcurso` AS uc ON cc.idcurso = uc.idcurso INNER JOIN `tusuarios` AS tu ON uc.idUsuario = tu.id WHERE idcarrera='$pidCarrera'";

			// $query = "SELECT tcursos.id as cursoId, tcursos.nombre as cursoNombre, tcursos.activo as cursoActivo, ".
			// 		 "tusuarios.nombre as usuarioNombre, tusuarios.apellido1 as usuarioApellido1, tusuarios.apellido2 as usuarioApellido2 ".
			// 		 "FROM tcursos ".
			// 		 "INNER JOIN tusuariosxcurso on tcursos.id = tusuariosxcurso.idCurso ".
			// 		 "INNER JOIN tusuarios on tusuarios.id = tusuariosxcurso.idUsuario ".
			// 		 "INNER JOIN tcursosxcarrera on tcursosxcarrera.idCurso = tusuariosxcurso.idCurso ".
			// 		 "INNER JOIN tcarrera on tcarrera.id = tcursosxcarrera.idCarrera ".
			// 		 "WHERE (tcarrera.id = 'BISOFT') AND (tusuarios.rol = '4' OR tusuarios.rol = '3')";

			$query = 'SELECT tcursos.id as cursoId, tcursos.nombre as cursoNombre, tcursos.activo as cursoActivo, '.
					 'tusuarios.nombre as usuarioNombre, tusuarios.apellido1 as usuarioApellido1, tusuarios.apellido2 as usuarioApellido2 '.
					 'FROM tcursos, tusuariosxcurso, tusuarios, tcursosxcarrera, tcarrera '.
					 'WHERE tcursos.id = tusuariosxcurso.idCurso '.
					 'AND tusuarios.id = tusuariosxcurso.idUsuario '.
					 'AND tcursosxcarrera.idCurso = tusuariosxcurso.idCurso '.
					 'AND tcarrera.id = tcursosxcarrera.idCarrera '.
					 'AND tcarrera.id = "BISOFT" AND (tusuarios.rol = 4 OR tusuarios.rol = 3)';

			// $query = 'SELECT * from tcursos';
			$result = do_query($query);
			
			$jsonArray = [];
			$index = 0;
			$indexProf = 0;
			$currentCourse = '';

			while ($row = mysqli_fetch_assoc($result)) {
				if ($row['cursoId'] != $currentCourse) {
					// Resetear el array de profes para evitar que se muestren indices
					// de la fila anterior.
					$profesores = [];
					
					$results['idcurso'] = $row['cursoId'];
					$results['nombre'] = utf8_encode($row['cursoNombre']);
					$results['activo'] = $row['cursoActivo'];

					$indexProf = 0;
					$profesores[$indexProf]['profesorNombre'] = utf8_encode($row['usuarioNombre']).' '.utf8_encode($row['usuarioApellido1']).' '.utf8_encode($row['usuarioApellido2']);

					$index++;
				} else {
					$indexProf++;
					$profesores[$indexProf]['profesorNombre'] = utf8_encode($row['usuarioNombre']).' '.utf8_encode($row['usuarioApellido1']).' '.utf8_encode($row['usuarioApellido2']);
				}
				// Asignar el array de cursos
				$results['profesores'] = $profesores;
				$currentCourse = $row['cursoId'];

				$jsonArray['cursos'][$index] = $results;
			}

			deliver_response(200, 'ok', json_encode($jsonArray)); 
		}
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