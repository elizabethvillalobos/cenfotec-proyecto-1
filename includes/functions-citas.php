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
	function getCitasUsuario($usuario, $rol, $fechaInicio, $fechaFin) {
		if ($rol == '5') { // estudiante
			$condicionUsuario = 'AND tcitas.idSolicitado = tusuarios.id AND tcitas.idSolicitante = "'.$usuario.'" ';
		} else {
			$condicionUsuario = 'AND tcitas.idSolicitante = tusuarios.id AND tcitas.idSolicitado = "'.$usuario.'" ';
		}
		$query = 'SELECT tcitas.id AS citaId, tcitas.idSolicitado AS solicitadoCorreo, tcitas.asunto, tcitas.modalidad, tcitas.tipo, tcitas.observaciones, '.
				 'DAYOFWEEK(tcitas.fechaInicio) AS citaDiaDeSemana, DAYOFMONTH(tcitas.fechaInicio) AS citaDia, '.
				 'MONTH(tcitas.fechaInicio) AS citaMes, YEAR(tcitas.fechaInicio) AS citaAno, '.
				 'TIME(tcitas.fechaInicio) as citaHoraInicio, TIME(tcitas.fechaFin) as citaHoraFin, '.
				 'tcursos.nombre AS cursoNombre, '.
				 'tusuarios.nombre AS nombreSolicitado, tusuarios.apellido1 AS apellido1Solicitado, tusuarios.apellido2 AS apellido2Solicitado, tusuarios.telefono AS telefonoSolicitado, tusuarios.imagen AS imagenSolicitado '.
				 'FROM tcitas, tcursos, tusuarios '.
				 'WHERE tcitas.curso = tcursos.id '.
				 'AND tcitas.estado = "1" AND tcitas.esCita = "1" '.$condicionUsuario.
				 'AND tcitas.fechaInicio >= "'.$fechaInicio.'" AND tcitas.fechaFin < "'.$fechaFin.'" '.
				 'ORDER BY tcitas.fechaInicio DESC';

		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['citaId'] = $row['citaId'];
			$results['correoSolicitado'] = utf8_encode($row['solicitadoCorreo']);
			$results['nombreSolicitado'] = utf8_encode($row['nombreSolicitado']).' '.utf8_encode($row['apellido1Solicitado']).' '.utf8_encode($row['apellido2Solicitado']);
			$results['imagenSolicitado'] = $row['imagenSolicitado'] == NULL ? 'default-user.png' : $row['imagenSolicitado'];
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
	// $solicitante es un boolean que indica cual usuario consultar.
	function getCitaPorId($citaId) {
		$query = 'SELECT tcitas.idSolicitante AS solicitanteCorreo, tcitas.idSolicitado AS solicitadoCorreo, tcitas.asunto, tcitas.modalidad, tcitas.tipo, tcitas.observaciones, '.
				 'DAYOFWEEK(tcitas.fechaInicio) AS citaDiaDeSemana, DAYOFMONTH(tcitas.fechaInicio) AS citaDia, '.
				 'MONTH(tcitas.fechaInicio) AS citaMes, YEAR(tcitas.fechaInicio) AS citaAno, '.
				 'TIME(tcitas.fechaInicio) as citaHoraInicio, TIME(tcitas.fechaFin) as citaHoraFin, '.
				 'tcursos.nombre AS cursoNombre, '.
				 'tusuarios.nombre AS nombreUsuario, tusuarios.apellido1 AS apellido1Usuario, tusuarios.apellido2 AS apellido2Usuario '.
				 'FROM tcitas, tcursos, tusuarios '.
				 'WHERE tcitas.curso = tcursos.id AND tcitas.idSolicitante = tusuarios.id AND tcitas.id = '.$citaId;

		$queryResults = do_query($query);

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['correoSolicitante'] = utf8_encode($row['solicitanteCorreo']);
			$results['correoSolicitado'] = utf8_encode($row['solicitadoCorreo']);
			$results['nombreSolicitante'] = utf8_encode($row['nombreUsuario']).' '.utf8_encode($row['apellido1Usuario']).' '.utf8_encode($row['apellido2Usuario']);
			$results['fecha'] = dateLongString($row['citaDiaDeSemana'], $row['citaDia'], $row['citaMes'], $row['citaAno']);
			$results['horaInicio'] = timeLongString($row['citaHoraInicio']);
			$results['horaFin'] = timeLongString($row['citaHoraFin']);
			$results['asunto'] = utf8_encode($row['asunto']);
			$results['observaciones'] = utf8_encode($row['observaciones']);
			$results['curso'] = utf8_encode($row['cursoNombre']);
			$results['modalidad'] = $row['modalidad'] == 0 ? 'Presencial' : 'Virtual';
			$results['tipo'] = $row['modalidad'] == 0 ? 'Individual' : 'Grupal';
		}

		mysqli_free_result($queryResults);

		return $results;
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

	// Finalizar una cita.
	function finishCita($citaId) {
		// Update del estado de la cita.
		$queryUpdate = "UPDATE tcitas SET tcitas.estado = 4 WHERE tcitas.id = '".$citaId."'";
		$result = do_query($queryUpdate);
		insertarEvaluacionesPendientes($citaId);//inserta una evaluacion en evaluaciones pendientes

		return $result;
	}

	function getExpiracionSolicitud() {
		$query = 'SELECT configuracion.valor FROM configuracion '.
				 'WHERE configuracion.parametro = "expiracionSolicitud"';
		$queryResults = do_query($query);

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results = $row['valor'];
		}

		return $results;
	}

	function expireSolicitudesCitas($expiracionSolicitud) {
		$fechaVencimiento = date('Y-m-d H:i:s', strtotime('- '.$expiracionSolicitud.' days'));
		$query = 'SELECT * FROM tcitas '.
				 'WHERE fechaCreacion < "'.$fechaVencimiento.'"';

		$queryResults = do_query($query);
		$jsonArray = [];

		if (mysqli_num_rows($queryResults) > 0) {
			// Estado = 6 => expirada
			$queryUpdate = 'UPDATE tcitas SET tcitas.estado = 6 WHERE fechaCreacion < "'.$fechaVencimiento.'"';
			$queryResults = do_query($queryUpdate);
		}
		mysqli_free_result($queryResults);

		return $jsonArray;
	}
	
	// Insertar una nueva solicitud.
	function insertSolicitud($idSolicitante, $idSolicitado, $asunto, $modalidad, $tipo, $observaciones, $idCurso) {
		$query = "INSERT INTO tcitas(idSolicitante, idSolicitado, asunto, modalidad, tipo, observaciones, curso, estado, esCita) VALUES ('$idSolicitante', '$idSolicitado', '$asunto', '$modalidad', '$tipo', '$observaciones', '$idcurso', '1', '0')";
		return do_query($query);
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
				if(utf8_encode($row['fechaInicio'])!="0000-00-00 00:00:00"){
					//echo '<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idUsuario="'. $idUsuario .'>'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
					echo '<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idCita='.$row['id'].'&idUsuario='.$row['idSolicitado'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
				}
				else
				{
					echo '<li><span class="listo flaticon-check34"></span><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idCita='.$row['id'].'&idUsuario='.$row['idSolicitado'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
				}				
			}
		}
		//si el usuario activo no es un estudiante
		else
		{
			$query = "SELECT tc.id,tc.idSolicitado,tu.nombre, tu.apellido1,tc.idSolicitante,tc.fechaInicio FROM `tcitas` AS tc INNER JOIN `tusuarios` AS tu ON tc.idSolicitante = tu.id WHERE idSolicitado='$idUsuario' AND tc.esCita='0' AND (tc.estado=1 OR tc.estado=2) ORDER BY tc.id ASC";

			$queryResults = do_query($query);
			$jsonArray = [];
			$index = 0;
			
			while ($row = mysqli_fetch_assoc($queryResults)) {
				if(utf8_encode($row['fechaInicio'])=="0000-00-00 00:00:00"){
					echo '<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idCita='.$row['id'].'&idUsuario='.$row['idSolicitante'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
				}
				else
				{
					echo '<li><span class="listo flaticon-check34"></span><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idCita='.$row['id'].'&idUsuario='.$row['idSolicitante'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
				}				
			}
		}
		
		mysqli_free_result($queryResults);
		return $jsonArray;
	}
	
	// Función que muestra una solicitud específica
	function mostrarSolicitud($idCita, $idUsuario) {
		
		$query = "SELECT tu.nombre, tu.apellido1, tu.apellido2, tr.nombre AS nombreRol FROM `tusuarios` AS tu INNER JOIN `trol` AS tr ON tr.id = tu.rol WHERE tu.id='$idUsuario'";
		$queryResults = do_query($query);
		$row = mysqli_fetch_assoc($queryResults);
		
		$nombreUsuario = utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']);
		//si el usuario activo es un estudiante
		if($row['nombreRol']=="Estudiante"){
			//si no se envio ningun id de cita, se carga la primera
			if($idCita!=0)
			{
				
				$query = "SELECT tc.id,tc.idSolicitado,tc.idSolicitante,tu.nombre,tu.apellido1,tu.apellido2,tu.telefono,tu.imagen,tc.asunto,tc.estado,tc.tipo,tc.modalidad,tc.curso,tcur.nombre AS nombreCurso,tc.observaciones,tc.fechaInicio, DAYOFWEEK(tc.fechaInicio) AS citaDiaDeSemana, DAYOFMONTH(tc.fechaInicio) AS citaDia, MONTH(tc.fechaInicio) AS citaMes, YEAR(tc.fechaInicio) AS citaAno, 
TIME(tc.fechaInicio) as citaHoraInicio, TIME(tc.fechaFin) as citaHoraFin FROM `tcitas` AS tc INNER JOIN `tusuarios` AS tu ON tc.idSolicitado = tu.id LEFT JOIN `tcursos` AS tcur ON tc.curso = tcur.id WHERE tc.id='$idCita'";

				
				$queryResults = do_query($query);
				$index = 0;
				
				$row = mysqli_fetch_assoc($queryResults);
				
				$tipoCita='Individual';
				if(utf8_encode($row['tipo'])==1)
				{
					$tipoCita='Grupal';
				}
				$modalidadCita='Presencial';
				if(utf8_encode($row['modalidad'])==1)
				{
					$modalidadCita='Virtual';
				}
				$nombreCompleto=utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']);
				
				
				//si el invitado no ha propuesto una hora
				if(utf8_encode($row['fechaInicio'])=="0000-00-00 00:00:00" && utf8_encode($row['estado'])==1){
					echo '<section class="cita">';				
					mostrarFrmCita($nombreCompleto,'Solicitud Pendiente',$nombreCompleto,utf8_encode($row['idSolicitado']),utf8_encode($row['telefono']),utf8_encode($row['imagen']),utf8_encode($row['asunto']),utf8_encode($row['nombreCurso']),$modalidadCita,$tipoCita,utf8_encode($row['observaciones']));
					echo '</section>';
					
					
				}
				//si el estudiante no ha aceptado la propuesta
				if(utf8_encode($row['fechaInicio'])!="0000-00-00 00:00:00" && utf8_encode($row['estado'])==1){
					
					$fecha = dateLongString($row['citaDiaDeSemana'], $row['citaDia'], $row['citaMes'], $row['citaAno']);
					$hora = timeLongString($row['citaHoraInicio']) .' - '.timeLongString($row['citaHoraFin']);
					echo '<section class="cita">';
					mostrarFrmCita($fecha,$hora,$nombreCompleto,utf8_encode($row['idSolicitado']),utf8_encode($row['telefono']),utf8_encode($row['imagen']),utf8_encode($row['asunto']),utf8_encode($row['nombreCurso']),$modalidadCita,$tipoCita,utf8_encode($row['observaciones']));
					echo '<div class="form-row form-row-button"> '.
							'<a href="/cenfotec-proyecto-1/citas/solicitudAceptada.php" id="btnAceptarPropuesta" class="btn btn-primary">Aceptar</a> '.
							'<a href="/cenfotec-proyecto-1/citas/solicitudRechazada.php" id="btnRechazarPropuesta" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Rechazar</a> '.
						'</div>'.
					'</section>';
				}
			
			}
		}
		//si el usuario activo no es un estudiante
		else
		{		
			
			//si no se envio ningun id de cita, se carga la primera
			if($idCita!=0)
			{
				$query = "SELECT tc.id,tc.idSolicitado,tc.idSolicitante,tu.nombre,tu.apellido1,tu.apellido2,tu.telefono,tu.imagen,tc.asunto,tc.estado,tc.tipo,tc.modalidad,tc.curso,tcur.nombre AS nombreCurso,tc.observaciones,tc.fechaInicio, DAYOFWEEK(tc.fechaInicio) AS citaDiaDeSemana, DAYOFMONTH(tc.fechaInicio) AS citaDia, MONTH(tc.fechaInicio) AS citaMes, YEAR(tc.fechaInicio) AS citaAno,". 
"TIME(tc.fechaInicio) as citaHoraInicio, TIME(tc.fechaFin) as citaHoraFin FROM `tcitas` AS tc INNER JOIN `tusuarios` AS tu ON tc.idSolicitante = tu.id LEFT JOIN `tcursos` AS tcur ON tc.curso = tcur.id WHERE tc.id='$idCita'";
			
			
				$queryResults = do_query($query);
				$index = 0;
				
				$row = mysqli_fetch_assoc($queryResults);
				
				$tipoCita='Individual';
				if(utf8_encode($row['tipo'])==1)
				{
					$tipoCita='Grupal';
				}
				$modalidadCita='Presencial';
				if(utf8_encode($row['modalidad'])==1)
				{
					$modalidadCita='Virtual';
				}
				$nombreCompleto=utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']);
				//si la solicitud es nueva -> necesita una asignacion de hora
				if(utf8_encode($row['fechaInicio'])=="0000-00-00 00:00:00" && utf8_encode($row['estado'])==1){
					echo '<section class="cita">';				
					mostrarFrmCita($nombreCompleto,'Solicitud Pendiente',$nombreCompleto,utf8_encode($row['idSolicitante']),utf8_encode($row['telefono']),utf8_encode($row['imagen']),utf8_encode($row['asunto']),utf8_encode($row['nombreCurso']),$modalidadCita,$tipoCita,utf8_encode($row['observaciones']));
					echo '<h3>Asignación de fecha y hora</h3> '.
							'<form id="solicitarCita" class="form-horizontal" action="#" method="post"> '.
							   ' <div class="form-row"> '.
								   ' <label for="txtFecha">Fecha:</label> '.
								   ' <input id="txtFecha" type="text" placeholder="Ingrese la fecha" class="form-control datepicker" /> '.
								'</div> '.

								'<div class="form-row"> '.
								   ' <label for="txtHoraInicio">Hora de inicio:</label> '.
								   ' <input id="txtHoraInicio" type="time" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="form-control form-control-time"/> '.
							   ' </div> '.

								'<div class="form-row "> '.
									'<label for="txtHoraFin">Hora de fin:</label> '.
								   ' <input id="txtHoraFin" type="time" class="form-control form-control-time" /> '.
							   ' </div>	'.			 			
								
							   ' <div class="form-row form-row-button"> '.
									'<button id="btnAceptar" class="btn btn-primary">Aceptar</button> '.
									'<button id="btnRechazar" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Rechazar</button> '.
								'</div> '.                 
							'</form> '.
					'</section>' .
					'<div id="modal-cancelar" class="modal js-modal-window"> '.
						'<span class="close flaticon-close3 js-modal-close">Close</span> '.
						'<h3>¿Está seguro que desea rechazar la solicitud de cita de atención?</h3> '.
						'<div class="form-row"> '.
							'<a href="/cenfotec-proyecto-1/citas/solicitudRechazada.php" class="btn btn-primary js-modal-aceptar">Sí</a> '.
							'<a href="#" class="btn btn-default js-modal-close">No</a> '.
						'</div> '.
					'</div> ';
				}
				
				//si el invitado no ha aceptado la propuesta
				if(utf8_encode($row['fechaInicio'])!="0000-00-00 00:00:00" && utf8_encode($row['estado'])==1){
					$nombreCompleto=utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']);
					$fecha = dateLongString($row['citaDiaDeSemana'], $row['citaDia'], $row['citaMes'], $row['citaAno']);
					$hora = timeLongString($row['citaHoraInicio']) .' - '.timeLongString($row['citaHoraFin']);
					echo '<section class="cita">';
					mostrarFrmCita($fecha,$hora,$nombreCompleto,utf8_encode($row['idSolicitante']),utf8_encode($row['telefono']),utf8_encode($row['imagen']),utf8_encode($row['asunto']),utf8_encode($row['nombreCurso']),$modalidadCita,$tipoCita,utf8_encode($row['observaciones']));
					echo '</section>';
				}
			}
		}
		
		mysqli_free_result($queryResults);
	}
	
	function mostrarFrmCita($titulo1,$titulo2,$nombreOtraPersona,$idOtraPersona,$telefonoOtraPersona,$imagenOtraPersona,$asunto,$nombreCurso,$modalidadCita,$tipoCita,$observaciones){
		if(!$nombreCurso){
			$nombreCurso="No asignado";
		}
		$imagenUsuario = $imagenOtraPersona ? $imagenOtraPersona : 'default-user.png';

		echo '<div class="mod-hd"> '.
				'<h2>'.$titulo1.'</h2> '.
				'<span class="cita-hora-inicio-fin">'.$titulo2.'</span> '.
			'</div> '.
			'<div class="mod-bd"> '.
				'<div class="row"> '.
					'<span class="label">Solicitante:</span> '.
					'<div class="data-wrap"> '.
						'<span class="data cita-invitado">'.$nombreOtraPersona.'</span> '.
						'<span class="data">'.$idOtraPersona.'</span> '.
						'<span class="data">'.$telefonoOtraPersona.'</span> '.
					'</div> '.
				'</div> '.

				'<img class="cita-photo" src="../images/users/'.$imagenUsuario.'" width="75" height="75"> '.

				'<div class="row"> '.
					'<span class="label">Asunto a tratar:</span> '.
					'<span class="data">'.$asunto.'</span> '.
				'</div> '.

				'<div class="row"> '.
					'<span class="label">Curso:</span> '.
					'<span class="data">'.$nombreCurso.'</span> '.
				'</div> '.

				'<div class="row"> '.
					'<span class="label">Modalidad:</span> '.
					'<span class="data">'.$modalidadCita.'</span> '.
				'</div> '.

				'<div class="row"> '.
					'<span class="label">Tipo:</span> '.
					'<span class="data">'.$tipoCita.'</span> '.
				'</div> '.

				'<div class="row"> '.
					'<span class="label">Observaciones:</span> '.
					'<span class="data">'.$observaciones.'</span> '.
				'</div> '.
				
				
			'</div> ';
	}

	// Función que retorna los datos de una cita en específico.
	function getUsuarioPorId($usuarioId) {
		$query = 'SELECT tusuarios.nombre, tusuarios.apellido1, tusuarios.apellido2 '.
				 'FROM tusuarios '.
				 'WHERE tusuarios.id = "'.$usuarioId.'"';

		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['nombreCompleto'] = utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']);
			$jsonArray[$index] = $results;
			$index++;
		}
		mysqli_free_result($queryResults);

		return $jsonArray;
	}
	
	// Función que muestra las ultimas solicitudes de un usuario
	function getTresSolicitudes($idUsuario) {
		$query = "SELECT tr.nombre FROM `tusuarios` AS tu INNER JOIN `trol` AS tr ON tr.id = tu.rol WHERE tu.id='$idUsuario'";
		$queryResults = do_query($query);
		$row = mysqli_fetch_assoc($queryResults);
		
		//si el usuario activo es un estudiante
		if($row['nombre']=="Estudiante"){
			$query = "SELECT tc.id,tc.idSolicitado,tu.nombre, tu.apellido1,tc.fechaInicio FROM `tcitas` AS tc INNER JOIN `tusuarios` AS tu ON tc.idSolicitado = tu.id WHERE idSolicitante='$idUsuario' AND tc.esCita='0' ORDER BY tc.fechaInicio ASC LIMIT 3";
		
			$queryResults = do_query($query);			
			while ($row = mysqli_fetch_assoc($queryResults)) {				
					//echo '<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idCita='.$row['id'].'&idUsuario='.$row['idSolicitado'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
				echo '<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idCita='.$row['id'].'&idUsuario='.$row['idSolicitado'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';				
			}
		}
		//si el usuario activo no es un estudiante
		else
		{
			$query = "SELECT tc.id,tc.idSolicitante,tu.nombre, tu.apellido1,tc.fechaInicio FROM `tcitas` AS tc INNER JOIN `tusuarios` AS tu ON tc.idSolicitante = tu.id WHERE idSolicitado='$idUsuario' AND tc.esCita='0' ORDER BY tc.fechaInicio ASC LIMIT 3";
			
			$queryResults = do_query($query);
			
			while ($row = mysqli_fetch_assoc($queryResults)) {				
					//echo '<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idCita='.$row['id'].'&idUsuario='.$row['idSolicitado'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';
				echo '<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php?idCita='.$row['id'].'&idUsuario='.$row['idSolicitante'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .'</a></li>';				
			}
		}
		
		mysqli_free_result($queryResults);
		return $jsonArray;
	}

?>