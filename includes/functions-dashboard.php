<?php
	include_once('functions.php');

	function obtenerUltimasCitas($usuarioId, $rol) {
		if ($rol == '5') {
			$usuario = 'AND c.idSolicitado = u.id AND c.idSolicitante = "'.$usuarioId.'" ';
		} else {
			$usuario = 'AND c.idSolicitante = u.id AND c.idSolicitado = "'.$usuarioId.'" ';
		}
		$query = 'SELECT DAYOFWEEK(c.fechaInicio) AS citaDiaDeSemana, DAYOFMONTH(c.fechaInicio) AS citaDia, '.
				 'MONTH(c.fechaInicio) AS citaMes, YEAR(c.fechaInicio) AS citaAno, '.
				 'TIME(c.fechaInicio) as citaHoraInicio, TIME(c.fechaFin) as citaHoraFin,'.
				 'u.nombre AS nombreUsuario, u.apellido1 AS apellido1Usuario, u.apellido2 AS apellido2Usuario, '.
				 'u.imagen AS imagenUsuario '.
				 'FROM tcitas AS c, tusuarios AS u '.
				 'WHERE c.estado = "1" AND c.esCita = "1" '.$usuario.
				 'ORDER BY c.fechaInicio DESC '.
				 'LIMIT 3';
		$queryResults = do_query($query);

		if (mysqli_num_rows($queryResults) == 0) {
			echo '<li class="no-data">No hay citas agendadas.</li>';
		}
		while ($row = mysqli_fetch_assoc($queryResults)) {
			$avatar = utf8_encode($row['imagenUsuario']) ? utf8_encode($row['imagenUsuario']) : 'default-user.png';
			echo '<li><a href="/cenfotec-proyecto-1/citas/agenda.php" class="dash-agenda-cita">';
			echo '<img class="dash-agenda-photo" src="/cenfotec-proyecto-1/images/users/'.$avatar.'" width="50" height="50">';
			echo '<span class="dash-agenda-fecha">'.dateLongString($row['citaDiaDeSemana'], $row['citaDia'], $row['citaMes'], $row['citaAno']).'</span>';
			echo '<span class="dash-agenda-hora">'.timeLongString($row['citaHoraInicio']).' a '.timeLongString($row['citaHoraFin']).'</span>';
			echo '<span class="dash-agenda-invitado">'.utf8_encode($row['nombreUsuario']).' '.utf8_encode($row['apellido1Usuario']).' '.utf8_encode($row['apellido2Usuario']).'</span>';
			echo '</a></li>';
		}
	}

	if($_SERVER['REQUEST_METHOD']=="POST") {
		$function = $_POST['call'];
		if(function_exists($function)) {        
		    call_user_func($function);
		} else {
		    echo 'Function Not Exists!!';
		}
	}
?>