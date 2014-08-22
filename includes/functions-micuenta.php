<?php
	
	function getPassword($usuarioActivoId){
		$query = "SELECT tusuarios.contrasena FROM tusuarios WHERE tusuarios.id ='$usuarioActivoId' ";	 	 
		$result = do_query($query);	
		$password = mysqli_fetch_assoc($result);
		return $password;
	}

	function getUsuario($userId) {
		$query = 'SELECT u.id as usuarioId, u.nombre as nombreUsuario, u.apellido1, u.apellido2, u.telefono, u.skypeid, u.imagen, '.
				 'r.nombre AS nombreRol, c.nombre as nombreCarrera '.
			 	 'FROM tusuarios AS u, trol AS r, tcarrera AS c '.
			 	 'WHERE u.rol = r.id '.
			 	 'AND u.carrera = c.id '.
			 	 'AND u.id = "'.utf8_encode($userId).'"';
		return do_query($query);
	}

	function getHorarioUsuario($userId) {
		$query = 'SELECT h.horario FROM horarios as h '.
			 	 'WHERE h.idUsuario = "'.utf8_encode($userId).'"';
		return do_query($query);
	}

	function mostrarPerfil($userId) {
		$result = getUsuario($userId);

		while ($row = mysqli_fetch_assoc($result)) {
			$avatar = $row['imagen'] ? $row['imagen'] : 'default-user.png';

			echo '<div class="mod-hd">';
			echo '<h2>'.utf8_encode($row['nombreUsuario']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).'</h2>';
			echo '<a href="/cenfotec-proyecto-1/configuracion/perfilModificar.php?userId='.$userId.'" class="btn btn-primary btn-modificar-perfil">Modificar</a>';
			echo '</div>';
			echo '<div class="mod-bd">';
			echo '<img class="perfil-photo" src="/cenfotec-proyecto-1/images/users/'.$avatar.'" width="130" height="130">';
			echo '<div class="row">';
			echo '<span class="label">Correo electrónico:</span>';
			echo '<span class="data email">'.utf8_encode($row['usuarioId']).'</span>';
			echo '</div>';
			echo '<div class="row">';
			echo '<span class="label">Teléfono:</span>';
			echo '<span class="data">'.utf8_encode($row['telefono']).'</span>';
			echo '</div>';
			echo '<div class="row">';
			echo '<span class="label">Skype Id:</span>';
			echo '<span class="data">'.utf8_encode($row['skypeid']).'</span>';
			echo '</div>';
			echo '<div class="row">';
			echo '<span class="label">Rol:</span>';
			echo '<span class="data">'.utf8_encode($row['nombreRol']).'</span>';
			echo '</div>';
			echo '<div class="row">';
			echo '<span class="label">Carrera:</span>';
			echo '<span class="data">'.utf8_encode($row['nombreCarrera']).'</span>';
			echo '</div>';
			echo '<div class="row">';
			echo '<span class="label">Cursos:</span>';
			echo '<div class="data-wrap">';
			$queryCursos = 'SELECT c.nombre FROM tcursos AS c, tusuariosxcurso AS uc '.
						   'WHERE c.id = uc.idCurso AND uc.idUsuario = "'.utf8_encode($userId).'"';
			$resultCursos = do_query($queryCursos);
			while ($rowCursos = mysqli_fetch_assoc($resultCursos)) {
				echo '<span class="data">'.utf8_encode($rowCursos['nombre']).'</span>';
			}
			echo '</div>';
			echo '</div>';

			$resultHorario = mysqli_fetch_assoc(getHorarioUsuario($userId));
			if ($resultHorario) {
				echo '<div class="row">';
				echo '<span class="label">Horario:</span>';
				echo '<span class="data">'.$resultHorario['horario'].'</span>';
				echo '</div>';
			}

			echo '</div>';
		}
	}

	function cargarModificarPerfil($userId) {
		$result = getUsuario($userId);

		while ($row = mysqli_fetch_assoc($result)) {
			echo '<input id="perfil-id" type="hidden" value="'.utf8_encode($row['usuarioId']).'" />';

			echo '<div class="form-row">';
			echo '<label for="perfil-nombre">Nombre: <span class="requerido">*</span></label>';
			echo '<input id="perfil-nombre" type="text" placeholder="Ingrese el nombre" class="form-control" value="'.utf8_encode($row['nombreUsuario']).'" required/>';
			echo '</div>';

			echo '<div class="form-row">';
			echo '<label for="perfil-apellido-1">Primer apellido: <span class="requerido">*</span></label>';
			echo '<input id="perfil-apellido-1" type="text" placeholder="Ingrese el primer apellido" class="form-control" value="'.utf8_encode($row['apellido1']).'" required/>';
			echo '</div>';

			echo '<div class="form-row">';
			echo '<label for="perfil-apellido-2">Segundo apellido: <span class="requerido">*</span></label>';
			echo '<input id="perfil-apellido-2" type="text" placeholder="Ingrese el segundo apellido" class="form-control" value="'.utf8_encode($row['apellido2']).'" required/>';
			echo '</div>';

			echo '<div class="form-row">';
			echo '<label for="perfil-email">Correo electrónico:</label>';
			echo '<input id="perfil-email" type="email" placeholder="Ingrese el correo electrónico" class="form-control" data-validate-type="email" value="'.utf8_encode($row['usuarioId']).'" disabled/>';
			echo '</div>';

			echo '<div class="form-row">';
			echo '<label for="perfil-rol">Rol:</label>';
			echo '<input id="perfil-rol" type="rol" class="form-control" value="'.utf8_encode($row['nombreRol']).'" disabled/>';
			echo '</div>';

			$avatar = $row['imagen'] ? $row['imagen'] : 'default-user.png';
			echo '<div class="form-row">';
			echo '<label for="perfil-avatar">Avatar:</label>';
			echo '<div class="media-drop">';
			echo '<div id="droppedimage">';
			echo '<img src="../images/users/'.$avatar.'">';
			echo '</div>';
			echo '<div id="dropbox" class="media-drop-placeholder" style="width: 200px; height: 200px;">';
			echo '<span class="media-drop-placeholder-title">Arrastrar imagen aquí</span>';
			echo '<span class="media-drop-placeholder-or">o</span>';
			echo '<div class="media-drop-placeholder-uploadbutton">';
			echo '<input id="realUploadBtn" name="media-drop-placeholder-file" type="file" accept="image/*" tabindex="-1"/>';
			echo '<button id="uploadBtn" type="button" class="btn" tabindex="-1">Buscar archivo&hellip;</button>';
			echo '</div></div>';
			echo '<p class="help-block error errormessages"></p>';
			echo '<button id="resetupload" type="button" class="btn btn-default">Subir nueva imagen</button>';
			echo '</div></div>';


			echo '<div class="form-row">';
			echo '<label for="perfil-telefono">Teléfono:</label>';
			echo '<input id="perfil-telefono" type="text" placeholder="Ingrese el número telefónico" class="form-control" value="'.utf8_encode($row['telefono']).'" data-validate-type="phone" />';
			echo '</div>';

			echo '<div class="form-row">';
			echo '<label for="perfil-skype">Skype id:</label>';
			echo '<input id="perfil-skype" type="text" placeholder="Ingrese la cuenta de Skype" class="form-control" value="'.utf8_encode($row['skypeid']).'" />';
			echo '</div>';

			$resultHorario = mysqli_fetch_assoc(getHorarioUsuario($userId));
			$horario = '';
			if ($resultHorario) {
				$horario = $resultHorario['horario'];
			}
			echo '<div class="form-row">';
			echo '<label for="perfil-horario">Horario de atención:</label>';
			echo '<input id="perfil-horario" type="text" placeholder="Ingrese el horario de atención" class="form-control" value="'.$horario.'" />';
			echo '</div>';
		}
	}

	function modifiyProfile($idPerfil, $nombre, $apellido1, $apellido2, $telefono, $skypeid, $horario, $avatar) {
		if ($avatar) {
			$updateAvatar = ', u.imagen = "'.$avatar.'" ';
		} else {
			$updateAvatar = '';
		}
		$query = 'UPDATE tusuarios AS u SET u.nombre = "'.$nombre.'", '.
				 'u.apellido1 = "'.$apellido1.'", '.
				 'u.apellido2 = "'.$apellido2.'", '.
				 'u.telefono = "'.$telefono.'", '.
				 'u.skypeid = "'.$skypeid.'" '.$updateAvatar.
				 'WHERE u.id = "'.$idPerfil.'"';
		$queryResults = do_query($query);

		// Actualizar el horario del usuario.
		if ($horario) {
			// Eliminar el horario previo.
			$queryDelete = "DELETE FROM horarios WHERE horarios.idUsuario = '".$idPerfil."'";
			do_query($queryDelete);
			// Nuevo horario.
			$queryInsert = "INSERT INTO horarios(idUsuario, horario) VALUES ('$idPerfil', '$horario')";
			do_query($queryInsert);
		}
		
		return true;
	}

?>