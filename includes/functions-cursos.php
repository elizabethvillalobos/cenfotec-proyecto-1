<?php

include_once('functions.php');

header('Content-Type:application/json');

// Usuarios
function getCursos() {
	$query = 'SELECT * FROM tcursos';

	return do_query($query);
}


if($_SERVER['REQUEST_METHOD']=="GET") {
	$function = $_GET['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    echo 'Function Not Exists!!';
	}
}

?>