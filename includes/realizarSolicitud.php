<?php
	include_once('functions.php');
	db_init();
	
	$asunto=$_POST['asunto'];
	echo $asunto;
	do_query("INSERT INTO curso (nombre) VALUES ('jajaaaaaaa')");
	
	
	
?>