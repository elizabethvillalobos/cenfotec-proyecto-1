<?php
    session_start();
	error_reporting(0);
	require_once('../includes/functions.php');

	header('Content-Type:application/json');

	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		if($queryType=='modificarEvaluacion'){

			modificarEvaluacion();
		}						
		
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
	}
	
	
	function modificarEvaluacion(){
		if (!empty($_GET['pradioSi']) && !empty($_GET['idCita']) && !empty($_GET['pnota2']) && 
			!empty($_GET['pnota3']) && !empty($_GET['pnota4']) && !empty($_GET['pnota5']) ){
			$rdSi = utf8_decode($_GET['pradioSi']);
			//$rdNo = utf8_decode($_GET['pradioNo']);	
			$nota2 = $_GET['pnota2'];
			$nota3 = $_GET['pnota3'];
			$nota4 = $_GET['pnota4'];
			$nota5 = $_GET['pnota5'];
			$idCita = $_GET['idCita'];

			$idActores=obtenerActoresxIdCita($pidCita); 

	        $row = mysqli_fetch_assoc($idActores);

	        $idSolicitante = $row['idSolicitante'];

	        $idSolicitado = $row['idSolicitado'];



			switch ($rolUsr) {
				case 4:
					$query = "UPDATE tevaluaciones SET nota2='$nota2',nota3='$nota3',nota4='$nota4',nota5='$nota5', realizada=1 WHERE idCita='$idCita' AND idActor='$idSolicitante'";
		            $result = do_query($query);
		            deliver_response(200, 'OK', 'Registrado con exito');
					break;
				
				case 5:
					$query = "UPDATE tevaluaciones SET nota2='$nota2',nota3='$nota3',nota4='$nota4',nota5='$nota5', realizada=1 WHERE idCita='$idCita' AND idActor='$idSolicitado'";
		            $result = do_query($query);
		            deliver_response(200, 'OK', 'Registrado con exito');
					break;
			}
									
		}else{
			deliver_response(400, 'Bad request', NULL);	
		}	
	}


	function deliver_response($status, $statusMessage, $data) {
		header("HTTP/1.1 $status $statusMessage");
		$response['status'] = $status;
		$response['status-message'] = $statusMessage;
		$response['data'] = $data;
		echo json_encode($response);
	} 



?>