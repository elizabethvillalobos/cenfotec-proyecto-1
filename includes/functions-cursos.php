<?php
	include_once('functions.php');

	// Función que consulta los cursos activos
	function getCursosActivos() {
		$query = "SELECT id, activo, nombre FROM `tcursos` WHERE activo='1';";
		
		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;		
		
		while ($row = mysqli_fetch_assoc($queryResults)) {			
			$results['id'] = utf8_encode($row['id']);
			$results['activo'] = utf8_encode($row['activo']);
			$results['nombre'] = utf8_encode($row['nombre']);
			$jsonArray['cursos'][$index] = $results;			
			$index++;
		}

		mysqli_free_result($queryResults);
		return $jsonArray;
	}

	function getCursoParaModificar($pidcurso){
		$query = "SELECT c.id as cursoId, c.nombre as cursoNombre, ".
				 "u.nombre AS profesorNombre, u.apellido1 AS profesorApellido1, u.apellido2 AS profesorApellido2 ".
				 "FROM tcursos AS c, tusuarios AS u, tusuariosxcurso AS uc ".
				 "WHERE c.id = uc.idCurso AND uc.idUsuario = u.id ".
				 "AND (u.rol = 3 OR u.rol = 4) ".
				 "AND c.id = '".$pidcurso."'";
		$queryResults = do_query($query);
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$index++;
			$results['cursoId'] = utf8_encode($row['cursoId']);
			$results['cursoNombre'] = utf8_encode($row['cursoNombre']);
			$results['profesor'.$index] = utf8_encode($row['profesorNombre']).' '.utf8_encode($row['profesorApellido1']).' '.utf8_encode($row['profesorApellido2']);
		}
    
  		return $results;
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