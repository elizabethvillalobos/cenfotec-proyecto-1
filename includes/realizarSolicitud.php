<?php
	include_once('functions.php');
	
	$asunto=$_POST['asunto'];
	do_query("INSERT INTO curso (nombre) VALUES ('$asunto')");
	header('Location: ../citas/solicitudEnviada.php');
?>