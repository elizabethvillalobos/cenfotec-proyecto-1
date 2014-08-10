<?php
	// Función que consultas las citas que un usuario
	// tiene pendientes para una fecha en específico.
	function getCitasUsuario($idsolicitante) {
		$query = 'SELECT tcitas.idSolicitado as solicitadoCorreo, tcitas.fechaInicio, tcitas.fechaFin, tcitas.asunto, tcitas.modalidad, tcitas.tipo, tcitas.observaciones, '.
				 'tcursos.nombre AS cursoNombre, '.
				 'tusuarios.nombre AS nombreSolicitado, tusuarios.apellido1 AS apellido1Solicitado, tusuarios.apellido2 AS apellido2Solicitado, tusuarios.telefono AS telefonoSolicitado, tusuarios.imagen AS imagenSolicitado '.
				 'FROM tcitas, tcursos, tusuarios '.
				 'WHERE tcitas.curso = tcursos.id AND tcitas.idSolicitado = tusuarios.id '.
				 'AND tcitas.esCita = 1 '.
				 'AND tcitas.idSolicitante = "'.$idsolicitante.'"';

		$queryResults = do_query($query);

		while ($row = mysqli_fetch_assoc($queryResults)) {		
			$results['correoSolicitado'] = $row['solicitadoCorreo'];
			$results['nombreSolicitado'] = $row['nombreSolicitado'].' '.$row['apellido1Solicitado']; //.' '.$row['apellido2Solicitado'];
			$results['imagenSolicitado'] = $row['imagenSolicitado'] == NULL ? '../images/users/default-user.png' : $row['imagenSolicitado'];
			$results['telefonoSolicitado'] = $row['telefonoSolicitado'];
			$results['fechaInicio'] = $row['fechaInicio'];
			$results['fechaFin'] = $row['fechaFin'];
			$results['asunto'] = $row['asunto'];
			$results['observaciones'] = $row['observaciones'];
			$results['curso'] = $row['cursoNombre'];		
			$results['modalidad'] = $row['modalidad'] == 0 ? 'Presencial' : 'Virtual';
			$results['tipo'] = $row['modalidad'] == 0 ? 'Individual' : 'Grupal';
		}

		return $results;
	}


	// Insertar una nueva cita.
	// Esta función se ejecuta cuando se acepta la fecha y hora de una solicitud de cita.
	function insertCita($idSolicitante, $idSolicitado, $fechaInicio, $fechaFin, $asunto, $modalidad, $tipo, $observaciones, $curso) {
		$query = 'INSERT INTO tcitas(idSolicitante, idSolicitado, fechaInicio, fechaFin, asunto, modalidad, tipo, observaciones, curso, estado, esCita) '.
				 'VALUES ($idSolicitante, $idSolicitado, $fechaInicio, $fechaFin, $asunto, $modalidad, $tipo, $observaciones, $curso, 1, 1)';

		return do_query($query);
	}
?>