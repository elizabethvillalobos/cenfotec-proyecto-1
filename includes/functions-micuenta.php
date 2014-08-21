<?php
	
	function getPassword($usuarioActivoId){
		$query = "SELECT tusuarios.contrasena FROM tusuarios WHERE tusuarios.id ='$usuarioActivoId' ";	 	 
		$result = do_query($query);	
		$password = mysqli_fetch_assoc($result);
		return $password;
	}

?>