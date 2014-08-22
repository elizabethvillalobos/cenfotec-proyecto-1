<?php

	require_once('../includes/functions.php');		
	

	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'modificarCorreo':
				modificarCorreo();
				break;
			case 'modificarCaracter':
				modificarCaracter();
				break;
			case 'modificarDias':
				modificarDias();
				break;
			}
}


function getDiasDeExpiracion(){
		$query = $query = "SELECT configuracion.valor FROM configuracion WHERE configuracion.parametro = 'diasexpiracion' ";
		$queryResults = do_query($query);
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$index++;
			$results['valor'] = utf8_encode($row['valor']);
			
		}
    
  		return $results;
	}



function getCorreoParaModificar(){
		$query = $query = "SELECT configuracion.valor FROM configuracion WHERE configuracion.parametro = 'correoNotificacion' ";
		$queryResults = do_query($query);
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$index++;
			$results['valor'] = utf8_encode($row['valor']);
			
		}
    
  		return $results;
	}

function getCaracteresParaModificar(){
		$query = $query = "SELECT configuracion.valor FROM configuracion WHERE configuracion.parametro = 'caracteresMaximos' ";
		$queryResults = do_query($query);
		$index = 0;

		while ($row = mysqli_fetch_assoc($queryResults)) {
			$index++;
			$results['valor'] = utf8_encode($row['valor']);
			
		}
    
  		return $results;
	}


function modificarCorreo(){


	if(isset($_GET['pcorreoNotificacion'])) {
	
		$pcorreoNotificacion = $_GET['pcorreoNotificacion'];

		$query = "UPDATE configuracion SET valor='$pcorreoNotificacion' WHERE parametro='correoNotificacion'";

		$result = do_query($query);
		deliver_response(200, 'OK', 'Registrado con exito');
} else {

		deliver_response(400, 'Bad request', NULL);	

}}

function modificarDias(){

	if(isset($_GET['pdias'])) {	
		$pdias = $_GET['pdias'];
		$query = "UPDATE configuracion SET valor='$pdias' WHERE parametro='diasexpiracion'";
		$result = do_query($query);
		deliver_response(200, 'OK', 'Registrado con exito');	
	} else {
		deliver_response(400, 'Bad request', NULL);	

}}







function modificarCaracter(){


	if(isset($_GET['pcaracterMaximo'])) {
	
		$pcaracterMaximo = $_GET['pcaracterMaximo'];

		$query = "UPDATE configuracion SET valor='$pcaracterMaximo' WHERE parametro='caracteresMaximos'";

		$result = do_query($query);
		deliver_response(200, 'OK', 'Registrado con exito');
} else {

		deliver_response(400, 'Bad request', NULL);	

}}



		function deliver_response($status, $statusMessage, $data) {
		header("HTTP/1.1 $status $statusMessage");
		$response['status'] = $status;
		$response['status-message'] = $statusMessage;
		$response['data'] = $data;
		echo json_encode($response);
	} 

	?>