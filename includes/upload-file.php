<?php

	// Retornar un json.
	header('Content-Type:application/json');

	// Procesar el request (url)
	if (!empty($_POST['query'])) {
		$queryType = $_POST['query'];

		switch ($queryType) {
			case 'uploadFile':
				uploadFile();
				break;
		}
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
	}

	function uploadFile() {
		if (!empty($_POST['imgPath'])) {
			// requires php5
			define('UPLOAD_DIR', '../images/users/');
			$img = $_POST['imgPath'];

			$img = str_replace('data:image/png;base64,', '', $img);
			$data = base64_decode($img);
			
			// $file = UPLOAD_DIR . uniqid() . '.png';
			$fileName = uniqid() . '.png';
			$file = UPLOAD_DIR . $fileName;

			$success = file_put_contents($file, $data);

			if ($success) {
				// Retornar el nombre del archivo que se creo.
				deliver_response(200, 'OK', $fileName);
			} else {
				deliver_response(200, 'OK', json_encode('No se pudo guardar el archivo.'));
			}
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