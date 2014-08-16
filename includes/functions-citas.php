<?php
	// Estado de cita/solicitudes
	//   1: pendiente
	//   2: aceptada
	//   3: rechazada
	//   4: finalizada
	//   5: cancelada
	//   6: expirada

	// Función que consultas las citas que un usuario
	// tiene pendientes para una fecha en específico.
	function getCitasUsuario($idsolicitante, $fechaInicio, $fechaFin) {
		$query = 'SELECT tcitas.id AS citaId, tcitas.idSolicitado AS solicitadoCorreo, tcitas.asunto, tcitas.modalidad, tcitas.tipo, tcitas.observaciones, '.
				 'DAYOFWEEK(tcitas.fechaInicio) AS citaDiaDeSemana, DAYOFMONTH(tcitas.fechaInicio) AS citaDia, '.
				 'MONTH(tcitas.fechaInicio) AS citaMes, YEAR(tcitas.fechaInicio) AS citaAno, '.
				 'TIME(tcitas.fechaInicio) as citaHoraInicio, TIME(tcitas.fechaFin) as citaHoraFin, '.
				 'tcursos.nombre AS cursoNombre, '.
				 'tusuarios.nombre AS nombreSolicitado, tusuarios.apellido1 AS apellido1Solicitado, tusuarios.apellido2 AS apellido2Solicitado, tusuarios.telefono AS telefonoSolicitado, tusuarios.imagen AS imagenSolicitado '.
				 'FROM tcitas, tcursos, tusuarios '.
				 'WHERE tcitas.curso = tcursos.id '.
				 'AND tcitas.idSolicitado = tusuarios.id '.
				 'AND tcitas.estado = "1" AND tcitas.esCita = "1" '.
				 'AND tcitas.idSolicitante = "'.$idsolicitante.'" '.
				 'AND tcitas.fechaInicio >= "'.$fechaInicio.'" AND tcitas.fechaFin < "'.$fechaFin.'" '.
				 'ORDER BY tcitas.fechaInicio DESC';

		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['citaId'] = $row['citaId'];
			$results['correoSolicitado'] = utf8_encode($row['solicitadoCorreo']);
			$results['nombreSolicitado'] = utf8_encode($row['nombreSolicitado']).' '.utf8_encode($row['apellido1Solicitado']).' '.utf8_encode($row['apellido2Solicitado']);
			$results['imagenSolicitado'] = $row['imagenSolicitado'] == NULL ? '../images/users/default-user.png' : $row['imagenSolicitado'];
			$results['telefonoSolicitado'] = $row['telefonoSolicitado'];
			$results['fecha'] = dateLongString($row['citaDiaDeSemana'], $row['citaDia'], $row['citaMes'], $row['citaAno']);
			$results['horaInicio'] = timeLongString($row['citaHoraInicio']);
			$results['horaFin'] = timeLongString($row['citaHoraFin']);
			$results['asunto'] = utf8_encode($row['asunto']);
			$results['observaciones'] = utf8_encode($row['observaciones']);
			$results['curso'] = utf8_encode($row['cursoNombre']);
			$results['modalidad'] = $row['modalidad'] == 0 ? 'Presencial' : 'Virtual';
			$results['tipo'] = $row['modalidad'] == 0 ? 'Individual' : 'Grupal';
			$jsonArray['citas'][$index] = $results;
			$index++;
		}

		mysqli_free_result($queryResults);

		return $jsonArray;
	}


	// Función que retorna los datos de una cita en específico.
	function getCitaPorId($citaId) {
		$query = 'SELECT tcitas.id AS citaId, tcitas.idSolicitado AS solicitadoCorreo, tcitas.idSolicitante AS solicitanteCorreo, tcitas.asunto, '.
				 'DAYOFWEEK(tcitas.fechaInicio) AS citaDiaDeSemana, DAYOFMONTH(tcitas.fechaInicio) AS citaDia, '.
				 'MONTH(tcitas.fechaInicio) AS citaMes, YEAR(tcitas.fechaInicio) AS citaAno, '.
				 'TIME(tcitas.fechaInicio) as citaHoraInicio, TIME(tcitas.fechaFin) as citaHoraFin '.
				 'FROM tcitas '.
				 'WHERE tcitas.esCita = "1" '.
				 'AND tcitas.id = "'.$citaId.'"';

		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['citaId'] = $row['citaId'];
			$results['correoSolicitado'] = utf8_encode($row['solicitadoCorreo']);
			$results['correoSolicitante'] = utf8_encode($row['solicitanteCorreo']);
			$results['fecha'] = dateLongString($row['citaDiaDeSemana'], $row['citaDia'], $row['citaMes'], $row['citaAno']);
			$results['horaInicio'] = timeLongString($row['citaHoraInicio']);
			$results['horaFin'] = timeLongString($row['citaHoraFin']);
			$results['asunto'] = utf8_encode($row['asunto']);
			$jsonArray['citas'][$index] = $results;
			$index++;
		}

		mysqli_free_result($queryResults);

		return $jsonArray;
	}


	// Insertar una nueva cita.
	// Esta función se ejecuta cuando se acepta la fecha y hora de una solicitud de cita.
	function insertCita($idSolicitante, $idSolicitado, $fechaInicio, $fechaFin, $asunto, $modalidad, $tipo, $observaciones, $curso) {
		$query = "INSERT INTO tcitas(idSolicitante, idSolicitado, fechaInicio, fechaFin, asunto, modalidad, tipo, observaciones, curso, estado, esCita) VALUES ('$idSolicitante', '$idSolicitado', DATE_FORMAT(NOW(),'%Y-%m-%d %T'), DATE_FORMAT(NOW(),'%Y-%m-%d %T'), '$asunto', '$modalidad', '$tipo', '$observaciones', '$curso', '1', '1')";

		return do_query($query);
	}


	// Cancelar una cita.
	function cancelCita($citaId, $motivo, $idSolicitante) {
		// Update del estado de la cita.
		$queryUpdate = "UPDATE tcitas SET tcitas.estado = 5 WHERE tcitas.id = '".$citaId."'";
		$result = do_query($queryUpdate);

		// Insert en la tabla tcitascanceladas.
		$queryInsert = "INSERT INTO tcitascanceladas(id, motivo, idusuario) VALUES (null, '$motivo', '$idSolicitante')";
		$result &= do_query($queryInsert);

		// Llamar funcion que ejecuta el GIC-CUFE-305.

		return $result;
	}
	
	// Insertar una nueva solicitud.
	function insertSolicitud($idSolicitante, $idSolicitado, $asunto, $modalidad, $tipo, $observaciones, $idCurso) {
		$query = "INSERT INTO tcitas(idSolicitante, idSolicitado, asunto, modalidad, tipo, observaciones, curso, estado, esCita) VALUES ('$idSolicitante', '$idSolicitado', '$asunto', '$modalidad', '$tipo', '$observaciones', '$idcurso', '1', '0')";
		return do_query($query);
	}

	// Función que retorna los datos de una cita en específico.
	function getUsuarioPorId($usuarioId) {
		$query = 'SELECT tusuarios.nombre AS nombreSolicitado, tusuarios.apellido1 AS apellido1Solicitado, tusuarios.apellido2 AS apellido2Solicitado '.
				 'FROM tusuarios '.
				 'WHERE tusuarios.id = "'.$usuarioId.'"';

		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['nombreCompleto'] = utf8_encode($row['nombreSolicitado']).' '.utf8_encode($row['apellido1Solicitado']).' '.utf8_encode($row['apellido2Solicitado']);
			$jsonArray[$index] = $results;
			$index++;
		}
		mysqli_free_result($queryResults);

		return $jsonArray;
	}
	
	// Función que muestra las solicitudes de un usuario
	function getSolicitudesUsuario($idUsuario) {
		
		$query = "SELECT tr.nombre FROM `tusuarios` AS tu INNER JOIN `trol` AS tr ON tr.id = tu.rol WHERE tu.id='$idUsuario'";
		$queryResults = do_query($query);
		$row = mysqli_fetch_assoc($queryResults);
		
		//si el usuario activo es un estudiante
		if($row['nombre']=="Estudiante"){
		
			$query = "SELECT tc.id,tc.idSolicitado,tu.nombre, tu.apellido1,tc.idSolicitante,tc.fechaInicio FROM `tcitas` AS tc INNER JOIN `tusuarios` AS tu ON tc.idSolicitado = tu.id WHERE idSolicitante='$idUsuario' AND tc.esCita='0' ORDER BY tc.id ASC";

			$queryResults = do_query($query);
			$jsonArray = [];
			$index = 0;
			
			while ($row = mysqli_fetch_assoc($queryResults)) {
				if(utf8_encode($row['fechaInicio'])!=null){
					//echo '<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idUsuario="'. $idUsuario .'>'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
					echo '<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idUsuario='.$row['idSolicitado'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
				}
				else
				{
					echo '<li><span class="listo flaticon-check34"></span><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idUsuario='.$row['idSolicitado'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
				}				
			}
		}
		//si el usuario activo no es un estudiante
		else
		{
			$query = "SELECT tc.id,tc.idSolicitado,tu.nombre, tu.apellido1,tc.idSolicitante,tc.fechaInicio FROM `tcitas` AS tc INNER JOIN `tusuarios` AS tu ON tc.idSolicitante = tu.id WHERE idSolicitado='$idUsuario' AND tc.esCita='0' ORDER BY tc.id ASC";

			$queryResults = do_query($query);
			$jsonArray = [];
			$index = 0;
			
			while ($row = mysqli_fetch_assoc($queryResults)) {
				if(utf8_encode($row['fechaInicio'])==null){
					echo '<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idUsuario='.$row['idSolicitante'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
				}
				else
				{
					echo '<li><span class="listo flaticon-check34"></span><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idUsuario='.$row['idSolicitante'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
				}				
			}
		}
		
		mysqli_free_result($queryResults);
		return $jsonArray;
	}

?>