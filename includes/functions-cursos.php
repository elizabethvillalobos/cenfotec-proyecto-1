<?php

include_once('functions.php');

header('Content-Type:application/json');

	// Función que consulta los cursos activos
	function getCursosActivos() {
		$query = "SELECT id, activo, nombre FROM `tcursos` WHERE activo='1';";
		
		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;		
		
		while ($row = mysqli_fetch_assoc($queryResults)) {			
			$results['id'] = $row['id'];
			$results['activo'] = $row['activo'];
			$results['nombre'] = $row['nombre'];
			$jsonArray['cursos'][$index] = $results;
			$index++;
		}

		mysqli_free_result($queryResults);
	
		return $jsonArray;
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