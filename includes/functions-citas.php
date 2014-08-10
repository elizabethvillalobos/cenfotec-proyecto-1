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

		$resultQuery = do_query($query);
		$results = array();

		while ($row = mysql_fetch_assoc($resultQuery)) {
			$cita = array('correoSolicitado' => $row['solicitadoCorreo'],
				  'nombreSolicitado' => $row['nombreSolicitado'].' '.$row['apellido1Solicitado'].' '.$row['apellido2Solicitado'],
				  'imagenSolicitado' => $row['imagenSolicitado'] == NULL ? '../images/users/default-user.png' : $row['imagenSolicitado'],
				  'telefonoSolicitado' => $row['telefonoSolicitado'],
				  'fechaInicio' => $row['fechaInicio'],
				  'fechaFin' => $row['fechaFin'],
				  'asunto' => $row['asunto'],
				  'observaciones' => $row['observaciones'],
				  'curso' => $row['cursoNombre'],
				  'modalidad' => $row['modalidad'] == 0 ? 'Presencial' : 'Virtual',
				  'tipo' => $row['modalidad'] == 0 ? 'Individual' : 'Grupal');
			// $results['correoSolicitado'] = $row['solicitadoCorreo'];
			// $results['nombreSolicitado'] = $row['nombreSolicitado'].' '.$row['apellido1Solicitado'].' '.$row['apellido2Solicitado'];
			// $results['imagenSolicitado'] = $row['imagenSolicitado'] == NULL ? '../images/users/default-user.png' : $row['imagenSolicitado'];
			// $results['telefonoSolicitado'] = $row['telefonoSolicitado'];
			// $results['fechaInicio'] = $row['fechaInicio'];
			// $results['fechaFin'] = $row['fechaFin'];
			// $results['asunto'] = $row['asunto'];
			// $results['observaciones'] = $row['observaciones'];
			// $results['curso'] = $row['cursoNombre'];		
			// $results['modalidad'] = $row['modalidad'] == 0 ? 'Presencial' : 'Virtual';
			// $results['tipo'] = $row['modalidad'] == 0 ? 'Individual' : 'Grupal';
			// array_push($results, $cita);
		}
		return $cita;
	}
?>