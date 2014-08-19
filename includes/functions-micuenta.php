<?php
	require_once('../includes/functions.php');

	function cargarContrasenaActual($usuarioActivo) {
		$query = 'SELECT tusuarios.contrasena '.
			 	 'FROM tusuarios WHERE tusuarios.id = "'.$usuarioActivo.'"';
		
		$result = do_query($query);
	}
?>