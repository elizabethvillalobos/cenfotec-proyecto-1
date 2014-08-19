<?php
	
	// Función que muestra las conversaciones de un usuario
	function getConversacionesUsuario($idUsuario) {
		
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
			$query = "SELECT tc.id,tc.idSolicitado,tu.nombre, tu.apellido1,tc.idSolicitante,tc.fechaInicio FROM `tcitas` AS tc INNER JOIN `tusuarios` AS tu ON tc.idSolicitante = tu.id WHERE idSolicitado='$idUsuario' AND tc.esCita='0' ORDER BY tc.id ASC";

			$queryResults = do_query($query);
			$jsonArray = [];
			$index = 0;
			
			while ($row = mysqli_fetch_assoc($queryResults)) {
				if(utf8_encode($row['fechaInicio'])==null){
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
	
	// Función que muestra una conversacion específica
	function mostrarConversacion($idCita, $idUsuario) {
		
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
TIME(tc.fechaInicio) as citaHoraInicio, TIME(tc.fechaFin) as citaHoraFin FROM `tcitas` AS tc INNER JOIN `tusuarios` AS tu ON tc.idSolicitado = tu.id INNER JOIN `tcursos` AS tcur ON tc.curso = tcur.id WHERE tc.id='$idCita'";

			
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
				if(utf8_encode($row['fechaInicio'])=="" && utf8_encode($row['estado'])==1){
					echo '<section class="cita">';				
					mostrarFrmCita($nombreCompleto,'Solicitud Pendiente',$nombreCompleto,utf8_encode($row['idSolicitado']),utf8_encode($row['telefono']),utf8_encode($row['imagen']),utf8_encode($row['asunto']),utf8_encode($row['nombreCurso']),$modalidadCita,$tipoCita,utf8_encode($row['observaciones']));
					echo '</section>';
					
					
				}
				
				//si el estudiante no ha aceptado la propuesta
				if(utf8_encode($row['fechaInicio'])!="" && utf8_encode($row['estado'])==1){
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
				$query = "SELECT tc.id,tc.idSolicitado,tc.idSolicitante,tu.nombre,tu.apellido1,tu.apellido2,tu.telefono,tu.imagen,tc.asunto,tc.estado,tc.tipo,tc.modalidad,tc.curso,tcur.nombre AS nombreCurso,tc.observaciones,tc.fechaInicio FROM `tcitas` AS tc INNER JOIN `tusuarios` AS tu ON tc.idSolicitante = tu.id INNER JOIN `tcursos` AS tcur ON tc.curso = tcur.id WHERE tc.id='$idCita'";
			
			
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
				if(utf8_encode($row['fechaInicio'])=="" && utf8_encode($row['estado'])==1){
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
			}
		}
		
		mysqli_free_result($queryResults);
	}
	
	function mostrarFrmCita($titulo1,$titulo2,$nombreOtraPersona,$idOtraPersona,$telefonoOtraPersona,$imagenOtraPersona,$asunto,$nombreCurso,$modalidadCita,$tipoCita,$observaciones){
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

				'<img class="cita-photo" src="'.$imagenOtraPersona.'" width="75" height="75"> '.

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

?>