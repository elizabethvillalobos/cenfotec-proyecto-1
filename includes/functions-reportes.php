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
				 '<td>'.utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).'</td>'.
				 '<td>'.utf8_encode($row['rolNombre']).'</td>';
			while($rowCount = mysqli_fetch_assoc($resultCount)) {
				echo '<td class="center">'.utf8_encode($rowCount['totalCitas']).'</td>';
			}
			echo '<td class="center">'.utf8_encode($row['ranking']).'</td>'.
				 '</tr>';
			$index++;
		}
	}
?>