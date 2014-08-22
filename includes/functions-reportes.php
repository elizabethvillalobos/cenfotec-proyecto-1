<?php
	error_reporting(0);
	require_once('functions.php');

	function reporteRanking() {
		$query = "SELECT u.id as userId, u.nombre, u.apellido1, u.apellido2, u.rol, u.ranking, r.nombre as rolNombre FROM tusuarios AS u INNER JOIN trol as r on u.rol = r.id ORDER BY u.ranking DESC, u.apellido1, u.apellido2, u.nombre";
		$result = do_query($query);
		$index = 0;

		while($row = mysqli_fetch_assoc($result)){
			$queryCount = "SELECT COUNT(c.idSolicitante) AS totalCitas FROM tcitas AS c WHERE (c.idSolicitante = '".utf8_encode($row['userId'])."' OR c.idSolicitado = '".utf8_encode($row['userId'])."') AND c.esCita = '1' AND c.estado = '4'";
			$resultCount = do_query($queryCount);

			echo '<tr>'.
				 '<td class="center">'.($index + 1).'</td>'.
				 '<td class="center">'.utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).'</td>'.
				 '<td class="center">'.utf8_encode($row['rolNombre']).'</td>';
			while($rowCount = mysqli_fetch_assoc($resultCount)) {
				echo '<td class="center">'.utf8_encode($rowCount['totalCitas']).'</td>';
			}
			echo '<td class="center">'.utf8_encode($row['ranking']).'</td>'.
				 '</tr>';
			$index++;
		}
	}

	function reporteUsuarios(){
		$query = "SELECT u.id as userId, u.nombre, u.activo, u.apellido1, u.apellido2, u.carrera, u.rol, u.ranking, r.nombre as rolNombre FROM tusuarios AS u INNER JOIN trol as r on u.rol = r.id ORDER BY u.ranking DESC, u.apellido1, u.apellido2, u.nombre";
		$result = do_query($query);
		while($row = mysqli_fetch_assoc($result)){
			$nombreCarrera = getNombreCarrera($row['carrera']);
			if($row['activo']==1){
				$estado = "Activo";
			}else{
				$estado = "Inactivo";
			}
			echo '<tr>'.
				 '<td class="center">'.utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).'</td>'.
				 '<td class="center">'.utf8_encode($row['rolNombre']).'</td>'.
				 '<td class="center">'.utf8_encode($nombreCarrera).'</td>'.
				 '<td class="center">'.utf8_encode($row['userId']).'</td>'.
				 '<td class="center">'.utf8_encode($estado).'</td>'.
				 '</tr>';
		}
	}

	function reporteSolicitudes(){
		$query = "SELECT u.id as userId, u.nombre, u.apellido1, u.apellido2, u.rol, r.nombre as rolNombre FROM tusuarios AS u INNER JOIN trol as r on u.rol = r.id ORDER BY u.rol ASC, u.apellido1, u.apellido2, u.nombre";
		$result = do_query($query);

		while($row = mysqli_fetch_assoc($result)){
			$queryCountSolicitudesPendientes = "SELECT count(c.idSolicitante) AS totalSolicitudesPendientes FROM tcitas AS c WHERE (c.idSolicitante = '".utf8_encode($row['userId'])."' OR c.idSolicitado = '".utf8_encode($row['userId'])."') AND c.esCita ='0' AND c.estado = '1'";
			$resultCountSolicitudesPendientes = do_query($queryCountSolicitudesPendientes);
			$queryCountSolicitudesAceptadas = "SELECT count(c.idSolicitante) AS totalSolicitudesAceptadas FROM tcitas AS c WHERE (c.idSolicitante = '".utf8_encode($row['userId'])."' OR c.idSolicitado = '".utf8_encode($row['userId'])."') AND c.esCita ='0' AND c.estado = '2'"; 
			$resultCountSolicitudesAceptadas = do_query($queryCountSolicitudesAceptadas);
			$queryCountSolicitudesRechazadas = "SELECT count(c.idSolicitante) AS totalSolicitudesRechazadas FROM tcitas AS c WHERE (c.idSolicitante = '".utf8_encode($row['userId'])."' OR c.idSolicitado = '".utf8_encode($row['userId'])."') AND c.esCita ='0' AND c.estado = '3'"; 
			$resultCountSolicitudesRechazadas = do_query($queryCountSolicitudesRechazadas);
			$queryCountSolicitudesExpiradas = "SELECT count(c.idSolicitante) AS totalSolicitudesExpiradas FROM tcitas AS c WHERE (c.idSolicitante = '".utf8_encode($row['userId'])."' OR c.idSolicitado = '".utf8_encode($row['userId'])."') AND c.esCita ='0' AND c.estado = '6'"; 
			$resultCountSolicitudesExpiradas = do_query($queryCountSolicitudesExpiradas);

			echo '<tr>'.
				 '<td class="center"><a href="/cenfotec-proyecto-1/reportes/reporteSolicitudes-especifico.php?usuarioId='.$row['userId'].'" style="color:#666"> '.utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).'</a></td>'.
				 '<td class ="center">'.utf8_encode($row['rolNombre']).'</td>';
				 while($rowCountSolicitudesPendientes = mysqli_fetch_assoc($resultCountSolicitudesPendientes)){
				 	echo '<td class="center">'.utf8_encode($rowCountSolicitudesPendientes['totalSolicitudesPendientes']);
				 }
				 while($rowCountSolicitudesAceptadas = mysqli_fetch_assoc($resultCountSolicitudesAceptadas)){
				 	echo '<td class="center">'.utf8_encode($rowCountSolicitudesAceptadas['totalSolicitudesAceptadas']);
				 }
				 while($rowCountSolicitudesRechazadas = mysqli_fetch_assoc($resultCountSolicitudesRechazadas)){
				 	echo '<td class="center">'.utf8_encode($rowCountSolicitudesRechazadas['totalSolicitudesRechazadas']);
				 }
				 while($rowCountSolicitudesExpiradas = mysqli_fetch_assoc($resultCountSolicitudesExpiradas)){
				 	echo '<td class="center">'.utf8_encode($rowCountSolicitudesExpiradas['totalSolicitudesExpiradas']);
				 }
			echo '</tr>';	 
		}
	}

	function reporteAgendas(){
		$query = "SELECT u.id as userId, u.nombre, u.apellido1, u.apellido2, u.rol, r.nombre as rolNombre FROM tusuarios AS u INNER JOIN trol as r on u.rol = r.id ORDER BY u.rol ASC, u.apellido1, u.apellido2, u.nombre";
		$result = do_query($query);

		while($row = mysqli_fetch_assoc($result)){
			$queryCountCitasPendientes = "SELECT count(c.idSolicitante) AS totalCitasPendientes FROM tcitas AS c WHERE (c.idSolicitante = '".utf8_encode($row['userId'])."' OR c.idSolicitado = '".utf8_encode($row['userId'])."') AND c.esCita ='1' AND c.estado = '1'";
			$resultCountCitasPendientes = do_query($queryCountCitasPendientes);
			$queryCountCitasFinalizadas = "SELECT count(c.idSolicitante) AS totalCitasFinalizadas FROM tcitas AS c WHERE (c.idSolicitante = '".utf8_encode($row['userId'])."' OR c.idSolicitado = '".utf8_encode($row['userId'])."') AND c.esCita ='1' AND c.estado = '4'"; 
			$resultCountCitasFinalizadas = do_query($queryCountCitasFinalizadas);
			$queryCountCitasCanceladas = "SELECT count(c.idSolicitante) AS totalCitasCanceladas FROM tcitas AS c WHERE (c.idSolicitante = '".utf8_encode($row['userId'])."' OR c.idSolicitado = '".utf8_encode($row['userId'])."') AND c.esCita ='1' AND c.estado = '5'"; 
			$resultCountCitasCanceladas = do_query($queryCountCitasCanceladas);
			
			echo '<tr>'.
				 '<td class="center"><a href="/cenfotec-proyecto-1/reportes/reporteAgendas-especifico.php?usuarioId='.$row['userId'].'" style="color:#666"> '.utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).'</a></td>'.
				 '<td class ="center">'.utf8_encode($row['rolNombre']).'</td>';
				 while($rowCountCitasPendientes = mysqli_fetch_assoc($resultCountCitasPendientes)){
				 	echo '<td class="center">'.utf8_encode($rowCountCitasPendientes['totalCitasPendientes']);
				 }
				 while($rowCountCitasFinalizadas = mysqli_fetch_assoc($resultCountCitasFinalizadas)){
				 	echo '<td class="center">'.utf8_encode($rowCountCitasFinalizadas['totalCitasFinalizadas']);
				 }
				 while($rowCountCitasCanceladas = mysqli_fetch_assoc($resultCountCitasCanceladas)){
				 	echo '<td class="center">'.utf8_encode($rowCountCitasCanceladas['totalCitasCanceladas']);
				 }
			echo '</tr>';	 
		}
	}

	function reporteAgendasEspecifico($usuarioId){
		$query = "SELECT asunto, fechaCreacion, observaciones, estado, idSolicitante, idSolicitado FROM tcitas WHERE (idSolicitante = '$usuarioId' OR idSolicitado = '$usuarioId') AND esCita ='1' ";  
		$result = do_query($query);
		$rol = getRol($usuarioId);
		while($row = mysqli_fetch_assoc($result)){
			if($row['estado'] == 1){
				$estado = "Pendiente";
			}else{
				if($row['estado'] == 4){
					$estado = "Finalizada";	
				}else{
					if($row['estado'] == 5){
						$estado = "Cancelada";
					}
				}
			}
			if($rol == 5){
				$nombre = getNombre($row['idSolicitado']);
			}else{
				$nombre = getNombre($row['idSolicitante']);
			}
			echo '<tr>'.
				 '<td class="center">'.utf8_encode($row['asunto']).'</td>'.
				 '<td class="center">'.$nombre.'</td>'.
				 '<td class="center">'.utf8_encode($row['fechaCreacion']).'</td>'.
				 '<td class="center">'.utf8_encode($row['observaciones']).'</td>'.
				 '<td class="center">'.$estado.'</td>'.
				 '</tr>';				 
		}
	}

	function reporteEspecifico($usuarioId){
		$query = "SELECT asunto, fechaCreacion, observaciones, estado, idSolicitante, idSolicitado FROM tcitas WHERE (idSolicitante = '$usuarioId' OR idSolicitado = '$usuarioId') AND esCita ='0' ";  
		$result = do_query($query);
		$rol = getRol($usuarioId);
		while($row = mysqli_fetch_assoc($result)){
			if($row['estado'] == 1){
				$estado = "Pendiente";
			}else{
				if($row['estado'] == 2){
					$estado = "Aceptada";	
				}else{
					if($row['estado'] == 3){
						$estado = "Rechazada";
					}else{
						if($row['estado'] == 6){
							$estado = "Expirada";	
						}
					}
				}
			}
			if($rol == 5){
				$nombre = getNombre($row['idSolicitado']);
			}else{
				$nombre = getNombre($row['idSolicitante']);
			}
			echo '<tr>'.
				 '<td class="center">'.utf8_encode($row['asunto']).'</td>'.
				 '<td class="center">'.$nombre.'</td>'.
				 '<td class="center">'.utf8_encode($row['fechaCreacion']).'</td>'.
				 '<td class="center">'.utf8_encode($row['observaciones']).'</td>'.
				 '<td class="center">'.$estado.'</td>'.
				 '</tr>';				 
		}
	}

	function getNombre($usuarioId){
		$query = "SELECT nombre, apellido1, apellido2 from tusuarios WHERE id='$usuarioId'";
		$result = do_query($query);
		$row = mysqli_fetch_assoc($result);
		$nombre = utf8_encode($row['nombre']) . ' '. utf8_encode($row['apellido1']) . ' '. utf8_encode($row['apellido2']);
		return $nombre;
	}

	function getRol($usuarioId){
		$query = "SELECT rol from tusuarios WHERE id = '$usuarioId'";
		$result = do_query($query);
		$row = mysqli_fetch_assoc($result);
		$rol = $row['rol'];
		return $rol; 
	}

	function getNombreCarrera($idcarrera){
		$query = "SELECT nombre from tcarrera WHERE id = '$idcarrera'";
		$result = do_query($query);
		$row = mysqli_fetch_assoc($result);
		$carrera = $row['nombre'];
		return $carrera; 
	}		

	function reporteUsuariosRegistrados() {
		$query = "SELECT u.id as usuarioId, u.nombre as usuarioNombre, u.apellido1, u.apellido2, u.rol, u.activo, c.nombre as carreraNombre, r.nombre as rolNombre ".
				 "FROM tusuarios AS u INNER JOIN tcarrera AS c on u.carrera = c.id ".
				 "INNER JOIN trol AS r on u.rol = r.id ".
				 "ORDER BY u.rol ASC, u.apellido1, u.apellido2, usuarioNombre";
		$result = do_query($query);

		while($row = mysqli_fetch_assoc($result)){
			$estado = $row['activo'] ? 'Activo' : 'Inactivo';
			echo '<tr class="'.$estado.'">'.
				 '<td class="usuario-nombre">'.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).' '.utf8_encode($row['usuarioNombre']).'</td>'.
				 '<td class="usuario-rol">'.utf8_encode($row['rolNombre']).'</td>'.
				 '<td class="usuario-carrera">'.utf8_encode($row['carreraNombre']).'</td>'.
				 '<td class="usuario-id">'.utf8_encode($row['usuarioId']).'</td>'.
				 '<td class="usuario-estado">'.$estado.'</td>'.
				 '</tr>';
		}
	}
	
?>