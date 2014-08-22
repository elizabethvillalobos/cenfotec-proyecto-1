<?php
	
	function getDiasDeExpiracion(){
		$query = $query = "SELECT valor FROM configuracion WHERE parametro = 'diasExpiracion'";
		$queryResults = do_query($query);
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$index++;
			$results['valor'] = utf8_encode($row['valor']);
		}

  		return $results;
	}

	function getCorreo(){
		$query = $query = "SELECT valor FROM configuracion WHERE parametro = 'correoNotificacion'";
		$queryResults = do_query($query);
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$index++;
			$results['valor'] = utf8_encode($row['valor']);
		}
  		
  		return $results;	
	}

	function getCaracteres(){
		$query = $query = "SELECT valor FROM configuracion WHERE parametro = 'caracteresMaximos'";
		$queryResults = do_query($query);
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$index++;
			$results['valor'] = utf8_encode($row['valor']);
		}

  		return $results;	
	}

	function getClave(){
		$query = $query = "SELECT valor FROM configuracion WHERE parametro = 'contrasena'";
		$queryResults = do_query($query);
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$index++;
			$results['valor'] = utf8_encode($row['valor']);
		}
  		
  		return $results;	
	}
?>	