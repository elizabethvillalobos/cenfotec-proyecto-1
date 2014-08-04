<?php

// Usuarios
function getUsuarios() {
	$query = 'SELECT * FROM gic_usuarios';

	return do_query($query);
}

function insertarUsuario() {
	$query = "INSERT INTO gic_usuarios(email, nombre, apellido1, apellido2) VALUES ('evillalobos@ucenfotec.ac.cr', 'Elizabeth', 'Villalobos', 'Molina'), ('jbarboza@ucenfotec.ac.cr', 'Javier', 'Barboza', 'Solís'), ('dbarillas@ucenfotec.ac.cr', 'Diego', 'Barillas', 'Valverde'), ('jcerdas@ucenfotec.ac.cr', 'Jose', 'Cerdas', 'González'), ('mcoto@ucenfotect.ac.cr', 'Miguel', 'Coto', 'García'), ('osantamaria@ucenfotec.ac.cr', 'Oscar', 'Santamaría', 'Venegas')";

	return do_query($query);
}

function mostrarUsuarios() {
	$usuarios = getUsuarios();

	while ($row = mysql_fetch_assoc($usuarios)) {
		echo '<p>' . $row['email'] . ' -  ' . $row['nombre'] . ' ' . $row['apellido1'] . ' ' . $row['apellido2'] . '</p>';
	}
}

?>