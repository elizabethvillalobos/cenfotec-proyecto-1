<?php

// Usuarios
function getUsuarios() {
	$query = "SELECT * FROM tusuarios";

	return do_query($query);
}

/*
function insertarUsuario() {
	$query = "INSERT INTO gic_usuarios(email, nombre, apellido1, apellido2) VALUES ('evillalobos@ucenfotec.ac.cr', 'Elizabeth', 'Villalobos', 'Molina'), ('jbarboza@ucenfotec.ac.cr', 'Javier', 'Barboza', 'Solís'), ('dbarillas@ucenfotec.ac.cr', 'Diego', 'Barillas', 'Valverde'), ('jcerdas@ucenfotec.ac.cr', 'Jose', 'Cerdas', 'González'), ('mcoto@ucenfotect.ac.cr', 'Miguel', 'Coto', 'García'), ('osantamaria@ucenfotec.ac.cr', 'Oscar', 'Santamaría', 'Venegas')";

	return do_query($query);
}
*/

function mostrarUsuarios() {
	$usuarios = getUsuarios();

	while ($row = mysqli_fetch_assoc($usuarios)) {
		echo '<tr>';
        echo '<td>';
        echo '<a href="#">' . $row['nombre'].' '.$row['apellido1'].' '.$row['apellido2'];
        echo '</a>';
        echo '<span class="usuarios-email">'.$row['id'];
        echo '</span>';
        echo '</td>';
        echo '</tr>';
	}
}

?>