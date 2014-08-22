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

	function obtenerRanking($usuario) {
		$query = 'SELECT u.ranking FROM tusuarios AS u WHERE u.id ="'.$usuario.'"';
		$queryResults = do_query($query);
		$row = mysqli_fetch_assoc($queryResults);
		echo '<span class="dash-ranking-amount rating-amount">'.$row['ranking'].'</span>';

		$anchoStar = 40;
		$ranking = $row['ranking'];
		$index = 1;

		echo '<ul class="rating-stars">';
		while ($index <= 5) {
			if ($index < $ranking) {
				echo '<li class="rating-'.$index.'" style="width: 40px;"></li>';	
			} else {
				$diferencia = 1 - ($index - $ranking);
				if ($diferencia > 0) {
					$diferencia = $diferencia * $anchoStar;
					echo '<li class="rating-'.$index.'" style="width: '.$diferencia.'px;"></li>';
				}
			}
			$index++;
		}
		echo '</ul>';

		$queryCount = "SELECT COUNT(c.idSolicitante) AS totalCitas FROM tcitas AS c WHERE (c.idSolicitante = '".$usuario."' OR c.idSolicitado = '".$usuario."') AND c.esCita = '1' AND c.estado = '4'";
		$resultCount = do_query($queryCount);
		if (mysqli_num_rows($resultCount) == 1) {
			$citasAsistidas = ' cita asistida';
		} else {
			$citasAsistidas = ' citas asistidas';
		}
		while($rowCount = mysqli_fetch_assoc($resultCount)) {
			echo '<span class="dash-ranking-asistidas rating-label">'.$rowCount['totalCitas'].$citasAsistidas.'</span>';
		}
	}

	function obtenerEvaluacionesPendientes($usuario, $rol) {
		if ($rol == '5') {
			$tipoUsuario = "idSolicitante = '".$usuario."'";
		} else {
			$tipoUsuario = "idSolicitado = '".$usuario."'";
		}
		$query = "SELECT COUNT(e.idCita) as evaluacionesPendientes FROM tevaluaciones AS e, tcitas AS c ".
				 "WHERE e.realizada = false AND e.idCita = c.id ".
				 "AND ".$tipoUsuario;
		$result = do_query($query);
		$row = mysqli_fetch_assoc($result);

		echo '<a href="/cenfotec-proyecto-1/evaluacion/evaluarCita.php" class="dash-evaluaciones dash-notificacion">';
		echo '<span class="dash-notificacion-label">Evaluaciones Pendientes</span>';
		echo '<span class="dash-notificacion-total">'.$row['evaluacionesPendientes'].'</span>';
		echo '</a>';
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